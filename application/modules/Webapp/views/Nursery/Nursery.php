<?=$this->load->view('includes/header');?>
<?=$this->load->view('includes/sidebar');?>
<div class="content-wrapper"   >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      <i class="fa fa-institution"></i> Nursery
         <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <!-- <li><a href="#">Tables</a></li> -->
         <li class="active">Nursery</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
               <div class="box-header">
                  <h3 class="box-title"> List Nursery</h3>
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
                        <th style="display:none;">No:</th>
                           <th>No:</th>
                           <th>School&nbsp;Name</th>
                           <th>School&nbsp;Email</th>
                           <th>Contact&nbsp;Person</th>
                           <th> Contact&nbsp;Email</th>
                           <th> Contact&nbsp;Phone</th>
                           <th>Created</th>
                           <th>Action</th>
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


