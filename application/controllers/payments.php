<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('login') != true)
            redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
    }


    public function view_all_payments() {
        $data = array();

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'sales/view_sales';
        $config['total_rows'] = $this->c_model->count_all_data('payment');
        $config['per_page'] = 20;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_payments'] = $this->c_model->fetch_all_pagination('payment', $config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'Megal : Payments';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/view_payments', $data, TRUE);
        $this->load->view('master_view', $data);
    }

    public function add_payments() {
        //    print_r($_POST);
        $paid = $this->input->post('amount');
        $data = array(
            'to_people_id' =>1,
            'from_people_id' => $this->input->post('from'),
            'amount' => $paid,
            'status' =>1,
            'date' => date('Y-m-d')
        );
        
        $this->c_model->insert_data('payment', $data);
        
        //update account
        
        $this->db->where('people_id', $this->input->post('from'));
        $query = $this->db->get('account');
        $balance = $query->row()->amount + $paid;
        $accdata = array(
            'amount' => $balance,
        );
        $this->db->where('id', $query->row()->id);
        $this->db->update('account', $accdata);
        redirect('payments/view_all_payments', 'refresh');
    }
    
    public function add_admin_payments(){
        $paid = $this->input->post('amount');
        $data = array(
            'to_people_id' =>$this->input->post('to'),
            'from_people_id' => 1,
            'amount' => $paid,
            'status' =>1,
            'date' => date('Y-m-d')
        );
        
        $this->c_model->insert_data('payment', $data);
        
        //update account
        
        $this->db->where('people_id', $this->input->post('to'));
        $query = $this->db->get('account');
        $balance = $query->row()->amount - $paid;
        $accdata = array(
            'amount' => $balance,
        );
        $this->db->where('id', $query->row()->id);
        $this->db->update('account', $accdata);
        //expense entry
        $expdata = array(
            'expense_type_id' => 1,
            'amount' => $paid,
            'comment'=> 'payments to supplier',
            'status'=>1,
            'date' => date('Y-m-d')
            
        );
        
        $this->c_model->insert_data('expense' , $expdata);
        redirect('payments/view_all_payments', 'refresh');
        
        
        
    }

}
