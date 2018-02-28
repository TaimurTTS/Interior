<?php
// echo '<pre>';
// var_dump($subcategories);
// die;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | The Monopoly Outlet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Main Categories
        <small>Upload</small>
      </h1>

    </section>

    <!-- Main content -->
         <section class="content">

          <div class="row">
            <div class="col-md-12">
              <!-- AREA CHART -->
             <div class="box box-primary">
                <div class="box-header">

                </div><!-- /.box-header -->
                <!-- form start -->
                <div name="logoupload">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select Category</label>
                      <select id="category" class="form-control dropup ">
                        <option>Select Category</option>
                        <?php
                        if(isset($subcategories) && !empty($subcategories) && !is_null($subcategories)) {
                          foreach ($subcategories as $key => $value) {
                            echo '<option id="'.$value['id'].'">'.$value['subcat_name'].'</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Number</label>
                      <input type="text" value="<?php echo @$cat_number; ?>" id="catno" name="catno" class="form-control" placeholder="Enter Product Serial Number" required>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input type="text" value="<?php echo @$cat_Name; ?>" id="catname" name="catname" class="form-control" placeholder="Enter Product Name" required>
                      <input type="hidden" value="" id="sliderId" class="form-control">
                    </div>

                    <!-- <div class="form-group">
                     <label for="exampleInputFile">Upload Category Image</label>
                     <input type="file" name="file" id="exampleInputFile" >
                     <p class="help-block">Upload Category Image Here</p>
                   </div> -->

                   <div class="form-group">
                      <!-- <label for="exampleInputFile">Upload Slider Image</label>
                      <input type="file" name="file" id="exampleInputFile" >
                      <p class="help-block">Upload Slider Image Here</p> -->
                      <div class="" id="mulitplefileuploader"><button  onclick="uploadButton();" class="btn btn-primary btn-block text-lft m-b-0 m-t-10 zero-bordr-radis"><i class="fa fa-plus pull-left p-t-5 p-r-5"></i> UPLOAD IMAGES</button>
                    </div>
                    <div>
                    <br>
                    <p class="small alert alert-warning lupld-ftypes"><span>For faster uploads, upload images less than 4 mb.</span>Files must be: .jpeg .jpg or .png </p>
                
                
                
                
                    </div>
                    <!-- </div> --> 
                    <div id="imagePreview"> </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" id="insert" name="insert" class="btn col-md-4  btn-success">Insert</button>
                     <button type="button" id="update" name="update" class="btn col-md-4  btn-success">Update</button>
                      <button type="button" id="delete" name="delete" class="btn col-md-4  btn-success">Delete</button>
                       <!-- <button type="submit" name="reset" class="btn col-md-3  btn-success">Reset</button> -->
                  </div>
                </div>
              </div><!-- /.box -->
              <!-- DONUT CHART -->

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Present Categories</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Category ID</th>
                        <th>Sub Category Number</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Sub Category Image</th>
                      </tr>
                    </thead>
                    <tbody id="dBody">
                      <?php
                        if(isset($subcategories) && !empty($subcategories)) {
                          foreach ($subcategories as $key => $value) {
                            echo "<tr class='dRow-".$value['id']."'>";
                            echo "<td>".$value['id']."</td>";
                            // echo "<td>".$value['category_name']."</td>";
                            echo "<td><a onclick='update_data(".$value['id'].",".$value['cat_id'].")' href = 'javascript:;' class='catno-".$value['id']."'>".$value['subcat_no']."</a></td>";
                            echo "<td>".$value['category_name']."</td>";
                            echo "<td class='catname-".$value['id']."'>".$value['subcat_name']."</td>";
                            echo "<td><img class='img-".$value['id']."' data-image=".$value['imagename']." src = '".base_url()."assets/images/category/".$value['imagename']."' height = '45' width = '50' /></td>";
                            echo "</tr>";
                          }
                        }
                      ?>

                    <?php
          // $db_func = new database_functions();
          // $con = $db_func->db_connect();
          // $result = $db_func->show($con);
          // while($rs = mysqli_fetch_assoc($result))
          // {
          //   $ct_id = $rs["cat_id"];
          //   $ct_num = $rs["cat_no"];
          //   $ct_name = $rs["cat_name"];
          // echo "<tr>";
          //     echo "<td>".$ct_id."</td>";
          //     echo "<td>".$ct_num."</td>";
          //     echo "<td><a href = 'i_cat.php?q=".$ct_id."'>".$ct_name."</a></td>";
          // echo "</tr>";
          // }
           ?>
                    </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->



            </div><!-- /.col (RIGHT) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- MultipleFileUploader -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.fileuploadmulti.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/admin/dist/js/demo.js"></script>

<script type="text/javascript">
  let imageName = [];
  let tmp = 0;
  const baseUrl = '<?php echo base_url(); ?>';

                    $(document).ready(function ()
                    {
                        $('.upload-green').remove();
                        $('.upload-progress').remove();
                        var settings = {
                        url: baseUrl+'category-upload.php',
                        method: "POST",
                        allowedTypes: "jpg,jpeg,png",
                        fileName: "myfile",
                        multiple: false,
                        maxFileSize: 4194304,
                        showProgress: true,
                        showStatusAfterSuccess: true,
                        onSuccess: function (files, data, xhr)
                        {
                          imageName = [];
                          $('#imagePreview').html('');
                          $('.upload-filename').html('');
                            $('.upload-green').remove();
                            $('.upload-progress').remove();
                            $('#docFileNameError').html('');
                            $('#docFileName').css('border-color', 'grey');
                            var d = $.parseJSON(data);
                            imageName.push(d.image);
                            var fileExtension = (d.image.replace(/^.*\./, '')).toLowerCase();
                            var imgCount =0;
                            if(fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png')
                            {
                              imgCount++;
                              $('#imagePreview').prepend('<div  data-image="'+d.image+'"  class="ui-state-default   kr-imagepreview aq-rfq-upload" id="' + tmp + '" ><img height="70px" width="70px" src="'+baseUrl+'assets/images/category/' + d.image + '" /> '+d.image+' <b   id="' + tmp + 'a"   /><span   onclick="removes(\'' + d.image + '\',' + tmp + ')"> <i class="fa fa-times" aria-hidden="true"></i></span> </div>');
                            }
                            tmp++;
                        },

                        afterUploadAll: function ()
                        {
                          $('.upload-green').remove();
                          $('.upload-progress').remove();
                          $('#nextOne').attr('disabled',false);
                          $('#prev').attr('disabled',false); 
                        },

                        onError: function (files, status, errMsg)
                        {
                          $("#status").html("<font color='red'>Upload is Failed</font>");
                          $('.upload-green').remove();
                          $('#nextOne').attr('disabled',false);
                          $('#prev').attr('disabled',false); 
                        }
                    }
                    $("#mulitplefileuploader").uploadFile(settings);
                });
                function removeElement(arr) {
                    var what, a = arguments, L = a.length, ax;
                    while (L > 1 && arr.length) {
                        what = a[--L];
                        while ((ax = arr.indexOf(what)) !== -1) {
                            arr.splice(ax, 1);
                        }
                    }
                    return arr;
                }
                function removes(value, id)
                {
                    $('#' + id).remove();
                    var index = imageName.indexOf(value);
                    if (index >= 0) {
                        imageName.splice(index, 1);
                    }
                }

    $('#insert').click(function () {
      const catno = $('#catno').val();
      const catname       = $('#catname').val();
      const categoryId = $('#category').children(":selected").attr("id");

      $.ajax({
          url: '<?php echo base_url(); ?>add-subcategory',
          type: 'POST',
          dataType: 'HTML',         
          data : 'catno='+catno+'&catname='+catname+'&categoryId='+categoryId+'&imageName='+imageName,
          success: function(res)
          {
            const data = $.parseJSON(res);
            if(data.success === false) {
              swal("Error !", data.message, "error");
              return false;
            } else {
              let html = '';
              // echo "<td><a onclick='update_data(".$value['id'].")' href = 'javascript:;' class='text-".$value['id']."'>".$value['text']."</a></td>";
              //               echo "<td class='tag-".$value['id']."'>".$value['catname']."</td>";
              //               echo "<td><img class='img-".$value['id']."' data-image=".$value['name']." src = '".base_url()."assets/images/category/".$value['name']."' height = '45' width = '50' /></td>";
              imageName.map((images,index) =>{
                html += '<tr class="dRow-'+(data.data+index)+'">'+
                        '<td>'+data.data+'</td>'+
                        '<td><a onclick="update_data('+(data.data+index)+','+categoryId+')" class="catno-'+(data.data+index)+'" href = "javascript:;">'+catno+'</a></td>'+
                        '<td>'+$('#category').val()+'</td>'+
                        '<td class="catname-'+(data.data+index)+'">'+catname+'</td>'+
                        '<td><img class="img-'+(data.data+index)+'" data-image='+images+' src = "<?php echo base_url();?>assets/images/category/'+images+'" height = "45" width = "50" /></td>'+
                        '</tr>';
              });
              $('#dBody').append(html);
              imageName = [];
              $('#imagePreview').html('');
              $('#catno').val('');
              $('#catname').val('');
              $('.upload-filename').html('');
              $("#category option:selected").prop("selected", false)
              swal("Success !", data.message, "success");
              return;
            }
          },
          error: function(xhr, status, error)
          {
          }
      });
  });

  function update_data(id, catId) {
    imageName = [];
    const catno = $('.catno-'+id).html();
    const catname = $('.catname-'+id).html();
    $("#category option[id="+catId+"]").attr("selected", "selected");
    const name = $('.img-'+id).attr('data-image');
    $('#sliderId').val(id);
    $('#catno').val(catno);
    $('#catname').val(catname);
    imageName.push(name);
    $('#imagePreview').html('<div  data-image="'+name+'"  class="ui-state-default   kr-imagepreview aq-rfq-upload" id="' + id + '" ><img height="70px" width="70px" src="'+baseUrl+'assets/images/category/' + name + '" /> '+name+' <b   id="' + id + 'a"   /><span   onclick="removes(\'' + name + '\',' + id + ')"> <i class="fa fa-times" aria-hidden="true"></i></span> </div>');
    return;
  }

  $('#update').click(function () {
    id = $('#sliderId').val();
    const catno    = $('#catno').val();
    const catname  = $('#catname').val();
    const categoryId = $('#category').children(":selected").attr("id");
    $.ajax({
          url: '<?php echo base_url(); ?>update-subcategory/'+id,
          type: 'POST',
          dataType: 'HTML',         
          data : 'catno='+catno+'&catname='+catname+'&categoryId='+categoryId+'&imageName='+imageName,
          success: function(res)
          {
            const data = $.parseJSON(res);
            if(data.success === false) {
              swal("Error !", data.message, "error");
              return false;
            } else {
              let html = '';
              // echo "<td><a onclick='update_data(".$value['id'].")' href = 'javascript:;' class='text-".$value['id']."'>".$value['text']."</a></td>";
              //               echo "<td class='tag-".$value['id']."'>".$value['catname']."</td>";
              //               echo "<td><img class='img-".$value['id']."' data-image=".$value['name']." src = '".base_url()."assets/images/category/".$value['name']."' height = '45' width = '50' /></td>";
              imageName.map((images,index) =>{
                html += '<td class="catname-'+id+'">'+id+'</td>'+
                '<td><a onclick="update_data('+id+')" class="catno-'+id+'" href = "javascript:;">'+catno+'</a></td>'+
                        '<td>'+$('#category').val()+'</td>'+
                        '<td class="catname-'+id+'">'+catname+'</td>'+
                        '<td><img class="img-'+id+'" data-image='+images+' src = "<?php echo base_url();?>assets/images/category/'+images+'" height = "45" width = "50" /></td>';
              });
              $('.dRow-'+id).html(html);
              imageName = [];
              $('#imagePreview').html('');
              $('#catno').val('');
              $('#catname').val('');
              $('.upload-filename').html('');
              $("#category option:selected").prop("selected", false)
              swal("Success !", data.message, "success");
              return;
            }
          },
          error: function(xhr, status, error)
          {
          }
      });
  });

  $('#delete').click(function () {
    swal({
      title: "Are you sure you want to delete this Image?",
      text: "Once deleted, you will not be able to recover this Image!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        const id = $('#sliderId').val();
        $.ajax({
          url: '<?php echo base_url(); ?>delete-subcategory/'+id,
          type: 'POST',
          dataType: 'HTML',         
          data : '1=1',
          success: function(res)
          {
            const data = $.parseJSON(res);
            if(data.success === false) {
              // $('#errorDiv').removeClass('hide');
              // $('#errorDiv').html(data.message);
              swal("Error !", data.message, "error");
              return false;
            } else {
              swal("Success !", data.message, {
                icon: "success",
              });
              $('.dRow-'+id).remove();
              imageName = [];
              $('#imagePreview').html('');
              $('#catno').val('');
              $('#catname').val('');
              $('.upload-filename').html('');
              return;
            }
          },
          error: function(xhr, status, error)
          {
          }
      });
      }
    });
  });

  $('#category').change(function () {
    
  });
</script>

</body>
</html>
