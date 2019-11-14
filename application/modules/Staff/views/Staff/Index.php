<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/sidebar');?>
<style>
  .select2-container--default .select2-selection--single {
   width: 398px;
  background-color: #fff;
  border: 1px solid #d2d6de;
  border-radius: 0px; 
  height: 33px;}
  .pagination{
      margin-right: 16px !important;
  }
  </style>

<div class="content-wrapper" ng-controller="ListController as list" ng-init="get_staffs('<?=$this->encrypt->encrypt($school_id);?>');"  >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      <i class="fa fa-users" aria-hidden="true"></i> Staffs details 
           <?php echo  config_item('UserData')->Super_user ?  '['.$SchoolDetails->school_name.']' : '';?>
         <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?=lang('Home');?></a></li>

         <li class=""><?='Staff details';?></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-info ">
               <div class="box-header col-xs-12">
               <div class="col-md-10" style="background-color: #dddada5e;border: 1px solid #ccc6!important;border-radius: 3px;">
                  <div style="margin: 2% 0px 8% 0px;">
                  <div class="col-md-1" style="margin: -2px 0px -37px -21px;">
                     <h4><i class="fa fa-filter" aria-hidden="true"></i></h4>
                  </div>
                  <div class="col-md-3">
                         <input type="text" ng-model="fullname" class="form-control"  placeholder="Name" >
                  </div>
                  <div class="col-md-3">
                         <input type="text" ng-model="PhoneNumber" class="form-control"  placeholder="Phone Number" >
                  </div>   
                   <div class="col-md-3">
                         <input type="text" ng-model="Email"  class="form-control"  placeholder="Email" >
                   </div>
                      <div class="col-md-3">
                         <input type="text" ng-model="designation"  class="form-control"  placeholder="Designation" >
                     </div>
                  </div>
               </div>
               <div class="col-md-2" style="top: 32px;">
                  <a  href="#" data-toggle="modal" data-target="#myModalAdd" style="margin-right: -13px;" class="btn btn-block btn-default btn-flat pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Role</a>
               </div>
               </div>
               <div class="box-body  ">

              <div class="col-md-12">
                  <table id="example1" class="table table-bordered ">
                     <thead>
                        <tr>
                           <th >#</th>
                           <th >Name</th>
                           <th >DOB</th>
                           <th >Phone</th>
                           <th >Email</th>
                           <th >Job type</th>
                           <th >User Permission</th>
                           <th >Designation</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr style="background-color:{{(Staff.user_is_active == '0' ) ? 'rgb(242, 222, 222)':''}}" ng-cloak 
                     dir-paginate="Staff in AllStaff  = ( AllStaff ) | filter: { user_first_name : fullname } | 
                     filter: { mobile_number : PhoneNumber } | filter: { user_email : Email } | filter: { designation : designation } 
                     | itemsPerPage: pageSize" current-page="currentPage">
                        <td>{{$index+1}}</td>
                        <td>{{Staff.user_first_name}} {{Staff.user_last_name}}</td>
                        <td>{{Staff.dob}}</td>
                        <td>{{Staff.mobile_number}}</td>
                        <td>{{Staff.user_email}}</td>
                        <td>{{Staff.job_type}}</td>
                        <td>{{Staff.user_role_name}}</td>
                        <td>{{Staff.designation}}</td>
                        <td>    
               <div class="btn-group" style="width: 61px;">
                  <button type="button"  ng-click="getStaffdetails(Staff.user_id);"  class="btn btn-info btn-xs"> View</button>
                  <button type="button" class="btn btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
               
                  <ul class="dropdown-menu" style="margin:2px 0px 0px -98px !important" role="menu">
                    <li><a href="#"  ng-click="get_user_data(Staff.user_id);"><i class="fa fa-edit"></i>Edit</a></li>
                    <li ng-if="Staff.user_is_active==0 && Staff.user_id != 0" class="divider"></li>
                    <li ng-if="Staff.user_is_active==0 && Staff.user_id != 0"><a ng-click="active(Staff.user_id,1,Staff.school_id)" href="#"> <i class="fa fa-check" ></i> Active</a></li>
                    <li ng-if="Staff.user_is_active==1 && Staff.user_id != 0"  class="divider"></li>
                    <li ng-if="Staff.user_is_active==1 && Staff.user_id != 0"><a  ng-click="active(Staff.user_id,0,Staff.school_id)" href="#"><i class="fa fa-ban"></i> Deactive</a></li>
                    <li ng-if="Staff.is_admin == 0" class="divider"></li>
                    <li><a  href="#" ng-if="Staff.is_admin == 0" ng-click="delete_Staff(Staff.user_id);" ><i class="fa fa-trash"></i> Delete</a></li>
                  </ul>

                </div>
               </td>
             <tr>

            </tbody>
               </table>
                  <div ng-cloak ng-show="!Staff.dataload" class="col-xs-12 col-md-12" style="text-align: center;" >
                     <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> Loading ...
                  </div>
                  <div ng-cloak ng-if="Role.dataload && Allroles.length == 0" class="col-xs-12 col-md-12" style="text-align: center;" >
                    <b> No data available .. !</b>
                  </div>

               <dir-pagination-controls
                           boundary-links="true"
                           on-page-change="pageChangeHandler(newPageNumber)" 
                           template-url="<?=base_url('assets/js/dirPagination.tpl.html');?>"
                           class="pull-right"
               ></dir-pagination-controls>
            </div>




               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->

<?php $this->load->view('Staff/includes/Staff/Editstaff'); ?>
<?php $this->load->view('Staff/includes/Staff/Addstaff'); ?>
<?php $this->load->view('Staff/includes/Staff/Viewstaff'); ?>
</div>
<?=$this->load->view('includes/footer');?>
<script src="<?php echo base_url();?>assets/js/module/staff.js"></script>
<script>
$('.select2').select2(['']);
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imgInp").change(function() {
  readURL(this);
});
</script>



 



