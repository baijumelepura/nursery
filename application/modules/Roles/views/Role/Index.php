<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/sidebar');?>
<div class="content-wrapper" ng-controller="ListController as list" ng-init="get_roles('<?=$this->encrypt->encrypt($school_id);?>')"  >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      <i class="fa fa-user-secret" aria-hidden="true"></i> Roles
         <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?=lang('Home');?></a></li>
         <li class=""><?=lang('Nursery');?></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-info ">
               <div class="box-header col-xs-8">

               
               <div class="col-md-10">
               <h3 class="box-title"> <i class="fa fa-user-secret" aria-hidden="true"></i> Role Permissions</h3>
               </div>
               <div class="col-md-2">
                  <a  href="#" data-toggle="modal" data-target="#myModal" style="margin-right: -13px;" class="btn btn-block btn-default btn-flat pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Role</a>
                  </div>
               </div>
               <div class="box-body  ">
           

              <div class="col-md-8">
                  <table id="example1" class="table table-bordered ">
                     <thead>
                        <tr>
                           <th style="width: 10%;" >#</th>
                           <th style="width:55%">Role</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr ng-cloak dir-paginate="Role in Allrole  = ( Allroles ) | itemsPerPage: pageSize" current-page="currentPage">
                        <td>{{$index+1}}</td>
                        <td>{{Role.user_role_name}}</td>
                        <td><button type="button" ng-click="getuserdetails(Role.user_role_id);" class="btn  btn-info btn-xs"> <i class="fa fa-fw fa-users"></i> Users</button>
                        &nbsp;<button type="button" ng-click="EditRole(Role.user_role_id);" class="btn  btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> Edit</button>
                        &nbsp;<button type="button" ng-click="delete_rule(Role.user_role_id);" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i> Delete</button></td>
                     <tr>

                     </tbody>
                  </table>
                  <div ng-cloak ng-show="!Role.dataload" class="col-xs-12 col-md-12" style="text-align: center;" >
                     <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
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
<?php $this->load->view('includes/Role/Editrole');?>
<?php $this->load->view('includes/Role/Addrole');?>
<?php $this->load->view('includes/Role/Userlist');?>
</div>
<?=$this->load->view('includes/footer');?>
<script src="<?php echo base_url();?>assets/js/module/role.js"></script>



 



