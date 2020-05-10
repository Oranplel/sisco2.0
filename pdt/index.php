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
$s = "SELECT idtb_turma FROM tb_usuario, tb_turma WHERE tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario  and tb_usuario.idtb_usuario = $_SESSION[id1]";
                            $res = mysqli_query($mysqli, $s);
                                        $total = mysqli_num_rows($res);
                                        if($total == 0){
                                            
echo"<script> window.location=\"erro.html \" </script>";
                                        }
?> 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">
                <!-- atualiza em 30 minutos -->
        <meta http-equiv="refresh" content="1200">

		<link rel="shortcut icon" href="../assets/images/favicon_1.ico">

		<title>Sisco - Controle do PDT</title>
		
		<link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

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
                               <a href="index.php" class="active"><i class="ti-home"></i><span> Home </span></a>
                               
                            </li>

                            <li>
                                <a href="alunos.php"><i class="ti-menu-alt"></i><span> Alunos </span></a>
                               
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
			<!-- Left Sidebar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title"> Acompanhamento</h4>
                <br>
                <br>
							</div>
						</div>
						
						
						<!-- Widget-box -->
						
					
						
						
						
                        
                        <div class="row">
                        <a href="alunos.php">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix card-box">
                                    <span class="mini-stat-icon bg-inverse"><i class="ion-android-contacts text-white"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">
                                        <?php
                                        $sql = "SELECT idtb_aluno FROM tb_aluno, tb_usuario, tb_turma where tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario and tb_turma.idtb_turma = tb_aluno.tb_turma_idtb_turma and tb_usuario.idtb_usuario = $_SESSION[id1]";
                                        //Conta quantos registros possuem na tabela
                                        $result = mysqli_query($mysqli, $sql);
                                        $total = mysqli_num_rows($result);
                                        //Mostra o valor
                                        echo $total;
                                        ?></span>
                                        <br>
                                        Alunos
                                    </div>
                                </div>
                            </div>
                            </a>
                            <a href="alunos.php">                            
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix card-box">
                                    <span class="mini-stat-icon bg-inverse"><i class="ti-pencil-alt text-white"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark">
                                            <?php
                                        $sql = "SELECT * FROM tb_ocorrencia, tb_usuario, tb_turma WHERE tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario and tb_turma.idtb_turma = tb_ocorrencia.tb_turma_idtb_turma and tb_usuario.idtb_usuario = $_SESSION[id1]";
                                        //Conta quantos registros possuem na tabela
                                        $result = mysqli_query($mysqli, $sql);
                                        $total = mysqli_num_rows($result);
                                        //Mostra o valor
                                        echo $total;
                                        ?>
                                        </span>
                                        <br>
                                        Registros disciplinares
                                    </div>
                                   
                                </div>
                            </div>
                            </a>
                            <?php
                            $s = "SELECT idtb_turma FROM tb_usuario, tb_turma WHERE tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario  and tb_usuario.idtb_usuario = $_SESSION[id1]";
                            $res = mysqli_query($mysqli, $s);
                            while ($r = mysqli_fetch_assoc($res)) {
                               ?>            
                            <a href="coletivas.php?id=<?php echo $r['idtb_turma']; ?>">
                            <?php
                            }
                            ?> 
                           
                            
                            </a>
                           
                        </div>











                        <h5 class="page-title">Últimos registros disciplinares</h5>
                        <br>
                        <div class="row">
                        <div class="col-lg-12">
 <?php  
 $maximo = 6;
        $pagina = $_GET['pagina'];
            if($pagina == ""){
                $pagina = "1";
            }

            $inicio = $pagina - 1;
            $inicio = $maximo * $inicio;

            $query = "SELECT * FROM tb_usuario, tb_aluno, tb_turma, tb_ocorrencia WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND tb_turma.tb_usuario_idtb_usuario = $_SESSION[id1] AND status_pdt =0 AND tb_usuario.idtb_usuario = tb_ocorrencia.tb_usuario_idtb_usuario AND tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno";
                 $result = mysqli_query($mysqli, $query);                   
            $total = mysqli_num_rows($result);
        $res = "SELECT * FROM tb_usuario, tb_aluno, tb_turma, tb_ocorrencia WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND tb_turma.tb_usuario_idtb_usuario = $_SESSION[id1] AND status_pdt =0 AND tb_usuario.idtb_usuario = tb_ocorrencia.tb_usuario_idtb_usuario AND tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno ORDER BY data_reg DESC LIMIT $inicio, $maximo";
        $resultado = mysqli_query($mysqli, $res);
        if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)){
 ?>
 
    <div class="col-lg-4">
        <div class="portlet">
            <div class="portlet-heading bg-custom">
            <div class="media-left">
                    <img src="../fotos/<?php echo $row['foto_aluno']; ?>" class="media-object img-circle" alt="64x64" style="width: 48px; height: 48px;"> 
                </div>
                <h3 class="portlet-title" style="margin-left:70px; margin-top:-40px;"><?php echo utf8_encode($row['nome_aluno']); ?></h3>
                    
                <div class="clearfix"></div>
            </div>

            <form method="POST" action="status.php">
            <div class="media" style="height:245px; margin-left:20px; padding-top:5px;">
            <div class="col-lg-12">
                <h4 class="media-heading" style="margin-left:-9px"><?php echo $row['data_ocorrencia']; ?> às <?php echo $row['hora_ocorrencia']; ?></h4>
            </div>
            <div class="media-body" style="height:120px; padding-right:16px" align="justify">
                    
                    <?php echo $row['motivo_ocorrencia']; ?> - <?php echo utf8_encode($row['obs_ocorrencia']); ?>
                    
            </div> 
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['idtb_ocorrencia']; ?>">
            <input type="hidden" class="form-control" name="status" value="1">
            <h5 style="float:right; margin-top:-3%; margin-right:15px">Aplicada por:  <?php echo $row['nome_usuario']; ?></h5> 
                        <hr> 
            <button type="submit" class="btn btn-inverse btn-custom waves-effect waves-light" style="float:right; margin-right:6px;" > <i class="fa fa-check m-r-5"></i> <span>Visualizado</span> </button>
            </div>
            </form>
        </div>
    </div>
<?php } } ?>


                            </div>

                            </div>

                            <center><div>                            
                           <ul class="pagination pagination-split"> 
                     <?php 
                        $menos = $pagina - 1;
                        $mais = $pagina + 1;
                        $pgs = ceil($total / $maximo);
                        if ($pgs > 1) {
                                echo "<br />";
                        if ($menos > 0) {
                            echo "<li class='arrow'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$menos><i class='fa fa-angle-left'></i></a></li> ";
                        }
                        for ($i=1; $i <= $pgs; $i++) { 
                            if ($i != $pagina) {
                        echo "<li><a href=" . $_SERVER['PHP_SELF']. "?pagina=" . ($i) . "> $i </a></li>" ;
                            }else{
                        echo "<li class='active'><a>" . $i . "</a></li> ";
                            }
                        }
                        if ($mais <= $pgs) {
                        echo "<li class='arrow'><a href=" . $_SERVER['PHP_SELF'] . "?pagina=$mais><i class='fa fa-angle-right'></i></a></li>";
                    }
                }
                 ?>  
                                                </ul></div></center> 

                        </div>



                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    2016 © Sisco 
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


          


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

        <!-- jQuery  -->
        <script src="../assets/plugins/moment/moment.js"></script>

        <!-- jQuery  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- jQuery  -->
        <script src="../assets/plugins/sweetalert/dist/sweetalert.min.js"></script>

        <!-- skycons -->
        <script src="../assets/plugins/skyicons/skycons.min.js" type="text/javascript"></script>

        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>

        <script src="../assets/pages/jquery.widgets.js"></script>

        <!-- Todojs  -->
        <script src="../assets/pages/jquery.todo.js"></script>

        <!-- chatjs  -->
        <script src="../assets/pages/jquery.chat.js"></script>

        <!-- Knob -->
        <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

	
	</body>
</html>