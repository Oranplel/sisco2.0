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



      <!-- Left Sidebar End -->

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">

            <!-- Page-Title -->
            <form  id="formulario" name="formulario"  method="post" role="form" action="dao/cad-turma.php">
            <div class="row">
               <div class="col-md-12">

                                                             <?php


                    include '../dao/connect_db.php';

  $dados = $_GET['dados'];

        if($dados == 'null'){
             echo "<meta charset=utf-8>
        <div class='alert alert-danger alert-dismissable'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Selecione todos os campos.
        </div>";
        }else{

        }
if($dados == 'sucesso'){

echo "<meta charset=utf-8>
        <div class='alert alert-success alert-dismissable'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <i class=' icon-check'></i>  Turma cadastrada.
        </div>";

                }else{

                }



?>
                     <h2>Cadastro de Turma</h2>
                        <h5>Cadastre as Turmas que serão consultadas no sistema </h5>

                    </div>
            </div>



                        <!-- Basic Form Wizard -->

                        <!-- Vertical Steps Example -->

                        <!-- Wizard with Validation -->

                        <div class="row">
              <div class="col-sm-12">

                                                            <div class="col-sm-1">

                                                            </div>

                                                             <div class="col-sm-10">



                <div class="col-lg-12 back">
    <div role="tabpanel">
    <br/><br/><br/><br/>
      <ul class="nav nav-tabs tabs" role="tablist">
      <li role="presentation" class="active"><a href="#turma" aria-controls="turma" role="tab" data-toggle="tab">Dados da Turma</a></li>

      </ul>
      <div class="tab-content aba">



        <!-- Dados da turma -->


        <div role="tabpanel" class="tab-pane active" id="turma" >





                                            <!-- SELEÇÃO DO CURSO -->
                                                <div class="form-group clearfix">
                                                    <label
                                                 class="col-lg-1 control-label " for="userName2" style="font-family: Baskerville Old Face; font-size:17px"><b>Curso</b>
                                                </label>
                                                    <div class="col-lg-7">
                                                          <select  class="selectpicker" data-style="btn-inverse btn-custom " name="nome_curso" type="text">
                                                          <option value="0">Selecione...</option>
                               <?php
                                                   $sql = "SELECT * FROM tb_cursos WHERE status_curso=1";
                             //$result = mysqli_query($mysqli, $sql);
                             $result = $pdo->prepare($sql);
                             $result->execute();
                             $i=1;
                             while($r=$result->fetch(PDO::FETCH_OBJ)){

                                                 echo " <option value=".$r->idtb_cursos."> ".utf8_encode($r->nome_curso)."
                                                            </option> ";
  $i++;

                                                    }

                                                ?>

                    </select>

                                                    </div>

                                                    <!-- Incluir Curso-->

                                                    <div class="col-lg-4">
                                                         <a class="btn btn-default waves-effect waves-light" style="width:100%; height:40px" data-toggle="modal" data-target="#custom-width-modal"><span class="glyphicon glyphicon-plus"></span> Novo Curso</a>

                                                         <!-- sample modal content -->







                                                    </div>
                                                </div>


                                                <!-- Seleção de PDT -->

                                                  <div class="form-group clearfix">
                                                    <label
                                                   class="col-lg-1 control-label " for="userName2" style="font-family: Baskerville Old Face; font-size:17px"><b>PDT</b>
                                                  </label>
                                                    <div class="col-lg-7">
                                                         <select  class="selectpicker" data-style="btn-inverse btn-custom " style="width:100%; height:40px" name="nome_usuario">
                                                    <option value="0">Selecione...</option>

 <?php
                                                   $sql = "SELECT * FROM tb_usuario where tipo_usuario='PDT' and  status_usuario = '1'";
                             //$result = mysqli_query($mysqli, $sql);
                             $result = $pdo->prepare($sql);
                             $result->execute();
                             $i=1;
                             while($r=$result->fetch(PDO::FETCH_OBJ)){

                                                 echo " <option value=".$r->idtb_usuario."> ".utf8_encode($r->nome_usuario)."
                                                            </option> ";
  $i++;

                                                    }

                                                ?>

                                                      </select>

                                                    </div>


                                                      <!-- Incluir PDT -->
                                                    <div class="col-lg-4">
                                                        <a href="cad-user.php" class="btn btn-default waves-effect waves-light" style="width:100%; height:40px"><span class="glyphicon glyphicon-plus"></span> Novo PDT</a>

                                                                      <!-- sample modal content -->



                                                    </div>
                                                </div><!-- fim do PDT  -->



                                                 <!-- SSELEÇÃO DA SERIE  -->
                                                <div class="form-group clearfix">


                                                    <label
                                                        class="col-lg-1 control-label " for="userName2" style="font-family: Baskerville Old Face; font-size:17px"><b>Ano</b>

                                                    </label>
                                                    <div class="col-lg-7">
                                                        <select class="selectpicker" data-style="btn-inverse btn-custom" name="ano">

                                                             <option value="0">Selecione...</option>
                                                             <option  value="2015">2015</option>
                                                             <option  value="2016">2016</option>
                                                             <option  value="2017">2017</option>
                                                             <option  value="2018">2018</option>
                                                             <option  value="2019">2019</option>
                                                             <option  value="2020">2020</option>
                                                             <option  value="2021">2021</option>
                                                             <option  value="2022">2022</option>
                                                             <option  value="2023">2023</option>
                                                             <option  value="2024">2024</option>
                                                             <option  value="2025">2025</option>
                                                             <option  value="2026">2026</option>

                            </select>

                                                    </div>




                                                </div><!-- FIM DE SERIE  -->



                                                <div class="form-group clearfix">
                                                    <br>
                                                    <button name="env" class="btn btn-default btn-custom btn-rounded waves-effect waves-light" style="float:right " type="submit">Cadastrar</button>


                                                    <div class="col-lg-4">
                                                       </div>
                                                </div>








                                    </form>

        </div>


        <!-- Cadastro de aluno -->


                                  <form action="dao/cad-curso.php" method="POST">

                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">   Cadastro de Curso</h4>
                                                </div>
                                                <div class="modal-body">

                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">



                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome_curso">Nome do Curso</label>
                                            <input class="form-control inp" name="nome_curso" id="nome_curso" required/>
                                        </div>
                                        </div>







                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>

                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                   <a href="dao/cad-curso.php"> <button type="submit" class="btn btn-default waves-effect">Cadastrar</button></a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->



      </div>
    </div>
  </div>
                </div>



                                                             <div class="col-sm-1">

                                                            </div>


              </div>
            </div>
                        <!-- End row --> </form>

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                 <center> 2016 © Todos os direitos reservados a SisCo.</center>
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



        <script src="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="../text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="../assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>


        <!-- jQuery  -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

  </body>
</html>


