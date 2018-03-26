<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=base_url();?>public/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=base_url();?>public/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=base_url();?>public/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="<?=base_url();?>public/css/fonts.css">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?=base_url();?>public/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?=base_url();?>public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url();?>public/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=base_url();?>public/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?=base_url();?><?=$this->session->userdata('logo')?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?=$this->session->userdata('nombre_largo')?></h2>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>C</strong><strong class="text-primary">J</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                              
          <?php if($this->session->userdata('id_unidad')!=8){?>        
            <li id="ac1"><a id="opc1" href="<?=base_url();?>index.php/welcome/registro"><i class="icon-list"></i>Requisito del día                             </a></li>
            <li id="ac2"><a id="opc2" href="<?=base_url();?>index.php/welcome/AgendaAnual"> <i class="icon-grid"></i>Agenda Anual             </a></li> 
            <li id="ac3"><a id ="opc3" href="<?=base_url();?>index.php/welcome/AvanceAventurero"> <i class="icon-presentation"></i>% Avance x Aventurero    
          <?php }else{ ?>                         </a></li>
            <li><a href="<?=base_url();?>index.php/welcome/PlanificacionRequisitos">Planificacion Clases</a></li>                   
          <?php } ?>  
          </ul>
        </div>        
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Club Jezreel </span><strong class="text-primary"> Clases Progresivas</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                  
                <li class="nav-item"><a href="<?=base_url();?>index.php/welcome/logout" class="nav-link logout">Salir<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Breadcrumb-->