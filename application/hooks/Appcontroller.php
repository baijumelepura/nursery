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
        $URL = ['Register-index','Register-signin','Mobileservice-index'];
        if(!in_array($this->CI->router->fetch_class().'-'.$this->CI->router->fetch_method(),$URL)){

        if(is_null($this->CI->session->userdata('user_id'))){ redirect(site_url('signin')); exit;}

        if(!is_null($this->CI->session->userdata('user_id'))){
            
           $userdata = $this->CI->User->get_uesrdetails($this->CI->session->userdata('user_id'));
         
           if(!$userdata){ redirect(site_url('logout')); exit;}

           $userdata->profile_pic = $userdata->profile_pic ? $userdata->profile_pic : base_url().'assets/img/profilepic.png';
           $userdata->school_logo = $userdata->school_logo ? $userdata->school_logo : base_url().'assets/img/logo.png';
           $this->CI->config->set_item('UserData',$userdata);
              
            /*Multy languag */
            if(!$this->CI->session->userdata('site_lang')){ $this->CI->session->set_userdata('site_lang','english');}
            $this->CI->lang->load($this->CI->session->userdata('site_lang'),$this->CI->session->userdata('site_lang'));

            /*Notification*/
            $notification = $this->CI->User->Notification($userdata);
            


            $this->CI->config->set_item('Notification',$notification);

              
            
        }
   
    
    }
    }

}