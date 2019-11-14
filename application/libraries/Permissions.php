<?php 
class Permissions{
    private $CI;
public function __construct()
{
    $this->CI =& get_instance();
    $this->CI->load->model('Permission'); 
}
function GetPermission($userdata){
   $get_permission = $this->CI->Permission->get_permission();
    $array = [];
    foreach($get_permission as $key => $get_per){
        $array[$get_per->module][] = $get_per;
    }
   return $array;
}
function DefaultRole($SchoolID){
    $user_role_name = ['Admin','Teacher'];
    $Role['Admin'] = ["2","3","10","9"];
    $Role['Teacher'] = ["2","3","10","9"];
    foreach($Role as $key => $user_role_name ){
        $data['user_role_name'] = $key;
        $data['all_role_id'] = json_encode($user_role_name,true);
        $data['school_id'] = json_encode($SchoolID,true);
        $this->CI->Permission->DefaultRole($data);
    }
   return $this->CI->Permission->DefaultRoleAdminId($SchoolID);
}

}
?>