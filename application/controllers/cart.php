<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') != true)
            redirect('login');
        $this->load->model('common_model', 'c_model', TRUE);
    }

    public function add_to_cart() {
            if ($this->session->userdata('buyer_id') != '' && $this->session->userdata('buyer_id') != $this->input->post('buyer_id')) {
                $this->session->set_userdata(array('msg' => 'You can not choose different buyer at same bill !'));
                 redirect("sales/add_new", 'refresh');
                 exit();
            }  
             if ($this->session->userdata('buyer_id') == '') {
                $this->session->set_userdata(array('buyer_id' => $this->input->post('buyer_id')));
               
            }
             $data = array(
                    'id' => $this->input->post('product_name'),
                    'qty' => $this->input->post('quantity'),
                    'price' => $this->input->post('uprice'),
                    'name' => $this->input->post('buyer_id'),
                    'options' => array('unit' => $this->input->post('unit'), 'invoice' => $this->input->post('invoice'), 'comments' => $this->input->post('comments'))
                );
        
              $this->cart->insert($data);
       redirect("sales/add_new", 'refresh');
    }

    public function update_cart($rowid) {
        $data = array();
        $data = array(
            'rowid' => $rowid,
            'qty' => $this->input->post('qty', true)
        );

        $this->cart->update($data);
        redirect("sales/add_new");
    }

    public function remove_tocart($rowid) {
        $data = array();
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect("sales/add_new");
    }

      public function add_date(){
        $ddate = $this->input->post('ddate');
        $this->session->set_userdata(array('ddate'=>$ddate));
        redirect('sales/add_new', 'refresh');
        
    }
    
    public function delete_date(){
       $this->session->unset_userdata('ddate');
        redirect('sales/add_new', 'refresh');
        
    }
    
  /*  public function add_payment(){
        $payment = $this->input->post('payment');
        $this->session->set_userdata(array('payment'=>$payment));
        redirect('sales/add_new', 'refresh');
        
    }
    
    public function delete_payment(){
       $this->session->unset_userdata('payment');
        redirect('sales/add_new', 'refresh');
        
    }
    */
    
}

?>
