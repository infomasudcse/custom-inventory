<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
 if($this->session->userdata('login') != true) redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
        
    }

    public function revenue_type(){
         $data = array();
        $data['title'] = 'Megal : Revenue Type';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['all_revenue_type'] = $this->c_model->fetch_all('revenue_type', 'order by id DESC');
        $data['content'] = $this->load->view('revenue/revenue_type', $data, TRUE);
        $this->load->view('master_view', $data);
        
    }
    public function add_revenue_type() {
		$name = ucfirst($this->input->post('ex_name'));
		$existency = $this->c_model->check_data('revenue_type', $name);
		if($existency){
			 $msg = 'Already Exists !';
			 goto A;
        }
           
        $data = array(
            'name' => $name,
            'status' => 1
        );
        $result = $this->c_model->insert_data('revenue_type', $data);
        if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
		A:
        $this->session->set_userdata(array('msg' => $msg));
		
        redirect('settings/revenue_type', 'refresh');
    }

    public function edit_revenue_type($id = null) {
        if(!isset($id)){
			$id= $this->session->userdata('id');
		}
		else{
			$this->session->set_userdata('id',$id);
		}
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('ex_name', 'Revenue Type', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Revenue Type';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['row'] = $this->c_model->fetch_by_id('revenue_type', $id);
            $data['content'] = $this->load->view('revenue/edit_revenue_type', $data, true);
            $this->load->view('master_view', $data);
        } else {
           $sdata=array('name' => ucfirst($this->input->post('ex_name')));
          $result= $this->c_model->update_data('revenue_type',$sdata,  $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/revenue_type', 'refresh');
        }
    }
    
    public function delete_revenue_type($id=null){
         $result= $this->c_model->delete_row('revenue_type', $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/revenue_type', 'refresh');
        
        
    }
    
    public function expense_type() {
        $data = array();
        $data['title'] = 'Megal : Expense Type';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['all_expense_type'] = $this->c_model->fetch_all('expense_type', 'order by id DESC');
        $data['content'] = $this->load->view('expense/expense_type', $data, TRUE);
        $this->load->view('master_view', $data);
    }

    public function add_expense_type() {
		$name = ucfirst($this->input->post('ex_name'));
		$existency = $this->c_model->check_data('expense_type', $name);
		if($existency){
			 $msg = 'Already Exists !';
			 goto A;
        }
           
        $data = array(
            'name' => $name,
            'status' => 1
        );
        $result = $this->c_model->insert_data('expense_type', $data);
        if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
		A:
        $this->session->set_userdata(array('msg' => $msg));
		
        redirect('settings/expense_type', 'refresh');
    }

    public function edit_expense_type($id = null) {
        if(!isset($id)){
			$id= $this->session->userdata('id');
		}
		else{
			$this->session->set_userdata('id',$id);
		}
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('ex_name', 'Expense Type', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Expense Type';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['row'] = $this->c_model->fetch_by_id('expense_type', $id);
            $data['content'] = $this->load->view('expense/edit_expense_type', $data, true);
            $this->load->view('master_view', $data);
        } else {
           $sdata=array('name' => ucfirst($this->input->post('ex_name')));
          $result= $this->c_model->update_data('expense_type',$sdata,  $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/expense_type', 'refresh');
        }
    }
    
    public function delete_expense_type($id=null){
         $result= $this->c_model->delete_row('expense_type', $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/expense_type', 'refresh');
        
        
    }
    
    /*
     * My codeblock Start from here*****************************************************
     */
    public function product_to_sell()
    {
        $data = array();
        $data['title'] = 'Megal : Product to Sell';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $data['all_product_to_sell'] = $this->c_model->fetch_all('product', 'order by id DESC');
        $data['content'] = $this->load->view('product/product_to_sell', $data, TRUE);
        $this->load->view('master_view', $data);
    }

    public function add_product_to_sell()
    {
        $name=  ucfirst($this->input->post('product_name'));
        $existency = $this->c_model->check_data('product', $name);
		if($existency){
			 $msg = 'Already Exists !';
			 goto A;
        }
        $data = array(
            'name' => $name,
            'status' => 1
        );
        $result = $this->c_model->insert_data('product',$data);
        if(!$result)
        {
            $msg = 'no';
        }
        else {
            $msg = 'ok';
        }
        A:
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/product_to_sell','refresh');
    }
    
    public function edit_product_to_sell($id = null){
         if(!isset($id)){
			$id= $this->session->userdata('id');
		}
		else{
			$this->session->set_userdata('id',$id);
		}
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Product to Sell';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['row'] = $this->c_model->fetch_by_id('product', $id);
            $data['content'] = $this->load->view('product/edit_product_to_sell', $data, true);
            $this->load->view('master_view', $data);
        } else {
           $sdata=array('name' => ucfirst($this->input->post('product_name')));
          $result= $this->c_model->update_data('product',$sdata,  $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/product_to_sell', 'refresh');
        }
    }
    
     public function delete_product_to_sell($id=null){
         $result= $this->c_model->delete_row('product', $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/product_to_sell', 'refresh');
        
        
    }
    
    public function supplier()
    {
        $data = array();
        $data['title'] = 'Megal : Supplier';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
        $this->db->where('role' , 's');
        $this->db->where('status' , 1);
        $this->db->order_by('id', 'desc');
        $query=$this->db->get('people');        
        $data['all_supplier'] = $query->result();
        $data['content'] = $this->load->view('supplier/supplier', $data, TRUE);
        $this->load->view('master_view', $data);
    }
    public function add_supplier()
    {
        $data = array(
            'full_name' => ucfirst($this->input->post('full_name')),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'role' => 's',
            'status' => 1
        );
        
       
        if($this->db->insert('people',$data))
        {
            $pid = $this->db->insert_id();
            $accdata = array(
                    'people_id'=>$pid,
                    'amount'=> 0
            );
            $this->db->insert('account', $accdata);
            $msg = 'ok';
        }
        else {
            
            $msg = 'no';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/supplier','refresh');
    }
    public function edit_supplier($id = null)
    {
        if(!isset($id)){
			$id= $this->session->userdata('id');
		}
		else{
			$this->session->set_userdata('id',$id);
		}
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact', 'Contact Infromation', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Supplier';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['row'] = $this->c_model->fetch_by_id('people', $id);
            $data['content'] = $this->load->view('supplier/edit_supplier', $data, true);
            $this->load->view('master_view', $data);
        } else {
           $sdata = array(
               'full_name' => ucfirst($this->input->post('full_name')),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact')
               );
          $result= $this->c_model->update_data('people',$sdata,  $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/supplier', 'refresh');
        }
    }
    public function delete_supplier($id = null)
    {
        $data = array();
        $data['status'] = 0;
        $result= $this->c_model->update_data('people',$data, $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $this->db->where('people_id', $id);
            $this->db->delete('account');
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/supplier', 'refresh');
    }
    
    public function buyer()
    {
        $data = array();
        $data['title'] = 'Megal : Buyer';
        $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
         $this->db->where('role' , 'b');
         $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query=$this->db->get('people');  
        $data['all_buyer'] = $query->result();
        $data['content'] = $this->load->view('buyer/buyer', $data, TRUE);
        $this->load->view('master_view', $data);
    }
    public function add_buyer()
    {
        $data = array(
            'full_name' => ucfirst($this->input->post('full_name')),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'role' => 'b',
            'status' => 1
        );
        if($this->db->insert('people',$data))
        {
            $pid = $this->db->insert_id();
            $accdata = array(
                    'people_id'=>$pid,
                    'amount'=> 0
            );
            $this->db->insert('account', $accdata);
            $msg = 'ok';
        }
        else {
            
            $msg = 'no';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/buyer','refresh');
    }
    public function edit_buyer($id = null)
    {
        if(!isset($id)){
			$id= $this->session->userdata('id');
		}
		else{
			$this->session->set_userdata('id',$id);
		}
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact', 'Contact Infromation', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = 'Megal : Buyer';
            $data['sidebar'] = $this->load->view('common/sidebar', '', TRUE);
            $data['row'] = $this->c_model->fetch_by_id('people', $id);
            $data['content'] = $this->load->view('buyer/edit_buyer', $data, true);
            $this->load->view('master_view', $data);
        } else {
           $sdata = array(
               'full_name' => ucfirst($this->input->post('full_name')),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact')
               );
          $result= $this->c_model->update_data('people',$sdata,  $id);
           if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/buyer', 'refresh');
        }
    }
    public function delete_buyer($id = null)
    {
        $data = array();
        $data['status'] = 0;
        $result= $this->c_model->update_data('people',$data, $id);
           if (!$result) {
            $msg = 'no';
        } else {
               $this->db->where('people_id', $id);
            $this->db->delete('account');
            $msg = 'ok';
        }
        $this->session->set_userdata(array('msg' => $msg));
        redirect('settings/buyer', 'refresh');
    }
    
    /*
     * My codebloock End here*******************************************
     */

}

/* /*End of file welcome.php */
/*/* Location: ./application/controllers/welcome.php */