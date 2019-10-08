<?php

class User extends CI_Model {

   /**
     * Return signp 
     *
     * Commom menthod for outputting signup
     *
     * @return Boolean
     */
    
    public function Signup($data)
    {
        $filename = "";
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
        $config['upload_path']          = './assets/uploads/logo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             =  200;
        //$config['max_width']          = 1024;
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
            'school_logo'=>$filename
         ];
            /* Admin Details */
            $FormData['Admindata'] = [
                'is_active'=>1,
                'email'=>$this->input->post('email'),
                'password'=>openssl_encrypt($this->input->post('password'),"AES-128-ECB",config_item('encryption_key'))];

        if($this->db->insert('school', $FormData['schoolData'])){
            $FormData['Admindata']['school_id'] = $this->db->insert_id();
            return $this->db->insert('users', $FormData['Admindata']) ? true : false;
        }else{
            return false;
        }
    }


    function school_edit($id){


 
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
         ];

         if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            $config['upload_path']          = './assets/uploads/logo/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             =  2000;
            //$config['max_width']          = 1024;
            //$config['max_height']         = 768;
            $this->load->library('upload', $config);
           
            $filename = $this->upload->do_upload('file');
           // print_r($this->upload->display_errors());
            // die();
            if($filename){
               $filename = base_url().'assets/uploads/logo/'.$this->upload->data()['file_name'];
               $FormData['schoolData']['school_logo'] = $filename;
            }}
    
         $this->db->where('school_id',$id);
         return  $this->db->update('school', $FormData['schoolData']);



    }
    /**
     * Return country 
     *
     * Commom menthod for outputting country
     *
     * @return object
     */
    function get_country(){
        return $this->db->select('country_id,name')->get('country')->result();
    }

    /**
     * Return country 
     *
     * Commom menthod for outputting country
     *
     * @return object
     */
    function signin($data){
        $sql = 'users.user_id,users.email,users.password,users.role,users.is_active as user_is_active, school.is_active as school_is_active';
         $this->db->select($sql);
         $this->db->from('users');
         $this->db->join('school','users.school_id = school.school_id','inner');
         $this->db->where(array('users.email'=>$data['email'],'users.password' =>$data['password'],'users.status'=>1,'school.status'=>1));
         return $this->db->get()->row();
    }

    /**
     * Return country 
     *
     * Commom menthod for outputting 
     *
     * @return object
     */
    function get_uesrdetails($user_id){
        $sql = 'user_role.user_role_name,
        users.user_id,users.role,school_logo,profile_pic,users.is_active as user_is_active ,users.status as user_status,
        users.first_name as user_first_name, users.last_name as user_last_name,users.email as user_email,users.join_date,
        users.designation,
        school.school_id,school_name,school_address,school_country,school_city,school_phone,school_email,school_website,contact_name,
        contact_phone,contact_mobile,contact_email,contact_position,school.is_active as school_is_active ,school.status as school_status';

         $this->db->select($sql);
         $this->db->from('users');
         $this->db->join('school','users.school_id = school.school_id','inner');
         $this->db->join('user_role','users.role = user_role.user_role_id','inner');
         $this->db->where('users.user_id',$user_id);
         return $this->db->get()->row();
    }
    
    function emailunique($email){
        $sql = 'users.user_id,users.role,
        school_name,school_address,school_country,school_city,school_phone,school_email,school_website,contact_name,
        contact_phone,contact_mobile,contact_email,contact_position,users.is_active as user_is_active ,users.status as user_status,
        school.is_active as school_is_active ,school.status as school_status ,users.first_name as user_first_name,
        users.last_name as user_last_name,users.email as user_email';
         $this->db->select($sql);
         $this->db->from('users');
         $this->db->join('school','users.school_id = school.school_id','inner');
         $this->db->where(array('users.email'=>$email,'users.status'=>1,'school.status'=>1));
         return $this->db->get()->row();
    }

    function profile_update($update,$user_id){

     //   print_r($update);die();
        $this->db->where('user_id',$user_id);
      return  $this->db->update('users', $update);
    }

    function document_insert($doc,$user_id){
        $this->db->insert('document',['document_url' =>$doc,'user_id'=>$user_id]);
        return $this->db->insert_id();
    }
    function get_profile_details($userid){
        $this->db->select('*');
        $this->db->where('user_id',$userid);
        $data['user'] =  $this->db->get('users')->row();

        $this->db->select('*');
        $this->db->where('user_id',$userid);
        $data['doc'] = $this->db->order_by("document_id", "DESC")->get('document')->result();
        return $data;
    }

   function password_valid($pass){
        $this->db->select('*');
        $this->db->where(array('email'=>config_item('UserData')->user_email,'password'=>$pass));
        return  $this->db->get('users')->row();
   }
   function getdocument($id,$user_id){
       $this->db->select('*');
        $this->db->where(['user_id'=>$user_id,'document_id'=>$id]);
        return $this->db->get('document')->row();
   }
   function deletedocument($id,$user_id){
    $this->db->where(['user_id'=>$user_id,'document_id'=>$id]);
    return $this->db->delete('document');
   }
   function nurserycount(){

    $draw = $this->input->post('draw');
    $row = $this->input->post('start');
    $rowperpage = $this->input->post('length'); // Rows display per page
    $columnIndex =$this->input->post('order')[0]['column']; // Column index
    $columnName = $this->input->post('columns')[$columnIndex]['data']; // Column name
    $columnSortOrder = $this->input->post('order')[0]['dir']; // asc or desc
    $searchValue = $this->input->post('search')['value']; // Search value

    /*total count */
    $this->db->select('count(*) as count');
    $this->db->join('users','users.school_id = school.school_id ');
    $this->db->where(['school.status'=>1,'users.is_admin'=>1]);
   // $this->db->group_by('school.school_id'); 
     $totalRecordwithFilter = $totalRecords = $this->db->get('school')->row()->count;


    /* Filter Count */
    if($searchValue){
        $this->db->select('count(*) as count');
        $this->db->where('status',1);
        $this->db->like('school_name',$searchValue);
        $this->db->or_like('school_email',$searchValue);
        $totalRecordwithFilter = $this->db->get('school')->row()->count;
    }

    $this->db->select('school.*,country.name,users.email');
    $this->db->join('country','country.country_id = school.school_country');
    $this->db->join('users','users.school_id = school.school_id');
    $this->db->where(['school.status'=>1,'users.is_admin'=>1,'school.school_id !='=>config_item('UserData')->school_id]);
    if($searchValue){
        $this->db->like('school.school_name',$searchValue);
        $this->db->or_like('school.school_email',$searchValue);
    }
  //  $this->db->group_by('school.school_id'); 
    $this->db->order_by($columnName,$columnSortOrder);
    $this->db->limit($rowperpage,$row);
    $results =  $this->db->get('school')->result();

    
    //echo   $this->db->last_query();die();
    //  $pag_res =[];
    foreach($results as $key => $result){
        $result->enc_id = $this->encrypt->encrypt($result->school_id);
    }
    // echo $this->encrypt->encrypt("baiju")
    // print_r($this->encrypt->decrypt(''));




 return $response = [
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" =>$results,
         ];
   }
   function Notification($userdata){
        /*Nursery Notification*/
        $results['TotalNotification'] = 0;
        $this->db->select('count(*) as count');
        $this->db->where(['request_viewed'=>0, 'DATE(created_date) !=' =>date('Y-m-d'),'status'=>1]);
        $results['NurseryOld'] =  $this->db->get('school')->row()->count;
        $results['TotalNotification'] +=  $results['NurseryOld'];
        /* Today notification */
        $this->db->select('count(*) as count');
        $this->db->where(['DATE(created_date)'=>date('Y-m-d'),'request_viewed'=>0,'status'=>1]);
        $results['NurseryToday'] =  $this->db->get('school')->row()->count;
        $results['TotalNotification'] += $results['NurseryToday'];
        $results['NurseryTotal'] = $results['TotalNotification'];
        return $results;
   }
   function request_view($id){
       $this->db->where('school_id',$id);
       return $this->db->update('school', ['request_viewed'=>1]);
   }
   function NurseryDelete($id){
       $this->db->where('school_id',$id);
       return $this->db->update('school', ['status'=>0,'request_viewed'=>1]);
   }
   function ActiveNursery($update,$id){
    $this->db->where('school_id',$id);
    return $this->db->update('school', $update);
   }
   function edit_get_nursery($id){
        $this->db->select('school.*,country.name,users.*');
        $this->db->join('country','country.country_id = school.school_country');
        $this->db->join('users','users.school_id = school.school_id');
        $this->db->where(['users.school_id'=>$id,'users.is_admin'=>1]);
        return  $this->db->get('school')->row();
   }

 }
?>