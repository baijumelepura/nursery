<?=$this->load->view('includes/header');?>
<?=$this->load->view('includes/sidebar');?>
<style>
  
  .select2-container--default .select2-selection--single {
  background-color: #fff;
  border: 1px solid #d2d6de;
  border-radius: 0px; 
  height: 33px;}
  .pagination{
    margin-right: 16px !important;
  }
  
  </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-institution"></i>  <?=lang('Add_Nursery');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?=lang('Home');?></a></li>
        <li ><a href="<?=site_url('nursery');?>"><?=lang('Nursery');?></a></li>
        <li class="active"><?=lang('Add_Nursery');?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">

        <form action="<?php echo site_url('nursery/add');?>" method="post" enctype="multipart/form-data" >
   
         <?php $this->load->view('includes/Register/Register'); ?>
         </form>
          <!-- /.box -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
 

    </section>
    <!-- /.content -->
  </div>
   
<?=$this->load->view('includes/footer');?>

<script>
  $(function () {
    $('.select2').select2(['']);
  });
</script>