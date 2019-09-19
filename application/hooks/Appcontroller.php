<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appcontroller {
    private $CI;
  
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('User');
    }

    public function session_validation()
    {
        $URL = ['register-index','register-signin'];
        if(!in_array($this->CI->router->fetch_class().'-'.$this->CI->router->fetch_method(),$URL)){
        if(!$this->CI->session->userdata('user_id')){
            redirect(site_url('signin'));
            exit;
        }
        if($this->CI->session->userdata('user_id')){
           $userdata = $this->CI->User->get_uesrdetails($this->CI->session->userdata('user_id'));
           $this->CI->config->set_item('UserData',$userdata);
        }}
    }

}