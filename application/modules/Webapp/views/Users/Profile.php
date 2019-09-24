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
      <?=lang('User_profile');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?=lang('Home');?></a></li>
        <li class="active"><?=lang('User_profile');?></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=config_item('UserData')->profile_pic;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?=config_item('UserData')->user_first_name;?> <?=config_item('UserData')->user_last_name;?></h3>

              <p class="text-muted text-center"><?=$userdetails['user']->designation;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><i class="fa fa-envelope" aria-hidden="true"></i></b> <a class="pull-right"><?=$userdetails['user']->email;?></a>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-phone" aria-hidden="true"></i></b> <a class="pull-right"><?=$userdetails['user']->mobile_number;?></a>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-birthday-cake"></i></b> <a class="pull-right"><?=$userdetails['user']->dob ? nice_date($userdetails['user']->dob,'d/m/Y'):'';?></a>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-calendar" aria-hidden="true"></i></b> <a class="pull-right"><?=$userdetails['user']->join_date ? nice_date($userdetails['user']->join_date,'d/m/Y') : '';?></a>
                </li>

                
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=lang('About_me');?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <strong><i class="fa fa-book margin-r-5"></i> <?=lang('About');?></strong> 

              <p class="text-muted">
               <?=$userdetails['user']->about ? $userdetails['user']->about : '-';?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i><?=lang('Address');?> </strong>

              <p class="text-muted">
              
              <?=$userdetails['user']->address ? $userdetails['user']->address : '-';?>
              
              </p>

              <!-- <hr> -->

              <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> -->

              <!-- <hr> -->

              <!-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
         
              
              

              <div class="box box-primary" id="settings">
              

              <div class="box-header with-border">
              <h3 class="box-title"><?=lang('Personal_detail');?></h3>

              <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div> -->
            </div>

              <form action="<?php echo site_url('profile');?>"   enctype="multipart/form-data" method="post">


              <?=$this->session->tempdata('SuccessProfile');?>
                <div class="col-md-12 no_padding_left">
                  <div  class="box-body box-profile">
                  <div  class="profile-username " style="font-size: 15px;"><label><?=lang('Picture');?></label></div>
                    <img style="cursor: pointer; margin:0px;" onclick="document.getElementById('imgInp').click();"
                     class="profile-user-img img-responsive img-responsive" id="blah"  
                     src="<?=config_item('UserData')->profile_pic;?>"data-toggle="tooltip" data-placement="top" title="Change your profile picture">
                    <input style="display:none;" type='file' name="profile_pic" id="imgInp" />
                  </div>
                </div>





              <div class="box-body">



              <div class="row">
                <div class="form-group col-md-6 <?php if(form_error('firstname')){echo 'has-error';}?> ">
                  <label ><?=lang('First_Name');?><span style="color:red;">*</span></label>
                  <input type="text" class="form-control" value="<?=$userdetails['user']->first_name;?>" name="firstname"  placeholder="<?=lang('First_Name');?>  ">
                    <?php if(form_error('firstname')){ ?>
                      <span class="help-block"><?=form_error('firstname');?>
                    </span><?php } ?>
                </div>
               
                <div class="form-group col-md-6 <?php if(form_error('lastname')){echo 'has-error';}?> ">
                  <label > <?=lang('Last_Name');?> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" value="<?=$userdetails['user']->last_name;?>" name="lastname"  placeholder="<?=lang('Last_Name');?>">
                  <?php if(form_error('lastname')){ ?>
                      <span class="help-block"><?=form_error('lastname');?>
                    </span><?php } ?>
                </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6 <?php if(form_error('dob')){echo 'has-error';}?>">
                <label><?=lang('DOB');?> </label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly class="form-control pull-right datepicker" value="<?=$userdetails['user']->dob ? nice_date($userdetails['user']->dob,'d/m/Y'):'';?>" name="dob" placeholder="<?=lang('DOB');?>" >
                </div>
                <?php if(form_error('dob')){ ?>
                      <span class="help-block"><?=form_error('dob');?>
                    </span><?php } ?>
                </div>


              <div class="form-group col-md-6  <?php if(form_error('country')){echo 'has-error';}?>">
              <span style="font-weight: 700;" ><?=lang('Country');?> <span style="color:red;">*</span></span>
              <select class="form-control select2"  name="country">
              <option  value=""><?=lang('Select_Country');?></option>
                  <?php foreach($country as $country){ 
                    $selected = ($userdetails['user']->country==$country->country_id)? 'selected = "selected"':'';
                    ?>
                    <option <?=$selected ;?> value="<?=$country->country_id;?>"  ><?=$country->name;?></option>
                 <?php  } ?>
               </select>
               <?php if(form_error('country')){ ?>
                      <span class="help-block"><?=form_error('country');?>
                    </span><?php } ?>
               </div>
                  </div>



                  <div class="row">
                <div class="form-group col-md-6 <?php if(form_error('city')){echo 'has-error';}?> ">
                  <label ><?=lang('City');?> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" value="<?=$userdetails['user']->city;?>"  name="city" placeholder="<?=lang('City');?>">
                  <?php if(form_error('city')){ ?>
                      <span class="help-block"><?=form_error('city');?>
                    </span><?php } ?>
                </div>


                <div class="form-group col-md-6 <?php if(form_error('Contact')){echo 'has-error';}?>">
                  <label ><?=lang('Contact');?> <span style="color:red;">*</span></label>
                  <input type="text" class="form-control" value="<?=$userdetails['user']->mobile_number;?>" name="Contact"  placeholder="<?=lang('Contact');?>">
                  <?php if(form_error('Contact')){ ?>
                      <span class="help-block"><?=form_error('Contact');?>
                    </span><?php } ?>
                </div>
                  </div>

          
           <div class="row">
           
                <div class="form-group col-md-6 <?php if(form_error('designation')){echo 'has-error';}?>">
                  <label > <?=lang('Designation');?> </label>
                  <input type="text" class="form-control" value="<?=$userdetails['user']->designation;?>" name="designation" placeholder="<?=lang('Designation');?>" >
                  <?php if(form_error('designation')){ ?>
                      <span class="help-block"><?=form_error('designation');?>
                    </span><?php } ?>
                </div>

                <div class="form-group col-md-6 <?php if(form_error('joindate')){echo 'has-error';}?>">
                <label><?=lang('Register_Date');?> </label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly class="form-control pull-right datepicker1" value="<?=$userdetails['user']->join_date ? nice_date($userdetails['user']->join_date,'d/m/Y') : '';?>"
                    name="joindate"  placeholder="<?=lang('Register_Date');?>">
              
                </div>
                <?php if(form_error('joindate')){ ?>
                      <span class="help-block"><?=form_error('joindate');?>
                    </span><?php } ?>
                <!-- /.input group -->
              </div>
                  </div>

                  <div class="row">
          
                <div class="form-group col-md-6 <?php if(form_error('Address')){echo 'has-error';}?>">
                  <label ><?=lang('Address');?> <span style="color:red;">*</span></label>
                  <textarea name="Address" class="form-control" rows="3" placeholder="<?=lang('Address');?>"><?=$userdetails['user']->address;?></textarea>
                  <?php if(form_error('Address')){ ?>
                      <span class="help-block"><?=form_error('Address');?>
                    </span><?php } ?>
                  </div>
                  <div class="form-group col-md-6 <?php if(form_error('about')){echo 'has-error';}?>">
                  <label ><?=lang('About');?> <span style="color:red;">*</span></label>
                  <textarea name="about" class="form-control" rows="3" placeholder="<?=lang('About');?>">
                  <?=$userdetails['user']->about;?></textarea>
                  <?php if(form_error('about')){ ?>
                      <span class="help-block"><?=form_error('about');?>
                    </span><?php } ?>
                </div>
                  </div>
      

  <div class="row">
  <div  class="col-md-12 "> <label for="exampleInputFile" style="padding-left:0px;"><?=lang('Document');?></label></div>
  <?php if($userdetails['doc']){         
          ?>
  <div  class="col-md-6 ">

      
            <div class="box-body no-padding ">
              <table class="table table-condensed" id="example2">

              <thead>
              <tr>
                  <th style="width: 10px">#</th>
                  <th><?=lang('Document');?></th>
                  <th style="width: 40px"><?=lang('Action');?></th>
                </tr>
                </thead>
                <tbody>
                
                <?php foreach($userdetails['doc'] as $i=> $doc){ ?>
                <tr>
                  <td><?=$i+1;?></td>
                  <td><a target="_blank" href="<?=$doc->document_url;?>"><?php echo basename($doc->document_url);?></a></td>
                  <td><a href="<?=site_url('Webapp/Users/delete_doc/'.$doc->document_id);?>" onclick="return confirm('Press a button!');"><i class="fa fa-fw fa-trash"></i></a></td>
                </tr>
                 <?php } ?>
              </tbody></table>
            </div>
       
                
</div>  

<?php } ?>

           <div  class="fileinput col-md-6">
            <div class="row element" style="margin-left: 2px;" id="div_1">
              <div class="col-md-9 form-group" style="padding-left:0px;">  
              <label for="exampleInputFile" style="padding-left:0px;">&nbsp;</label>
               <input type="file" name="document[]" multiple ></div>
              <div class="col-md-1 form-group" style="padding-left:0px;">   
              <label class="col-md-11">&nbsp;</label>
               <i class="fa fa-fw fa-plus add"></i> </div>
            </div>  
          </div>
              


          </div>
             <div class="box-footer">
                <button type="submit" name="profile" class="btn btn-primary pull-right"><?=lang('Update');?></button>
              </div>
              </div>
            </form>
         </div>




          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=lang('Change_Password');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?=site_url('profile');?>"  method="post">
            <?=$this->session->tempdata('Success');?>
              <div class="box-body">
              <div class="form-group">
                  <label ><?=lang('Email');?></label>
                  <input type="text" class="form-control" disabled value="<?=$userdetails['user']->email;?>"  placeholder="<?=lang('Email');?>">
                </div>
                <div class="form-group  <?php if(form_error('currentpass')){echo 'has-error';}?>">
                  <label for="exampleInputEmail1"><?=lang('Current_Password');?></label>
                  <input type="password" class="form-control" name="currentpass"  placeholder="<?=lang('Current_Password');?>">
                  <?php if(form_error('currentpass')){ ?>
                      <span class="help-block"><?=form_error('currentpass');?>
                    </span><?php } ?>
                </div>
     
                <div class="form-group <?php if(form_error('newpass')){echo 'has-error';}?>">
                  <label ><?=lang('New_Password');?></label>
                  <input type="password" class="form-control"  name="newpass" placeholder="<?=lang('New_Password');?>">
                  <?php if(form_error('newpass')){ ?>
                      <span class="help-block"><?=form_error('newpass');?>
                    </span><?php } ?>
                </div>
      
              
                <div class="form-group <?php if(form_error('cpass')){echo 'has-error';}?>">
                  <label ><?=lang('Confirm_Password');?></label>
                  <input type="password" class="form-control" name="cpass"   placeholder="<?=lang('Confirm_Password');?>">
                  <?php if(form_error('cpass')){ ?>
                      <span class="help-block"><?=form_error('cpass');?>
                    </span><?php } ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?=lang('Update');?></button>
              </div>
            </form>
          </div>
          <!-- /.box -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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