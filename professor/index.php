<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario2'])) {

    $_SESSION['id2'] =$_COOKIE['id2'];
    $_SESSION['emailUser2'] =$_COOKIE['usuario2'];
    $_SESSION['nomeUser2'] = $_COOKIE['nome2'];
    $_SESSION['imgUser2'] = $_COOKIE['img2'];
 }else{
 if(!isset($_SESSION['nomeUser2'])){
    header("Location: ../index.php");
    //echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION['emailUser2'])){
    header("Location: bloqueio-tela.php");
    //echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso2"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
        echo " <script> alert('Sua sessão expirou, dígite sua senha!')</script>";
        header("Location: bloqueio-tela.php");
      /*echo "<meta charset=utf-8>
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";*/
      
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso2"] = $agora;
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

        <link rel="shortcut icon" href="../assets/images/espinho_azul.ico">

        <title>Sisco</title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../assets/css/2020.css">
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../assets/js/modernizr.min.js"></script>

        

    </head>


    <body class="fixed-left">
 <div id="wrapper">
            <?php
            include_once '../adm/include/menu.php';
            ?>
        <!-- #Begin page#
          <div class="topbar">

                #LOGO#
                 <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="ti-pencil-alt icon-c-logo"></i><span>Sisc<i class="md md-album"></i></span></a>
                    </div>
                </div>

                 #Button mobile view to collapse sidebar menu#
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
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgUser2'];?>" alt="user-img" class="img-circle"> 
                                    </a> <ul class="dropdown-menu">
                                        <li><a href="manual_prof.pdf" target="_blank"><i class="ti-book m-r-5"></i> Manual do Sistema</a></li>
                                        <li><a href="bloqueio-tela.php"><i class="ti-lock m-r-5"></i> Bloquear Tela</a></li>
                                        <li><a href="perfil_professor.php"><i class="ti-user m-r-5"></i> Perfil</a></li>
                                        <li><a href="dao/logout.php"><i class="ti-power-off m-r-5"></i> Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        #/.nav-collapse#
                    </div>
                </div>
            </div>
             #Top Bar End#


            #========== Left Sidebar Start ==========#

             <div class="left side-menu side-menu-sm">
                <div class="sidebar-inner slimscrollleft">
                     #Divider# 
                     #Divider# 
                  

                            

                            <div id="sidebar-menu">
                        <ul>

                                        <li class="text-muted menu-title">Menu de Navegação</li>

                           <li>
                                <a href="index.php" class="active"><i class="ti-home"></i><span> Home </span></a>
                               
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
   

             #============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                           <div class="row">
                           
                                 <?php
                                    try {
                                        
                                      
                                            $q = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso FROM tb_turma, tb_cursos WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos ORDER BY serie, nome_curso ASC";
                                            $resultado = $pdo->prepare($q);
                                            $resultado->execute();
                                            while($row = $resultado->FETCH(PDO::FETCH_OBJ)){
                                            //while($row=mysqli_fetch_assoc($resultado)){

                                                    ?>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="alunos.php?id=<?php echo $row->idtb_turma; ?>"><div class="mini-stat clearfix card-box fade-in shad" >
                                    <span class="mini-stat-icon" style="background-color: #00ccffff !important;"><i class="ion-android-contacts text-white" ></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php
                                        $q1 = "SELECT * FROM tb_aluno WHERE tb_turma_idtb_turma = $row->idtb_turma;";
                                        $sql = $pdo->prepare($q1);
                                        $sql->execute();
                                        //Conta quantos registros possuem na tabela
                                        $total = $sql->rowCount();
                                        //Mostra o valor
                                        echo $total;
                                        ?> </span>
                                        Total de Alunos
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase"><?php echo $row->serie; ?>° 
                                                <?php echo utf8_encode($row->nome_curso); ?>
                                                <span class="pull-right"></span></h5>
                                            
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                               
                                            <?php } 
                                            } catch (PDOException $e) {
                                                echo "ERRO".$e->getMessage();
                                            }?>
                               
                        </div>
                             
                        </div class="row">

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                 <center>©Sisco - 2020</center>  
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
         
            <!-- /Right-bar -->

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

        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="../assets/plugins/morris/morris.min.js"></script>
        <script src="../assets/plugins/raphael/raphael-min.js"></script>

        <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="../assets/pages/jquery.dashboard.js"></script>

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