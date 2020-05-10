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

<title>Sisco - Sistema de controle</title>
    </head>


    <body class="fixed-left">
 <div id="wrapper">
        <!-- menu -->
                <?php include './include_front/menu.php'; ?>
                
        <!-- fim menu -->


           



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
                                
                                            $resultado = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso FROM tb_turma, tb_cursos WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos ORDER BY serie, nome_curso ASC";
                                            $resulta = mysqli_query($mysqli, $resultado);
                                            $jml = mysqli_num_rows($resulta);
                                            
                                                while ($row = mysqli_fetch_assoc($resulta)){
                                                    ?>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="turmas.php?id=<?php echo $row['idtb_turma']; ?>"><div class="mini-stat clearfix card-box">
                                    <span class="mini-stat-icon btn-default"><i class="ion-android-contacts text-white"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php
                                        $sql = "SELECT * FROM tb_aluno where tb_turma_idtb_turma = $row[idtb_turma];";
                                        $result = mysqli_query($mysqli, $sql);
                                        //Conta quantos registros possuem na tabela

                                        $total = mysqli_num_rows($result);
                                        //Mostra o valor
                                        echo $total;
                                        ?> </span>
                                        Total de Alunos
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase"><?php echo $row['serie']; ?>° <?php echo utf8_encode($row['nome_curso']); ?><span class="pull-right"></span></h5>
                                            
                                        </div>
                                    </div>
                                    </div></a>
                                
                            </div>
                               
                                            <?php }   ?>
                               
                            </div>
                            
                            <div class="col-sm-12">
                              <hr>
                                <h4 ><i class="ti-angle-right"></i> Pendências</h4>
                                
                               <br>

                                 <!-- retorno dos alunos -->
                                 <?php  
                                                                  
                                                            $dataSaida = ["data_saida"];
                                                            $dataDia = date("d-m-Y");
                                                            $resulta = "SELECT * FROM tb_aluno, tb_saida WHERE status_retorno = '' and tb_saida.tb_aluno_idtb_aluno=tb_aluno.idtb_aluno ";
                                                            $resultado = mysqli_query($mysqli, $resulta);
                                                            
                                                                while ($ro =  mysqli_fetch_assoc($resultado)) {
                                                                   
                                                                 echo "
                                <div class='col-lg-4'>
                                <div class='portlet'>
                                    <div class='portlet-heading bg-custom'>
                                        <h3 class='portlet-title'>
                                            <img src='../fotos/$ro[foto_aluno]' alt='contact-img' title='contact-img' class='img-circle thumb-sm' />  ".utf8_encode($ro[nome_aluno])."
                                        </h3>
                                        <div class='portlet-widgets'>
                                            
                                            <span class='divider'></span>
                                            <a data-toggle='collapse' data-parent='#accordion$ro[idtb_saida]' href='#bg-primary$ro[idtb_saida]'><i class='ion-minus-round'></i></a>
                                            <span class='divider'></span>
                                            
                                        </div>
                                        <div class='clearfix'></div>
                                    </div>
                                    <div id='bg-primary$ro[idtb_saida]' class='panel-collapse collapse in'>
                                        <div class='portlet-body'>

                                                        <div class='clearfix' id='accordion$ro[idtb_saida]'> 
                                                                 
                                                                 <form class='' method='POST' action='dao_front/cad_pendencia.php'> 
                                                                 <div class='col-lg-12'> 
                                                                    <label style='float:left'>Houve retorno dia $ro[data_saida]?</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class='col-lg-4'> 
                                                                    <input type='hidden' name='id' value='$ro[idtb_saida]'> 
                                                                    <input type='hidden' name='aluno' value='$ro[idtb_aluno]'> 
                                                                    <input type='hidden' name='t' value='$ro[tb_turma_idtb_turma]'> 
                                                                   
                                                                    
                                                                     <div class='radio radio-custom'>
                                                                     
                                                                     <input type='radio' name='radio' value='Sim'>
                                                                     <label for='radio1'>Sim</label>

                                                                     </div>  
                                                                   
                                                                     
                                                                    <div class='radio radio-custom' style='padding-top:6px'>
                                                                     
                                                                     <input type='radio' name='radio' value='Não'>
                                                                     <label for='radio2'>Não</label>

                                                                     </div>
                                                                   
                                                                   </div>
                                                                    <div class='col-lg-12'> 
                                                                       <hr>                                                                  
                                                                       <button type='submit' class='btn btn-default in'  style='float:right' value='enviar'>Confirmar</button><br> <br>
                                                                      </div>
                                                                 </form>
                                                            
                                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                 ";
                                                                
                                                            } 
                                                                  ?>
                                 

                             
                                
                            </div>
                        </div>

                        <div class="row">
                        
                       

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