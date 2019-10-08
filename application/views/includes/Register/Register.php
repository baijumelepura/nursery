
  <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title ">  <?php if($slug == 'Edit-Membership'){ echo 'Edit nursery';}else{ echo lang('Register_a_new_membership');}?> </h3>
         
          <div class="box-tools pull-right">
            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <?=$this->session->tempdata('Success');?>
        <label><?=lang('Nursery_details');?>:</label>
        
          <div class="row ">
          
          <!-- <div class="col-md-12">
    
          <span >Name <span style="color:red;">*</span>
           </div> -->
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('NurseryName')){echo 'has-error';}?> ">
              <span ><?=lang('Name');?> <span style="color:red;">*</span></span>
                 <input type="text" name="NurseryName" value="<?php echo isset($school) ? $school->school_name : set_value('NurseryName'); ?>" class="form-control" placeholder="<?=lang('Name');?>">
                 <span class="help-block"><?=form_error('NurseryName');?></span> 
                </div>
              <!-- /.form-group -->
              <div class="form-group <?php if(form_error('NurseryPhone')){echo 'has-error';}?>">
              <span ><?=lang('Phone');?><span style="color:red;">*</span></span>
                  <input type="text" value="<?php echo isset($school) ? $school->school_phone : set_value('NurseryPhone'); ?>"  name="NurseryPhone" class="form-control" placeholder="<?=lang('Phone');?>">
                <span class="help-block"><?=form_error('NurseryPhone');?></span> 
               </div>
              <div class="form-group <?php if(form_error('NurseryCity')){echo 'has-error';}?>">
              <span ><?=lang('City');?> <span style="color:red;">*</span></span>
                 <input type="text"  value="<?php echo isset($school) ? $school->school_city : set_value('NurseryCity'); ?>" name="NurseryCity"class="form-control" placeholder="<?=lang('City');?>">
                 <span class="help-block"><?=form_error('NurseryCity');?></span> 
              </div>

                <div class="form-group <?php if(form_error('file')){echo 'has-error';}?>">
                <span ><?=lang('Logo');?></span>
                <input type="file" id="exampleInputFile" class="form-control" name="file" placeholder="<?=lang('Logo');?>">
                 <span class="help-block"><?=form_error('file');?></span>
                  <?php if(isset($school)){ ?> <a href="<?=$school->school_logo ? $school->school_logo: base_url().'assets/img/logo.png';?>"><?= basename($school->school_logo ? $school->school_logo: base_url().'assets/img/logo.png');?></a> <?php } ?>
                </div>
            </div>




            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('NurseryEmail')){echo 'has-error';}?>">
              <span ><?=lang('Email');?> <span style="color:red;">*</span></span>
              <input type="text" name="NurseryEmail" value="<?php echo isset($school) ? $school->school_email : set_value('NurseryEmail'); ?>" class="form-control" placeholder="<?=lang('Email');?>">
              <span class="help-block"><?=form_error('NurseryEmail');?></span>
            </div>
              <!-- /.form-group -->
              <div class="form-group  <?php if(form_error('NurseryCountry')){echo 'has-error';}?>">
              <span ><?=lang('Country');?> <span style="color:red;">*</span></span>
              <select class="form-control select2"  name="NurseryCountry">
              <option  value=""><?=lang('Select_Country');?></option>
                  <?php foreach($country as $country){ 
                    $school_country = isset($school) ? $school->school_country : set_value('NurseryCountry');
                    $selected = ($school_country ==$country->country_id)? 'selected = "selected"':'';
                    ?>
                    <option <?=$selected ;?> value="<?=$country->country_id;?>"  ><?=$country->name;?></option>
                 <?php  } ?>
               </select>
               <span class="help-block"><?=form_error('NurseryCountry');?></span>
               </div>

              <div class="form-group <?php if(form_error('NurseryWebsite')){echo 'has-error';}?>">
              <span ><?=lang('Website');?> <span style="color:red;">*</span></span>
                 <input type="text"  value="<?php echo isset($school) ? $school->school_website : set_value('NurseryWebsite'); ?>"  name="NurseryWebsite"class="form-control" placeholder="<?=lang('Website');?>">
                 <span class="help-block"><?=form_error('NurseryWebsite');?></span>
                </div>
                <div class="form-group <?php if(form_error('NurseryAddress')){echo 'has-error';}?>">
                <span ><?=lang('Address');?> <span style="color:red;">*</span></span>
                <textarea name="NurseryAddress" class="form-control" rows="3" placeholder="<?=lang('Address');?>"><?php echo isset($school) ? $school->school_address : set_value('NurseryAddress'); ?></textarea>
                <span class="help-block"><?=form_error('NurseryAddress');?></span>    </div>

            </div>
            <!-- /.col -->
          </div>
          <div class="row">
          <div class="col-md-12">
          <label><?=lang('Contact_details');?> :</label>
           </div>
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('ContactName')){echo 'has-error';}?>">
              <span ><?=lang('Person_Name');?> <span style="color:red;">*</span></span>
                  <input type="text" value="<?php echo  isset($school) ? $school->contact_name : set_value('ContactName'); ?>"  name="ContactName"class="form-control" placeholder="<?=lang('Person_Name');?>">
                  <span class="help-block"><?=form_error('ContactName');?></span>
                </div>
         
               <div class="form-group <?php if(form_error('ContactMobile')){echo 'has-error';}?>">
               <span ><?=lang('Mobile');?> <span style="color:red;">*</span></span>
                   <input type="text" value="<?php echo isset($school) ? $school->contact_mobile : set_value('ContactMobile'); ?>"  name="ContactMobile"class="form-control" placeholder="<?=lang('Mobile');?>">
                   <span class="help-block"><?=form_error('ContactMobile');?></span>
                  </div>
               <div class="form-group <?php if(form_error('ContactPosition')){echo 'has-error';}?>">
               <span ><?=lang('Position');?> <span style="color:red;">*</span></span>
                   <input type="text" value="<?php echo isset($school) ? $school->contact_position : set_value('ContactPosition'); ?>"  name="ContactPosition"class="form-control" placeholder="<?=lang('Position');?>">
                   <span class="help-block"><?=form_error('ContactPosition');?></span>
                 </div>
             </div>

            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group  <?php if(form_error('ContactPhone')){echo 'has-error';}?>">
              <span ><?=lang('Phone');?> <span style="color:red;">*</span></span>
                <input type="text" value="<?php echo isset($school) ? $school->contact_phone : set_value('ContactPhone'); ?>" name="ContactPhone"class="form-control" placeholder="<?=lang('Phone');?>">
                <span class="help-block"><?=form_error('ContactPhone');?></span>
              </div>
              <div class="form-group <?php if(form_error('ContactEmail')){echo 'has-error';}?>">
              <span ><?=lang('Email');?> <span style="color:red;">*</span></span>
                  <input type="text" value="<?php echo isset($school) ? $school->contact_email : set_value('ContactEmail'); ?>" name="ContactEmail"class="form-control" placeholder="<?=lang('Email');?>">
                  <span class="help-block"><?=form_error('ContactEmail');?></span>
                </div>
                
              
            </div>
          </div>

      <?php if($slug != 'Edit-Membership'){ ?>
         <div class="row">
          <div class="col-md-12">
          <label><?=lang('Create_a_user');?> ( <?=lang('Administrator');?> ) :</label>
           </div>
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('email')){echo 'has-error';}?>">
              <span ><?=lang('Email');?> <span style="color:red;">*</span></span>
                 <input type="text" value="<?php echo set_value('email'); ?>" name="email" class="form-control" placeholder="<?=lang('Email');?>">
                 <span class="help-block"><?=form_error('email');?></span>
              </div>

               <div class="form-group <?php if(form_error('cpassword')){echo 'has-error';}?>">
               <span ><?=lang('Retype_password');?> <span style="color:red;">*</span></span>
               <input type="password"  name="cpassword"class="form-control" placeholder="<?=lang('Retype_password');?>">
               <span class="help-block"><?=form_error('cpassword');?></span>
                </div>
             </div>

            
            <div class="col-md-6">
              <div class="form-group <?php if(form_error('password')){echo 'has-error';}?>">
              <span ><?=lang('Password');?> <span style="color:red;">*</span></span>
                      <input type="password" name="password" class="form-control" placeholder="<?=lang('Password');?>">
                      <span class="help-block"><?=form_error('password');?></span>
                   </div>


              <?php if($slug == 'User-Add-Membership'){ ?>
              <div class="form-group <?php if(form_error('captcha')){echo 'has-error';}?>">
              <span >Captcha <span style="color:red;">*</span></span><br>
              <div class="col-md-4" style="padding-left: 0px;"><?=$image;?></div>
              <div class="col-md-8" style="padding-right: 0px;"><input type="text" name="captcha" class="form-control" placeholder="Captcha">
              <span class="help-block"><?=form_error('captcha');?></span></div> 
              <input type="hidden" name="capchar" value="<?=$word;?>">
              </div>
              <?php } ?>
            </div>
          </div> 
      <?php } ?>

      <div class="box-footer" style="padding:0px;">
      <br>
      <div class="col-md-6" style="padding-left: 0px;">
      <?php if($slug != 'Edit-Membership'){ ?>
         <div class="checkbox icheck">
            <label style="<?php if($slug == 'Admin-Add-Membership'){echo 'margin-left: 25px;';} ?>">
              <input type="checkbox" name="checkbox"> <?=lang('I_agree_to_the');?> <a href="#"><?=lang('tearms');?></a>
              <span class="help-block" style="color:#dd4b39;"><?=form_error('checkbox');?></span>
            </label>
          </div> 
      <?php } ?>
        </div>
        <!-- /.col -->
        <div class="col-md-6" style="padding-right: 0px;">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo ($slug != 'Edit-Membership') ?  lang('Register') : lang('Update'); ?></button><br>
              <?php if($slug == 'User-Add-Membership'){ ?>  <a href="<?=base_url();?>" class="text-right pull-right">I already have a membership</a><?php } ?>
        </div>
        
        </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
      </div>

