<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/select2/dist/css/select2.css">
 
  <style>
  
  .select2-container--default .select2-selection--single {
  background-color: #fff;
  border: 1px solid #d2d6de;
  border-radius: 0px; 
  height: 33px;}
  
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">

<div class="register-box " style="width: 72%;    margin: 2% auto;">
  <div class="register-logo">
    <a href=""><b>Global </b>horizon</a>
    <!-- <img src="<?php echo base_url();?>assets/img/logo1.jpg"> -->
  </div>




  <form action="<?php echo site_url('register');?>" method="post" enctype="multipart/form-data" >

  <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title ">Register a new membership</h3>

          <div class="box-tools pull-right">
            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        
        <label>Nursery details :</label>
        
          <div class="row ">
          
          <!-- <div class="col-md-12">
    
          <span >Name <span style="color:red;">*</span>
           </div> -->
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('NurseryName')){echo 'has-error';}?> ">
              <span >Name <span style="color:red;">*</span></span>
                 <input type="text" name="NurseryName" value="<?php echo set_value('NurseryName'); ?>" class="form-control" placeholder="Name">
                 <span class="help-block"><?=form_error('NurseryName');?></span> 
                </div>
              <!-- /.form-group -->
              <div class="form-group <?php if(form_error('NurseryPhone')){echo 'has-error';}?>">
              <span >Phone <span style="color:red;">*</span></span>
                  <input type="text" value="<?php echo set_value('NurseryPhone'); ?>"  name="NurseryPhone" class="form-control" placeholder="Phone">
                <span class="help-block"><?=form_error('NurseryPhone');?></span> 
               </div>
              <div class="form-group <?php if(form_error('NurseryCity')){echo 'has-error';}?>">
              <span >City <span style="color:red;">*</span></span>
                 <input type="text"  value="<?php echo set_value('NurseryCity'); ?>" name="NurseryCity"class="form-control" placeholder="City">
                 <span class="help-block"><?=form_error('NurseryCity');?></span> 
              </div>

                <div class="form-group <?php if(form_error('file')){echo 'has-error';}?>">
                <span >Logo</span>
                <input type="file" id="exampleInputFile" class="form-control" name="file" placeholder="Logo">
                 <span class="help-block"><?=form_error('file');?></span>
                </div>
            </div>




            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('NurseryEmail')){echo 'has-error';}?>">
              <span >Email <span style="color:red;">*</span></span>
              <input type="text" name="NurseryEmail" value="<?php echo set_value('NurseryEmail'); ?>" class="form-control" placeholder="Email">
              <span class="help-block"><?=form_error('NurseryEmail');?></span>
            </div>
              <!-- /.form-group -->
              <div class="form-group  <?php if(form_error('NurseryCountry')){echo 'has-error';}?>">
              <span >Country <span style="color:red;">*</span></span>
              <select class="form-control select2"  name="NurseryCountry">
              <option  value="">Select Country</option>
                  <?php foreach($country as $country){ 
                    $selected = (set_value('NurseryCountry')==$country->country_id)? 'selected = "selected"':'';
                    ?>
                    <option <?=$selected ;?> value="<?=$country->country_id;?>"  ><?=$country->name;?></option>
                 <?php  } ?>
               </select>
               <span class="help-block"><?=form_error('NurseryCountry');?></span>
               </div>










               
              <div class="form-group <?php if(form_error('NurseryWebsite')){echo 'has-error';}?>">
              <span >Website <span style="color:red;">*</span></span>
                 <input type="text"  value="<?php echo set_value('NurseryWebsite'); ?>"  name="NurseryWebsite"class="form-control" placeholder="Website">
                 <span class="help-block"><?=form_error('NurseryWebsite');?></span>
                </div>
                <div class="form-group <?php if(form_error('NurseryAddress')){echo 'has-error';}?>">
                <span >Address <span style="color:red;">*</span></span>
                <textarea name="NurseryAddress" class="form-control" rows="3" placeholder="Address"><?php echo set_value('NurseryAddress'); ?></textarea>
                <span class="help-block"><?=form_error('NurseryAddress');?></span>    </div>

            </div>
            <!-- /.col -->
          </div>







          <div class="row">
          <div class="col-md-12">
          <label>Contact details :</label>
           </div>
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('ContactName')){echo 'has-error';}?>">
              <span >Person Name <span style="color:red;">*</span></span>
                  <input type="text" value="<?php echo set_value('ContactName'); ?>"  name="ContactName"class="form-control" placeholder="Person Name">
                  <span class="help-block"><?=form_error('ContactName');?></span>
                </div>
         
               <div class="form-group <?php if(form_error('ContactMobile')){echo 'has-error';}?>">
               <span >Mobile <span style="color:red;">*</span></span>
                   <input type="text" value="<?php echo set_value('ContactMobile'); ?>"  name="ContactMobile"class="form-control" placeholder="Mobile">
                   <span class="help-block"><?=form_error('ContactMobile');?></span>
                  </div>
               <div class="form-group <?php if(form_error('ContactPosition')){echo 'has-error';}?>">
               <span >Position <span style="color:red;">*</span></span>
                   <input type="text" value="<?php echo set_value('ContactPosition'); ?>"  name="ContactPosition"class="form-control" placeholder="Position">
                   <span class="help-block"><?=form_error('ContactPosition');?></span>
                 </div>
             </div>

            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group  <?php if(form_error('ContactPhone')){echo 'has-error';}?>">
              <span >Phone <span style="color:red;">*</span></span>
                <input type="text" value="<?php echo set_value('ContactPhone'); ?>" name="ContactPhone"class="form-control" placeholder="Phone">
                <span class="help-block"><?=form_error('ContactPhone');?></span>
              </div>
              <div class="form-group <?php if(form_error('ContactEmail')){echo 'has-error';}?>">
              <span >Email <span style="color:red;">*</span></span>
                  <input type="text" value="<?php echo set_value('ContactEmail'); ?>" name="ContactEmail"class="form-control" placeholder="Email">
                  <span class="help-block"><?=form_error('ContactEmail');?></span>
                </div>
                
              
            </div>
          </div>

          <div class="row">
          <div class="col-md-12">
          <label>Create a user ( administrator ) :</label>
           </div>
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('email')){echo 'has-error';}?>">
              <span >Email <span style="color:red;">*</span></span>
                 <input type="text" value="<?php echo set_value('email'); ?>" name="email" class="form-control" placeholder="Email">
                 <span class="help-block"><?=form_error('email');?></span>
              </div>

               <div class="form-group <?php if(form_error('cpassword')){echo 'has-error';}?>">
               <span >Retype password <span style="color:red;">*</span></span>
               <input type="password"  name="cpassword"class="form-control" placeholder="Retype password">
               <span class="help-block"><?=form_error('cpassword');?></span>
                </div>
             </div>

            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('password')){echo 'has-error';}?>">
              <span >Password <span style="color:red;">*</span></span>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <span class="help-block"><?=form_error('password');?></span>
                   </div>



              <div class="form-group <?php if(form_error('captcha')){echo 'has-error';}?>">
              <span >Captcha <span style="color:red;">*</span></span><br>
              <div class="col-md-4" style="padding-left: 0px;"><?=$image;?></div>
              <div class="col-md-8" style="padding-right: 0px;"><input type="text" name="captcha" class="form-control" placeholder="Captcha">
              <span class="help-block"><?=form_error('captcha');?></span></div> 
                 </div>
              
            </div>

          </div>



          <input type="hidden" name="capchar" value="<?=$word;?>">

      <div class="box-footer" style="padding:0px;">
      <br>
      <div class="col-md-6" style="padding-left: 0px;">
          <div class="checkbox icheck <?php if(form_error('checkbox')){echo 'has-error';}?>">
            <label>
              <input type="checkbox" name="checkbox"> I agree to the <a href="#">terms</a>
              <span class="help-block"><?=form_error('checkbox');?></span>
            </label>
          </div>
        </div>

        
        <!-- /.col -->
        <div class="col-md-6" style="padding-right: 0px;">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button><br>
          <a href="<?=base_url();?>" class="text-right pull-right">I already have a membership</a>
        </div>
        
        </div>



          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>










  
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2(['']);
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
`