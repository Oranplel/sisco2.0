<?php include '../dao/connect_db.php'; ?>
<?php
session_start();
if(isset($_COOKIE['usuario3'])) {

    $_SESSION['id3'] = $_COOKIE['id3'];
    $_SESSION['emailUser3'] = $_COOKIE['usuario3'];
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
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta http-equiv="refresh" content="1200">

    <link rel="shortcut icon" href="../assets/images/favicon_1.ico">


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


    <title>Sisco - Sistema de controle</title>



</head>


<body class="fixed-left">

<!-- Menu-->
<?php

include_once './include_front/menu-hist.php';

?>

<!-- Fim menu -->
<?php $idAluno = $_GET['id'];?>


<!-- ============================================================== -->
<!-- corpo do site -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="col-lg-12">
                <?php
                $q1 = "SELECT * FROM tb_aluno, tb_turma, tb_cursos WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos AND tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND  idtb_aluno = $idAluno";
                
                ?>
                <div class="card-box">
                    <div>
                        <h4 ><i class="ti-angle-right"></i><?php echo utf8_encode($row['nome_aluno']); ?></h4>
                        <br>
                        <div class="col-lg-5">  <p><b> Turma: </b>  <?php echo $row['serie']; ?>º <?php echo utf8_encode($row['nome_curso']); ?> </p></div>

                        <a  data-toggle="modal" data-target="#full-width-modal">
                            <button type="button" style="float:right; top: -60px" class="btn btn-default btn-rounded waves-effect waves-light">
                                <span class="btn-label"><i class="fa fa-print"></i></span> Relatório
                            </button>
                        </a>
                        <hr>
                        <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                            <form action="../pdt/mpdf/index.php" method="get">
                                <div class="modal-dialog modal-full" style="width: 55%">
                                    <div class="modal-content">
                                        <!--Head do modal -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="full-width-modalLabel">Tipos de Relatorios</h4>
                                        </div>
                                        <!--Fim da head do modal -->

                                        <!--Body do modal -->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Form Elements -->

                                                    <div class="row"><div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id" value="<?= $row['idtb_aluno']?>">
                                                                <input type="hidden" name="idt" value="<?= $row['idtb_turma']?>">
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-control inp" value="graves" name="graves" id="graves" type="checkbox" />
                                                                    <label for="graves">Registros Disciplinares Graves</label>
                                                                </div>
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-control inp" value="ocorrencia" name="ocorrencia" id="ocorrencia" type="checkbox" />
                                                                    <label for="ocorrencia">Registros Disciplinares</label>
                                                                </div>
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-control inp" value="fardamento" name="fardamento" id="fardamento" type="checkbox" />
                                                                    <label for="fardamento">Fardamento</label>
                                                                </div>
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-control inp" value="atrasos" name="atrasos" id="atrasos" type="checkbox" />
                                                                    <label for="atrasos">Atrasos</label>
                                                                </div>
                                                                <div class="checkbox checkbox-primary">
                                                                    <input class="form-control inp" value="saidas" name="saidas" id="saidas" type="checkbox" />
                                                                    <label for="saidas">Saidas</label>
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
                                            <button type="submit" class="btn btn-default in" style="float:right" value="enviar">Confirmar</button>
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <!--<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" style="width:55%;">
                                    <form action="../pdt/mpdf/index.php?id=<?= $row['idtb_aluno']?>&idt=<?= $row['idtb_turma']?>">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="modal-title" id="custom-width-modalLabel">Selecionar Relatorio</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Form Elements ->
                                                    <div class="panel panel-default">

                                                        <div class="panel-body">
                                                            <div class="row"><div class="col-md-2"></div>
                                                                <div class="col-md-8">
                                                                    <div class="col-md-12">
                                                                        <h4 id="">Tipos de Relatiorios</h4>
                                                                        <div class="checkbox checkbox-primary">
                                                                            <input class="form-control" name="graves" id="graves" type="checkbox" required/><br>
                                                                            <label for="">Registros Disciplinares Graves</label>
                                                                        </div>
                                                                        <div class="checkbox checkbox-primary">
                                                                            <input class="form-control inp" name="ocorrencia" id="graves" type="checkbox" required/>
                                                                            <label for="">Registros Disciplinares</label>
                                                                        </div>
                                                                        <div class="checkbox checkbox-primary">
                                                                            <input class="form-control inp" name="fardamento" id="graves" type="checkbox" required/>
                                                                            <label for="">Fardamento</label>
                                                                        </div>
                                                                        <div class="checkbox checkbox-primary">
                                                                            <input class="form-control inp" name="atrasos" id="graves" type="checkbox" required/>
                                                                            <label for="">Atrasos</label>
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
                                    </div><!-- /.modal-content ->
                                    </form>
                                </div><!-- /.modal-dialog ->
                            </div><!-- /.modal -->

                            <br>
                        </div>
                    </div>

                    <ul class="nav nav-tabs navtab-bg nav-justified">
                        <li class="active">
                            <a href="#ocorren" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="">Intervenção</i></span>
                                <span class="hidden-xs">Registro disciplinar</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#atraso" data-toggle="tab" aria-expanded="true">
                                <span class="visible-xs"><i class="">Atraso</i></span>
                                <span class="hidden-xs">Atraso</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#saida" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="">Saída</i></span>
                                <span class="hidden-xs">Saída</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="#farda" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="">Fardamento</i></span>
                                <span class="hidden-xs">Fardamento</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane" id="atraso">

                            <div class="col-lg-12">
                                <table class="table table table-hove r m-0">
                                    <thead>
                                    <tr>

                                        <th class="col-lg-3">Data</th>
                                        <th class="col-lg-3">Hora</th>
                                        <th class="col-lg-3">Motivo</th>
                                        <th class="col-lg-2">Ações</th>
                                    </tr>

                                    </thead>


                                    <tbody>
                                    <?php
                                    $q2 = "SELECT idtb_aluno, idtb_atraso, data_atraso, hora_atraso, tipo_atraso FROM tb_aluno, tb_atraso WHERE tb_atraso.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno ORDER BY data_reg DESC";
                                    $r = mysqli_query($mysqli, $q2);
                                    $total = mysqli_num_rows($r);

                                    if($r){
                                        while ($ro = mysqli_fetch_assoc($r)){
                                            ?>

                                            <tr>
                                                <td><?php echo "<p></p>",$ro['data_atraso'];?></td>
                                                <td><?php echo "<p></p>",$ro['hora_atraso'];?></td>
                                                <td><?php echo "<p></p>",($ro['tipo_atraso']);?></td>
                                                <td>

                                                    <a href="alterar_atraso.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_atraso'];?>"><button type="button" class="btn btn-default in"><i class="icon-pencil"></i></button></a>
                                                    <a href="dao_front/excluir_atraso.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_atraso'];?>" onclick="return confirm(' Deseja mesmo excluir o registro? ')"><button type="button" class="btn btn-inverse"><i class="icon-trash"></i></button></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                    </tbody>




                                </table>
                                <?php
                                if ( $total == 0){
                                    echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
                                          Nenhum Registro Encontrado.</center></b>
                                            </div>"; } ?>
                            </div>

                            <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>	<br> <br> <br> <br><br> <br> <br> <br>
                        </div>

                        <div class="tab-pane  active" id="ocorren">


                            <div class="col-lg-12">
                                <table class="table table table-hover m-0">
                                    <thead>
                                    <tr>

                                        <th class="col-lg-2">Usuário</th>
                                        <th class="col-lg-3">Horário</th>
                                        <th class="col-lg-1">Motivo</th>
                                        <th class="col-lg-2">Observações</th>
                                        <th class="col-lg-2">Ações</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $q3 = "SELECT idtb_aluno, idtb_ocorrencia, obs_ocorrencia, motivo_ocorrencia, data_ocorrencia, hora_ocorrencia, data_reg, nome_usuario FROM tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno and tb_ocorrencia.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario ORDER BY data_reg DESC";
                                    $re = mysqli_query($mysqli, $q3);
                                    $total = mysqli_num_rows($re);

                                    if($re){
                                    while ($ro = mysqli_fetch_assoc($re)){
                                    ?>
                                    <tr>
                                        <td><?php echo "<p></p>",$ro['nome_usuario'];?></td>
                                        <td><?php echo "<p></p>",$ro['data_ocorrencia'], " às ", $ro['hora_ocorrencia'];?></td>

                                        <td align="justify"><?php echo "<p></p><p>",$ro['motivo_ocorrencia'],"</p>"?></td>
                                        <td align="justify"><?php echo "<p></p><p>",($ro['obs_ocorrencia']),"</p>"?></td>
                                        <td>
                                            <?php if($ro['nome_usuario'] == $_SESSION['nomeUser3']){ ?>
                                            <a data-toggle="modal" data-target="#modal<?= $ro['idtb_ocorrencia']?>"><button type="button" class="btn btn-default in"><i class="ion-reply"></i></button></a>
                                            <a href="alterar_ocorrencia.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_ocorrencia'];?>"><button type="button" class="btn btn-default in"><i class="icon-pencil"></i></button></a>
                                            <a href="dao_front/excluir_oco.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_ocorrencia'];?>" onclick="return confirm('Deseja mesmo excluir o registro?')"><button type="button" class="btn btn-inverse"><i class="icon-trash"></i></button></a>
                                            <div id="modal<?= $ro['idtb_ocorrencia']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                                <form action="dao_front/replicar_ocorrencia.php" method="post">
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
                    <label class="col-lg-1 control-label center-block" for="turmaSelect"  style="font-family: Baskerville Old Face;font-size:17px;padding-top: 5px"><b>Turmas: </b>
                                                                                        </label>
                                                                   <div class="col-md-12">
                                                                        <!-- Form Elements -->

                                                                        <div class="row"><div class="col-md-2"></div>
                             <div class="">
                             <div class="col-md-12">
                             <div class="form-group clearfix">
                            <input type="hidden" name="idocor" value="<?= $ro['idtb_ocorrencia']?>">
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
                                                <label class="col-lg-1 control-label center-block" for="alunoSelect"  style="font-family: Baskerville Old Face; font-size:17px;padding-top: 5px"><b>Alunos: </b></label>
                                                 <div class="col-lg-11" id="alunoCheck">
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
                            </div>
                            <?php  }         ?>
                            </td>
                            </tr>
                            <?php
                            }
                            }
                            ?>

                            </tbody>

                            </table>
                            <?php
                            if ( $total == 0){
                                echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
                                                                                                      Nenhum Registro Encontrado.</center></b>
                                                                                                          </div>"; } ?>
                        </div>


                        <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>	<br> <br> <br> <br><br> <br> <br> <br>

                    </div>

                    <div class="tab-pane" id="saida">


                        <div class="col-lg-12">
                            <table class="table table table-hover m-0">
                                <thead>
                                <tr>
                                    <th class="col-lg-2">Data</th>
                                    <th class="col-lg-2">Hora</th>
                                    <th class="col-lg-2">Retorno</th>
                                    <th class="col-lg-2">Responsável</th>
                                    <th class="col-lg-2">Ações</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $q4 = "SELECT idtb_aluno, idtb_saida, data_saida, hora_saida, hora_retorno , status_retorno, responsavel_saida FROM tb_aluno, tb_saida WHERE tb_saida.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno ORDER BY data_reg DESC";
                                $resp = mysqli_query($mysqli, $q4);
                                $total = mysqli_num_rows($resp);
                                if($resp){
                                    while ($ro = mysqli_fetch_assoc($resp)){
                                        ?>

                                        <tr>
                                            <td><?php echo "<p></p>",$ro['data_saida'];?></td>
                                            <td><?php echo "<p></p>",date('d/m/Y H:i:s',strtotime($ro['hora_saida']));?></td>
                                            <td><?php echo "<p></p>",$ro['status_retorno'];?><?php echo "<p></p>",date('d/m/Y H:i:s',strtotime($ro['hora_retorno']));?></td>
                                            <td><?php echo "<p></p>",$ro['responsavel_saida'];?></td>
                                            <td>
                                                <a href="alterar_saida.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_saida'];?>"><button type="button" class="btn btn-default in"><i class="icon-pencil"></i></button></a>
                                                <a href="dao_front/excluir_sai.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_saida'];?>" onclick="return confirm('Deseja mesmo excluir o registro?')"><button type="button" class="btn btn-inverse"><i class="icon-trash"></i></button></a>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                }
                                ?>

                                </tbody>

                            </table>
                            <?php
                            if ( $total == 0){
                                echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
                                                                                                      Nenhum Registro Encontrado.</center></b>
                                                                                                          </div>"; } ?>
                        </div>


                        <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>	<br> <br> <br> <br><br> <br> <br> <br>


                    </div>

                    <div class="tab-pane" id="farda">


                        <div class="col-lg-12">
                            <table class="table table table-hover m-0">
                                <thead>
                                <tr>
                                    <th class="col-lg-3">Data</th>
                                    <th class="col-lg-2">Motivo</th>
                                    <th class="col-lg-4">Observações</th>
                                    <th class="col-lg-2">Ações</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $q5 = "SELECT idtb_aluno, idtb_fardamento, data_farda, motivo_farda, obs_farda FROM tb_aluno, tb_fardamento WHERE tb_fardamento.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno ORDER BY data_reg DESC";
                                $result = mysqli_query($mysqli, $q5);
                                $total = mysqli_num_rows($result);
                                if($result){
                                    while ($ro = mysqli_fetch_assoc($result)){
                                        ?>


                                        <tr>
                                            <td><?php echo "<p></p>",$ro['data_farda'];?></td>
                                            <td><?php echo "<p></p>",$ro['motivo_farda'];?></td>
                                            <td><?php echo "<p></p>",$ro['obs_farda'];?></td>
                                            <td>
                                                <a href="alterar_fardamento.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_fardamento'];?>"><button type="button" class="btn btn-default in"><i class="icon-pencil"></i></button></a>
                                                <a href="dao_front/excluir_farda.php?aluno=<?php echo $ro['idtb_aluno'];?>&id=<?php echo $ro['idtb_fardamento'];?>" onclick="return confirm('Deseja mesmo excluir o registro?')"><button type="button" class="btn btn-inverse"><i class="icon-trash"></i></button></a>
                                            </td>
                                        </tr>




                                        <?php
                                    }
                                }
                              
                                ?>  </tbody>

                            </table>
                            <?php
                            if ( $total == 0){
                                echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
                                Nenhum Registro Encontrado.</center></b>
                                                                                                          </div>"; } ?>
                        </div>



                        <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>	<br> <br> <br> <br><br> <br> <br> <br>

                    </div>

                </div>

                <br><br>

            </div><!-- /.modal-content -->

        </div>
    </div>



</div>
</div>






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


<script src="../assets/js/jquery.core.js"></script>
<script src="../assets/js/jquery.app.js"></script>


<script src="../assets/plugins/moment/moment.js"></script>
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script>
    jQuery(document).ready(function() {

        // Time Picker
        jQuery('#timepicker').timepicker({
            defaultTIme : false
        });
        jQuery('#timepicker1').timepicker({
            defaultTIme : false
        });
        jQuery('#timepicker2').timepicker({
            defaultTIme : false
        });
        jQuery('#timepicker3').timepicker({
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
        jQuery('#datepicker-autoclose1').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#datepicker-autoclose2').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#datepicker-autoclose3').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#datepicker-autoclose4').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#datepicker-autoclose5').datepicker({
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
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

    });
    $(function(){
        $('#turmaSelect').change(function(){
            if( $(this).val() ) {
                $.getJSON('dao_front/replicar_ocorrencia.php?turmaSelect=',{turmaSelect: $(this).val(), ajax: 'true'}, function(j){
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