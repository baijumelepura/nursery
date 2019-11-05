
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg ">
    
      <!-- Modal content-->
      <div class="modal-content "   style="background-color:{{(userdetails.user.is_active == '0' ) ? 'rgb(242, 222, 222)':''}}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> <i class="fa fa-user"></i> Staff details</h4>
        </div>
        <div class="modal-body" style="min-height: 69px;">

        <div ng-cloak ng-if="!Staff.staffviewspinner" class="col-xs-12 col-md-12" style="text-align: center;" >
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> Loading ...
        </div>

<div class="row" ng-if="Staff.staffviewspinner">
<div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box-widget widget-user-2" >
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class=" widget-user-header ">
              <div class="widget-user-image">
              <img  ng-if="userdetails.user.profile_pic"class="img-circle" src="{{userdetails.user.profile_pic}}" alt="">
              <img ng-if="!userdetails.user.profile_pic" class="img-circle" src="{{Staff.base_url}}assets/img/profilepic.png" alt="">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username" style="color:black;">{{userdetails.user.first_name}}  {{userdetails.user.last_name}}</h3>
              <h5 class="widget-user-desc" style="color:black;">{{userdetails.user.designation}}</h5>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>  
    <div class="col-md-6">
            <div class="box-body no-padding">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><b>First Name</b></td>
                            <td>{{userdetails.user.first_name}}</td>
                        </tr>
                        <tr>
                            <td><b>DOB</b></td>
                            <td>{{userdetails.user.dob}}</td>
                        </tr>
                        <tr>
                            <td><b>City </b></td>
                            <td>{{userdetails.user.city}}</td>
                        </tr>
                        <tr>
                            <td><b>Phone </b></td>
                            <td>{{userdetails.user.mobile_number}}</td>
                        </tr>
                        <tr>
                            <td><b>Designation </b></td>
                            <td>{{userdetails.user.designation}}</td>
                        </tr>
                        <tr>
                            <td><b>Join Date </b></td>
                            <td>{{userdetails.user.join_date}}</td>
                        </tr>
                        <tr>
                            <td><b>Address </b></td>
                            <td>{{userdetails.user.address}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="col-md-6">

            <div class="box-body no-padding">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><b>Last Name</b></td>
                            <td>{{userdetails.user.last_name}}</td>
                        </tr>
                        <tr>
                            <td><b>Country</b></td>
                            <td>{{userdetails.user.name}}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>{{userdetails.user.email}}</td>
                        </tr>
                        <tr>
                            <td><b>Created Date</b></td>
                            <td>{{userdetails.user.created_date}}</td>
                        </tr>
                        
                        <tr>
                            <td><b>About </b></td>
                            <td>{{userdetails.user.about}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>  
           </div>
         </div>
      </div>
        <div class="modal-footer">
        <button type="button" ng-if="userdetails.user.is_active == 0" class="btn btn-success" ng-click="active(userdetails.user.user_id,1,Staff.school_id)">
          <i ng-if="Staff.actionspinner" class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>  <i class="fa fa-check" aria-hidden="true"></i> Active</button>
        <button type="button" ng-if="userdetails.user.is_active == 1" class="btn btn-warning" ng-click="active(userdetails.user.user_id,0,Staff.school_id)">  
          <i ng-if="Staff.actionspinner" class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> <i class="fa fa-ban"></i> Deactive</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
