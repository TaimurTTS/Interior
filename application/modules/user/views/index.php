<!DOCTYPE html>

<html>

<head>

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

  <meta charset="utf-8" />

  <title>Simple Website</title>

  <link rel="apple-touch-icon" href="pages/ico/60.png">

  <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">

  <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">

  <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
  <link href="<?php echo base_url(); ?>assets/dashboard/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/dashboard/css/master.css" rel="stylesheet" type="text/css" class="main-stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/aq-stylesheet.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <style type="text/css">
  .show-all {
      cursor: pointer;
    }
    h2 {
      text-align: center;
      padding: 20px 0;
    }
    .table-bordered {
      border: 1px solid #ddd !important;
    }
    table caption {
      padding: .5em 0;
    }
    @media screen and (max-width: 767px) {
      table caption {
        display: none;
      }
    }
    .p {
      text-align: center;
      padding-top: 140px;
      font-size: 14px;
    }
    .hide {
      display: none
    }
  </style>



</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="javascript:;">[WebSiteName HERE]</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active companyTabli"><a href="javascript:;" class="companyTab"> Company</a></li>
        <li class="computerTabli"><a href="javascript:;" class="computerTab">Computer</a></li>
        <li class="appTabli"><a href="javascript:;" class="appTab">Application</a></li>
      </ul>
    </div>
  </nav>
  <div id="companyTab">
    <h2>Company List</h2>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-bordered table-hover">
              <caption class="text-center">
                You can manage companies <br />
                <button class="btn btn-primary" data-target="#companyModal" data-toggle="modal" type="button" id="aCompany">Add Company</button>
              </caption>
              <thead>
                <tr>
                  <th>Name</th>
                  <th data-priority="1">Domain Name</th>
                  <th data-priority="1">Source</th>
                  <th data-priority="1">SourcePath</th>
                  <th data-priority="1">Username</th>
                  <th data-priority="2">Edit</th>
                  <th data-priority="3">Status</th>
                </tr>
              </thead>
              <tbody class="companyData">
            </tbody>
            <tfoot class="companyErrorDiv">
              <tr>
                <td class="text-center companyError" colspan="7"></td>
              </tr>
            </tfoot>
          </table>
        </div><!--end of .table-responsive-->
      </div>
    </div>
  </div>
</div>
<!-- COMPUTER LIST -->
<div id="computerTab" class="hide">
  <h2>Computer List</h2>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive" data-pattern="priority-columns">
          <table class="table table-bordered table-hover">
            <caption class="text-center">
            <span>Search by Nam: <input type="text" id="search" placeholder="Search Here" class="inpt" style="width: auto"></input></span> <span><button class=" searchComputer label label-primary"> Search</button></span> <br/><br/>
            <span>Search by Company: 
            <select id="companySearch">
                <?php 
                foreach ($company as $c => $value) {
                  echo '<option value="'.$value['id'].'" id="v-'.$value['id'].'">'.$value['name'].'</option>';
                }
                ?>
              </select>
            </span> <span><button class=" searchCompany label label-primary"> Search</button></span> <br/><br/>
            <h2 style="font-weight: bold" onclick="showAllComputer()" class="show-all label label-info">Show All</h2> <br/>
              You can manage computers  <br/ >
              <button class="btn btn-primary" data-target="#computerModal" data-toggle="modal" type="button">Add Computer</button>
            </caption>
            <thead>
              <tr>
                <th>Host Name</th>
                <th data-priority="1">Serial Name</th>
                <th data-priority="1">Model</th>
                <th data-priority="2">Company Name</th>
                <th data-priority="3">Domain Joined</th>
                <th data-priority="4">Application(s)</th>
                <th data-priority="5">Edit</th>
                <th data-priority="6">Status</th>
              </tr>
            </thead>
            <tbody class="computerData">
            </tbody>
            <tfoot class="computerErrorDiv">
              <tr>
                <td class="text-center computerError" colspan="8"></td>
              </tr>
            </tfoot>
          </table>
        </div><!--end of .table-responsive-->
      </div>
    </div>
  </div>
</div>
<!-- APP LIST -->
<div id="appTab" class="hide">
  <h2>Application List</h2>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive" data-pattern="priority-columns">
          <table class="table table-bordered table-hover">
            <caption class="text-center">
              You can manage applications <br/>
              <button class="btn btn-primary" data-target="#applicationModal" data-toggle="modal" type="button">Add Application</button>
            </caption>
            <thead>
              <tr>
                <th>Name</th>
                <th data-priority="2">Link</th>
                <th data-priority="3">Command</th>
                <th data-priority="4">Edit</th>
                <th data-priority="5">Status</th>
              </tr>
            </thead>
            <tbody class="applicationData">
            </tbody>
            <tfoot class="applicationErrorDiv">
              <tr>
                <td class="text-center appError" colspan="7"></td>
              </tr>
            </tfoot>
          </table>
        </div><!--end of .table-responsive-->
      </div>
    </div>
  </div>
</div>
<!-- Company Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="companyModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span> <span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Company</h4>
      </div><!-- Modal Body -->
      <div class="modal-body">
        <form class="form-horizontal" id="companyForm" name="companyForm" role="form">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="companyName">Company Name</label>
            <div class="col-sm-10">
              <input class="form-control" id="companyName" placeholder="Company Name" type="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="domainName">Domain Name</label>
            <div class="col-sm-10">
              <input class="form-control" id="domainName" placeholder="Domain Name" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="companySource">Source</label>
            <div class="col-sm-10">
              <input type="radio" name="source" value="http"> HTTP
              <input type="radio" name="source" value="smb"> SMB
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="sourcePath">Source Path</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="sourcePath" placeholder="Source Path">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="userName">Username</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="userName" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="password">Password</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="password"></input>
            </div>
          </div>
        </form>
      </div><!-- Modal Footer -->
      <div class="modal-footer">
        <div id="companyErrorDiv"></div><button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary saveCompany" type="button">Save</button> <input id="actionType" type="hidden" value="0">
      </div>
    </div>
  </div>
</div>

<!-- APPLICATION MODAL  -->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="applicationModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span> <span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Company</h4>
      </div><!-- Modal Body -->
      <div class="modal-body">
        <form class="form-horizontal" id="appForm" name="appForm" role="form">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="Name">Name</label>
            <div class="col-sm-10">
              <input class="form-control" id="appName" placeholder="Application Name" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="link">Link</label>
            <div class="col-sm-10">
              <input class="form-control" id="appLink" placeholder="Link" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="command">Command</label>
            <div class="col-sm-10">
              <input class="form-control" id="appCommand" placeholder="Command" type="text">
            </div>
          </div>
        </form>
      </div><!-- Modal Footer -->
      <div class="modal-footer">
        <div id="appErrorDiv"></div><button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary saveApplication" type="button">Save</button> <input id="appActionType" type="hidden" value="0">
      </div>
    </div>
  </div>
</div>

<!-- COMPUTER MODAL  -->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="computerModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span> <span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Computer</h4>
      </div><!-- Modal Body -->
      <div class="modal-body">
        <form class="form-horizontal" id="computerForm" name="computerForm" role="form">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="Name">Name</label>
            <div class="col-sm-10">
              <input class="form-control" id="compName" placeholder="Computer Name" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="sNo">Serial Number</label>
            <div class="col-sm-10">
              <input class="form-control" id="compSno" placeholder="Serial Number" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="model">Model</label>
            <div class="col-sm-10">
              <input class="form-control" id="compModel" placeholder="Model" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="domainJoined">Is Domain Joined ?</label>
            <div class="col-sm-10">
              <input type="checkbox" id="domainJoined">  </input>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="companyJoined">Company Joined</label>
            <div class="col-sm-10">
              <select id="companyJoined">
                <?php 
                foreach ($company as $c => $value) {
                  echo '<option value="'.$value['id'].'" id="v-'.$value['id'].'">'.$value['name'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="applications">Application(s)</label>
            <div class="col-sm-10">
              <?php 
              foreach ($application as $app => $value) {
                echo '<input type="checkbox"  class="type3Check" id="'.$value['id'].'" data-name="'.$value['name'].'" value="'.$value['id'].'" name="applicationAssigned">'.$value['name'].'</input>';
              } 
              ?>
            </div>
          </div>
        </form>
      </div><!-- Modal Footer -->
      <div class="modal-footer">
        <div id="compErrorDiv"></div><button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary saveComputer" type="button">Save</button> <input id="compActionType" type="hidden" value="0">
      </div>
    </div>
  </div>
</div>
</body>


<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>


<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.js"></script>

<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>



<script>
  $( document ).ready(function() {
    const storage = localStorage.getItem('tab')
    if(storage) {
      if(storage == 1) {
        $('#appTab').addClass('hide')
        $('#computerTab').addClass('hide')
        $('#companyTab').removeClass('hide')

        $('.companyTabli').addClass('active');
        $('.computerTabli').removeClass('active');
        $('.appTabli').removeClass('active');
      }
      else if(storage == 2) {
        $('#companyTab').addClass('hide')
        $('#appTab').addClass('hide')
        $('#computerTab').removeClass('hide')

        $('.companyTabli').removeClass('active');
        $('.computerTabli').addClass('active');
        $('.appTabli').removeClass('active');
      } else if(storage == 3) {
        $('#companyTab').addClass('hide');
        $('#computerTab').addClass('hide');
        $('#appTab').removeClass('hide');

        $('.companyTabli').removeClass('active');
        $('.computerTabli').removeClass('active');
        $('.appTabli').addClass('active');
      }
    }  else {
      $('#appTab').addClass('hide')
      $('#computerTab').addClass('hide')
      $('#companyTab').removeClass('hide')

      $('.companyTabli').addClass('active');
      $('.computerTabli').removeClass('active');
      $('.appTabli').removeClass('active');
    }
    // localStorage.clear();
    // localStorage.setItem('tab',1);
    $('.companyErrorDiv').hide();
    $('.compErrorDiv').hide();
    $('.appErrorDiv').hide();
    let status = '';
    let isBlock = '';

    $.ajax({
      url: '<?php echo base_url(); ?>index.php/get-data',
      type: 'POST',
      dataType: 'HTML',         
      data : "1=1",
      success: function(res)
      {
        var data = $.parseJSON(res);
        if(!data.company) {
          $('.companyErrorDiv').show();
          $('.companyError').css('color', 'red');
          $('.companyError').html('No Company Found !');
        } else {
          let html = '';
          data.company.map(companyData => {
            if(companyData.status === "1") {
              isBlock = 0;
              status = '<i class="fa fa-check" aria-hidden="true"></i>';
            } else {
              isBlock = 1;
              status = '<i class="fa fa-ban" aria-hidden="true"></i>';
            }
            html += '<tr class="company'+companyData.id+' ">'
            +'<td class="companyName'+companyData.id+' ">'+companyData.name+'</td>'
            +'<td class="domainName'+companyData.id+' ">'+companyData.domain_name+'</td>'
            +'<td class="source'+companyData.id+' ">'+companyData.source+'</td>'
            +'<td class="sourcePath'+companyData.id+' ">'+companyData.source_path+'</td>'
            +'<td class="userName'+companyData.id+' ">'+companyData.user_name+'</td>'
            +'<td class="editCompany'+companyData.id+'"> <a href="javascript:;" onClick=edit(1,'+companyData.id+')> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>'
            +'<td class="hide password'+companyData.id+'">'+companyData.password+'</td>'
            +'<td> <a href="javascript:;" onClick="disable(1,'+companyData.id+','+isBlock+')">'+status+'</a></td>'
            +'</tr>';
          });
          $('.companyData').append(html);
        }
        if(!data.computer) {
          $('.computerErrorDiv').show();
          $('.computerError').css('color', 'red');
          $('.computerError').html('No Computer Found !');
        } else {
          let html = '';
          let checked = '';
          data.computer.map(compData => {
            if(compData.domain_joined == 1) {
              checked = 'checked';
            } else {
              checked = '';
            }
            if(compData.status === "1") {
              status = '<i class="fa fa-trash" aria-hidden="true"></i>';
            } else {
              status = '<i class="fa fa-ban" aria-hidden="true"></i>';
            }
            html += '<tr class="app'+compData.id+' ">'
            +'<td class="compName'+compData.id+' ">'+compData.name+'</td>'
            +'<input type="hidden"  value="'+compData.applications+'"  id="app-'+compData.id+'"  />'
            +'<td class="compSno'+compData.id+' ">'+compData.serial_number+'</td>'
            +'<td class="compModel'+compData.id+' ">'+compData.model+'</td>'
            +'<td class="compCompanyName'+compData.id+' data-uid="'+compData.company+'" ">'+compData.companyName+' <input type="hidden" value="'+compData.company+'" id="compCompanyName'+compData.id+'"></td>'
            +'<td> <input type="checkbox" value="'+compData.domain_joined+'" id="domainJoined'+compData.id+'" disabled '+checked+' >  </input> </td>'
            +'<td class="compApp'+compData.id+' ">'+compData.AppNames+'</td>'
            +'<td class="editComp'+compData.id+'"> <a href="javascript:;" onClick=edit(3,'+compData.id+')> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>'
            +'<td><a href="javascript:;" onClick="disable(3,'+compData.id+')">'+status+'</a></td>'
            +'</tr>';
          });
          $('.computerData').append(html);
        }
        if(!data.application) {
          $('.appErrorDiv').show();
          $('.appError').css('color', 'red');
          $('.appError').html('No Application Found !');
        } else {
          let html = '';
          data.application.map(appData => {
            if(appData.status === "1") {
              status = '<i class="fa fa-check" aria-hidden="true"></i>';
            } else {
              status = '<i class="fa fa-ban" aria-hidden="true"></i>';
            }
            html += '<tr class="app'+appData.id+' ">'
            +'<td class="appName'+appData.id+' ">'+appData.name+'</td>'
            +'<td class="appLink'+appData.id+' ">'+appData.link+'</td>'
            +'<td class="appCommand'+appData.id+' ">'+appData.command+'</td>'
            +'<td class="editApp'+appData.id+'"> <a href="javascript:;" onClick=edit(2,'+appData.id+')> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>'
            +'<td><a href="javascript:;" onClick="disable(2,'+appData.id+')">'+status+'</a></td>'
            +'</tr>';
          });
          $('.applicationData').append(html);
        }
        return false;
      },
      error: function(xhr, status, error)
      {
      }
    }); 
});
</script>

<script>

  /***************SAVE COMPUTER ******************/

  $('.saveComputer').click(function () {
    $('#compErrorDiv').html('');
    let domainJoined = 0;
    const compName = $('#compName').val();
    const compSno = $('#compSno').val();
    const compModel = $('#compModel').val();
    const companyJoined = $('#companyJoined').val();
    if ($('#domainJoined').is(':checked')) {
      domainJoined = 1;
    }
    const type = $('#compActionType').val();
    let application = [];
    let applicationName = [];
    let url = '';
    let id = '';
    let html = '';
    let checked = '';
    if(domainJoined == 1) {
      checked = 'checked';
    } else {
      checked = '';
    }

    $.each($("input[name='applicationAssigned']:checked"), function(){            
      application.push($(this).val());
      applicationName.push($('#'+$(this).val()).attr('data-name'));
    });
    if(!$.trim(compName)) {
      $('#compErrorDiv').html('Please Enter Computer Name');
      return false;
    }
    if(compName.length > 15) {
      $('#compErrorDiv').html('Computer Name should only contain 15 characters !');
      return false;
    }
    if(!$.trim(compSno)) {
      $('#compErrorDiv').html('Please Enter Serial Number');
      return false;
    }
    if(compSno.length > 30) {
      $('#compErrorDiv').html('Serial Number should only contain 30 characters !');
      return false;
    }
    else {
      if(type == 0) {
        url = '<?php echo base_url(); ?>save-computer';
      } else {
        url = '<?php echo base_url(); ?>edit-computer';
      }
      application = application.join(',').toString();
      applicationName = applicationName.join(',').toString();
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'HTML',         
        data : 'compName='+compName+'&compSno='+compSno+'&compModel='+compModel
        +'&applications='+application+'&domainJoined='+domainJoined
        +'&companyJoined='+companyJoined+'&id='+type,
        success: function(res)
        {
          var data = $.parseJSON(res);
          if(data.success) {
            $('#computerErrorDiv').html('')
            $('#computerModal').modal('toggle');
            $('#companyForm')[0].reset();
            $('#compActionType').val('0');
            $('.saveCompany').html('Save');
            location.reload();
            $('#companyErrorDiv').css('color','green');
            $('#companyErrorDiv').html('Company Added successfully');
            if(type == 0) {
              html = '<tr>'
              +'<td>'+compName+'</td>'
              +'<td>'+compSno+'</td>'
              +'<td>'+compModel+'</td>'
              +'<td>'+$("#companyJoined option:selected").text()+'</td>'
              +'<td> <input type="checkbox" disabled name="domainJoined" '+checked+' >  </input> </td>'
              +'<td> '+applicationName+' </td>'
              +'<td> <a href="javascript:;"> <i class="fa fa-pencil" aria-hidden="true" onClick="edit(3,'+data.data+')"></i> </a> </td>'
              +'<td><i class="fa fa-check" aria-hidden="true"></i></td>'
              +'</tr>';
              $('.computerError').html('');
              $('.computerData').append(html);
            }
            else {
              $('.compName'+type).html(compName);
              $('.compSno'+type).html(compSno);
              $('.compModel'+type).html(compModel);
              $('.compCompanyName'+type).html($("#companyJoined option:selected").text());
              if(data.data.domainJoined == 1) {
                $('#domainJoined').val(1);
                $('#domainJoined'+type).attr('checked', true);
              } else {
                $('#domainJoined').val(0);
                $('#domainJoined'+type).attr('checked', false);
              }
              $('.compApp'+type).html(applicationName);
            }
            $('#computerErrorDiv').html('')
            $('#computerModal').modal('toggle');
            $('#companyForm')[0].reset();
            $('#compActionType').val('0');
            $('.saveCompany').html('Save');
          }
        },
        error: function(xhr, status, error)
        {
        }
      });       
    }
  });

/***************SAVE COMPANY ******************/

$('.saveCompany').click(function () {
  $('#companyErrorDiv').html('');
  $('#companyErrorDiv').css('color','black');

  const companyName = $('#companyName').val();
  const domainName = $('#domainName').val();
  const userName = $('#userName').val();
  const password = $('#password').val();
  const type = $('#actionType').val();
  const source = $('input[name=source]:checked').val(); 
  const sourcePath = $('#sourcePath').val(); 

  let url = '';
  let id = '';
  let html = '';

  if(!$.trim(companyName)) {
    $('#companyErrorDiv').html('Please Enter Company Name');
    $('#companyErrorDiv').css('color','red');
    return false;
  }
  if(companyName.length > 50) {
    $('#companyErrorDiv').html('Company Name should only contain 50 characters !');
    return false;
  }
  if(!$.trim(domainName)) {
    $('#companyErrorDiv').html('Please Enter Domain Name');
    return false;
  }
  if(domainName.length > 50) {
    $('#companyErrorDiv').html('Domain Name should only contain 50 characters !');
    return false;
  }
  if(!$.trim(source) || source.length <= 0) {
    $('#companyErrorDiv').html('Please select Source');
    $('#companyErrorDiv').css('color','red');
    return false;
  }
  else {
    if(type == 0) {
      url = '<?php echo base_url(); ?>save-company';
    } else {
      url = '<?php echo base_url(); ?>edit-company';
    }
    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'HTML',         
      data : 'companyName='+companyName+'&domainName='+domainName+'&userName='+userName+
             '&password='+password+'&source='+source+'&sourcePath='+sourcePath+'&id='+type,
      success: function(res)
      {
        var data = $.parseJSON(res);
        if(data.success) {
          $('#companyErrorDiv').html('')
          $('#companyModal').modal('toggle');
          $('#companyForm')[0].reset();
          $('#actionType').val('0');
          $('.saveCompany').html('Save');
          location.reload();
          $('#companyErrorDiv').css('color','green');
          $('#companyErrorDiv').html('Company Added successfully');
          if(type == 0) {
            html = '<tr>'
            +'<td>'+companyName+'</a></td>'
            +'<td>'+domainName+'</td>'
            +'<td> <a href="javascript:;"> <i class="fa fa-pencil" aria-hidden="true" onClick="edit(1,'+data.data+')"></i> </a> </td>'
            +'<td><i class="fa fa-check" aria-hidden="true"></i></td>'
            +'</tr>';
            $('.companyError').html('');
            $('.companyData').append(html);
          }
          if(type == 1) {
            $('.companyName'+type).html(companyName);
            $('.domainName'+type).html(domainName);
          }
          $('#companyErrorDiv').html('')
          $('#companyModal').modal('toggle');
          $('#companyForm')[0].reset();
          $('#actionType').val('0');
          $('.saveCompany').html('Save');
        }
      },
      error: function(xhr, status, error)
      {
      }
    });       
  }
});

$('.saveApplication').click(function () {
  $('#appErrorDiv').html('');
  const appName    = $('#appName').val();
  const appLink    = $('#appLink').val();
  const appCommand = $('#appCommand').val();
  const type = $('#appActionType').val();
  let url = '';
  let id = '';
  let html = '';

  if(!$.trim(appName)) {
    $('#appErrorDiv').html('Please Enter Application Name');
    return false;
  }
  if(appName.length > 50) {
    $('#appErrorDiv').html('Application Name should only contain 50 characters !');
    return false;
  }
  if(!$.trim(appLink)) {
    $('#appErrorDiv').html('Please Enter Link');
    return false;
  }
  if(appLink.length > 255) {
    $('#appErrorDiv').html('Link should only contain 255 characters !');
    return false;
  }
  if(!$.trim(appCommand)) {
    $('#appErrorDiv').html('Please Enter Command');
    return false;
  }
  if(appCommand.length > 255) {
    $('#appErrorDiv').html('Command should only contain 255 characters !');
    return false;
  }
  else {
    if(type == 0) {
      url = '<?php echo base_url(); ?>save-application';
    } else {
      url = '<?php echo base_url(); ?>edit-application';
    }

    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'HTML',         
      data : 'appName='+appName+'&appLink='+appLink+'&appCommand='+appCommand+'&id='+type,
      success: function(res)
      {
        var data = $.parseJSON(res);
        if(data.success) {
          $('#applicationErrorDiv').html('');
          $('#appErrorDiv').html('');
          $('#applicationModal').modal('toggle');
          $('#appForm')[0].reset();
          $('#appActionType').val('0');
          $('.saveApplication').html('Save');
          location.reload();
          $('#appErrorDiv').css('color','green');
          $('#appErrorDiv').html('Application Added successfully');

          if(type == 0) {
            html = '<tr>'
            +'<td class="appName'+data.data+'">'+appName+'</td>'
            +'<td class="appLink'+data.data+'">'+appLink+'</td>'
            +'<td class="appCommand'+data.data+'">'+appCommand+'</td>'
            +'<td> <a href="javascript:;"> <i class="fa fa-pencil" aria-hidden="true" onClick="edit(2,'+data.data+')"></i> </a> </td>'
            +'<td><i class="fa fa-check" aria-hidden="true"></i></td>'
            +'</tr>';
            $('.appError').html('');
            $('.applicationData').append(html);
          }
          else {
            $('.appName'+type).html(appName);
            $('.appLink'+type).html(appLink);
            $('.appCommand'+type).html(appCommand);
          }
          $('#applicationErrorDiv').html('');
          $('#appErrorDiv').html('');
          $('#applicationModal').modal('toggle');
          $('#appForm')[0].reset();
          $('#appActionType').val('0');
          $('.saveApplication').html('Save');
        }
      },
      error: function(xhr, status, error)
      {
      }
    });       
  }
});


/* EDIT */

function edit(type,id) {
  if(type == 1) {
    $('.saveCompany').html('Save Changes');
    $('#companyName').val($('.companyName'+id).html());
    $('#domainName').val($('.domainName'+id).html());
    $('#userName').val($('.userName'+id).html());
    $('#sourcePath').val($('.sourcePath'+id).html());
    $('#password').val($('.password'+id).html());
    $('#actionType').val(id);
    if($('.source'+id).html() === 'http') {
      $('input:radio[name=source]')[0].checked = true;
    } else {
      $('input:radio[name=source]')[1].checked = true;
    }
    $('#companyModal').modal('toggle');
  }
  if(type == 2) {
    $('.saveApplication').html('Save Changes');
    $('#appName').val($('.appName'+id).html());
    $('#appLink').val($('.appLink'+id).html());
    $('#appCommand').val($('.appCommand'+id).html());
    $('#appActionType').val(id);
    $('#applicationModal').modal('toggle');
  }
  if(type == 3) {
    $('#companyJoined option:selected').removeAttr('selected');
    let checkedValue = $('#app-'+id).val();
    $('.type3Check').attr('checked',false);
    let checkedValueArray = checkedValue.split(',');
    for(j=1;j <= "<?php echo count($application)+1 ?>"; j++)
    {
      checkedValueArray.forEach(function(data) {
        if(j == data){
          $('#'+j).attr('checked',true);
        }        
      });
    }
    $('.saveComputer').html('Save Changes');
    $('#compName').val($('.compName'+id).html());
    $('#compSno').val($('.compSno'+id).html());
    $('#compModel').val($('.compModel'+id).html());
    $("#domainJoined").val($('#domainJoined'+id).val());
    const joinedCompany = $('#compCompanyName'+id).val();
    $("#deployselect option[value='"+joinedCompany+"']").prop("selected", false);
    $('#companyJoined option[value="'+joinedCompany+'"]').attr('selected', 'selected'); 
    if($("#domainJoined").val() == 1) {
      $("#domainJoined").attr('checked', true);
    } else {
      $("#domainJoined").attr('checked', false);
    }
    $('#compActionType').val(id);
    $('#computerModal').modal('toggle');
  }
}

$("#companyModal").on("hidden.bs.modal", function () {
  $('#actionType').val(0);
  $('.saveCompany').html('Save');
  $('#companyForm')[0].reset();
});
$("#computerModal").on("hidden.bs.modal", function () {
  $('#compActionType').val(0);
  $('.type3Check').attr('checked',false);
  $('#domainJoined').attr('checked',false);
  $('.saveComputer').html('Save');
  $('#computerForm')[0].reset();
});
$("#applicationModal").on("hidden.bs.modal", function () {
  $('#appActionType').val(0);
  $('.saveApplication').html('Save');
  $('#appForm')[0].reset();
});

$('.appTab').click(function() {
  localStorage.clear();
  localStorage.setItem('tab',3);
  if($('#appTab').hasClass('hide')) {
    $('#companyTab').addClass('hide');
    $('#computerTab').addClass('hide');
    $('#appTab').removeClass('hide');

    $('.companyTabli').removeClass('active');
    $('.computerTabli').removeClass('active');
    $('.appTabli').addClass('active');
  }
});

$('.companyTab').click(function() {
  localStorage.clear();
  localStorage.setItem('tab',1);
  if($('#companyTab').hasClass('hide')) {
    $('#appTab').addClass('hide')
    $('#computerTab').addClass('hide')
    $('#companyTab').removeClass('hide')

    $('.companyTabli').addClass('active');
    $('.computerTabli').removeClass('active');
    $('.appTabli').removeClass('active');
  }
});

$('.computerTab').click(function() {
  localStorage.clear();
  localStorage.setItem('tab',2);
  if($('#computerTab').hasClass('hide')) {
    $('#companyTab').addClass('hide')
    $('#appTab').addClass('hide')
    $('#computerTab').removeClass('hide')

    $('.companyTabli').removeClass('active');
    $('.computerTabli').addClass('active');
    $('.appTabli').removeClass('active');
  }
});

function disable(type,id,isBlock) {
  let url = '';
  let text = '';
  let name = '';
  if(type == 1) {
    url = '<?php echo base_url(); ?>company-status';
    name = 'Comapny';
  } else if(type == 2) {
    url = '<?php echo base_url(); ?>application-status';
    name = 'Application';
  } else if(type == 3) {
    url = '<?php echo base_url(); ?>computer-status';
    name = 'Computer';
  } else {
    alert('Access Denied !');
  }

  if(isBlock == 1) {
    text = 'Are you sure you want to Enable this '+name;
  } else {
    text = 'Are you sure you want to Disable this'+name;
  }
  swal({
    title: text,
    // text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'HTML',         
        data : 'action='+isBlock+'&id='+id,
        success: function(res)
        {
          var data = $.parseJSON(res);
          if(data.success) {
            location.reload();
          }
        },
        error: function(xhr, status, error)
        {
        }
      });
    }
  });      
}

$('.searchComputer').click(function () {
  const search = $('#search').val();
  if(!$.trim(search)) {
    alert('Please Type to Search');
  } else {
    $.ajax({
        url: '<?php echo base_url(); ?>search-computer',
        type: 'POST',
        dataType: 'HTML',         
        data : 'search='+search,
        success: function(res)
        {
          var data = $.parseJSON(res);
          if(data.success) {
          if(!data.data) {
          $('.computerErrorDiv').show();
          $('.computerError').css('color', 'red');
          $('.computerError').html('No Computer Found !');
        } else {
          let html = '';
          let checked = '';
          data.data.map(compData => {
            if(compData.domain_joined == 1) {
              checked = 'checked';
            } else {
              checked = '';
            }
            if(compData.status === "1") {
              status = '<i class="fa fa-trash" aria-hidden="true"></i>';
            } else {
              status = '<i class="fa fa-ban" aria-hidden="true"></i>';
            }
            html += '<tr class="app'+compData.id+' ">'
            +'<td class="compName'+compData.id+' ">'+compData.name+'</td>'
            +'<input type="hidden"  value="'+compData.applications+'"  id="app-'+compData.id+'"  />'
            +'<td class="compSno'+compData.id+' ">'+compData.serial_number+'</td>'
            +'<td class="compModel'+compData.id+' ">'+compData.model+'</td>'
            +'<td class="compCompanyName'+compData.id+' data-uid="'+compData.company+'" ">'+compData.companyName+' <input type="hidden" value="'+compData.company+'" id="compCompanyName'+compData.id+'"></td>'
            +'<td> <input type="checkbox" value="'+compData.domain_joined+'" id="domainJoined'+compData.id+'" disabled '+checked+' >  </input> </td>'
            +'<td class="compApp'+compData.id+' ">'+compData.AppNames+'</td>'
            +'<td class="editComp'+compData.id+'"> <a href="javascript:;" onClick=edit(3,'+compData.id+')> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>'
            +'<td><a href="javascript:;" onClick="disable(3,'+compData.id+')">'+status+'</a></td>'
            +'</tr>';
          });
          $('.computerData').html(html);
        }
          }
        },
        error: function(xhr, status, error)
        {
        }
      });
  }
});

$('.searchCompany').click(function () {
  const search = $('#companySearch').val();
  if(!$.trim(search)) {
    alert('Please Type to Search');
  } else {
    $.ajax({
        url: '<?php echo base_url(); ?>search-company',
        type: 'POST',
        dataType: 'HTML',         
        data : 'search='+search,
        success: function(res)
        {
          var data = $.parseJSON(res);
          if(data.success) {
          if(!data.data) {
          $('.computerErrorDiv').show();
          $('.computerError').css('color', 'red');
          $('.computerError').html('No Computer Found !');
        } else {
          let html = '';
          let checked = '';
          data.data.map(compData => {
            if(compData.domain_joined == 1) {
              checked = 'checked';
            } else {
              checked = '';
            }
            if(compData.status === "1") {
              status = '<i class="fa fa-trash" aria-hidden="true"></i>';
            } else {
              status = '<i class="fa fa-ban" aria-hidden="true"></i>';
            }
            html += '<tr class="app'+compData.id+' ">'
            +'<td class="compName'+compData.id+' ">'+compData.name+'</td>'
            +'<input type="hidden"  value="'+compData.applications+'"  id="app-'+compData.id+'"  />'
            +'<td class="compSno'+compData.id+' ">'+compData.serial_number+'</td>'
            +'<td class="compModel'+compData.id+' ">'+compData.model+'</td>'
            +'<td class="compCompanyName'+compData.id+' data-uid="'+compData.company+'" ">'+compData.companyName+' <input type="hidden" value="'+compData.company+'" id="compCompanyName'+compData.id+'"></td>'
            +'<td> <input type="checkbox" value="'+compData.domain_joined+'" id="domainJoined'+compData.id+'" disabled '+checked+' >  </input> </td>'
            +'<td class="compApp'+compData.id+' ">'+compData.AppNames+'</td>'
            +'<td class="editComp'+compData.id+'"> <a href="javascript:;" onClick=edit(3,'+compData.id+')> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>'
            +'<td><a href="javascript:;" onClick="disable(3,'+compData.id+')">'+status+'</a></td>'
            +'</tr>';
          });
          $('.computerData').html(html);
        }
          }
        },
        error: function(xhr, status, error)
        {
        }
      });
  }
});
 function showAllComputer() {
   
    $('.companyErrorDiv').hide();
    $('.compErrorDiv').hide();
    $('.appErrorDiv').hide();
    let status = '';
    let isBlock = '';

    $.ajax({
      url: '<?php echo base_url(); ?>get-computer',
      type: 'POST',
      dataType: 'HTML',         
      data : "1=1",
      success: function(res)
      {
        var data = $.parseJSON(res);
        if(!data.computer) {
          $('.computerErrorDiv').show();
          $('.computerError').css('color', 'red');
          $('.computerError').html('No Computer Found !');
        } else {
          let html = '';
          let checked = '';
          data.computer.map(compData => {
            if(compData.domain_joined == 1) {
              checked = 'checked';
            } else {
              checked = '';
            }
            if(compData.status === "1") {
              status = '<i class="fa fa-trash" aria-hidden="true"></i>';
            } else {
              status = '<i class="fa fa-ban" aria-hidden="true"></i>';
            }
            html += '<tr class="app'+compData.id+' ">'
            +'<td class="compName'+compData.id+' ">'+compData.name+'</td>'
            +'<input type="hidden"  value="'+compData.applications+'"  id="app-'+compData.id+'"  />'
            +'<td class="compSno'+compData.id+' ">'+compData.serial_number+'</td>'
            +'<td class="compModel'+compData.id+' ">'+compData.model+'</td>'
            +'<td class="compCompanyName'+compData.id+' data-uid="'+compData.company+'" ">'+compData.companyName+' <input type="hidden" value="'+compData.company+'" id="compCompanyName'+compData.id+'"></td>'
            +'<td> <input type="checkbox" value="'+compData.domain_joined+'" id="domainJoined'+compData.id+'" disabled '+checked+' >  </input> </td>'
            +'<td class="compApp'+compData.id+' ">'+compData.AppNames+'</td>'
            +'<td class="editComp'+compData.id+'"> <a href="javascript:;" onClick=edit(3,'+compData.id+')> <i class="fa fa-pencil" aria-hidden="true"></i> </a> </td>'
            +'<td><a href="javascript:;" onClick="disable(3,'+compData.id+')">'+status+'</a></td>'
            +'</tr>';
          });
          $('.computerData').html(html);
        }
      },
      error: function(xhr, status, error)
      {
      }
    }); 
 }

$('#a').click(function () {
  $('#companyForm')[0].reset();
});
</script>



</body>

</html>