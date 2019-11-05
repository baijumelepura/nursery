app.controller('ListController', function($scope, $http) {

    $scope.init = function() {
        $scope.currentPage = 1;
        $scope.pageSize = 8;
        $scope.AllStaff = [];
        $scope.userdetails = {};
        $scope.Staff = {
                       'spinner' : false,
                       'edit_roleid':0,
                       'school_id':0,
                       'dataload':false,
                       'staffviewspinner' : false,
                       'base_url':base_url,
                       'actionspinner':false
                        };
      
    }
    $scope.validationOptions = {
        rules: {
            fname: {required: true,minlength:3,maxlength:25 },
            // lname: {required: true},
            // city : {required: true},
            // Designation: {required: true},
            // Address: {required: true},
            // country: {required: true},
            // Contact: {required:true,minlength:10,maxlength:15},
            // Registerdate: {required: true},
            // About: {required: true},
            // email: {required: true,email:true},
            // Password:{required: true,minlength:6,maxlength:15},
        }}





    $scope.register = function (form) {
     
        if(form.validate()) {
            let  form_data = new FormData();      
            let  file_obj = document.getElementById('imgInp').files;
            form_data.append('ProfilePic', file_obj[0]);
              $('#registerform').serializeArray().forEach(function(entry) { form_data.append(entry.name, entry.value); });
              $('.fileinput').find('input[type="file"]').each(function(entry,value){
                if(value.files != undefined && value.files.length != 0){ form_data.append('document[]', value.files[0]);}
              });


        $http.post(base_url + 'Staff/Staff/AddStaff/', form_data, config).then(function (response) {
            $scope.resetstaffadd();
        }, function (response) {
           
        });


        }
    }
    
    $scope.resetstaffadd =function(){
       $('#myModalAdd').find("input[type=text], textarea,input[type=file],input[type=email]").val("");
       $('#blah').attr('src',$scope.Staff.base_url+'assets/img/profilepic.png');

    }


    $scope.get_staffs = function(id) {
        $scope.Staff.school_id = id;
        $http.get(base_url + 'Staff/Staff/get_allstaff/' + id).then(function(response) {
          $scope.Staff.dataload=true;   
            for (let elem in response.data) {
                $scope.AllStaff.push(response.data[elem]);
            }
        }, function(response) {
          $scope.Staff.dataload=true;
        });
    }
    $scope.getStaffdetails = function(id) {
        $('#myModal').modal('show');
        $scope.Staff.staffviewspinner = false;
        $http.get(base_url + 'Staff/Staff/getStaffdetails/' + id).then(function(response) {
            $scope.Staff.staffviewspinner = true;
            $scope.userdetails = response.data;           
        }, function(response) {
            $scope.Staff.staffviewspinner = false;
        });
    }

    $scope.active =function(uid,id,school_id){
     
    var confirms = "Are you sure you want to active this user ?";
    if(id==0){
        var confirms = "Are you sure you want to deactive this user ?";
    }
    
    if(confirm(confirms)){
        $scope.Staff.actionspinner = true;
    $http.post(base_url + 'Staff/Staff/active/'+uid+'/'+school_id,{"id":id}).then(function(response) {
        $scope.Staff.actionspinner = false;
        $scope.AllStaff=[];
        for (let elem in response.data.allstaff) {
            $scope.AllStaff.push(response.data.allstaff[elem]);
        }
        $scope.userdetails = response.data.staffdetails; 
       
    if(id == 1){
        $.growl.notice({
            title: "<i class='fa fa-check'></i>  Success .. !",
            message: "  User account has been activated",
            size: "large",
            location: "tr"
        });
       }
    if(id == 0){
        $.growl.warning({
            title: "<i class='fa fa-check'></i>  Success .. !",
            message: "  User account has been deactivated",
            size: "large",
            location: "tr"
        });
    }
    }, function(response) {
        $scope.Staff.actionspinner = false;
        $.growl.error({
            title: "<i class='fa fa-warning'></i>  warning .. !",
            message: "Some error has occurred!",
            location: "tr"
        });
    });
    }





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