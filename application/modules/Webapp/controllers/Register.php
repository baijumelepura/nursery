<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('User');

	}
    /**
     * Signup  for school / admin
     */
	public function index()
    {
		$data['title'] = "Register a new membership"; 
		/*capta config */ 
		$vals = array(
			'word'          => rand(1,999999),
			'img_path'      => './assets/captcha/images/',
			'img_url'       => base_url('assets').'/captcha/images/',
			'font_path'     => base_url('assets').'/captcha/fonts/XYZ.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'word_length'   => 8,
		    'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40))
			);
		 $data = array_merge(create_captcha($vals),$data);
	if($this->input->post()){
		$this->form_validation->set_rules('NurseryName','Name','trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('NurseryPhone','Phone','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('NurseryCity','City','trim|required');
		$this->form_validation->set_rules('NurseryAddress','Address','trim|required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('NurseryEmail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('NurseryCountry', 'Country', 'trim|required');
		$this->form_validation->set_rules('NurseryWebsite', 'Website', 'trim|required|callback_valid_url');
		$this->form_validation->set_rules('ContactName','Contact Name','trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('ContactMobile','Mobile','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('ContactPhone','Phone','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('ContactPosition', 'Position', 'trim|required');
		$this->form_validation->set_rules('ContactEmail', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[10]');//callback_password_check|
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_unique');
		$this->form_validation->set_rules('cpassword', 'Retype password', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_validate_captcha');
		$this->form_validation->set_rules('checkbox', 'agree', 'trim|required');
		$this->form_validation->set_rules('file', 'Image', 'callback_file_check');

	if($this->form_validation->run()==true){
	        	$filename = "";

				if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
                $config['upload_path']          = './assets/uploads/logo/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             =  200;
                // $config['max_width']         = 1024;
                //$config['max_height']         = 768;
                $this->load->library('upload', $config);
				$filename = $this->upload->do_upload('file');
                if($filename){
				   $filename = base_url().'assets/uploads/logo/'.$this->upload->data()['file_name'];
				}}
 
		 /*school Details add */
		$FormData['schoolData'] = [
			"school_name"=>$this->input->post('NurseryName'),
			"school_address"=>$this->input->post('NurseryAddress'),
			"school_country"=>$this->input->post('NurseryCountry'),
			"school_city"=>$this->input->post('NurseryCity'),
			"school_phone"=>$this->input->post('NurseryPhone'),
			"school_email"=>$this->input->post('NurseryEmail'),
			"school_website"=>$this->input->post('NurseryWebsite'),
			"contact_name"=>$this->input->post('ContactName'),
			"contact_phone"=>$this->input->post('ContactPhone'),
			"contact_mobile"=>$this->input->post('ContactMobile'),
			"contact_email"=>$this->input->post('ContactEmail'),
			"contact_position"=>$this->input->post('ContactPosition'),
			'school_logo'=>$filename];
		/* Admin Details */
		$FormData['Admindata'] = [
			//'user_type'=>'Admin',
			'email'=>$this->input->post('email'),
			'password'=>openssl_encrypt($this->input->post('password'),"AES-128-ECB",config_item('encryption_key'))];
		$result = $this->User->Signup($FormData);
		$this->session->set_flashdata('Success', '<div class="callout callout-success" style="padding: 7px 0px 15px 15px;">
		You have registered successfully.
		</div>');
		redirect('signin');
	}

	}
        $data['country']=$this->User->get_country();
        $this->load->view('Register/Register',$data);

	}
     /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
			$mime = get_mime_by_extension($_FILES['file']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
          //  $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return true;
        }
	}
public function password_check($str){
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     return TRUE;
   }
   return FALSE;
}
    /**
     * validate_captcha for signup
     */
public function validate_captcha($capchar){
    if($capchar != $this->input->post('capchar'))
    {
        $this->form_validation->set_message('validate_captcha', 'Wrong captcha code');
        return false;
    }else{
		return true;
	}}
    /**
     * validate Website URl for signup
     */
function valid_url($url){
     if (!filter_var($url, FILTER_VALIDATE_URL))
    {
        return FALSE;
    }
    return TRUE;
}

function unique($email){
	$emailunique=$this->User->emailunique($email);
	if($emailunique){
		$this->form_validation->set_message('unique', 'The Email field must contain a unique value');
        return false;
	}
	return true;
}
   /**
     * signin for all users
     */
function signin(){

	$data['title'] = "Sign in to start your session"; 
    // Cookie check
	 if($this->input->cookie('remember_me')){
		$cookievalue = json_decode($this->encrypt->decode($this->input->cookie('remember_me')),true);



		PRINT_R($cookievalue);die();
		$formData =[
			"email"=>$cookievalue['email'],
			"password"=>$cookievalue['password']];
		 $userdata = $this->User->signin($formData);
		 if($userdata){
			$this->session->set_userdata(['user_id'=>intval($userdata->user_id)]);
			redirect('dashboard');
			exit;
		 }}
		 // session redirection
			if($this->session->userdata('user_id')){
			  redirect('dashboard');
			  exit;
			}
	if($this->input->post()){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run()==true){
			$formData =[
				 "email"=>$this->input->post('email'),
				 "password"=>openssl_encrypt($this->input->post('password'), "AES-128-ECB",config_item('encryption_key'))
			];
			//	print_r($formData);
		$userdetails=$this->User->signin($formData);
		
		if($userdetails){
		if($userdetails->user_is_active == 0 || $userdetails->school_is_active == 0){
			$this->session->set_tempdata('Warning', '<div class="callout callout-warning" style="padding: 7px 0px 15px 15px;">
				You are awaitinig for Activation, Kindly contact your admin.
			</div>',1);
			redirect('signin');
			exit;
		}
		  if($this->input->post('checkbox')){
			$cookie = array(
				'name'   => 'remember_me',
				'value'  => $this->encrypt->encode(json_encode($userdetails)),
				'expire' =>  172800,
				'secure' => false
			);
			$this->input->set_cookie($cookie); 
		   }
		 
           $this->session->set_userdata('user_id',intval($userdetails->user_id));
	       redirect('dashboard');
		   exit;

		}
		$this->session->set_tempdata('Warning', '<div class="callout callout-warning" style="padding: 7px 0px 15px 15px;">
		The email / password you’ve entered is incorrect
		</div>',1);
		redirect('signin');
		exit;
	
		}
	}
  $this->load->view('Register/Signin',$data);
}
function logout(){
	session_destroy();
	redirect(site_url('signin'));
}
function switchLanguage($language = null ) {
	$language = ($language == "english") ? "arabic" : "english";
	$this->session->set_userdata('site_lang', $language);
	redirect($this->input->get('url'));
	exit;
}
}
?>