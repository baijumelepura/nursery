<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('User');
	}
	public function index()
    {
	//	header('Content-type: text/html; charset=utf-8');
		$data['title'] = lang('User_profile'); 
		$update = [];
        if($this->input->post()){

		    if($this->input->post('firstname')){
			$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('dob','DOB','trim');
			$this->form_validation->set_rules('country', 'Country','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('Contact','Contact','trim|required|min_length[3]|max_length[15]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('designation','Designation','trim|max_length[30]');
			$this->form_validation->set_rules('joindate','Register Date','trim');
			$this->form_validation->set_rules('Address','Address','trim|required');
			$this->form_validation->set_rules('about','About','trim|required');
			
			if($this->form_validation->run()==true){
			$update['first_name'] =$this->input->post('firstname');
			$update['last_name'] =$this->input->post('lastname');
			$this->input->post('dob') ? $update['dob'] =  date('Y-m-d', strtotime(str_replace('/', '-',$this->input->post('dob')))):'';
			$update['country']= $this->input->post('country');
			$update['city'] = $this->input->post('city');
			$update['mobile_number'] =  $this->input->post('Contact');
			$update['designation'] = $this->input->post('designation');
			$this->input->post('joindate')  ? $update['join_date'] = date('Y-m-d',strtotime(str_replace('/', '-',$this->input->post('joindate')))): '';
			$update['address']= $this->input->post('Address');
			$update['about']= $this->input->post('about');

			if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=""){
                $config['upload_path']          = './assets/uploads/logo/';
                $config['allowed_types']        = 'gif|jpg|png';
               // $config['max_size']             =  200;
                $this->load->library('upload', $config);
				$filename = $this->upload->do_upload('profile_pic');
                if($filename){
					$update['profile_pic'] = base_url().'assets/uploads/logo/'.$this->upload->data()['file_name'];
				}}

			$doc = $this->document_upload($_FILES);
			if($doc){
				foreach($doc as $docdata){
					$this->User->document_insert($docdata,config_item('UserData')->user_id);
				}
			}
			$updareres = $this->User->profile_update($update,config_item('UserData')->user_id);
			$this->session->set_tempdata('SuccessProfile', '<div class="callout callout-success" style="padding: 7px 0px 15px 15px;">
			Your personal details has been updated successfully.
			</div>',1);
			redirect('profile');
				exit;
		}
	}
	if($this->input->post('currentpass')){
		$this->form_validation->set_rules('currentpass','Current Password','trim|required|callback_password_validation');
		$this->form_validation->set_rules('newpass','New Password','trim|required|min_length[6]|max_length[10]|matches[cpass]');
		$this->form_validation->set_rules('cpass','Confirm Password','trim|required');
		if($this->form_validation->run()==true){
			$update = ['password'=> openssl_encrypt($this->input->post('newpass'),"AES-128-ECB",config_item('encryption_key'))];
			$updareres = $this->User->profile_update($update,config_item('UserData')->user_id);
			if($updareres){
				$this->session->set_tempdata('Success', '<div class="callout callout-success" style="padding: 7px 0px 15px 15px;">
				your password has been changed successfully.
				</div>',1);
				redirect('profile?password');
				exit;
			}
			
		}
	}

		//	
	
		}
		$data['country']=$this->User->get_country();
		$data['userdetails'] = $this->User->get_profile_details(config_item('UserData')->user_id);
		
		$this->load->view('Users/Profile',$data);
	}
	
function password_validation($pass){
       $password_valid=$this->User->password_valid(openssl_encrypt($pass, "AES-128-ECB",config_item('encryption_key')));
		if(!$password_valid){
			$this->form_validation->set_message('password_validation', 'password you’ve entered is incorrect');
			return false;
		}else{
			return true;
		}
}
function document_upload($file){
	$_FILES = $file;
	$uploadData = [];
	$filesCount = count($_FILES['document']['name']);
	if($_FILES['document']['name'][0]){
	for($i = 0; $i < $filesCount; $i++){
	    $_FILES['documents']['name']     = $_FILES['document']['name'][$i];
		$_FILES['documents']['type']     = $_FILES['document']['type'][$i];
		$_FILES['documents']['tmp_name'] = $_FILES['document']['tmp_name'][$i];
		$_FILES['documents']['error']    = $_FILES['document']['error'][$i];
		$_FILES['documents']['size']     = $_FILES['document']['size'][$i];
		$config['upload_path']          = './assets/uploads/document/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|csv|xls';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('documents')){
			$fileData = $this->upload->data();
			$uploadData[] = site_url('assets/uploads/document/'.$fileData['file_name']);
		}
	}
    	return 	(count($uploadData) > 0) ?  $uploadData :  false;
   }else{
	    return false;
   }    	
}

function delete_doc($id){
	$doc = $this->User->getdocument($id,config_item('UserData')->user_id);
	if($doc->document_url){
    $this->User->deletedocument($id,config_item('UserData')->user_id);
	unlink('./assets/uploads/document/'.basename($doc->document_url));
	$this->session->set_tempdata('SuccessProfile', '<div class="callout callout-success" style="padding: 7px 0px 15px 15px;">
	 Document successfully deleted.
				</div>',1);
	redirect(base_url('profile'));
	exit;
	}

}



}
?>