<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
	}

function index($id = NULL){
	$data['school_id'] = $id  ? $id  : config_item('UserData')->school_id;
	$data['get_rules']=$this->User->get_rules($data['school_id']);
	$data['country']=$this->User->get_country();
	$data['SchoolDetails'] = $this->User->get_school_details($data['school_id']);
	$this->load->view('Staff/Staff/Index',$data);
}

function update_role($id , $school_id = null){
	$_POST = json_decode(file_get_contents('php://input'), true);
	if($_POST){
	$posts = $this->input->post();
	$perm = $this->Permission->update_role(['user_role_name'=>$posts['role'],
									'all_role_id'=>json_encode($posts['permission'])],$id);
	$this->get_roles($school_id);
	} exit;
}

function getStaffdetails($id){
	echo json_encode($this->User->getStaffdetails($id));
	exit;
}

function get_allstaff($id){
	echo json_encode($this->User->get_all_users($id));
	exit;
}
function active($id,$school_id){
	$_POST = json_decode(file_get_contents('php://input'), true);
	$posts = $this->input->post();
	if($posts){
		$datas = ['is_active'=>$posts['id']];
		$this->User->userstatus($id,$datas);
		$data['allstaff'] = $this->User->get_all_users($school_id);
		$data['staffdetails'] = $this->User->getStaffdetails($id);
        echo json_encode($data);
	}
	exit;
}
function AddStaff($schoolID = null){

	if($this->input->post()){
	$update['first_name'] = $this->input->post('fname');
	$update['last_name'] =$this->input->post('lname');
	$update['dob'] =  $this->input->post('dob') ?  date('Y-m-d', strtotime(str_replace('/', '-',$this->input->post('dob')))):'';
	$update['country']= $this->input->post('country');
	$update['city'] = $this->input->post('city');
	$update['job_type'] = $this->input->post('jobType');
	$update['role'] = $this->input->post('Role');
	$update['mobile_number'] =  $this->input->post('Contact');
	$update['designation'] = $this->input->post('Designation');
	$update['join_date'] = $this->input->post('Registerdate')  ?  date('Y-m-d',strtotime(str_replace('/', '-',$this->input->post('Registerdate')))): '';
	$update['address']= $this->input->post('Address');
	$update['about'] = $this->input->post('About');
	$update['is_active'] = 1;
	$update['school_id'] = $schoolID ? $schoolID : config_item('UserData')->school_id;
	$update['email'] = $this->input->post('email');
	$update['password'] = openssl_encrypt($this->input->post('Password'), "AES-128-ECB",config_item('encryption_key'));
   
	if(!$this->User->emailunique($this->input->post('email'))){
	if(isset($_FILES['ProfilePic']['name'])){
		if($_FILES['ProfilePic']['name']!=""){
		$config['upload_path']          = './assets/uploads/logo/';
		$config['allowed_types']        = 'gif|jpg|png';
	   // $config['max_size']             =  200;
		$this->load->library('upload', $config);
		$filename = $this->upload->do_upload('ProfilePic');
		if($filename){
			$update['profile_pic'] = base_url().'assets/uploads/logo/'.$this->upload->data()['file_name'];
		}
	}}
	$staffdata = $this->User->staffadd($update);
	$doc = $this->document_upload($_FILES);
	if($doc){
		foreach($doc as $docdata){
			$this->User->document_insert($docdata,$staffdata);
		}
	}
	echo  json_encode($this->encrypt->success($this->User->get_all_users($update['school_id'])));
	exit ;
   }
  echo json_encode($this->encrypt->error('The Email field must contain a unique value', '400'));
}
	exit;
}

function EditStaff($schoolID = null){

	if($this->input->post()){
		$userID = $this->input->post('UserID');
		$update['first_name'] = $this->input->post('fname');
		$update['last_name'] =$this->input->post('lname');
		$update['dob'] =  $this->input->post('dob') ?  date('Y-m-d', strtotime(str_replace('/', '-',$this->input->post('dob')))):'';
		$update['country']= $this->input->post('country');
		$update['city'] = $this->input->post('city');
		$update['job_type'] = $this->input->post('jobType');
		$update['role'] = $this->input->post('Role');
		$update['mobile_number'] =  $this->input->post('Contact');
		$update['designation'] = $this->input->post('Designation');
		$update['join_date'] = $this->input->post('Registerdate')  ?  date('Y-m-d',strtotime(str_replace('/', '-',$this->input->post('Registerdate')))): '';
		$update['address']= $this->input->post('Address');
		$update['about'] = $this->input->post('About');
		//$update['is_active'] = 1;
	   // $update['school_id'] = config_item('UserData')->school_id;
		$update['email'] = $this->input->post('email');
		$update['password'] = openssl_encrypt($this->input->post('Password'), "AES-128-ECB",config_item('encryption_key'));

	  if(!$this->User->edit_email_unique($userID,$update['email'])){
		if(isset($_FILES['ProfilePic']['name'])){
			if($_FILES['ProfilePic']['name']!=""){
			$config['upload_path']          = './assets/uploads/logo/';
			$config['allowed_types']        = 'gif|jpg|png';
		   // $config['max_size']             =  200;
			$this->load->library('upload', $config);
			$filename = $this->upload->do_upload('ProfilePic');
			if($filename){
				$update['profile_pic'] = base_url().'assets/uploads/logo/'.$this->upload->data()['file_name'];
			}
		}}
		$staffdata = $this->User->EditStaff($update,$userID);
		$doc = $this->document_upload($_FILES);
		if($doc){
			foreach($doc as $docdata){
				$this->User->document_insert($docdata,$userID);
			}
		}
		echo  json_encode($this->encrypt->success($this->User->get_all_users($schoolID)));
		exit ;
	}
	echo json_encode($this->encrypt->error('The Email field must contain a unique value', '400'));
	}
exit;
}

function document_upload($file){
	$_FILES = $file;
	if(isset($_FILES['document']['name'])){
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
}

function get_user_data($userid = null){
	($userid == null) ?  $_POST = json_decode(file_get_contents('php://input'), true) :'';
	if($this->input->post() || $userid){
		$id =  ($userid != null) ? $userid : $this->input->post('id');
		$data =  $this->User->get_uesr_details($id);

		$data['users']->password =  openssl_decrypt($data['users']->password,"AES-128-ECB",config_item('encryption_key'));
		$data['users']->dob =  ($data['users']->dob != NULL) ? date("d-m-Y", strtotime($data['users']->dob)) : '';
		$data['users']->join_date =  ($data['users']->join_date != NULL) ? date("d-m-Y", strtotime($data['users']->join_date)) : '';
		echo  $data ? json_encode($this->encrypt->success($data)) : json_encode($this->encrypt->error('No Data Found', '400'));
	}
	exit;
}
function document_delete(){
	$_POST = json_decode(file_get_contents('php://input'), true);
	if($this->input->post()){
		$doc = $this->User->alldocumentget($this->input->post('id'));
	//	unlink('./assets/uploads/document/'.basename($doc->document_url));
		$data =  $this->User->get_uesr_details($doc->user_id);
  echo  $doc ? json_encode($this->encrypt->success($data)) : json_encode($this->encrypt->error('No Data Found', '400'));
	}
exit;
}
function delete_staff($school_id = null){
	$_POST = json_decode(file_get_contents('php://input'), true);
	if($this->input->post()){
		$id = $this->input->post('id');
		$this->User->delete_staff($id);
		echo json_encode($this->encrypt->success($this->User->get_all_users($school_id)));
	}
exit;
}









}
?>