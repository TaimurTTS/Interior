<?php
// include("lscript.php");
// if(isset($_SESSION['login_user'])){
// header("location: insert/i_cat.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin MonoPoly Outlet | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/admin/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url();?>assets/admin/index2.html"><b>Admin</b>THE MONOPOLY OUTLET</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" id="username" name="username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div id="errorDiv" class="alert alert-danger hide"></div>
          <div class="row">
           
            <div class="col-xs-4">
              <button type="button" name="login" id="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </div>

     
      

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

      $(document).ready(function () {
        $('#errorDiv').addClass('hide');
        $('#errorDiv').html('');
        
        $('#login').click(function () {
          $('#errorDiv').addClass('hide');
          $('#errorDiv').html('');
          
          const username     = $('#username').val();
          const password = $('#password').val();
          
          if(!$.trim(username)) {
            $('#errorDiv').removeClass('hide');
            $('#errorDiv').html('Please Enter Username');
            return false;
          }
          if(!$.trim(password)) {
            $('#errorDiv').removeClass('hide');
            $('#errorDiv').html('Please Enter Password');
            return false;
          }
          if(password.length < 5) {
            $('#errorDiv').removeClass('hide');
            $('#errorDiv').html('Please Enter Valid Password');
            return false;
          }
          $.ajax({
              url: '<?php echo base_url(); ?>admin-login',
              type: 'POST',
              dataType: 'HTML',         
              data : 'username='+username+'&password='+password,
              success: function(res)
              {
                const data = $.parseJSON(res);
                if(data.success === false) {
                  $('#errorDiv').removeClass('hide');
                  $('#errorDiv').html(data.message);
                  return false;
                } else {
                  window.location = '<?php echo base_url();?>admin-slider';
                  return;
                }
              },
              error: function(xhr, status, error)
              {
              }
          });
        });

      });
    </script>
  </body>
</html>