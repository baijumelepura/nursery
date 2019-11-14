<style>
    .tooltip-inner {
        max-width: 100% !important;
    }
</style>
<div class="modal fade" id="myModaledit" role="dialog">
    <form name="registerform_edit" id="registerform_edit" ng-submit="register_edit(registerform_edit)" enctype="multipart/form-data" ng-validate="validationOptions">
        <div class="modal-dialog modal-lg ">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <i class="fa fa-edit"></i> Edit Staff</h4>
                </div>
                <div class="modal-body" style="min-height: 71px;">
                    <div ng-cloak ng-show="!Staff.EditSpinner" class="col-xs-12 col-md-12" style="text-align: center;">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> Loading ...
                    </div>

                    <div ng-show="Staff.EditSpinner">
                        <div class="box-body box-profile">
                            <div class="profile-username " style="font-size: 15px;">
                                <label>Picture</label>
                            </div>
                            <img style="cursor: pointer; margin:0px;" onclick="document.getElementById('imgInp1').click();" class="profile-user-img img-responsive img-responsive" id="blah1" src="{{Staff.base_url}}assets/img/profilepic.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change profile picture">
                            <input style="display:none;" type="file" name="profile_pic" id="imgInp1">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>First Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="fname" value="{{staff_data.user_first_name}}" placeholder="Enter The First Name">
                                    </div>
                                    <div class="form-group">
                                        <label>DOB </label>
                                        <input type="text" name="dob" class="form-control  popupDatepicker" value="{{staff_data.dob}}" readonly placeholder="Enter The DOB">
                                    </div>
                                    <div class="form-group">
                                        <label>City <span style="color:red;">*</span></label>
                                        <input type="text" value="{{staff_data.city}}" name="city" class="form-control" placeholder="Enter The City">
                                    </div>
                                    <div class="form-group">
                                        <label>Designation <span style="color:red;">*</span></label>
                                        <input type="text" value="{{staff_data.designation}}" name="Designation" class="form-control" placeholder="Enter Designation">
                                    </div>

                                    <div class="form-group">
                                        <label>Job Type<span style="color:red;">*</span></label>
                                        <select class="form-control" name="jobType" id="jobType">
                                            <option value="">Select an option</option>
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Part-Time">Part-Time</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Address <span style="color:red;">*</span></label>
                                        <textarea name="Address" class="form-control" rows="3" placeholder="Enter The Address"> {{staff_data.user_address}}</textarea>
                                    </div>

                                    <div class="fileinput1 col-md-10">
                                        <div class="row element1" id="div_11">
                                            <div class="col-md-9 form-group" style="padding-left:0px;">
                                                <label for="exampleInputFile" style="padding-left:0px;">Document</label>
                                                <input type="file" name="document[]" multiple>
                                            </div>
                                            <div class="col-md-1 form-group" style="padding-left:0px;">
                                                <label class="col-md-11">&nbsp;</label>
                                                <i class="fa fa-fw fa-plus add1"></i> </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Last Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" value="{{staff_data.user_last_name}}" name="lname" placeholder="Enter The Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Country <span style="color:red;">*</span></label>
                                        <select class="form-control  select2 select_country" name="country">
                                            <!-- <option  value=""><?=lang('Select_Country');?></option> -->
                                            <?php foreach($country as $country){ ?>
                                                <option value="<?=$country->country_id;?>">
                                                    <?=$country->name;?>
                                                </option>
                                                <?php  } ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Contact <span style="color:red;">*</span></label>
                                        <input type="text" value="{{staff_data.mobile_number}}" name="Contact" class="form-control" placeholder="Enter The Contact Number">
                                    </div>

                                    <div class="form-group">
                                        <label>Role<span style="color:red;">*</span></label>
                                        <select class="form-control" name="Role" id="Role">
                                            <option value="">Select a Role</option>
                                            <?php foreach($get_rules as $get_rules){ ?>
                                                <option value="<?=$get_rules->user_role_id;?>">
                                                    <?=$get_rules->user_role_name;?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                        <a href="<?=site_url('roles/'.$this->encrypt->encrypt($school_id));?>" target="_blank" class="pull-right"><i class="fa fa-fw fa-plus"></i> Add Role</a>
                                    </div>

                                    <div class="form-group">
                                        <label>Register Date <span style="color:red;">*</span></label>
                                        <input type="text" value="{{staff_data.join_date}}" name="Registerdate" class="form-control popupDatepicker" placeholder="Enter The Register Date" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>About <span style="color:red;">*</span></label>
                                        <textarea name="About" class="form-control" rows="3" placeholder="Enter The About">{{staff_data.about}}</textarea>
                                    </div>

                                    <div class="form-group" style="max-height: 240px;overflow-y: scroll; -webkit-box-shadow: inset 0 0 6px rgba(90, 90, 90, 0.15); ">

                                        <table class="table" ng-show="staff_data.doc.length > 0">

                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10px" class="sorting_disabled" rowspan="1" colspan="1">#</th>
                                                    <th rowspan="1" colspan="1">Document</th>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr ng-repeat="(key, value) in staff_data.doc">

                                                    <td>{{$index+1}}</td>
                                                    <td><a href="{{value.document_url}}" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="{{document(value.document_url).name}}" tooltip> {{document(value.document_url).reduce}}</a></td>
                                                    <td><a ng-click="document_delete(value.document_id);"><i class="fa fa-fw fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <h4 class="box-title" style="padding-left: 11px;"><i class="fa fa-unlock-alt" aria-hidden="true"></i>  Email & Password</h4>
                                <div class="box-body">
                                    <div class="col-md-6" style="padding-left: 0;">
                                        <div class="form-group ">
                                            <label>Email <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="email" value="{{staff_data.user_email}}" placeholder="Enter The Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="padding-right: 0;">
                                        <div class="form-group ">
                                            <label>Password <span style="color:red;">*</span></label>
                                            <input type="text" name="Password" value="{{staff_data.password}}" class="form-control" placeholder="Enter The Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button ng-if="Staff.actionspinner" disabled type="button" class="btn btn-primary" data-dismiss="modal"> <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> Submit</button>
                    <input ng-if="!Staff.actionspinner" type="submit" class="btn btn-primary" name="Submit" value="Submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </form>

</div>

<script>
    $(document).ready(function() {
        $(".add1").click(function() {
            var total_element = $(".element1").length;
            var lastid = $(".element1:last").attr("id");
            var split_id = lastid.split("_");
            var nextindex = Number(split_id[1]) + 1;
            var max = 8;
            if (total_element < max) {
                $(".element1:last").after('<div class="row element1" id="div_1' + nextindex + '"></div>');
                $("#div_1" + nextindex).append(
                    '<div class="col-md-9 form-group" style="padding-left:0px;">' +
                    '<input type="file" name="document[]" multiple ></div>' +
                    '<div class="col-md-1 form-group" style="padding-left:0px;">' +
                    '<i class="fa fa-times remove"  id="remove_' + nextindex + '" ></i> </div>');
            }
        });
        // Remove element
        $('.fileinput1').on('click', '.remove', function() {
            var id = this.id;
            var split_id = id.split("_");
            var deleteindex = split_id[1];
            $("#div_1" + deleteindex).remove();
        });



        function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#blah1').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imgInp1").change(function() {
  readURL(this);
});
});
</script>