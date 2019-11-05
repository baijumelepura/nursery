<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
	}

function index($id = NULL){
	$data['school_id'] = $id  ? $id  : config_item('UserData')->school_id;
	$data['country']=$this->User->get_country();
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
function AddStaff(){

	$update['first_name'] = $this->input->post('fname');
	$update['last_name'] =$this->input->post('lname');
	$update['dob'] =  $this->input->post('dob') ?  date('Y-m-d', strtotime(str_replace('/', '-',$this->input->post('dob')))):'';
	$update['country']= $this->input->post('country');
	$update['city'] = $this->input->post('city');
	$update['mobile_number'] =  $this->input->post('Contact');
	$update['designation'] = $this->input->post('Designation');
	$update['join_date'] = $this->input->post('Registerdate')  ?  date('Y-m-d',strtotime(str_replace('/', '-',$this->input->post('Registerdate')))): '';
	$update['address']= $this->input->post('Address');
	$update['about'] = $this->input->post('About');
	
	$update['is_active'] = 1;
	$update['school_id'] = config_item('UserData')->school_id;
	$update['email'] = $this->input->post('email');

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

	$staffdata = $this->User->staffadd($update) ;
	$doc = $this->document_upload($_FILES);
	
	if($doc){
		foreach($doc as $docdata){
			$this->User->document_insert($docdata,$staffdata);
		}
	}
	echo $staffdata;
	exit;

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


}
?>