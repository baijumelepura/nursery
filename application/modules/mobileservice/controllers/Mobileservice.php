<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH . '/libraries/CreatorJwt.php';

class Mobileservice extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('User');
	}
	public function index()
	{



      // $data = $this->jwt->decode('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJDdXJyZW5UaW1lIjoiMjAxOS0wOS0xMyAwNzo1MzowOSIsIkV4cFRpbWUiOiIyMDE5LTA5LTEzIDA3OjUzOjA5In0.2976wr9NBlcFfm9fQGeD2v8AgJPwGZ0xCY9iENuyTDo',config_item('JWT_key'),array('HS256'));
    
    
    //die();





























	   if(isset($_POST['Method'])){
		switch ($_POST['Method']) {	
			case "SignUp":
				$this->SignUp($_POST);
				break;
			default:
		     	echo json_encode($this->error('No Data Found', '404'));
			exit;
		}
		}else{
			echo json_encode($this->error('No Data Found', '400'));
			exit;
		}

    }
   /**
     * Return signup 
     *
     * Commom menthod for outputting signup
     *
     * @return json
     */
	private function SignUp($data){
		$data = [
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => $data['password'],
		 ];
		$result = $this->User->Signup($data);
	    echo $result ? json_encode($this->success($data)) : json_encode($this->error('DB error', "404"));
      exit;
	}

    /**
     * Return Error Message
     *
     * Commom menthod for outputting error message
     *
     * @return array
     */
    private function error($message, $code)
    {   
        $tokenData['CurrenTime'] = Date('Y-m-d h:i:s');
        $tokenData['ExpTime'] = Date('Y-m-d h:i:s');
        return array(
            'data' => null,
            'status' => false,
            'Tocken'=>$this->jwt->encode($tokenData,config_item('JWT_key')),
            'error' => array(
                'errorMsg' => $message,
                'errorCode' => $code
            )
        );
    }

    /**
     * Return Success Message
     *
     * Commom menthod for outputting success message
     *
     * @return array
     */
    private function success($data)
    {  
        $tokenData['CurrenTime'] = Date('Y-m-d h:i:s');
        $tokenData['ExpTime'] = Date('Y-m-d h:i:s');
        return array(
            'data' => $data,
            'Tocken'=>$this->jwt->encode($tokenData,config_item('JWT_key')),
            'status' => true,
            'error' => null
        );
    }
}
