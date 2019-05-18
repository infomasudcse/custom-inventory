<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('login') != true)
            redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
    }

    public function view_sales() {
        $data = array();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'sales/view_sales';
        $config['total_rows'] = $this->c_model->count_all_data('sales');
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
        $data['all_sales'] = $this->c_model->fetch_all_pagination('sales', $config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['title'] = 'Megal : Sales';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('sales/view_sales', $data, TRUE);
        $this->load->view('master_view', $data);
    }

    public function add_new() {

        $data['title'] = 'Megal : Sales';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('sales/add_new', '', TRUE);
        $this->load->view('master_view', $data);
    }

    public function view_bill() {
        $data['title'] = 'Megal : View Bill';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['content'] = $this->load->view('sales/view_bill', '', TRUE);
        $this->load->view('master_view', $data);
    }

    public function output_bill($bill_n = null) {
        $msg = '';
        //save cart data to sale table
        $cartdata = $this->cart->contents();
        foreach ($cartdata as $crt) {
            $data = array(
                'invoice' => $crt['options']['invoice'],
                'bill_number' => $bill_n,
                'buyer_id' => $crt['name'],
                'product_id' => $crt['id'],
                'unit' => $crt['options']['unit'],
                'unit_price' => $crt['price'],
                'qty' => $crt['qty'],
                'sub_tot_price' => $crt['subtotal'],
                'date' => $this->session->userdata('ddate'),
                'comment' => $crt['options']['comments'],
                'status' => 1
            );
            
            if ($this->c_model->insert_data('sales', $data))
                $msg .= 'Sales saved,';
            else
                $msg .= 'Sales not saved !';
        }

        //insert bill 

        $billdata = array(
            'bill_number' => $bill_n,
            'buyer_id' => $this->session->userdata('buyer_id'),
            'total' => $this->cart->total(),
            'bill_date' => $this->session->userdata('ddate'),
            'link' => 'bills/' . $bill_n . '.pdf'
        );
        if ($this->c_model->insert_data('bills', $billdata))
            $msg .= 'Bill saved,';
        else
            $msg .= 'Bill not saved !';
        //create pdf 
        $bdata = array();
        $bdata['bill_n'] = $bill_n;
        $bill_file = 'bills/' . $bill_n . '.pdf';
        $result = $this->load->view('sales/output_bill', $bdata, TRUE);
      //  ob_end_clean();
        $this->load->library('mpdf');
        $mpdf = new mPDF('utf-8', 'A4');
        $mpdf->debug = true;
        $mpdf->WriteHTML($result);
        $mpdf->Output($bill_file, 'F');
        // update account

        $this->db->where('people_id', $this->session->userdata('buyer_id'));
        $queryy = $this->db->get('account');

   //     $payment = $this->session->userdata('payment');
       // echo $payment;
       // exit();
    /*    if ($payment != '') {
           $sub = $this->cart->total() + $queryy->row()->amount; 
           
            $balance = $sub - $payment;
            //payment entry
            $pdata = array(
                'to_people_id' => 1,
                'from_people_id' => $this->session->userdata('buyer_id'),
                'amount' => $payment,
                'status' => 1,
                'date' => date('Y-m-d')
            );
            $this->c_model->insert_data('payment', $pdata);
            //revenue insert
         $this->db->where('id', $this->session->userdata('buyer_id'));
        $sql = $this->db->get('people');
        $rdata = array(
            'revenue_type_id' =>1,
            'comment'=> $sql->row()->full_name,
            'amount' =>  $payment,
            'date' => date('Y-m-d'),
            'status'=> 1
        );
        $this->c_model->insert_data('revenue', $rdata);
   */ //     }else {
            //no payment
            $balance = $this->cart->total() + $queryy->row()->amount;
   //     }
        
        $acc_data = array('amount' => $balance);
        $this->db->where('id', $queryy->row()->id);
        $this->db->update('account', $acc_data);
        
       
        $this->session->set_userdata(array('msg' => $msg));
        //delete all seession data 
        $this->cart->destroy();
        $this->session->unset_userdata('payment');
        $this->session->unset_userdata('buyer_id');
        $this->session->unset_userdata('ddate');
        redirect('reports/all_bill', 'refresh');
    }

   
   
    /* public function edit_sales($rid = null) {

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
      $data['pinfo'] = $this->c_model->fetch_by_id('sales', $rid);
      $data['content'] = $this->load->view('sales/edit_sales', $data, TRUE);
      $this->load->view('master_view', $data);
      } else {
      $sdata = array(
      'supplier_id' => $this->input->post('supplier_id'),
      'item_name' => $this->input->post('item_name'),
      'unit' => $this->input->post('unit'),
      'qty' => $this->input->post('quantity'),
      'unit_price' => $this->input->post('uprice'),
      'sub_tot_price' => $this->input->post('quantity') * $this->input->post('uprice'),
      'invoice' => $this->input->post('invoice'),
      'date' => date('Y-m-d'),
      'comment' => $this->input->post('comments'),
      'status' => 1
      );
      $result = $this->c_model->update_data('sales', $sdata, $rid);
      if (!$result) {
      $msg = 'no';
      } else {
      $msg = 'ok';
      }

      $this->session->set_userdata(array('msg' => $msg));

      redirect('sales/view_sales', 'refresh');
      }
      }

      public function delete_sales($rid = null) {
      $result = $this->c_model->delete_row('sales', $rid);
      if (!$result) {
      $msg = 'no';
      } else {
      $msg = 'ok';
      }
      redirect('sales/view_sales', 'refesh');
      }
     */
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */