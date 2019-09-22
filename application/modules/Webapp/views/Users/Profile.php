<?=$this->load->view('includes/header');?>
<?=$this->load->view('includes/sidebar');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
   
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
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

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              
              

              <div class="tab-pane active" id="settings">
                

           
              <form  enctype="multipart/form-data" method="post">

                <div class="col-md-12">
                  <div  class="box-body box-profile">
                  <div  class="profile-username text-center" style="font-size: 15px;"><label>Picture</label></div>
                    <img style="cursor: pointer;" onclick="document.getElementById('imgInp').click();"
                     class="profile-user-img img-responsive img-responsive" id="blah"  
                     src="<?=config_item('UserData')->profile_pic;?>"data-toggle="tooltip" data-placement="top" title="Change profile picture">
                    <input style="display:none;" type='file' name="profile_pic" id="imgInp" />
                  </div>
                </div>


              <div class="box-body">
                <div class="form-group">
                  <label >First Name</label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>
               
                <div class="form-group">
                  <label >Last Name</label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>

            <div class="form-group">
                <label>DOB</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" >
                </div>
                <!-- /.input group -->
              </div>


              <div class="form-group">
                  <label >Country</label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>
             
                <div class="form-group">
                  <label >City</label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>

                <div class="form-group">
                  <label >Email</label></label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>

                <div class="form-group">
                  <label >Contact</label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>


                <div class="form-group">
                  <label >Address</label>
                  <textarea name="NurseryAddress" class="form-control" rows="3" placeholder="Address"><?php echo set_value('NurseryAddress'); ?></textarea>

                </div>



                <div class="form-group">
                <label>Register Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" >
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label >Designation</label>
                  <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>

                <div class="form-group">
                  <label >About</label>
                  <textarea name="NurseryAddress" class="form-control" rows="3" placeholder="Address"><?php echo set_value('NurseryAddress'); ?></textarea>

                </div>



                <div class="form-group col-md-12">
              
              <div class="col-md-4 form-group">  
              <label for="exampleInputFile">File input</label><input type="file" ></div>
              <div class="col-md-1 form-group">   <label for="exampleInputFile">&nbsp;sds</label> <i class="fa fa-fw fa-plus form-group"></i></div>
              </div>




                
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>










                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
            </form>
         </div>





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
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy', 
    });

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