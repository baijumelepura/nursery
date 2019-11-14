app.controller('ListController', function($scope, $http,Logs) {

    $scope.init = function() {
        $scope.currentPage = 1;
        $scope.pageSize = 8;
        $scope.AllStaff = [];
        $scope.userdetails = {};
        $scope.staff_data = {};
        $scope.Staff = {'spinner' : false,
                       'edit_roleid':0,
                       'school_id':0,
                       'dataload':false,
                       'staffviewspinner' : false,
                       'base_url':base_url,
                       'actionspinner':false,
                       'EditSpinner':false,
                        'userID':-1};
                       
        $scope.validationOptions = {
                        rules: {
                            fname: {required: true,minlength:3,maxlength:25 },
                            Role:{required: true},
                            jobType:{required: true},
                            lname: {required: true},
                            city : {required: true},
                            Designation: {required: true},
                            Address: {required: true},
                            country: {required: true},
                            Contact: {required:true,minlength:10,maxlength:15},
                            Registerdate: {required: true},
                            About: {required: true},
                            email: {required: true,email:true},
                            Password:{required: true,minlength:6,maxlength:15},
                        }}
    }
    $scope.register = function (form) {
        if(form.validate()) {
            $scope.Staff.actionspinner = true;
            let  form_data = new FormData();      
            let  file_obj = document.getElementById('imgInp').files;
            form_data.append('ProfilePic', file_obj[0]);
              $('#registerform').serializeArray().forEach(function(entry) { form_data.append(entry.name, entry.value); });
              $('.fileinput').find('input[type="file"]').each(function(entry,value){
                if(value.files != undefined && value.files.length != 0){ form_data.append('document[]', value.files[0]);}
              });
            $http.post(base_url + 'Staff/Staff/AddStaff/'+$scope.Staff.school_id, form_data, config).then(function (response) {
              if(response.data.status== true){
                $scope.AllStaff = [];
                for (let elem in response.data.data) {
                    $scope.AllStaff.push(response.data.data[elem]);
                }
                $scope.resetstaffadd();
                Logs.success("  User has been Added");
              }else{
                Logs.error(response.data.error.errorMsg);
              }
              $scope.Staff.actionspinner = false;
            }, function (response) {
                $scope.Staff.actionspinner = false;
                Logs.error("  Some error has occurred!");
            });
        }
    }
    $scope.register_edit = function (form) {
        if(form.validate()) {
            $scope.Staff.actionspinner = true;
            let  form_data = new FormData();      
            let  file_obj = document.getElementById('imgInp1').files;

            form_data.append('ProfilePic', file_obj[0]);
              $('#registerform_edit').serializeArray().forEach(function(entry) { form_data.append(entry.name, entry.value); });
              $('.fileinput1').find('input[type="file"]').each(function(entry,value){
                if(value.files != undefined && value.files.length != 0){ form_data.append('document[]', value.files[0]);}
              });
              form_data.append('UserID',$scope.Staff.userID);
            $http.post(base_url + 'Staff/Staff/EditStaff/'+$scope.Staff.school_id, form_data, config).then(function (response) {
                $scope.Staff.actionspinner = false;
            if(response.data.status== true){
                $scope.AllStaff = [];
                for (let elem in response.data.data) {
                    $scope.AllStaff.push(response.data.data[elem]);
                }
                Logs.success("  User has been Updated");
            }else{
                Logs.error(response.data.error.errorMsg);
              }
            }, function (response) {
                $scope.Staff.actionspinner = false;
                Logs.error("  Some error has occurred!");
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
       
    if(id == 1){ Logs.success("  User account has been activated");}
    if(id == 0){ Logs.warning("  User account has been deactivated");}
    }, function(response) {
        $scope.Staff.actionspinner = false;
        Logs.error("   Some error has occurred!");
    });
  }}

$scope.get_user_data = function(id){
    $scope.Staff.userID = id;
    $('#myModaledit').modal('show');
    $http.post(base_url + 'Staff/Staff/get_user_data/', {'id': id}, config).then(function (response) {
       if(response.data.status){
        $scope.Staff.EditSpinner = true;
        $scope.staff_data = response.data.data.users;
        $scope.staff_data.doc = response.data.data.doc;
        $('#blah1').attr('src',"");
        $('.select_country').val(response.data.data.users.user_country).trigger('change')
        $('#Role option[value='+response.data.data.users.role+']').attr('selected','selected');
        $('#jobType option[value='+response.data.data.users.job_type+']').attr('selected','selected');
        (response.data.data.users.profile_pic != null) ? $('#blah1').attr('src',response.data.data.users.profile_pic) : $('#blah1').attr('src',$scope.Staff.base_url+'assets/img/profilepic.png');
       }else{
        Logs.error("  Some error has occurred!");
       }
    }, function (response) {
        $scope.Staff.EditSpinner = true;
        Logs.error("  Some error has occurred!");
    });

}

$scope.document = function(data){
    doc = {name : '' ,reduce:''};
if(data !='' && data != undefined && data != null ){
  doc.name = data.split('/')[data.split('/').length - 1];
  doc.reduce = (doc.name.length > 35) ?  doc.name.substring(0, 35)+' ..' : doc.name.substring(0, 35);
}
return doc;
}
$scope.document_delete = function(id){
  if(confirm("Are you sure you want to delete this document ?")){
    $http.post(base_url + 'Staff/Staff/document_delete/',{'id':id}, config).then(function (response) {
        if(response.data.status){
            $scope.staff_data.doc = response.data.data.doc;
            Logs.success("  Record removed successfully");
          }else{
            Logs.error("  Some error has occurred!");
           }
    }, function (response) {
        $scope.Staff.actionspinner = false;
        Logs.error("  Some error has occurred!");
    });
}}
 

$scope.delete_Staff = function(id){
if(confirm("Are you sure you want to delete this user ?")){
 $http.post(base_url + 'Staff/Staff/delete_staff/'+$scope.Staff.school_id,{"id":id}).then(function(response) {
            $scope.AllStaff = [];
            for (let elem in response.data.data) {
                $scope.AllStaff.push(response.data.data[elem]);
            }
            Logs.success("  Staff removed successfully!");
        }, function(response) {
            Logs.error("  Some error has occurred!");
        });
}
}
    $scope.init();
});

app.directive('tooltip', function(){
    return {
        restrict: 'A',
        link: function(scope, element, attrs){
            element.hover(function(){
                // on mouseenter
                element.tooltip('show');
            }, function(){
                // on mouseleave
                element.tooltip('hide');
            });
        }
    };
});

