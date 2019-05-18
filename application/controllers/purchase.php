<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchase extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('login') != true)
            redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
    }

    
    
    public function view_purchase(){
        $data = array();

              $this->load->library('pagination');
              $config['base_url'] = base_url() . 'purchase/view_purchase';
              $config['total_rows'] = $this->c_model->count_all_data('purchase');
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
              $data['all_purchase'] = $this->c_model->fetch_all_pagination('purchase', $config["per_page"], $page);
              $data["links"] = $this->pagination->create_links(); 
            $data['title'] = 'Megal : Purchase';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['content'] = $this->load->view('purchase/view_purchase', $data, TRUE);
            $this->load->view('master_view', $data);
        
        
    }
    
    
    public function add_new() {

              
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger bcr" role="alert">', '</div>');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('item_name', 'item_name', 'required|trim');
        $this->form_validation->set_rules('quantity', 'quantity', 'required|numeric');
        $this->form_validation->set_rules('uprice', 'price', 'required|numeric');
        $this->form_validation->set_rules('invoice', 'invoice', 'required');
        $this->form_validation->set_rules('comments', 'comments', 'trim');

        if ($this->form_validation->run() == FALSE) {            
            $data['title'] = 'Megal : Purchase';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['content'] = $this->load->view('purchase/add_new', '', TRUE);
            $this->load->view('master_view', $data);
        } else {
            
           // print_r($_POST);
          //  exit();
            $subtot =$this->input->post('quantity') *  $this->input->post('uprice');
            $data = array(
                'supplier_id' => $this->input->post('supplier_id'),
                'item_name' => $this->input->post('item_name'),
                'unit' => $this->input->post('unit'),
                  'qty' => $this->input->post('quantity'),
                  'unit_price' => $this->input->post('uprice'),
                 'sub_tot_price'=> $subtot ,
                  'invoice' => $this->input->post('invoice'),               
                'date' => date('Y-m-d'),
                'comment' => $this->input->post('comments'),
                'status'=>1
            );
            $result = $this->c_model->insert_data('purchase', $data);
            if (!$result) {
                $msg = 'no';
            } else {
                //update supplier account
                
                $this->db->where('people_id', $this->input->post('supplier_id'));
                $query2 =$this->db->get('account');
                $acamount = $subtot + $query2->row()->amount;
                $acc_data = array(
                    'amount' => $acamount
                );
                 $this->db->where('id', $query2->row()->id);
                 $this->db->update('account', $acc_data);
                 
                $msg = 'ok';
            }

            $this->session->set_userdata(array('msg' => $msg));

            redirect('purchase/view_purchase', 'refresh');
        }
    }

/*    public function edit_purchase($rid = null) {

        if (!isset($rid)) {
            $rid = $this->session->userdata('id');
        } else {
            $this->session->set_userdata('id', $rid);
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger bcr" role="alert">', '</div>');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('item_name', 'item_name', 'required|trim');
        $this->form_validation->set_rules('quantity', 'quantity', 'required|numeric');
        $this->form_validation->set_rules('uprice', 'price', 'required|numeric');
        $this->form_validation->set_rules('invoice', 'invoice', 'required');
        $this->form_validation->set_rules('comments', 'comments', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Purchase';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['pinfo'] = $this->c_model->fetch_by_id('purchase', $rid);
            $data['content'] = $this->load->view('purchase/edit_purchase', $data, TRUE);
            $this->load->view('master_view', $data);
        } else {
          $sdata = array(
                'supplier_id' => $this->input->post('supplier_id'),
                'item_name' => $this->input->post('item_name'),
                'unit' => $this->input->post('unit'),
                  'qty' => $this->input->post('quantity'),
                  'unit_price' => $this->input->post('uprice'),
                 'sub_tot_price'=>  $this->input->post('quantity') *  $this->input->post('uprice'),
                  'invoice' => $this->input->post('invoice'),               
                'date' => date('Y-m-d'),
                'comment' => $this->input->post('comments'),
                'status'=>1
            );
         $result= $this->c_model->update_data('purchase',$sdata,  $rid);
            if (!$result) {
                $msg = 'no';
            } else {
                $msg = 'ok';
            }

            $this->session->set_userdata(array('msg' => $msg));

            redirect('purchase/view_purchase', 'refresh');
        }
    }

    public function delete_purchase($rid = null) {
        $result = $this->c_model->delete_row('purchase', $rid);
        if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        redirect('purchase/view_purchase', 'refesh');
    }
*/
    
    
}