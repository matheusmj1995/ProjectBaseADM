<!DOCTYPE HTML>
<html>
    <head>
        <title>ADMJACUNDÁ</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Bootstrap 3.3.2 -->
        <link href="../../bootstrap/css/bootstrap.min.css" 			 		rel="stylesheet" type="text/css">

        <link href="../../bootstrap/css/sweetalert2.min.css"                     rel="stylesheet" type="text/css">
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../../bootstrap/css/estilo.min.css" 			 		  rel="stylesheet" type="text/css">
        <link href="../../bootstrap/css/skins/_all-skins.min.css" 	rel="stylesheet" type="text/css">

        <script type="text/javascript" src="../../bootstrap/js/sweetalert2.min.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/jQuery/jQuery-2.1.3.min.js"></script>
        <script type="text/javascript" src="../../plugins/input-mask/jquery.maskedinput.min.js"></script>

    </head>
    <body class="skin-green wysihtml5-supported">
    		<header class="main-header">
    		<!-- Logo -->
    		<a href="index2.html" class="logo"><b>ADM</b>JACUNDÁ</a>
    		<!-- Header Navbar: style can be found in header.less -->
    		<nav class="navbar navbar-static-top" role="navigation">
    			<div class="navbar-custom-menu">
    				<ul class="nav navbar-nav">
    					<!-- User Account: style can be found in dropdown.less -->
    					<li class="dropdown user user-menu">
    						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    							<img src="../../img/user-160x160.jpg" class="user-image" alt="User Image">
    							<span class="hidden-xs">Matheus Jacundá</span>
    						</a>
    					</li>
    				</ul>
    			</div>
    		</nav>
    	</header>


      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../img/user-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Matheus Jacundá</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <ul class="sidebar-menu">
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
              </a>
            </li>

            <li class="treeview">
              <a href="cad_clientes.php">
                <i class="fa fa-group"></i> <span>Clientes</span>
              </a>
            </li>

            <li class="treeview">
              <a href="cad_fornecedores.php">
                <i class="fa fa-building-o"></i> <span>Fornecedores</span>
              </a>
            </li>
          </ul>
        </section>
        <div class="clearfix"></div>
      </aside>

      <div class="content-wrapper" style="min-height: 100%;">

        <?php 
          require_once("adm_func_gerais.php");
        ?>
