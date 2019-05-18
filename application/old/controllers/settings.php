<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('common_model', 'c_model', TRUE);
        $this->load->model('setting_model', 's_model', TRUE);
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
        $data = array(
            'name' => ucfirst($this->input->post('ex_name')),
            'status' => 1
        );
        $result = $this->c_model->insert_data('expense_type', $data);
        if (!$result) {
            $msg = 'no';
        } else {
            $msg = 'ok';
        }
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
           $sdata=array('name' => $this->input->post('ex_name'));
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

}

/* /*End of file welcome.php */
/*/* Location: ./application/controllers/welcome.php */