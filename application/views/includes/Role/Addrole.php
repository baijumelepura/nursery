
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-user-secret" aria-hidden="true"></i> Add Role</h4>
      </div>
      <div class="modal-body">
          <div class="box box-primary">
              <div class="box-body">
                <div class="form-group ">
                  <label for="exampleInputEmail1">Role</label>
                  <input type="text"  class="form-control roletext"  placeholder="Enter Roles">
                  
                </div>
              </div>
          </div>
          <!-- /.box -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-fw fa-key"></i> Permission</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <?php $i=0; foreach($permissions as $key =>$permissions){ ?>
                
                <div class="panel box box-default">
                  <div class="box-header with-border" style="background-color: #d2d6de52;">
                    <h4 class="box-title" style="display: inline;">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key;?>" aria-expanded="true" class="collapsed">
                       <?=$key;?>         <i class="fa fa-fw fa-chevron-down pull-right"></i>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse<?=$key;?>" class="panel-collapse collapse <?php if($i==0){echo 'in'; }?>" aria-expanded="true" style="">
                    <div class="box-body">
                        <div class="row">
                            <?php foreach($permissions as $key=> $permission){ ?>
                            <div class="col-sm-4 col-md-4">
                                    <label style="cursor: pointer;">
                                       <input type="checkbox" name="checkbox" class="perid" value="<?=$permission->role_id;?>"> 
                                       <span> <?=$permission->slug;?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                  </div>
                </div>
               <?php $i++; } ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
      <div class="modal-footer">
        <button type="submit" ng-click="add_role('<?=$this->encrypt->encrypt($school_id);?>');"  class="btn btn-primary pull-right">
        <i  ng-show="Role.spinner" class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
        Add Role</button>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>