<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('common_model', 'c_model', TRUE);
        if($this->session->userdata('login') == true) redirect('main_section');
    }
    
    public function index(){
        
        
        
        
         $data = array();
        $data['title'] = 'Megal : Accounts Login';
        $this->load->view('login', $data);
       
    }
    public function username_check()
	{
            
            $this->db->where('name' , $this->input->post('username'));
            $this->db->where('password', md5($this->input->post('password')));
            $this->db->where('status', 1);
            $query = $this->db->get('admin');
            if($query->num_rows() == 1)
		
		{
                    $this->session->set_userdata(array('login'=>true));
                    redirect('main_section', 'refresh');
		}
		else
		{
                     $this->session->set_userdata(array('msg' => 'Username / password Invalid !'));
			redirect('login');
		}
	}
    
    
    
    
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */