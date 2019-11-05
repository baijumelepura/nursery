<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-users"></i>  Users
        <span ng-if="userdetails.length > 0 "> - {{userdetails[0].user_role_name}}</span>         
         </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                <tr ng-repeat="users in userdetails">
                  <td>{{$index+1}}</td>
                  <td>{{users.first_name}} {{users.last_name}}</td>
                  <td><a href="<?=site_url();?>" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                </tr>
              </tbody>
            </table>
            <span ng-if="userdetails.length == 0 ">No data..!</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>