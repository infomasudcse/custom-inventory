<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_section extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('master_section_model', 'ms_model', TRUE);
    }
    
	public function index()
	{
            $data=array();
            $data['title']= 'Megal : Personal Acccount';
            $data['sidebar']=$this->load->view('common/sidebar', '', TRUE);
            $data['content']=$this->load->view('master_content', '', TRUE);
            $this->load->view('master_view', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */