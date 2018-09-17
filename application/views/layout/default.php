<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$site['site_title']?> | Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/select2.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?=base_url()?>assets/css/skins/skin-yellow.css">
   <?php if(!empty($add_css)):?><?php foreach($add_css as $css):?><link rel="stylesheet" href="<?=base_url($css)?>"><?php endforeach;?><?php endif;?>

   <link rel="stylesheet" href="<?=base_url()?>assets/css/kn.css">
   
   <script type="text/javascript">
    var base_url = "<?=base_url()?>";
  </script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="<?=site_url()?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>K</b>N<b>C</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?=$site['site_title']?></b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=base_url();?>assets/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?=$active_user->first_name.' '.$active_user->last_name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?=base_url();?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?=$active_user->first_name.' '.$active_user->last_name ?> - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?=site_url('update-profile')?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?=site_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?=base_url()?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?=$active_user->first_name.' '.$active_user->last_name ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php $this->load->view('elements/menu-left');?>
      </section>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <?php $this->load->view('elements/flash_message'); ?>
        <?php $this->load->view($content);?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
      </div>
      <strong>Copyright &copy; <?=date('Y')?> <a href="http://nextgen-soft.com">NextGen Soft</a>.</strong> All rights
      reserved.
    </footer>

    <div class="control-sidebar-bg"></div>

  </div>
  <?php $this->load->view('elements/kn_modal'); ?>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

  <!-- Bootstrap 3.3.6 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="<?=base_url()?>assets/plugins/select2/select2.full.min.js"></script>

  <!-- SlimScroll 1.3.0 -->
  <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/bootstrap-notify.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

  <script src="<?=base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url()?>assets/js/app.min.js"></script>
  <?php if(!empty($add_js)):?><?php foreach($add_js as $js):?><script src="<?=base_url($js)?>"></script> <?php endforeach;?><?php endif;?>
  <script src="<?=base_url()?>assets/js/kn.js"></script>
</body>
</html>