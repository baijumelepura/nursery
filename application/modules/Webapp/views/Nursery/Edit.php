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
      <i class="fa fa-institution"></i> Edit nursery
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?=lang('Home');?></a></li>
        <li class=""><a href="<?=site_url('nursery');?>">Nursery</a></li>
        <li class="active">Edit nursery</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">



          <!-- Profile Image -->
          <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Nursery details</h3>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $school->school_logo ? $school->school_logo : base_url().'assets/img/logo.png';?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?=$school->school_name?></h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-envelope" aria-hidden="true"></i></b> <a class="pull-right"><?=$school->school_email;?></a>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-phone" aria-hidden="true"></i></b> <a class="pull-right"><?=$school->school_phone;?></a>
                </li>
                <!-- <li class="list-group-item">
                  <b><i class="fa fa-flag" aria-hidden="true"></i></b><a class="pull-right"><?=$school->name?><br><?=$school->school_city?></a>
                </li> -->
                <li class="list-group-item">
                  <b><i class="fa fa-internet-explorer" aria-hidden="true"></i></b> <a href="<?=$school->school_website?>" target="_blank" class="pull-right"><?=$school->school_website?></a>
                </li>
                <strong><i class="fa fa-map-marker margin-r-5"></i></strong> 
                   <p ><a class="pull-right"> <?=$school->school_address;?></a></P>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contact details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <strong><i class="fa fa-user" aria-hidden="true"></i> Person Name </strong> 
              <p class="text-muted">
               <?=$school->contact_name?>
              </p>
              <hr>

              <strong><i class="fa fa-phone" aria-hidden="true"></i> Phone / Mobile  </strong> 
              <p class="text-muted">
               <?=$school->contact_name?>
              </p>
              <hr>
              <strong><i class="fa fa-envelope" aria-hidden="true"></i> Email  </strong> 
              <p class="text-muted">
               <?=$school->contact_name?>
              </p>
              <hr>
              <strong><i class="fa fa-suitcase" aria-hidden="true"></i> Position</strong> 
              <p class="text-muted">
               <?=$school->contact_position?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">administrator</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <strong><i class="fa fa-envelope" aria-hidden="true"></i> Email </strong> 
              <p class="text-muted">
               <?=$school->email?>
              </p>
              
            </div>
            <!-- /.box-body -->
          </div>















          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        <form action="<?php echo  site_url('nursery/edit/'.$this->uri->segment(3));?>" method="post" enctype="multipart/form-data" >
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
$(document).ready(function(){
  
var dp = $(".datepicker");
dp.datepicker({
    format : 'dd/mm/yyyy',
    autoclose: true,
    changeMonth: true,
                changeYear: true,
});
dp.on('changeDate', function(ev){
  dp.attr('value',ev.target.value);
});
var dp1 = $(".datepicker1");
dp1.datepicker({
    format : 'dd/mm/yyyy',
    autoclose: true,
    changeMonth: true,
    changeYear: true
}).on('changeDate', function(ev){
  dp1.attr('value',ev.target.value);
});
});

  $(document).ready(function(){
    $('.select2').select2(['']);
    //Date picker
    // $('.datepicker').datepicker({
    //   autoclose: true,
    //   format: 'dd-mm-yyyy', 
    // });
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
$(".add").click(function(){
 var total_element = $(".element").length;
 var lastid = $(".element:last").attr("id");
 var split_id = lastid.split("_");
 var nextindex = Number(split_id[1]) + 1;
 var max = 8;
 if(total_element < max ){
  $(".element:last").after('<div class="row element" style="margin-left: 2px;" id="div_'+nextindex+'"></div>');
  $("#div_" + nextindex).append(
              '<div class="col-md-9 form-group" style="padding-left:0px;">'+
              '<input type="file" name="document[]" multiple ></div>'+
              '<div class="col-md-1 form-group" style="padding-left:0px;">'+
              '<i class="fa fa-times remove"  id="remove_'+nextindex+'" ></i> </div>'); }
});
// Remove element
$('.fileinput').on('click','.remove',function(){
 var id = this.id;
 var split_id = id.split("_");
 var deleteindex = split_id[1];
 $("#div_" + deleteindex).remove();
}); 
});
</script>
<script>
  $(function () {
  
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      "pageLength": 4,
      "pagingType": "simple",
      "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',

    })
  })
  <?php if(isset($_GET['password'])){ ?>
  $('html,body').animate({ scrollTop: 9999 }, 'slow');
  <?php } ?>
  <?php if(form_error('currentpass') || form_error('newpass') || form_error('cpass') ){ ?>
    $('html,body').animate({ scrollTop: 9999 }, 'slow');
  <?php } ?>
</script>