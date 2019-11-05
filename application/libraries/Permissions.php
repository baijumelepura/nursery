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
}
?>