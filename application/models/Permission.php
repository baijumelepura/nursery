<?php
class Permission extends CI_Model{

function get_roles($id){
        $data['is_delete']=1;
        $data['school_id'] = config_item('UserData')->Super_user ? $id :  config_item('UserData')->school_id; 

        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by('user_role_id','DESC');
        return $this->db->get('user_role')->result();
}
function get_userdetails($id){
        $this->db->select('first_name,user_id,last_name,user_role.user_role_name');
        $this->db->join('user_role','users.role = user_role.user_role_id','left');
        $this->db->where(['role'=>$id,'users.is_delete'=>1]);
        return $this->db->get('users')->result();   
}
function get_permission(){
        $this->db->select('role_id,module,role_class,role_function,slug');
        $get_permission = $this->db->get('permissions')->result();
        $array = [];
        foreach($get_permission as $key => $get_per){
            $array[$get_per->module][] = $get_per;
        }
       return $array;
}
function insert_role($data){
       return $this->db->insert('user_role',$data);
}
function get_userrole($id){
        $this->db->select('user_role_name,all_role_id');
        $this->db->where('user_role_id',$id);
        return $this->db->get('user_role')->row();
}
function update_role($data,$id){
        $this->db->where('user_role_id',$id);
        return $this->db->update('user_role',$data);
}
function delete_rule($id){
        $data['user_role_id']=$id;
        if(!config_item('UserData')->Super_user){
                $data['school_id'] = config_item('UserData')->school_id;
         }
        $this->db->where($data);
        return   $this->db->update('user_role',['is_delete'=>0 ]);       
}
function DefaultRole($data){
        return $this->db->insert('user_role',$data);
}
function DefaultRoleAdminId($SchoolID){
        $this->db->select('user_role_id,school_id,user_role_name');
        $this->db->where(['school_id'=>$SchoolID,'user_role_name'=>'Admin']);
        return $this->db->get('user_role')->row();
}






}
?>