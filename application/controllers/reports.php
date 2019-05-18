<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') != true)
            redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
        $this->load->model('reports_model', 'r_model', TRUE);
    }

    public function index() {
        $data['title'] = 'Megal : Reports';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/listing', '', TRUE);
        $this->load->view('master_view', $data);
    }

    public function all_bill() {
        $data = array();

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'reports/all_bill';
        $config['total_rows'] = $this->c_model->count_all_data('bills');
        $config['per_page'] = 15;
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
        $data['all_bills'] = $this->c_model->fetch_all_pagination('bills', $config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'Megal : Bills';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/all_bills', $data, TRUE);
        $this->load->view('master_view', $data);
    }

    public function expense_report() {
      
      $from_date = $this->input->post('from_year') . '-' . $this->input->post('from_month') . '-' . $this->input->post('from_day');
        $to_date = $this->input->post('to_year') . '-' . $this->input->post('to_month') . '-' . $this->input->post('to_day');

        $inputs = array(
            'expense_type_id' => $this->input->post('exp_type_id'),
            'type' => $this->input->post('type'),
            'start' => $from_date,
            'end' => $to_date
        );
        $data = array();
        $data['all_expense'] = $this->r_model->generate_expense_report($inputs);
        $data['title'] = 'Megal : Report';
        $data['param']= $inputs;
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/expense_report_v', $data, TRUE);
      //  echo '<pre>';
     //   print_r($data);
     //   exit();
       $this->load->view('master_view', $data);
       
    }

    public function purchase_report() {
      
      $from_date = $this->input->post('from_year') . '-' . $this->input->post('from_month') . '-' . $this->input->post('from_day');
        $to_date = $this->input->post('to_year') . '-' . $this->input->post('to_month') . '-' . $this->input->post('to_day');

        $inputs = array(
            'supplier' => $this->input->post('supplier_id'),
            'invoice' => $this->input->post('invoice'),
            'type' => $this->input->post('type'),
            'start' => $from_date,
            'end' => $to_date
        );
        $data = array();
        $data['all_purchase'] = $this->r_model->generate_purchase_report($inputs);
        $data['title'] = 'Megal : Report';
        $data['param']= $inputs;
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/purchase_report_v', $data, TRUE);
      //  echo '<pre>';
     //   print_r($data);
     //   exit();
       $this->load->view('master_view', $data);
        
        
        
    }

    public function revenue_report() {
        $from_date = $this->input->post('from_year') . '-' . $this->input->post('from_month') . '-' . $this->input->post('from_day');
        $to_date = $this->input->post('to_year') . '-' . $this->input->post('to_month') . '-' . $this->input->post('to_day');

        $inputs = array(
            'revenue_type_id' => $this->input->post('rev_type_id'),
            'type' => $this->input->post('type'),
            'start' => $from_date,
            'end' => $to_date
        );
        $data = array();
        $data['all_revenue'] = $this->r_model->generate_revenue_report($inputs);
        $data['title'] = 'Megal : Report';
        $data['param']= $inputs;
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/revenue_report_v', $data, TRUE);
    //    echo '<pre>';
    //   print_r($data);
    //   exit();
       $this->load->view('master_view', $data);
        
        
    }

    public function payments_report() {
        $from_date = $this->input->post('from_year') . '-' . $this->input->post('from_month') . '-' . $this->input->post('from_day');
        $to_date = $this->input->post('to_year') . '-' . $this->input->post('to_month') . '-' . $this->input->post('to_day');

        $inputs = array(
            'from_people_id' => $this->input->post('from'),
            'to_people_id' => $this->input->post('to'),
            'type' => $this->input->post('type'),
            'start' => $from_date,
            'end' => $to_date
        );
        $data = array();
        $data['all_payments'] = $this->r_model->generate_payment_report($inputs);
        $data['title'] = 'Megal : Report';
        $data['param']= $inputs;
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/payment_report_v', $data, TRUE);
      //  echo '<pre>';
     //   print_r($data);
     //   exit();
       $this->load->view('master_view', $data);
        }

    public function sales_report() {
        $from_date = $this->input->post('from_year') . '-' . $this->input->post('from_month') . '-' . $this->input->post('from_day');
        $to_date = $this->input->post('to_year') . '-' . $this->input->post('to_month') . '-' . $this->input->post('to_day');

        $inputs = array(
            'buyer_id' => $this->input->post('buyer'),
            'product_id' => $this->input->post('product'),
            'invoice' => $this->input->post('invoice'),
            'bill_number'=>$this->input->post('bill'),
            'type' => $this->input->post('type'),
            'start' => $from_date,
            'end' => $to_date
        );
        $data = array();
        $data['all_sales'] = $this->r_model->generate_sales_report($inputs);
        $data['title'] = 'Megal : Report';
        $data['param']= $inputs;
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('reports/sales_report_v', $data, TRUE);
      //  echo '<pre>';
     //   print_r($data);
     //   exit();
       $this->load->view('master_view', $data);
        
        
    }

}
