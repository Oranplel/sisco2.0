<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario'])) {

$_SESSION['id'] =$_COOKIE['id'];
    $_SESSION['emailUser'] =$_COOKIE['usuario'];
    $_SESSION['nomeUser'] = $_COOKIE['nome'];
    $_SESSION['imgUser'] = $_COOKIE['img'];
 }else{
 if(!isset($_SESSION['nomeUser'])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION['emailUser'])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso"] = $agora;
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

        <title>SISCO - Área Administraiva</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link href="../assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />

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

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php
            include_once 'include/menu.php';
            ?>
            <!-- Left Sidebar End -->




           

  



            <!-- ============================================================== -->
            <!-- corpo do site -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-lg-12">
                                <?php  
                                          $p  = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso FROM tb_turma, tb_cursos WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos  ORDER BY serie, nome_curso ASC";
                                         //$resultado = mysqli_query($mysqli, $p); 
                                         $resultado = $pdo->prepare($p);
                                         $resultado->execute();
                                            if($resultado){
                                                while ($row = $resultado->fetch(PDO::FETCH_OBJ)){
                                                    ?>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="manu-turma.php?id=<?php echo $row->idtb_turma; ?>"><div class="mini-stat clearfix card-box">
                                    <span class="mini-stat-icon btn-default"><i class="ion-android-contacts text-white"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php
                                        $p2= "SELECT * FROM tb_aluno where tb_turma_idtb_turma = $row->idtb_turma";
                                        $sql = $pdo->prepare($p2);
                                        $sql->execute();
                                         //$sql = mysqli_query($mysqli, $p2);
                                        //Conta quantos registros possuem na tabela

                                        $total = $sql->rowCount();
                                        //Mostra o valor
                                        echo $total;
                                        ?> </span>
                                        Total de Alunos
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                        
                                            <h5 class="text-uppercase"><?php echo $row->serie; ?>° <?php echo utf8_encode($row->nome_curso); ?>

                                            
                                     </h5>
                                            
                                               
                                            <div  style="float: right; ">
                                        <a href="dao/excluir-turma.php?id=<?php echo $row->idtb_turma; ?>" ><button  class="btn btn-default waves-effect waves-light" onclick=" return confirm('Deseja mesmo excluir turma?')" ><i class="ion-trash-a "></i></button></a>
                                        <a href="dao/refresh-turma.php?id=<?php echo $row->idtb_turma; ?>" ><button class="btn btn-inverse waves-effect waves-light"><i class="ion-refresh"></i></button></a>
                                        <!--<button style="float:right; "  type="button" class="btn btn-white btn-custom waves-effect waves-light " data-toggle="modal" data-target="#custom-width-moda"><i class=" icon-pencil"></i> </button>
                                                
                                            -->          
                                            </div>          
                                         
                                         
                                         
                                         
                                         
                                                         
                                                   
                                                   
                                        
                                        </div>
                                    </div>
                                    </div></a>
                                
                            </div>
                               
                                            <?php } } ?>
                               
                            </div>
                            
                        
                        </div>

                        <div class="row">
                        
                       

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    <center>  2016 © Sisco.</center>
                          
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- final do corpo -->
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

