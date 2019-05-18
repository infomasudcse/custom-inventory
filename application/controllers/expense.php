<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('login') != true)
            redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
    }

    public function add_new() {

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger bcr" role="alert">', '</div>');
        $this->form_validation->set_rules('expense_type', 'expense_type', 'required');
        $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
        $this->form_validation->set_rules('comments', 'comments', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Expense';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'expense/add_new';
            $config['total_rows'] = $this->c_model->count_all_data('expense');
            $config['per_page'] = 5;
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
            $data['all_expense'] = $this->c_model->fetch_all_pagination('expense', $config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $data['content'] = $this->load->view('expense/add_new', $data, TRUE);
            $this->load->view('master_view', $data);
        } else {
            $data = array(
                'expense_type_id' => $this->input->post('expense_type'),
                'amount' => $this->input->post('amount'),
                'comment' => $this->input->post('comments'),
                'date' => date('Y-m-d'),
                'status' => 1
            );
            $result = $this->c_model->insert_data('expense', $data);
            if (!$result) {
                $msg = 'no';
            } else {
                $msg = 'ok';
            }

            $this->session->set_userdata(array('msg' => $msg));

            redirect('expense/add_new', 'refresh');
        }
    }
    
    public function edit_expense($rid = null){
        
        if(!isset($rid)){
			$rid = $this->session->userdata('id');
		}
		else{
			$this->session->set_userdata('id',$rid);
		}
         $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger bcr" role="alert">', '</div>');
        $this->form_validation->set_rules('expense_type', 'expense_type', 'required');
        $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
        $this->form_validation->set_rules('comments', 'comments', 'trim');

        if ($this->form_validation->run() == FALSE) {
           $data = array();
            $data['title'] = 'Megal : Expenses';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);            
             $data['expense'] = $this->c_model->fetch_by_id('expense', $rid);
            $data['content'] = $this->load->view('expense/edit_expense', $data, TRUE);
            $this->load->view('master_view', $data);
        } else {      
          $udata = array(
              'expense_type_id' => $this->input->post('expense_type'),
                'amount' => $this->input->post('amount'),
                'comment' => $this->input->post('comments'),
                'date' => date('Y-m-d')                
          );
           $result = $this->c_model->update_data('expense', $udata, $rid);
            if (!$result) {
                $msg = 'no';
            } else {
                $msg = 'ok';
            }
            redirect('expense/add_new', 'refesh');
        }    
    }
    
    public function delete_expense($rid = null){
        $result = $this->c_model->delete_row('expense', $rid);
            if (!$result) {
                $msg = 'no';
            } else {
                $msg = 'ok';
            }
            redirect('expense/add_new', 'refesh');
        
    }
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */