<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario1'])) {

$_SESSION['id1'] =$_COOKIE['id1'];
    $_SESSION['emailUser1'] =$_COOKIE['usuario1'];
    $_SESSION['nomeUser1'] = $_COOKIE['nome1'];
    $_SESSION['imgUser1'] = $_COOKIE['img1'];
 }else{
 if(!isset($_SESSION[nomeUser1])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailUser1])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso1"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso1"] = $agora;
   }
}
 }

?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta http-equiv="refresh" content="1200">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>Sisco - Controle do PDT</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../assets/js/modernizr.min.js"></script>
        
    </head>


    <body class="fixed-left">
       <!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="ti-pencil-alt icon-c-logo"></i><span>SISC<i class="md md-album"></i></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgUser1'];?>" alt="user-img" class="img-circle"> 
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="manual_pdt.pdf" target="_blank"><i class="ti-book m-r-5"></i> Manual do Sistema</a></li>
                                        <li><a href="bloqueio-tela.php"><i class="ti-lock m-r-5"></i> Bloquear Tela</a></li>
                                        <li><a href="perfil_pdt.php"><i class="ti-user m-r-5"></i> Perfil</a></li>
                                        <li><a href="dao/logout.php"><i class="ti-power-off m-r-5"></i> Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

           <div class="left side-menu side-menu-sm">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            
                                        <li class="text-muted menu-title">Menu de Navegação</li>
                           <li>
                               <a href="index.php"><i class="ti-home"></i><span> Home </span></a>
                               
                            </li>

                            <li>
                                <a href="alunos.php"><i class="ti-menu-alt"></i><span> Alunos </span></a>
                               
                            </li>
<li>
                                <a href="perfil_pdt.php" class="active"><i class="ti-user"></i><span> Perfil </span></a>
                               
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
        
        
        
        
        <!-- Begin page -->
        <div id="wrapper">

           


           
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                
  
                         <?php
        
                           $sql="SELECT * FROM tb_usuario where idtb_usuario = $_SESSION[id1]";
                             $result = mysqli_query($mysqli, $sql);
                                     if($result){
                                        while ($row=  mysqli_fetch_assoc($result)){
                        ?>  
                    
                            
                    
                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="profile-info-name">
                                    <img src="../fotos/<?php echo $row['img_usuario']; ?>" class="thumb-lg img-circle img-thumbnail" alt="imagem"/>
                                    <h4 class="m-b-5"><b>PDT</b></h4>
                                    <p class="text-muted"><i class="fa fa-map-marker"></i> José Maria Falcão, Pacajus, CE</p>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    
                    
                    <div class="row">
                    
                        <div class="col-md-12">
                        	
                        	<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><b>PERFIL</b></h4>
								<div class="p-20">
                                                                    
                                                                    <h4>
									<div class="timeline-2">
	                                    <div class="time-item">
	                                        <div class="item-info">
                                                    <div class="text-muted"><b> Nome completo:</b></div>
	                                            <p><strong><?php echo "<p></p>",$row['nome_usuario'];?></strong></p>
	                                        </div>
	                                    </div>
	
	                                    <div class="time-item">
	                                        <div class="item-info">
	                                            <div class="text-muted"><b> Email:</b></div>
                                                    <p><strong><?php echo "<p></p>",$row['email_usuario'];?></strong></p>
	                                        </div>
	                                    </div>
	
	                                    <div class="time-item">
	                                        <div class="item-info">
	                                            <div class="text-muted"><b> Telefone:</b></div>
                                                    <p><strong><?php echo "<p></p>",$row['telefone_usuario'];?></strong></p>
	                                        </div>
	                                    </div>
	
	                                    <div class="time-item">
	                                        <div class="item-info">
	                                            <div class="text-muted"><b> Celular:</b></div>
	                                            <p><strong><?php echo "<p></p>",$row['celular_usuario'];?></strong></p>
	                                        </div>
	                                    </div>
	
	                                    <div class="time-item">
	                                        <div class="item-info">
	                                            <div class="text-muted"><b> Senha:</b></div>
	                                            <p><strong><?php echo "<p></p>",$row['senha_usuario'];?></strong></p>
	                                        </div>
	                                    </div>
	
	                                </div>
                                                                    </h4>
                                                                     <hr>
                                                                     <a href="alterar_pdt.php?id=<?php echo $row['idtb_usuario'] ;?>"><button type="submit" class="btn btn-default in" style="float:right">Atualizar informações</button></a>
                                                <br>
								</div>
                                                               
							</div>
                        	
                        	
                        </div>
                        
                        
                        
                        
                    </div>
                    
                   
                </div> <!-- container -->
                   <?php
                                  }
                               }
                        mysql_close($dbconn);
                             ?>              
                </div> <!-- content -->

                <footer class="footer">
                    2016 © Sisco.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
	
	</body>
</html>