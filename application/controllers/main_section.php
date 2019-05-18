<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_section extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('common_model', 'c_model', TRUE);
         if($this->session->userdata('login') != true) redirect('login');
    }
    
	public function index()
	{
            $data=array();
           $data['title']= 'Megal : Personal Acccount';
           $data['sidebar']=$this->load->view('common/sidebar', '', TRUE);
            $data['all_sales'] = $this->c_model->fetch_data_limit('sales', 14);
            $data['all_purchase'] = $this->c_model->fetch_data_limit('purchase', 10);
          $data['all_expense'] = $this->c_model->fetch_data_limit('expense', 10);
        
            $data['content']=$this->load->view('master_content', $data, TRUE);
            $this->load->view('master_view', $data);
	}
        
        public function logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('login');
            $this->session->set_userdata(array('msg' => 'Logout Success !'));
            redirect('login', 'refresh');
            
            
        }
        
        
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */