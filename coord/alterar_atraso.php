<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario3'])) {

    $_SESSION['id3'] =$_COOKIE['id3'];
    $_SESSION['emailUser3'] =$_COOKIE['usuario3'];
    $_SESSION['nomeUser3'] = $_COOKIE['nome3'];
    $_SESSION['imgUser3'] = $_COOKIE['img3'];
    $_SESSION['foneUser3'] = $_COOKIE['fone3'];
    $_SESSION['celUser3'] = $_COOKIE['cel3'];
 }else{
 if(!isset($_SESSION[nomeUser3])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailUser3])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso3"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso3"] = $agora;
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

        <title>Sisco - Sistema de controle</title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

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

        <!-- menu -->
                <?php 
                     include_once 'include_front/menu.php';
                  
                ?>
        <!-- fim menu -->



            <!-- ============================================================== -->
            <!-- corpo do site -->
            <!-- ============================================================== -->
            
            
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Alteração de dados</h2>   
                        <h5>Altere os dados do atraso.</h5>
                       
                    </div>
                </div>
                <hr />


                <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">
                                    
                                  
   <form name="form_alterar" method="post" action="dao_front/alterar_atra.php" enctype="multipart/form-data">
                                   
      
       
                                        
                                <?php  
                                $idO = $_GET['id'];
                                $idAlt = $_GET['aluno'];
                                $sql = "SELECT idtb_aluno, idtb_atraso, data_atraso, hora_atraso, tipo_atraso FROM tb_aluno, tb_atraso WHERE tb_atraso.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAlt AND idtb_atraso = $idO";
                                  $result = mysqli_query($mysqli, $sql);
                                  $row=mysqli_fetch_assoc($result);
                                 ?> 
                                     <input value="<?php echo $row['idtb_aluno'];?>" name="idal" type="hidden">
                                     
                                          <center>
                                               
                                         
                                            
                                          <div class="col-md-12">
                                          <div class="input-group">
                                              
						<input type="hidden" class="form-control" readonly="true" name="id" value="<?php echo $row['idtb_atraso'];?>">
					</div>
                                          </div>
                                          <br>
                                          </center> 

                                      
                                            <div class="col-md-6">
                                                <br>
                                                <label id="nome">Data:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data"  value="<?php echo $row['data_atraso'];?>">
						<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
					</div>
                                            </div>
                                       
                                        
                                        <div class="col-md-6">
                                            <br>
                                            <label id="email">Hora:</label>
                                        <div class="input-group">
                                            <input class="form-control" name="hora"  value="<?php echo $row['hora_atraso'];?>">
                                            <span class="input-group-addon bg-custom b-0 text-white"><i class="ti-arrow-circle-down "></i></span>
                                       </div>
                                        </div>
                                       
                                       <div class="col-md-12">
                                           <br>
                                           <label for="fone">Motivo:</label>
                                       <div class="input-group">
                                           <textarea class="form-control" name="tipo" ><?php echo $row['tipo_atraso'];?></textarea>
                                           <span class="input-group-addon bg-custom b-0 text-white"><i class=" ti-pencil-alt "></i></span>
                                         
                                       </div>
                                            <br> <br> <br> 
                                       </div>
                                       
                                      
                                      
                                       
                                        
                                              
                                        
                                        
            <a href="historico_aluno.php?id=<?php echo $row['idtb_aluno'];?>"><button type="button" style="float:right" class="btn btn-inverse">Cancelar</button></a>
                                       
                                       
                                        
                                          <button type="submit" class="btn btn-default in" style="float:right; margin:0 10px ">Alterar</button>
                                        <?php
                                                        
                                                    
                                                          ?>
                                         </form>


                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>


                    </div> <!-- container -->

                </div> <!-- content -->
           

                <footer class="footer text-right">
                    2016 © Sisco.
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
        
        <script src="../assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>

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
