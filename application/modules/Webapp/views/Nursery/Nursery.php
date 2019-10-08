<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/sidebar');?>
<div class="content-wrapper"   >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      <i class="fa fa-list" aria-hidden="true"></i> <?=lang('List_Nursery');?>
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
            <div class="box box-info">
               <div class="box-header">
               <div class="col-md-10">
                  <!-- <h3 class="box-title"><i class="fa fa-list" aria-hidden="true"></i>  List Nursery</h3> -->
               </div>
               <div class="col-md-2">
                  <a  href="<?=base_url();?>nursery/add" style="margin-right: -13px;" class="btn btn-block btn-default btn-flat pull-right"><i class="fa fa-plus" aria-hidden="true"></i> <?=lang('Add_Nursery');?></a>
                  </div>
               </div>
               <div class="box-body">
               
               <span class="success_msg msg" style="display : none">
                  <div class="callout callout-success">
                                   <p> <i class="fa fa-check"></i> Nursery deleted successfully !</p>
                 </div>
              </span>

              <span class="success_msg_active msg" style="display : none">
                  <div class="callout callout-success">
                     <p><i class="fa fa-check"></i> Nursery account has been activated successfully!</p>
                 </div>
              </span>

              <span class="success_msg_deactive msg" style="display : none">
                  <div class="callout callout-warning">
                    <p> <i class="fa fa-times" aria-hidden="true"></i> Nursery account has been deactivated successfully !</p>
                 </div>
              </span>

                  <table id="example1" class="table table-bordered ">
                     <thead>
                        <tr>
                        <th style="display:none;"><?=lang('Number');?></th>
                           <th><?=lang('Number');?></th>
                           <th><?=lang('School_name');?></th>
                           <th><?=lang('School_email');?></th>
                           <th><?=lang('Contact_person');?></th>
                           <th><?=lang('Contact_email');?></th>
                           <th><?=lang('Contact_phone');?></th>
                           <th><?=lang('Created');?></th>
                           <th><?=lang('Action');?></th>
                        </tr>
                     </thead>
                  </table>
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
</div>
<?=$this->load->view('includes/footer');?>
<script src="<?php echo base_url();?>assets/js/module/nursery.js"></script>


