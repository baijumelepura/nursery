// var app = angular.module('globalhorizon', []);
//  app.controller('nursery', function($scope,$compile) { });


 function datatable(){


        $('#example1').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                   'url':base_url+'Webapp/Nursery/all_nursery',
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $('td:eq(0)', nRow).css('display','none');
     $('td:eq(1)', nRow).html((+iDisplayIndex+1));
    $('td:eq(8)', nRow).html( htmlpopup(aData));
    if(aData.request_viewed == "0" ){
         $('td', nRow).css('background-color', 'rgba(101, 190, 199, 0.14)' );
         $('td:eq(1)', nRow).html((iDisplayIndex+1)+' <i class="fa fa-bell" style="color:#3378b3" aria-hidden="true"></i>');   
        
        }
    if(aData.is_active == "0" ){$('td', nRow).css('background-color', '#f2dede' ); }
    },'columns': [
                { data: 'school_id' },
                { data: 'school_id' },
                { data: 'school_name' },
                { data: 'school_email' },
                { data: 'contact_name' },
                { data: 'contact_email' },
                { data: 'contact_phone' },
                { data: 'created_date' },
                { data: 'created_date' },
            ],
            "order": [[ 0, "desc" ]],
              "columnDefs": [
              { 'bSortable': false,
             'aTargets': [1,7]}],});
    }
   function htmlpopup(aData) {
    if(aData.is_active==0){var act=Active; var color="btn-info"; }else{ var act=Deactive; var color="btn-warning";}
        var el ='<div class="btn-group" style="width: 63px;">'+
        '<button type="button" class="btn btn-info btn-xs" onclick="request_viewed('+aData.school_id+')"  data-toggle="modal" data-target="#myModal_'+aData.school_id+'">'+View+'</button>'+
        ' <button type="button" class="btn btn-info btn-xs 	dropdown-toggle" data-toggle="dropdown">'+
        ' <span class="caret"></span>'+
        '<span class="sr-only"></span>'+
        '</button>'+
        '<ul class="dropdown-menu" style="margin:2px 0px 0px -98px !important" role="menu">'+
        '<li><a style="cursor: pointer;"  onclick="active('+aData.school_id+','+aData.is_active+')">'+act+'</a></li>'+
        '<li class="divider"></li>'+
        '<li><a href="'+base_url+'nursery/edit/'+aData.enc_id+'" >'+Edit+'</a></li>'+

        '<li class="divider"></li>'+
        '<li><a style="cursor: pointer;" onclick="Nurserydelete('+aData.school_id+')">'+Delete+'</a></li>'+
        '</ul>'+
        '</div>'+
        '<div id="myModal_'+aData.school_id+'" class="modal fade " role="dialog">'+
        ' <div class="modal-dialog  modal-lg">'+
        '<div class="modal-content ">'+
        ' <div class="modal-header ">'+
        '<button type="button" onclick="RefreshData()" class="close" data-dismiss="modal">&times;</button>'+
        ' <h4 class="modal-title ">'+Nursery_details+'</h4>'+
        ' </div>'+
        ' <div class="modal-body">'+
        '<div class="row">'+
        ' <div class="col-md-6">'+
        ' <div class="box box-info">'+
        ' <div class="box-header">'+
        '<h3 class="box-title"> <i class="fa fa-university" aria-hidden="true"></i>'+Nursery_details+'</h3>'+
        ' </div>'+
        ' <div class="box-body no-padding">'+
        ' <table class="table">'+
        ' <tbody>'+
        ' <tr>'+
        ' <td><b>'+Name+'</b></td>'+
        ' <td>'+aData.school_name+'</td>'+
        ' </tr>'+
        ' <tr>'+
        '<td><b>'+Email+'</b></td>'+
        ' <td>'+aData.school_email+'</td>'+
        ' </tr>'+
        ' <tr>'+
        ' <td><b>'+Phone+'</b></td>'+
        ' <td>'+aData.school_phone+'</td>'+
        ' </tr>'+
        ' <tr>'+
        ' <td><b>'+Country+'</b></td>'+
        ' <td>'+aData.name+'</td>'+
        ' </tr>'+
        ' <tr>'+
        ' <td><b>'+City+'</b></td>'+
        ' <td>'+aData.school_city+'</td>'+
        ' </tr>'+
        ' <tr>'+
        ' <td><b>'+Website+'</b></td>'+
        ' <td><a target="_blank" href='+aData.school_website+'>'+aData.school_website+'</a></td>'+
        ' </tr>'+
        ' <tr>'+
        ' <td><b>'+Logo+'</b></td>'+
        ' <td><a target="_blank" href='+aData.school_logo+'>'+aData.school_logo+'</a></td>'+
        ' </tr>'+
        '  <tr>'+
        '  <td><b>'+Address+'</b></td>'+
        ' <td>'+aData.school_address+'</td>'+
        '  </tr>'+
        ' </tbody>'+
        '  </table>'+
        '  </div>'+
        '  </div>'+
        ' </div>'+
        ' <div class="col-md-6">'+
        '<div class="box box-info">'+
        ' <div class="box-header">'+
        '<h3 class="box-title"><i class="fa fa-user"></i>'+Contact_details+'</h3>'+
        '</div>'+
        ' <div class="box-body no-padding">'+
        '<table class="table">'+
        '<tbody>'+
        '<tr>'+
        '<td><b>'+Name+'</b></td>'+
        '<td>'+aData.contact_name+'</td>'+
        '</tr>'+
        '<tr>'+
        '<td><b>'+Phone+'</b></td>'+
        '<td>'+aData.contact_phone+'</td>'+
        '</tr>'+
        '<tr>'+
        '<td><b>'+Mobile+'</b></td>'+
        '<td>'+aData.contact_mobile+'</td>'+
        '</tr>'+
        '<tr>'+
        '<td><b>'+Email+'</b></td>'+
        '<td>'+aData.contact_email+'</td>'+
        '</tr>'+
        
        '<tr>'+
        '<td><b>'+Position+'</b></td>'+
        '<td>'+aData.contact_position+'</td>'+
        ' </tr>'+
        '</tbody>'+
        '</table>'+
        '</div>'+
        '</div>'+
        '<div class="box box-info">'+
        '<div class="box-header">'+
        '<h3 class="box-title"><i class="fa fa-user-secret"></i> '+Administrator+'</h3>'+
        '</div>'+
        '<div class="box-body no-padding">'+
        '<table class="table">'+
        ' <tbody>'+
        ' <tr>'+
        '<td><b>'+Email+'</b></td>'+
        '<td>'+aData.email+'</td>'+
        '</tr>'+
        '</tbody></table>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '<div class="modal-footer">'+
        '<button type="button" class="btn '+color+'" onclick="active('+aData.school_id+','+aData.is_active+')">'+act+'</button>'+
        '<button type="button" class="btn btn-default" onclick="RefreshData()" data-dismiss="modal">'+Close+'</button>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
        return el;
      };
function request_viewed(id){
    // $('#myModal_'+id).modal('hide');
   $.post(base_url+'Webapp/Nursery/request_viewed',{number:id}, function(data, status){ });
}
function RefreshData(){
    $('#example1').DataTable().ajax.reload(null, false); 
}
function Nurserydelete(id){
if(confirm("Are you sure you want to delete this item ?")){
    $.post(base_url+'Webapp/Nursery/delete',{number:id}, function(data, status){ 
        if(data){
           $('.success_msg').show();
        }
        $('#example1').DataTable().ajax.reload(null, false); 
        setTimeout(function(){
            $('.msg').hide();
        },2000);
    });
}}
function active(id,aData){
 if(aData==0){var act="activate"; }else{ var act="deactivate"; }
    if(confirm("Are you sure you want to "+act+" this item ?")){
        $('#myModal_'+id).modal('hide');
        $.post(base_url+'Webapp/Nursery/Action',{'is_active':aData,'number':id}, function(data, status){ 
            if(data){
                (aData == 0) ? $('.success_msg_active').show() : $('.success_msg_deactive').show();
            }
             $('#example1').DataTable().ajax.reload(null, false); 
            setTimeout(function(){
                $('.msg').hide();
            },2000);
        });
    }
}
datatable();