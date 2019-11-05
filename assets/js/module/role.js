app.controller('ListController', function($scope, $http) {

    $scope.init = function() {
        $scope.currentPage = 1;
        $scope.pageSize = 8;
        $scope.Allroles = [];
        $scope.userdetails = {};
        $scope.Role = {
                       'spinner' : false,
                       'edit_roleid':0,
                       'school_id':0,
                       'dataload':false
                        };
      
    }

    $scope.get_roles = function(id) {
        $scope.Role.school_id = id;
        $http.get(base_url + 'Roles/Roles/get_roles/' + id).then(function(response) {
          $scope.Role.dataload=true;
            for (let elem in response.data) {
                $scope.Allroles.push(response.data[elem]);
            }
        }, function(response) {
          $scope.Role.dataload=true;
        });
    }


    $scope.getuserdetails = function(id) {
        $http.get(base_url + 'Roles/Roles/getuserdetails/' + id).then(function(response) {
            $scope.userdetails = response.data;
            $('#exampleModalCenter').modal('show');
        }, function(response) {});
    }


    $scope.add_role = function(id) {
        $scope.Role.spinner = true;
        let role = $('.roletext').val();
        if (role == '') {
            $('.roletext').parent().addClass('has-error');
            $('.roletext').next('span').remove();
            $('.roletext').after('<span class="help-block">The role field is required.</span>');
            $scope.Role.spinner = false;
            return false;
        } else {
            $('.roletext').parent().removeClass('has-error');
            $('.roletext').next('span').remove();
        }
        let permission = [];
        $(".perid").each(function() {
            if ($(this).prop('checked') == true) {
                permission.push($(this).val());
            }
        });
        $http.post(base_url + 'Roles/Roles/add_role/' + id, {
            "role": role,
            'permission': permission
        }).then(function(response) {
            $scope.Role.spinner = false;
             $scope.Allroles = [];
            for (let elem in response.data) {
                $scope.Allroles.push(response.data[elem]);
            }
          
            $.growl.notice({
                title: "<i class='fa fa-check'></i>  Success .. !",
                message: "Role added successfully",
                size: "large",
                location: "tc"
            });

            $scope.reset();
        }, function(response) {
            $scope.Role.spinner = false;
           
            $.growl.error({
                title: "<i class='fa fa-warning'></i>  warning .. !",
                message: "Some error has occurred!",
                location: "tc"
            });
            
        });

    }

    $scope.reset = function() {
        $(".perid").each(function() {
            $(this).prop('checked', false);
        });
        $('.roletext').val("");
    }

    $scope.reset = function() {
        $(".perid").each(function() {
            $(this).prop('checked', false);
        });
        $('.roletext').val("");
    }

    $scope.reset_edit = function() {
        $(".perid_edit").each(function() {
            $(this).prop('checked', false);
        });
        $('.roletext_edit').val("");
    }

    $scope.EditRole = function(id) {
        $scope.Role.edit_roleid = id;
        $scope.reset_edit();
        $('#myModalEdit').modal('show');
        $http.get(base_url + 'Roles/Roles/get_permission/' + id).then(function(response) {
            if (response.data) {
                if (response.data.all_role_id.length > 0) {
                    for (let elem in response.data.all_role_id) {
                        $('.perid_ed' + response.data.all_role_id[elem]).prop('checked', true);
                    }
                }
                $('.roletext_edit').val(response.data.user_role_name);
            }
        }, function(response) {});
    }

    $scope.updaterole = function() {

        $scope.Role.spinner = true;
        let role = $('.roletext_edit').val();
        if (role == '') {
            $('.roletext_edit').parent().addClass('has-error');
            $('.roletext_edit').next('span').remove();
            $('.roletext_edit').after('<span class="help-block">The role field is required.</span>');
            $scope.Role.spinner = false;
            return false;
        } else {
            $('.roletext_edit').parent().removeClass('has-error');
            $('.roletext_edit').next('span').remove();
        }
        let permission = [];
        $(".perid_edit").each(function() {
            if ($(this).prop('checked') == true) {
                permission.push($(this).val());
            }
        });
        $http.post(base_url + 'Roles/Roles/update_role/' + $scope.Role.edit_roleid + '/' + $scope.Role.school_id, {
            "role": role,
            'permission': permission
        }).then(function(response) {
            $scope.Role.spinner = false;
            $scope.Allroles = [];
            for (let elem in response.data) {
                $scope.Allroles.push(response.data[elem]);
            }
            $.growl.notice({
                title: "<i class='fa fa-check'></i>  Success .. !",
                message: "Role Updated successfully",
                size: "large",
                location: "tc"
            });
            $scope.reset();
        }, function(response) {
            $scope.Role.spinner = false;
            $.growl.error({
                title: "<i class='fa fa-warning'></i>  warning .. !",
                message: "Some error has occurred!",
                location: "tc"
            });
        });
    }


$scope.delete_rule = function(id){
if(confirm("Are you sure you want to delete this item ?")){
 $http.post(base_url + 'Roles/Roles/delete_rule/'+$scope.Role.school_id,{"id":id}).then(function(response) {
            $scope.Allroles = [];
            for (let elem in response.data) {
                $scope.Allroles.push(response.data[elem]);
            }
            $.growl.warning({
                title: "<i class='fa fa-check'></i>  Success .. !",
                message: "  Record removed successfully",
                size: "large",
                location: "tr"
            });
        }, function(response) {
            $.growl.error({
                title: "<i class='fa fa-warning'></i>  warning .. !",
                message: "Some error has occurred!",
                location: "tr"
            });
        });
}

}







    $scope.init();
});