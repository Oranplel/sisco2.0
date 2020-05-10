<?php include '../dao/connect_db.php'; ?>
<?php
session_start();
if (isset($_COOKIE['usuario2'])) {

    $_SESSION['id2'] = $_COOKIE['id2'];
    $_SESSION['emailUser2'] = $_COOKIE['usuario2'];
    $_SESSION['nomeUser2'] = $_COOKIE['nome2'];
    $_SESSION['imgUser2'] = $_COOKIE['img2'];
} else {
    if (!isset($_SESSION[nomeUser2])) {
        header("Location: ../index.php");
        //echo "<script> window.location.href=\"../index.php\" </script>";
    }
    if (!isset($_SESSION[emailUser2])) {
        header("Location: bloqueio-tela.php");
        //echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
    } else {
        //senão, calculamos o tempo transcorrido
        $dataSalva = $_SESSION["ultimoAcesso2"];
        $agora = date("Y-n-j H:i:s");
        $tempo_transcorrido = (strtotime($agora) - strtotime($dataSalva));

        if ($tempo_transcorrido >= 1200) {
            //se passaram 10 minutos ou mais
            echo " <script> alert('Sua sessão expirou, dígite sua senha!')</script>";
            header("Location: bloqueio-tela.php");
            /*echo "<meta charset=utf-8>    
            <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";*/

            //senão, atualizo a data da sessão
        } else {
            $_SESSION["ultimoAcesso2"] = $agora;
        }
    }
}
?>
<?php $idTurma = $_GET['id']; ?>
<?php $pesquisa= $_POST['palavra'];?>

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

    <link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />



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
    <script src="../assets/plugins/moment/moment.js"></script>
    <script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="../assets/js/modernizr.min.js"></script>




    <script>
        var resizefunc = [];
    </script>
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.php" class="logo"><i class="ti-pencil-alt icon-c-logo"></i><span>Sisc<i class="md md-album"></i></span></a>
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
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgUser2']; ?>" alt="user-img" class="img-circle">
                            </a><ul class="dropdown-menu">
                                <li><a href="manual_prof.pdf" target="_blank"><i class="ti-book m-r-5"></i> Manual do Sistema</a></li>
                                <li><a href="bloqueio-tela.php"><i class="ti-lock m-r-5"></i> Bloquear Tela</a></li>
                                <li><a href="perfil_professor.php"><i class="ti-user m-r-5"></i> Perfil</a></li>
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
            <!--- Divider -->




            <div id="sidebar-menu">
                <ul>

                    <li class="text-muted menu-title">Menu de Navegação</li>

                    <li>
                        <a href="index.php"><i class="ti-home"></i><span> Home </span></a>

                    </li>

                    <li>
                        <a href="alunos.php?id=<?php echo $idTurma ?>" class="active"><i class="ti-menu-alt"></i><span>Alunos </span></a>

                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>



    <!-- ============================================================== -->
    <!-- corpo do site -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <?php
                    $q = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso, nome_usuario FROM tb_turma, tb_cursos, tb_usuario WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos AND tb_turma.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND idtb_turma = $idTurma" ;
                    $resultado = $pdo->prepare($q);
                    $resultado->execute();
                    //$resultado = mysqli_query($mysqli, $q);
                    while($row = $resultado->FETCH(PDO::FETCH_OBJ)){
                    //while($row=mysqli_fetch_assoc($resultado)){
                ?>
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div>
                                <h4 ><i class="ti-angle-right"></i> <?php echo $row->serie; ?>º <?php echo utf8_encode($row->nome_curso); ?>

                                    <!-- sample modal content -->
                                    <form name="form" id="form1" action="dao/cad_coletiva.php" method="POST" enctype="multipart/form-data">
                                        <div id="custom-width-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="custom-width-modalLabel"> Registro de Intervenção Coletiva</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <!-- Form Elements -->
                                                                <div class="panel panel-default">

                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-md-8">


                                                                                <input type="hidden" class="form-control" name="turm" value="<?php echo $idTurma ?> ">
                                                                                <div class="form-group">
                                                                                    <input type="hidden" class="form-control" name="user" value="<?php echo $_SESSION[id2] ?>">

                                                                                    <div class="col-lg-9" style="">

                                                                                        <label class="col-md-2 control-label">Motivo:</label>
                                                                                        <textarea  name="motivo"class="form-control" rows="5" style="height:200px"></textarea>




                                                                                    </div>
                                                                                    <div class="col-lg-3">

                                                                                        <label  class="control-label col-sm-15">Data:</label>
                                                                                        <div class="">

                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control" placeholder="dia/mês/ano" name="data" id="datepicker-autoclose" style="width:230px">

                                                                                            </div>

                                                                                        </div>

                                                                                        <br>


                                                                                        <label class="control-label ">Hora:</label>

                                                                                        <div class="input-group m-b-70">
                                                                                            <div class="input-control">
                                                                                                <div class="bootstrap-timepicker" style="width:230px">
                                                                                                    <input  id="timepicker" type="text" class="form-control" name="hora" style="width:230px">
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>


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
                                                        <button type="submit" class="btn btn-default waves-effect">Registrar</button>
                                                        <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </form>
                                </h4>
                                <hr>
                                <div class="col-lg-4">  <p><b> Diretor de Turma: </b><?php echo utf8_encode($row->nome_usuario); ?></p></div>
                                <div class="col-lg-2">  <p><b> Nº de alunos: </b> <?php
                                        $q2 = "SELECT * FROM tb_aluno WHERE tb_turma_idtb_turma = $idTurma";
                                        //Conta quantos registros possuem na tabela
                                        $sql = $pdo->prepare($q2);
                                        $sql->execute();
                                        //$sql = mysqli_query($mysqli, $q2);
                                        //Conta quantos registros possuem na tabela
                                        $total = $sql->rowCount();
                                        //$total = mysqli_num_rows($sql);
                                        //Mostra o valor
                                        echo $total;
                                        ?>  </p></div>
                                <div class="col-lg-2">  <p><b> Intervenções: </b>
                                        <?php
                                            $q7 = "SELECT * FROM tb_ocorrencia WHERE tb_turma_idtb_turma = $idTurma AND nivel_ocorrencia = 's'";
                                            //Conta quantos registros possuem na tabela
                                            $sql = $pdo->prepare($q7);
                                            $sql->execute();
                                            //$sql = mysqli_query($mysqli, $q7);
                                            $total = $sql->rowCount();
                                            //$total = mysqli_num_rows($sql);
                                            //Mostra o valor
                                            echo $total;
                                        ?>
                                    </p></div>

                                <br>
                            </div>
                        </div>
                    </div>


                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-9">
                                <form name="frmbusca" method="post" action="alunos.php?id=<?php echo $idTurma ?>">
                                    <div class="form-group contact-search m-b-30">
                                        <div class="input-group">
                                            <input type="text"  name="palavra" class="form-control" placeholder="Pesquisar">
                                            <span class="input-group-btn">
                                                        <button type="submit" class="btn waves-effect btn btn-default in"><i class="fa fa-search"></i></button>
                                                    </span>
                                        </div>
                                    </div> <!-- form-group -->
                                </form>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover mails m-0 table table-actions-bar">
                                <thead>
                                <tr>
                                    <th><i class="ti-user"></i></th>
                                    <th>Nome</th>
                                    <th>Nº da matricula</th>
                                    <th>N° de Intervenções</th>
                                    <th>Consultar</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                    $q4 = "SELECT idtb_aluno, nome_aluno, email_aluno, matricula, diario, responsavel_aluno, foto_aluno, idtb_turma  FROM tb_aluno, tb_turma WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND idtb_turma = $idTurma AND nome_aluno LIKE '%$pesquisa%'  ORDER BY nome_aluno ASC";

                                    $resultad = $pdo->prepare($q4);
                                    $resultad->execute();
                                    //$resultad = mysqli_query($mysqli, $q4);
                                    $total = $resultad->rowCount();
                                    //$total2 = mysqli_num_rows($resultad);
                                    while($ro = $resultad->FETCH(PDO::FETCH_OBJ)){
                                    //while ($ro = mysqli_fetch_assoc($resultad)){
                                ?>
                                    <tr>

                                        <td>
                                            <img src="../fotos/<?php echo $ro->foto_aluno; ?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm"  style=" width:40px; height:40px"/>
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($ro->nome_aluno); ?>
                                        </td>
                                        <td>
                                            <?php echo $ro->matricula; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $q6 = "SELECT * FROM tb_ocorrencia WHERE tb_aluno_idtb_aluno = $ro->idtb_aluno AND nivel_ocorrencia = 's'";
                                            //Conta quantos registros possuem na tabela
                                            $resultad = $pdo->prepare($q6);
                                            $resultad->execute();
                                            //$sql = mysqli_query($mysqli, $q6);
                                            //Conta quantos registros possuem na tabela
                                            $total = $resultad->rowCount();
                                            //$total = mysqli_num_rows($sql);
                                            //Mostra o valor
                                            echo $total;
                                            ?>
                                        </td>
                                        <td>
                                            <a href="aluno.php?id=<?php echo $ro->idtb_aluno; ?>">
                                                <button type="button" class="btn btn-default in" >Histórico</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-inverse waves-effect waves-light" data-toggle="modal" data-target="#full-width-modal<?php echo $ro->idtb_aluno; ?>">Registrar</button>
                                            <!-- inicio de modal da ocorrencia atraso e etc. -->
                                            <form name="form3" action="dao/cad_ocorrencia.php" method="POST">
                                                <div id="full-width-modal<?php echo $ro->idtb_aluno; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <!--Head do modal -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="full-width-modalLabel">Registro de Intervenção</h4>
                                                            </div>
                                                            <!--Fim da head do modal -->

                                                            <!--Body do modal -->
                                                            <div class="row">
                                                                <div class="modal-body">
                                                                    <div class="col-lg-12">
                                                                        <input type="hidden" class="form-control" name="user" value="<?php echo $_SESSION[id2] ?>">
                                                                        <div class="col-lg-2">
                                                                            <img src="../fotos/<?php echo $ro->foto_aluno; ?>" alt="contact-img" title="contact-img" style="border: ridge; width:150px; height:150px"/>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <br>
                                                                            <p><b>Aluno(a): </b><?php echo utf8_encode($ro->nome_aluno); ?></p>

                                                                            <br>
                                                                            <p><b>Turma: </b><?php echo $row->serie; ?>º <?php echo utf8_encode($row->nome_curso); ?></p>
                                                                        </div>

                                                                        <div class="col-lg-1">
                                                                            <br>
                                                                            <p><b>Nº: </b> <?php echo $ro->diario; ?> </p><br>
                                                                            <p>
                                                                                <input type="hidden" class="form-control" name="turma" value="<?php echo $ro->idtb_turma; ?> ">
                                                                                <input type="hidden" class="form-control" name="aluno" value="<?php echo $ro->idtb_aluno; ?> ">
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-lg-12"> <hr></div>





                                                                    <div class="col-lg-2"> </div>
                                                                    <div class="col-lg-2">
                                                                        <br>
                                                                        <label class="control-label">Motivo:</label>
                                                                        <div class="radio radio-custom">
                                                                            <input type="radio" name="radio" value="Celular" >
                                                                            <label for="radio1">
                                                                                Celular
                                                                            </label>
                                                                        </div>
                                                                        <br>

                                                                        <div class="radio radio-custom">
                                                                            <input type="radio" name="radio" value="Namoro">
                                                                            <label for="radio2">
                                                                                Namoro
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="radio radio-custom">
                                                                            <input type="radio" name="radio" value="Atrapalhando a aula" >
                                                                            <label for="radio3">
                                                                                Atrapalhando a aula
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="radio radio-custom">
                                                                            <input type="radio" name="radio" value="Desrespeito professor" >
                                                                            <label for="radio4">
                                                                                Desrespeito ao professor
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="radio radio-custom">
                                                                            <input  type="radio" name="radio" value="Outro">
                                                                            <label for="radio5">
                                                                                Outro...
                                                                            </label>


                                                                        </div>

                                                                        <br><br>



                                                                        <br>


                                                                    </div>
                                                                    <br>


                                                                    <div class="col-lg-4">
                                                                        <label class="col-md-2 control-label">Observações:</label>
                                                                        <textarea class="form-control" name="obs" rows="5" style="width:800px"></textarea>

                                                                    </div>



                                                                    <div class="col-lg-4">
                                                                        <label name ="data" class="control-label col-sm-15">Data:</label>
                                                                        <div class="">

                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="mês/dia/ano" name="data" id="datepicker-autoclose<?php echo $ro->idtb_aluno; ?>" style="width:230px">

                                                                            </div>

                                                                        </div>

                                                                        <br>


                                                                        <label name="hora" class="control-label ">Hora:</label>

                                                                        <div class="input-group m-b-70">
                                                                            <div class="input-control">
                                                                                <div class="bootstrap-timepicker" style="width:230px">
                                                                                    <input id="timepicker<?php echo $ro->idtb_aluno; ?>" type="text" class="form-control" name="hora" style="width:230px">
                                                                                </div>


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <script>
                                                                        jQuery(document).ready(function() {

                                                                            // Time Picker
                                                                            jQuery('#timepicker').timepicker({
                                                                                defaultTIme: false
                                                                            });
                                                                            jQuery('#timepicker<?php echo $ro->idtb_aluno; ?>').timepicker({
                                                                                defaultTIme: false
                                                                            });

                                                                            //colorpicker start

                                                                            $('.colorpicker-default').colorpicker({
                                                                                format: 'hex'
                                                                            });
                                                                            $('.colorpicker-rgba').colorpicker();

                                                                            // Date Picker
                                                                            jQuery('#datepicker').datepicker();
                                                                            jQuery('#datepicker-autoclose').datepicker({
                                                                                autoclose: true,
                                                                                todayHighlight: true
                                                                            });
                                                                            jQuery('#datepicker-autoclose<?php echo $ro->idtb_aluno; ?>').datepicker({
                                                                                autoclose: true,
                                                                                todayHighlight: true
                                                                            });
                                                                            jQuery('#datepicker-inline').datepicker();
                                                                            jQuery('#datepicker-multiple-date').datepicker({
                                                                                format: "mm/dd/yyyy",
                                                                                clearBtn: true,
                                                                                multidate: true,
                                                                                multidateSeparator: ","
                                                                            });
                                                                            jQuery('#date-range').datepicker({
                                                                                toggleActive: true
                                                                            });

                                                                            //Clock Picker
                                                                            $('.clockpicker').clockpicker({
                                                                                donetext: 'Done'
                                                                            });

                                                                            $('#single-input').clockpicker({
                                                                                placement: 'bottom',
                                                                                align: 'left',
                                                                                autoclose: true,
                                                                                'default': 'now'
                                                                            });
                                                                            $('#check-minutes').click(function(e) {
                                                                                // Have to stop propagation here
                                                                                e.stopPropagation();
                                                                                $("#single-input").clockpicker('show')
                                                                                    .clockpicker('toggleView', 'minutes');
                                                                            });


                                                                            //Date range picker
                                                                            $('.input-daterange-datepicker').daterangepicker({
                                                                                buttonClasses: ['btn', 'btn-sm'],
                                                                                applyClass: 'btn-default',
                                                                                cancelClass: 'btn-white'
                                                                            });
                                                                            $('.input-daterange-timepicker').daterangepicker({
                                                                                timePicker: true,
                                                                                format: 'MM/DD/YYYY h:mm A',
                                                                                timePickerIncrement: 30,
                                                                                timePicker12Hour: true,
                                                                                timePickerSeconds: false,
                                                                                buttonClasses: ['btn', 'btn-sm'],
                                                                                applyClass: 'btn-default',
                                                                                cancelClass: 'btn-white'
                                                                            });
                                                                            $('.input-limit-datepicker').daterangepicker({
                                                                                format: 'MM/DD/YYYY',
                                                                                minDate: '06/01/2015',
                                                                                maxDate: '06/30/2015',
                                                                                buttonClasses: ['btn', 'btn-sm'],
                                                                                applyClass: 'btn-default',
                                                                                cancelClass: 'btn-white',
                                                                                dateLimit: {
                                                                                    days: 6
                                                                                }
                                                                            });

                                                                            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                                                                            $('#reportrange').daterangepicker({
                                                                                format: 'MM/DD/YYYY',
                                                                                startDate: moment().subtract(29, 'days'),
                                                                                endDate: moment(),
                                                                                minDate: '01/01/2012',
                                                                                maxDate: '12/31/2015',
                                                                                dateLimit: {
                                                                                    days: 60
                                                                                },
                                                                                showDropdowns: true,
                                                                                showWeekNumbers: true,
                                                                                timePicker: false,
                                                                                timePickerIncrement: 1,
                                                                                timePicker12Hour: true,
                                                                                ranges: {
                                                                                    'Today': [moment(), moment()],
                                                                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                                                                },
                                                                                opens: 'left',
                                                                                drops: 'down',
                                                                                buttonClasses: ['btn', 'btn-sm'],
                                                                                applyClass: 'btn-default',
                                                                                cancelClass: 'btn-white',
                                                                                separator: ' to ',
                                                                                locale: {
                                                                                    applyLabel: 'Submit',
                                                                                    cancelLabel: 'Cancel',
                                                                                    fromLabel: 'From',
                                                                                    toLabel: 'To',
                                                                                    customRangeLabel: 'Custom',
                                                                                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                                                                    monthNames: ['Janeiro', 'Fervereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                                                                    firstDay: 1
                                                                                }
                                                                            }, function(start, end, label) {
                                                                                console.log(start.toISOString(), end.toISOString(), label);
                                                                                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                                                            });

                                                                        });
                                                                    </script>
                                                                    <div class="col-lg-2"> </div>

                                                                    <div class="col-lg-12">
                                                                        <hr>
                                                                        <div><button type="button" style="float:right;" class="btn btn-inverse waves-effect" data-dismiss="modal" id="salvarsaida">Fechar</button></div>

                                                                        <div style="padding-right:80px"><button type="submit" name="enviar" values="enviar"  class="btn btn-default in" style="float:right;" >Confirmar</button></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Fim do body do modal -->
                                            </form>
                                            <!-- fim do modal -->
                                        </td>
                                    </tr>


                                    <?php
                                }
                                ?>
                                </tbody>

                            </table>
                        </div>

                        <?php

                        if ($total2 == '0' || $total2 == null || $total2 == ""){
                            echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
                                Nenhum Aluno Encontrado.</center></b>
                                </div><br>";
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>

            </div> <!-- content -->

            <footer class="footer text-right">
                2020 © Sisco.
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- final do corpo -->
        <!-- ============================================================== -->



    </div>
    <!-- END wrapper -->
    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>
    <script src="../assets/plugins/moment/moment.js"></script>

</body>
</html>