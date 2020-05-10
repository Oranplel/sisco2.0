<?php include '../dao/connect_db.php'; ?>
<?php
session_start();
if(isset($_COOKIE['usuario2'])) {

    $_SESSION['id2'] =$_COOKIE['id2'];
    $_SESSION['emailUser2'] =$_COOKIE['usuario2'];
    $_SESSION['nomeUser2'] = $_COOKIE['nome2'];
    $_SESSION['imgUser2'] = $_COOKIE['img2'];
}else{
    if(!isset($_SESSION[nomeUser2])){
        echo "<script> window.location.href=\"../index.php\" </script>";
    }
    if(!isset($_SESSION[emailUser2])){
        echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
    }else{
        //senão, calculamos o tempo transcorrido
        $dataSalva = $_SESSION["ultimoAcesso2"];
        $agora = date("Y-n-j H:i:s");
        $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

        if($tempo_transcorrido >= 1200) {
            //se passaram 10 minutos ou mais
            echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
            //senão, atualizo a data da sessão
        }else {
            $_SESSION["ultimoAcesso2"] = $agora;
        }
    }
}

?>
<?php $idAluno = $_GET['id'];?>
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
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgUser2'];?>" alt="user-img" class="img-circle">
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
                        <a href="#" class="active"><i class="ti-menu-alt"></i><span>Alunos </span></a>

                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <?php
            $sql = "SELECT * FROM tb_aluno, tb_turma, tb_cursos WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma  AND idtb_aluno = $idAluno LIMIT 1";

            $result = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                ?>

                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="../fotos/<?php echo $row['foto_aluno']; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h4 class="m-b-5"><b><?php echo utf8_encode($row['nome_aluno']); ?></b></h4>
                                    <p class="text-muted"> <?php echo $row['serie']; ?>° <?php echo utf8_encode($row['nome_curso']); ?></p>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-lg-12">
                            <div class="panel panel-border panel-custom">
                                <div class="panel-heading">
                                </div>



                                <?php
                                $maximo = 5;
                                $pagina = $_GET['pagina'];
                                if($pagina == ""){
                                    $pagina = "1";
                                }

                                $inicio = $pagina - 1;
                                $inicio = $maximo * $inicio;

                                $sql1 = "select * from tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno AND tb_usuario.idtb_usuario = tb_ocorrencia.tb_usuario_idtb_usuario AND nivel_ocorrencia = 's' ";

                                $query = mysqli_query($mysqli, $sql1);
                                $total = mysqli_num_rows($query);

                                $re = "SELECT * FROM tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno AND tb_usuario.idtb_usuario = tb_ocorrencia.tb_usuario_idtb_usuario AND nivel_ocorrencia = 's' ORDER BY data_reg DESC  LIMIT $inicio, $maximo";
                                $resultado = mysqli_query($mysqli, $re);
                                $total = mysqli_num_rows($resultado);
                                if ( $total == 0){
                                    echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
               Nenhuma Intervenção Encontrada.</center></b>
        </div>";
                                }elseif($resultado){
                                    while ($ro = mysqli_fetch_assoc($resultado)){

                                        ?>


                                        <div class="panel-body">
                                            <div class="text-muted"><?php echo $ro['data_ocorrencia']; ?> às <?php echo $ro['hora_ocorrencia']; ?>  </div>
                                            <p><a href="" class="text-custom">Aplicada por:</a> <?php echo $ro['nome_usuario']; ?></p>
                                            <a href="" class="text-custom">Motivo:</a> <?php echo $ro['obs_ocorrencia']; ?>
                                            <br>
                                            <?php if($ro['nome_usuario'] == $_SESSION['nomeUser2']){ ?>
                                                <div><a href="dao/excluir_oco_sala.php?id=<?php echo $row['idtb_aluno']; ?>&oco=<?php echo $ro['idtb_ocorrencia']; ?>"  onclick="return confirm(' Deseja realmente excluir registro? ')">
                                                        <button type="button" style="float:right;" class="btn btn-inverse waves-effect waves-light btn-sm" id="sa-params salvarsaida" data-dismiss="modal"><i class="icon-trash"></i></button></a>
                                                </div>
                                                <div style="padding-right:80px">
                                                    <button type="button" class="btn btn-default in" style="float:right;"  data-toggle="modal" data-target="#full-width-modal<?php echo $ro['idtb_ocorrencia']; ?>"><i class="icon-pencil"></i></button>
                                                </div>
                                                <div style="">
                                                    <button type="button" class="btn btn-default in" style="float:right;margin-right: 40px;"  data-toggle="modal" data-target="#modal<?php echo $ro['idtb_ocorrencia']; ?>"><i class="ion-reply"></i></button>
                                                </div>
                                                <div id="modal<?= $ro['idtb_ocorrencia']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                                    <form action="dao/replicar_ocorrencia.php" method="post">
                                                        <div class="modal-dialog modal-full" style="width: 55%">
                                                            <div class="modal-content">
                                                                <!--Head do modal -->
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title" id="full-width-modalLabel">Replicar Intervenção</h4>
                                                                </div>
                                                                <!--Fim da head do modal -->

                                                                <!--Body do modal -->
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <!-- Form Elements -->

                                                                            <div class="row"><div class="col-md-2"></div>
                                                                                <div class="">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group clearfix">
                                                                                            <input type="hidden" name="idocor" value="<?= $ro['idtb_ocorrencia']?>">
                                                                                            <label
                                                                                                class="col-lg-1 control-label center-block" for="turmaSelect"  style="font-family: Baskerville Old Face; font-size:17px;padding-top: 5px"><b>Turmas: </b>
                                                                                            </label>
                                                                                            <div class="col-lg-11">
                                                                                                <select class="form-control selectpicker btn-inverse btn-custom" id="turmaSelect" style="margin-left: 5px" name="turmaSelect">
                                                                                                    <option value="" disabled selected>Selecione o Curso</option>
                                                                                                    <?php
                                                                                                    $sql = "SELECT * FROM tb_turma,tb_cursos where tb_cursos_idtb_cursos=idtb_cursos ORDER BY serie";
                                                                                                    $result = mysqli_query($mysqli, $sql);
                                                                                                    while($r=mysqli_fetch_assoc($result)){

                                                                                                        echo '<option value="'.$r['idtb_turma'].'">'.$r['serie'].'° '.$r['nome_curso'].'</option>';

                                                                                                    }
                                                                                                    ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group clearfix">
                                                                                            <label
                                                                                                class="col-lg-1 control-label center-block" for="alunoSelect"  style="font-family: Baskerville Old Face; font-size:17px;padding-top: 5px"><b>Alunos: </b>
                                                                                            </label>
                                                                                            <div class="col-lg-11">
                                                                                                <select class="form-control selectpicker btn-inverse btn-custom" id="alunoSelect" style="margin-left: 5px" name="alunoSelect" disabled>
                                                                                                    <option value="" disabled selected>Selecione o Aluno</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Fim do body do modal -->
                                                                <!-- aqui -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-default in" style="float:right" name="enviar" >Confirmar</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>


                                                    <br>
                                                </div>
                                            <?php  }         ?>
                                        </div> <hr>




                                        <form name="form3" action="dao/alterar_oco_sala.php" method="POST">
                                            <div id="full-width-modal<?php echo $ro['idtb_ocorrencia']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display:none">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <!--Head do modal -->
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="full-width-modalLabel">Alterar Intervenção</h4>
                                                        </div>
                                                        <!--Fim da head do modal -->

                                                        <div class="row">
                                                            <div class="modal-body">
                                                                <div class="col-lg-12">

                                                                    <div class="col-lg-2">
                                                                        <img src="../fotos/<?php echo $row['foto_aluno']; ?>" alt="contact-img" title="contact-img" style="border: ridge; width:150px; height:150px"/>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <br>
                                                                        <p><b>Aluno(a): </b><?php echo utf8_encode($row['nome_aluno']); ?></p>

                                                                        <br>
                                                                        <p><b>Turma: </b><?php echo $row['serie']; ?>º <?php echo utf8_encode($row['nome_curso']); ?></p>
                                                                    </div>

                                                                    <div class="col-lg-1">
                                                                        <br>
                                                                        <p><b>Nº: </b> <?php echo $row['diario']; ?> </p><br>
                                                                        <p>
                                                                            <input type="hidden" class="form-control" name="oco" value="<?php echo $ro['idtb_ocorrencia']; ?> ">
                                                                            <input type="hidden" class="form-control" name="aluno" value="<?php echo $row['idtb_aluno']; ?> ">
                                                                        </p>
                                                                    </div>

                                                                </div><!-- Fim do cabeçalho do aluno -->
                                                                <div class="col-lg-12"> <hr></div>

                                                                <div class="col-lg-2"> </div>
                                                                <div class="col-lg-4"> <br>
                                                                    <label class="col-md-2 control-label">Motivo:</label>
                                                                    <textarea name="motivo" class="form-control" rows="5" style="width:800px"><?php echo $ro['obs_ocorrencia']; ?></textarea><br><br><br>
                                                                </div><br>
                                                                <div class="col-lg-1"> </div>
                                                                <div class="col-lg-4"> <br>
                                                                    <label name ="data" class="control-label col-sm-15">Data:</label>
                                                                    <div class="">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" placeholder="dia/mês/ano" name="data" id="datepicker-autoclose<?php echo $ro['idtb_ocorrencia']; ?>" style="width:230px" value="<?php echo $ro['data_ocorrencia']; ?>">
                                                                        </div>
                                                                    </div><br>
                                                                    <label name="hora" class="control-label ">Hora:</label>
                                                                    <div class="input-group m-b-70">
                                                                        <div class="input-control">
                                                                            <div class="bootstrap-timepicker" style="width:230px">
                                                                                <input id="timepicker<?php echo $ro['idtb_ocorrencia']; ?>" type="text" class="form-control" name="hora" style="width:230px" value="<?php echo $ro['hora_ocorrencia']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    jQuery(document).ready(function() {

                                                                        // Time Picker
                                                                        jQuery('#timepicker').timepicker({
                                                                            defaultTIme : false
                                                                        });
                                                                        jQuery('#timepicker<?php echo $ro["idtb_ocorrencia"]; ?>').timepicker({
                                                                            defaultTIme : false
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
                                                                        jQuery('#datepicker-autoclose<?php echo $ro["idtb_ocorrencia"]; ?>').datepicker({
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
                                                                        $('#check-minutes').click(function(e){
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
                                                                        }, function (start, end, label) {
                                                                            console.log(start.toISOString(), end.toISOString(), label);
                                                                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                                                        });

                                                                    });
                                                                </script>
                                                                <div class="col-lg-2"> </div>
                                                                <div class="col-lg-12"><hr>
                                                                    <div><button type="button" style="float:right;" class="btn btn-inverse waves-effect" data-dismiss="modal" id="salvarsaida">Fechar</button></div>
                                                                    <div style="padding-right:80px"><button type="submit" name="enviar" values="enviar"  class="btn btn-default in" style="float:right;" >Alterar</button></div>
                                                                </div>
                                                            </div><!--Fim do body do modal -->
                                                        </div>







                                                    </div>
                                                </div>
                                            </div>
                                        </form>





                                    <?php }  } ?>




                                <center><div>
                                        <ul class="pagination pagination-split">
                                            <?php
                                            $menos = $pagina - 1;
                                            $mais = $pagina + 1;
                                            $pgs = ceil($total / $maximo);
                                            if ($pgs > 1) {
                                                echo "<br />";
                                                if ($menos > 0) {
                                                    echo "<li class='arrow'><a href=" . $_SERVER['PHP_SELF'] . "?id=" . $idAluno . "?pagina=$menos><i class='fa fa-angle-left'></i></a></li> ";
                                                }
                                                for ($i=1; $i <= $pgs; $i++) {
                                                    if ($i != $pagina) {
                                                        echo "<li><a href=" . $_SERVER['PHP_SELF']. "?id=" . $idAluno . "&pagina=" . ($i) . "> $i </a></li>" ;
                                                    }else{
                                                        echo "<li class='active'><a>" . $i . "</a></li> ";
                                                    }
                                                }
                                                if ($mais <= $pgs) {
                                                    echo "<li class='arrow'><a href=" . $_SERVER['PHP_SELF'] . "?id=" . $idAluno . "?pagina=$mais><i class='fa fa-angle-right'></i></a></li>";
                                                }
                                            }
                                            ?>
                                        </ul></div></center>



                            </div>
                        </div>
                    </div>





                </div> <!-- container -->
            <?php  }  ?>
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


<script src="../assets/js/jquery.core.js"></script>
<script src="../assets/js/jquery.app.js"></script>
<script src="../assets/plugins/moment/moment.js"></script>
<script>
    $(function(){
        $('#turmaSelect').change(function(){
            if( $(this).val() ) {
                $.getJSON('dao/replicar_ocorrencia.php?turmaSelect=',{turmaSelect: $(this).val(), ajax: 'true'}, function(j){
                    document.getElementById("alunoSelect").disabled=false;
                    var options = '<option value="">Selecione o Aluno</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
                    }
                    $('#alunoSelect').html(options).show();
                    $('.carregando').hide();
                });
            } else {
                $('#id_sub_categoria').html('<option value="">Selecione o Aluno</option>');
            }
        });
    });
</script>
</body>
</html>