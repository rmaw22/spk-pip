<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:35:54 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SPK-PIP</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<?php echo e(Html::style('/admin/bootstrap/css/bootstrap.min.css')); ?>

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('logo.jpg')); ?>">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<?php echo e(Html::style('/admin/css/style.css')); ?>

<?php echo e(Html::style('/admin/css/font-awesome/css/font-awesome.min.css')); ?>

<?php echo e(Html::style('/admin/css/et-line-font/et-line-font.css')); ?>

<?php echo e(Html::style('/admin/css/themify-icons/themify-icons.css')); ?>

<?php echo e(Html::style('/admin/css/simple-lineicon/simple-line-icons.css')); ?>


<?php echo e(Html::style('/bootstrap/bootstrap/css/bootstrap.css')); ?>

<?php echo e(Html::style('/bootstrap/bootstrap/css/bootstrap-theme.css')); ?>

<!-- hmenu -->
<link rel="stylesheet" href="dist/">
<?php echo e(Html::style('/admin/plugins/hmenu/ace-responsive-menu.css')); ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(url('admin')); ?>/plugins/datatables/css/dataTables.bootstrap.min.css">
<!-- Bootstrap dataTables -->
  <?php /* Html::style('/bootstrap/datatable/media/css/dataTables.bootstrap4.css') */ ?>
    <?php /* Html::style('/bootstrap/datatable/extensions/Responsive/css/responsive.bootstrap4.css') */ ?>
    <?php /* Html::style('/bootstrap/datatable/extensions/FixedHeader/css/fixedHeader.bootstrap4.css') */ ?>
    <style type="text/css">
    /* .container{
      padding-top:20px !important;
      margin-top:20px !important;
    } */
    footer {
        bottom:0;
        width: 100%;
        padding: 20px;

    }
        table.dataTable th,
        table.dataTable td {
        white-space: nowrap;
        }
        
    </style>
    <!-- BootStrap DatePicker -->
    <?php echo e(Html::style('/bootstrap/datepicker/dist/css/bootstrap-datepicker.css')); ?>

    <?php echo $__env->yieldContent('css'); ?>
    
<!-- jQuery 3 --> 
<?php echo e(Html::script('/admin/js/jquery.min.js')); ?>

<!-- v4.0.0-alpha.6 -->  
<?php echo e(Html::script('/admin/bootstrap/js/bootstrap.min.js')); ?>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <!-- <a href="#" class="logo blue-bg">  -->
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <!-- <span class="logo-mini"><img src="<?php echo e(asset('logo.jpg')); ?>" class="img-responsive img-circle"alt="" style="width: 25%;padding-top: 5px"> </span> -->
    <!-- logo for regular state and mobile devices --> 
    <!-- <span class="logo-lg"><img src="<?php echo e(asset('logo.jpg')); ?>" class="img-responsive img-circle" alt=""  style="width: 25%;padding-top: 5px"> </span>  -->
  <!-- <span class="logo"> SMK PEMBANGUNAN</span> -->
<!-- </a>  -->
    <!-- Header Navbar -->
    
    <nav class="navbar blue-bg navbar-static-top"> 
    <img src="<?php echo e(asset('logo.jpg')); ?>" class="logo img-circle" alt=""  style="padding-top: 5px;padding-bottom: 5px">
    <span class="logo" style="color:white ; text-align:left;font-size:25px" > SMK Pembangunan <!-- </h1> should be here -->
   
      </span>
      <!-- Sidebar toggle button-->
        <div class="pull-left search-box">
          <!-- search box left -->
         
        </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account  -->
          <?php if(Auth::guest()): ?>
          <li><a href="<?php echo e(url('/login')); ?>"><i class="fa fa-sign-in"></i> SIGN IN</a></li>
          <?php else: ?>
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo e(asset('logo.jpg')); ?>" class="user-image" alt="User Image" style="margin-bottom:10px;"> <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="<?php echo e(asset('logo.jpg')); ?>" class="img-responsive img-circle" alt="User"></div>
                <p class="text-left"><?php echo e(Auth::user()->name); ?> <small>(2021)</small> </p>
              </li>
              <li><a href="<?php echo e(url('/settings/profile')); ?>"><i class="icon-profile-male"></i>Account Setting</a></li>
              <li><a href="<?php echo e(url('/settings/password')); ?>"><i class="icon-wallet"></i> Ubah Password</a></li>
              <!-- <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
              <li role="separator" class="divider"></li> -->
              <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-power-off"></i> Sign Out</a></li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Main Nav -->
  <div class="main-nav" style="margin-bottom:20px">
    <nav> 
      <!-- Menu Toggle btn-->
      <div class="menu-toggle">
        <h3>Menu</h3>
        <button type="button" id="menu-btn"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <!-- Responsive Menu Structure--> 
      <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
      <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
      <?php if(Auth::guest()): ?>
      <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-list"></i> <span>Pengumuman</span></a></li>
        
      <?php else: ?>
        <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if(Auth::user()->id_role == 1): ?>
          <li><a href="<?php echo e(route('siswa.index')); ?>"> <i class="fa fa-user"></i> <span> Siswa </span></a></li>
          <li><a href="<?php echo e(route('aspek.index')); ?>"> <i class="fa fa-object-group"></i> <span> Kriteria </span></a></li>
          <li><a href="<?php echo e(route('faktor.index')); ?>"> <i class="fa fa-object-ungroup"></i> <span> Sub Kriteria </span></a></li>                       
          <li><a href="<?php echo e(route('nilai.index')); ?>"> <i class="fa fa-star"></i> <span> Nilai Siswa </span></a></li>
          <li><a href="<?php echo e(route('gap.index')); ?>"> <i class="fa fa-sliders"></i> <span> GAP </span></a></li>
        <?php endif; ?>
        <li><a href="<?php echo e(route('hasil.index')); ?>"> <i class="fa fa-list-alt"></i> <span> Result 
                       
        </span></a></li>
        <li style="float:right"><a href="<?php echo e(url('/logout')); ?>"> <i class="fa fa-power-off"></i> <span> Sign Out </span></a></li>
        <!-- <li><a href="<?php echo e(route('manager.index')); ?>"> <i class="fa fa-user-circle-o"></i> <span> Kepala Bidang </span></a></li> -->
      <?php endif; ?>
      </ul>
    </nav>
  </div>
  <!-- Main Nav -->
  
  <!-- Content Wrapper. Contains page content -->
  <?php /*<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Modern Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Modern Dashboard</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">*/ ?>
    
      <?php echo $__env->yieldContent('content'); ?>
     
     
    <!-- </div> -->
    <!-- /.content --> 
  <!-- </div> -->
  <!-- /.content-wrapper -->
  <footer >
    <div class="pull-right hidden-xs">Version 1.0</div>
    Copyright © 2021 | SPK PIP. All rights reserved.</footer>
</div>
<!-- ./wrapper --> 

<!-- template --> 
<?php echo e(Html::script('/admin/js/adminkit.js')); ?>

<!-- Morris JavaScript --> 
<?php echo e(Html::script('/admin/plugins/raphael/raphael-min.js')); ?>

<?php echo e(Html::script('/admin/plugins/morris/morris.js')); ?>

<?php echo e(Html::script('/admin/plugins/functions/dashboard1.js')); ?>



<!-- Chart Peity JavaScript --> 
<?php echo e(Html::script('/admin/plugins/peity/jquery.peity.min.js')); ?>

<?php echo e(Html::script('/admin/plugins/functions/jquery.peity.init.js')); ?>

<?php echo e(Html::script('/admin/plugins/hmenu/ace-responsive-menu.js')); ?>


<!--Plugin Initialization--> 
<script >
         $(document).ready(function () {
             $("#respMenu").aceResponsiveMenu({
                 resizeWidth: '768', // Set the same in Media query       
                 animationSpeed: 'fast', //slow, medium, fast
                 accoridonExpAll: false //Expands all the accordion menu on click
             });
         });
</script>

<!-- DataTable --> 
<script src="<?php echo e(url('admin')); ?>/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo e(url('admin')); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>

<!-- Scripts Bootstrap dataTables -->
    <?php /* Html::script('/bootstrap/datatable/media/js/jquery.dataTables.js')*/ ?>
    <?php /* Html::script('/bootstrap/datatable/media/js/dataTables.bootstrap4.js')  */ ?>
    <?php /* Html::script('/bootstrap/datatable/extensions/Responsive/js/dataTables.responsive.js') */ ?>
    <?php /* Html::script('/bootstrap/datatable/extensions/Responsive/js/responsive.bootstrap4.js') */ ?>
    <?php /* Html::script('/bootstrap/datatable/extensions/FixedHeader/js/dataTables.fixedHeader.js') */ ?>
    <script type="text/javascript">
        $(function() {
            $('table.table').dataTable( {
                     "order": [],
            "columnDefs": [ {
              "targets"  : 'nosort',
              "orderable": false,
            }]
        } );
        
        });
    </script>

    <!-- Scripts BootStap DatePicker -->
    <?php echo e(Html::script('/bootstrap/datepicker/dist/js/bootstrap-datepicker.js')); ?>

    <script type="text/javascript">
        $(".input-group.date").datepicker({
            format: "dd-mm-yyyy",
            autoclose: true, 
            todayHighlight: true
        });
    </script>

    <!-- CheckBox -->
    <script type="text/javascript">

        //select all checkboxes
        $('input[name="checkAll"]').change(function(){  //"select all" change
            $(".checkGroup").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        //".checkbox" change
        $('.checkGroup').change(function(){
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $('input[name="checkAll"]').prop('checked', false); //change "select all" checked status to false
           }
            //check "select all" if all checkbox items are checked
            if ($('.checkGroup:checked').length == $('.checkGroup').length ){
                $('input[name="checkAll"]').prop('checked', true);
            }
        });
    </script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:35:54 GMT -->
</html>
