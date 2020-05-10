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
<?php $idTurma = $_GET['id'];?>
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

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->

    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <?php include './include_front/menu-turmas.php'; ?>


    <!-- ============================================================== -->
    <!-- corpo do site -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <?php
                $resultado = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso, nome_usuario FROM tb_turma, tb_cursos, tb_usuario WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos AND tb_turma.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND idtb_turma = $idTurma";
                $resulta = mysqli_query($mysqli, $resultado);
                while ($row = mysqli_fetch_assoc($resulta)){
                    ?>
                    <div class="col-lg-12">
                        <div class="card-box">
                            <div>
                                <h4 ><i class="ti-angle-right"></i> <?php echo $row['serie']; ?>º <?php echo utf8_encode($row['nome_curso']); ?> </h4>
                                <hr>
                                <div class="col-lg-4">  <p><b> Diretor de Turma: </b><?php echo utf8_encode($row['nome_usuario']); ?></p></div>
                                <div class="col-lg-2">  <p><b> Nº de alunos: </b> <?php $sql = "SELECT * FROM tb_aluno where tb_turma_idtb_turma = $idTurma";
                                        $result = mysqli_query($mysqli, $sql);

                                        //Conta quantos registros possuem na tabela

                                        $total = mysqli_num_rows($result);
                                        //Mostra o valor
                                        echo $total;
                                        ?>  </p></div>
                                <div class="col-lg-2">  <p><b> Registros disciplinares: </b>
                                        <?php
                                        $sql = "SELECT * FROM tb_ocorrencia WHERE tb_turma_idtb_turma = $idTurma";
                                        $resulta = mysqli_query($mysqli, $sql);

                                        //Conta quantos registros possuem na tabela

                                        $total = mysqli_num_rows($resulta);
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
                                <form name="frmbusca" method="post" action="turmas.php?id=<?php echo $idTurma ?>">
                                    <div class="form-group contact-search m-b-30">
                                        <div class="input-group">
                                            <input type="text" name="palavra" class="form-control" placeholder="Pesquisar">
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
                                    <th>Ação</th>
                                    <th>Consultar</th>

                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                $q4 = "SELECT idtb_aluno, tb_turma_idtb_turma, nome_aluno, email_aluno, matricula, diario, responsavel_aluno, foto_aluno, idtb_turma  FROM tb_aluno, tb_turma WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND idtb_turma = $idTurma AND nome_aluno like '%$pesquisa%'  ORDER BY nome_aluno ASC";
                                $res = mysqli_query($mysqli, $q4);
                                $total = mysqli_num_rows($res);
                                if($res){
                                    while ($ro = mysqli_fetch_assoc($res)){
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="../fotos/<?php echo $ro['foto_aluno']; ?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm"  style=" width:40px; height:40px"/>
                                            </td>

                                            <td>
                                                <?php echo utf8_encode($ro['nome_aluno']); ?>
                                            </td>

                                            <td>
                                                <?php echo $ro['matricula']; ?>
                                            </td>





                                            <td>


                                                <button class="btn btn-inverse waves-effect waves-light" data-toggle="modal" data-target="#full-width-modal<?php echo $ro['idtb_aluno'];?>">Registrar</button>
                                                <!-- inicio modal -->
                                                <div id="full-width-modal<?php echo $ro['idtb_aluno'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <!--Head do modal -->
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="full-width-modalLabel">Controle de Rotina</h4>
                                                            </div>
                                                            <!--Fim da head do modal -->

                                                            <!--Body do modal -->
                                                            <div class="row">
                                                                <div class="modal-body">
                                                                    <div class="col-lg-12">

                                                                        <div class="col-lg-2">
                                                                            <img src="../fotos/<?php echo $ro['foto_aluno']; ?>" alt="contact-img" title="contact-img" style="border: ridge; width:150px; height:150px"/>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <br>
                                                                            <p><b>Aluno(a): </b><?php echo utf8_encode($ro['nome_aluno']); ?></p>

                                                                            <br>
                                                                            <p><b>Turma: </b><?php echo $row['serie']; ?>º <?php echo utf8_encode($row['nome_curso']); ?></p>
                                                                        </div>

                                                                        <div class="col-lg-1">
                                                                            <br>
                                                                            <p><b>Nº: </b> <?php echo $ro['diario']; ?> </p><br>
                                                                            <p>
                                                                                <input type="hidden" class="form-control" name="turma" value="<?php echo $ro['idtb_turma']; ?> ">
                                                                                <input type="hidden" class="form-control" name="aluno" value="<?php echo $ro['idtb_aluno']; ?> ">
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <hr>
                                                                    </div>

                                                                    <div class="col-lg-3">
                                                                        <ul class="nav tabs-vertical">
                                                                            <li class="active">
                                                                                <a href="#v-atraso<?php echo $ro['idtb_aluno'];?>" data-toggle="tab" style="text-align:left" aria-expanded="true">Atraso</a>
                                                                            </li>

                                                                            <li class="">
                                                                                <a href="#v-saida<?php echo $ro['idtb_aluno'];?>" data-toggle="tab" style="text-align:left" aria-expanded="false">Saída</a>
                                                                            </li>

                                                                            <li class="">
                                                                                <a href="#v-retorno<?php echo $ro['idtb_aluno'];?>" data-toggle="tab" style="text-align:left" aria-expanded="false">Retorno</a>
                                                                            </li>

                                                                            <li class="">
                                                                                <a href="#v-oco<?php echo $ro['idtb_aluno'];?>" data-toggle="tab" style="text-align:left" aria-expanded="false">Registro Disciplinar</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#v-farda<?php echo $ro['idtb_aluno'];?>" data-toggle="tab" style="text-align:left" aria-expanded="false">Fardamento</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <div class="tab-content">
                                                                            <!-- aqui -->

                                                                            <div class="tab-pane" id="v-saida<?php echo $ro['idtb_aluno'];?>">
                                                                                <form name="" method="POST" action="dao_front/cad_saida.php">
                                                                                    <div class="col-lg-4">


                                                                                        <input type="hidden" name="aluno" value="<?php echo $ro['idtb_aluno'];?>">
                                                                                        <input type="hidden" name="turma" value="<?php echo $ro['tb_turma_idtb_turma'];?>">

                                                                                        <label class="control-label col-sm-15">Data:</label>
                                                                                        <div class="">

                                                                                            <div class="input-group" style="width:230px">
                                                                                                <input type="text" class="form-control" placeholder="Dia/Mês/Ano" name="data" id="datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>">

                                                                                            </div>

                                                                                        </div>


                                                                                        <br>  <br> <br>


                                                                                        <label class="control-label ">Hora:</label>

                                                                                        <div class="input-group m-b-70">
                                                                                            <div class="bootstrap-timepicker" style="width:230px">
                                                                                                <input id="timepicker<?php echo $ro["idtb_aluno"]; ?>" type="text" class="form-control" name="hora" style="width:230px">
                                                                                            </div>


                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-lg-5">
                                                                                        <label class="control-label ">Responsável:</label>
                                                                                        <input  type="text" class="form-control" name="r">
                                                                                        <br>
                                                                                    </div>



                                                                                    <div class="col-lg-12">
                                                                                        <br>
                                                                                        <button type="submit" class="btn btn-default in" style="float:right" value="enviar">Confirmar</button><br>
                                                                                    </div>

                                                                                </form>
                                                                            </div>

                                                                            <div class="tab-pane" id="v-retorno<?php echo $ro['idtb_aluno'];?>">
                                                                                <?php


                                                                                $resulta = "SELECT * FROM tb_aluno,tb_saida WHERE status_retorno = '' and tb_aluno_idtb_aluno = $ro[idtb_aluno] limit 1";
                                                                                $result = mysqli_query($mysqli, $resulta);
                                                                                if($result){
                                                                                    while ($r =  mysqli_fetch_assoc($result) ) {

                                                                                        echo "
                                                            
                                                        <form class='' method='POST' action='dao_front/cad_retorno.php'> 
                                                                <input type='hidden' name='id' value='$r[idtb_saida]'> 
                                                                <input type='hidden' name='aluno' value='$ro[idtb_aluno]'> 
                                                                <input type='hidden' name='t' value='$ro[tb_turma_idtb_turma]'>
                                                            <div class='col-lg-4'>     
                                                                     <label class='control-label'>  * Houve retorno dia $r[data_saida]? </label>
                                                                     
                                                                     <div class='radio radio-custom'>
                                                                     
                                                                     <input type='radio' name='radio' value='Sim'>
                                                                     <label for='radio1'>Sim</label>

                                                                     </div>  
                                                                     <br>
                                                                     <div class='radio radio-custom'>
                                                                     
                                                                     <input type='radio' name='radio' value='Não'>
                                                                     <label for='radio2'>Não</label>

                                                                     </div>
                                                                     
                                                                     
                                                                     <br><br><br><br>
                                                             </div>
                                                             
                                                             <div class='col-lg-12'> 
                                                                       <br>                                                                  
                                                                       <button type='submit' class='btn btn-default in'  style='float:right' value='enviar'>Confirmar</button><br> <br>
                                                             </div>
                                                        </form>";

                                                                                    } }

                                                                                ?>

                                                                            </div>


                                                                            <div class="tab-pane" id="v-farda<?php echo $ro['idtb_aluno'];?>" >
                                                                                <form name="" method="POST" action="dao_front/cad_fardamento.php">
                                                                                    <input type="hidden" name="aluno" value="<?php echo $ro['idtb_aluno'];?>">
                                                                                    <input type="hidden" name="turma" value="<?php echo $ro['tb_turma_idtb_turma'];?>">

                                                                                    <div class="col-lg-2">
                                                                                        <label class="control-label">Motivo:</label>
                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio" id="calca" value="calça" >
                                                                                            <label for="radio1">
                                                                                                Calça
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio" id="tenis" value="tênis">
                                                                                            <label for="radio2">
                                                                                                Tênis
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio" id="meia" value="meia">
                                                                                            <label for="radio3">
                                                                                                Meia
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-5">
                                                                                        <label class="col-md-2 control-label">Observações</label>
                                                                                        <textarea class="form-control" rows="5" style="width:800px" name="obs"></textarea>
                                                                                    </div>
                                                                                    <div class="col-lg-4">

                                                                                        <label class="control-label col-sm-15">Data:</label>
                                                                                        <div class="">

                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control" placeholder="Dia/Mês/Ano" name="data" id="2datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>" style="width:230px">

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>



                                                                                    <div class="col-lg-12">
                                                                                        <br>    <br> <br> <br>
                                                                                        <button type="submit" class="btn btn-default in" style="float:right" value="enviar">Confirmar</button><br><br>
                                                                                    </div>

                                                                                </form>
                                                                            </div>



                                                                            <div class="tab-pane" id="v-oco<?php echo $ro['idtb_aluno'];?>">
                                                                                <form name="" method="POST" action="dao_front/cad_ocorrencia.php">
                                                                                    <input type="hidden" name="aluno" value="<?php echo $ro['idtb_aluno'];?>">
                                                                                    <input type="hidden" name="turma" value="<?php echo $ro['tb_turma_idtb_turma'];?>">
                                                                                    <input type="hidden" name="coordenador" value="<?php echo $_SESSION[id3] ?>">
                                                                                    <div class="col-lg-3">

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
                                                                                        <br>



                                                                                    </div>



                                                                                    <div class="col-lg-4">

                                                                                        <label class="col-md-2 control-label">Observações:</label>
                                                                                        <textarea class="form-control" name="obs" rows="5" style="width:800px"></textarea>

                                                                                        <br><br>




                                                                                        <br>
                                                                                        <div class="">

                                                                                            <?php
                                                                                            $resultt = "SELECT * FROM tb_ocorrencia WHERE tb_ocorrencia.tb_aluno_idtb_aluno = $ro[idtb_aluno] AND nivel_ocorrencia = 'g'";
                                                                                            $resultal = mysqli_query($mysqli, $resultt);
                                                                                            $numeroo  = mysqli_num_rows($resultal);
                                                                                            if ($numeroo >= 3) {
                                                                                                echo "<div class='alert alert-danger'><strong>ALERTA:</strong> O aluno já apresenta $numeroo ocorrências, podendo estar sujeito à suspensão!</div>";
                                                                                            }
                                                                                            ?>
                                                                                        </div>

                                                                                    </div>



                                                                                    <div class="col-lg-1">
                                                                                    </div>



                                                                                    <div class="col-lg-4">

                                                                                        <label class="control-label col-sm-15">Data:</label>
                                                                                        <div class="">

                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control" placeholder="Dia/Mês/Ano" name="data" id="3datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>" style="width:230px">

                                                                                            </div>

                                                                                        </div>

                                                                                        <br>


                                                                                        <label class="control-label ">Hora:</label>

                                                                                        <div class="input-group m-b-70">
                                                                                            <div class="input-control">
                                                                                                <div class="bootstrap-timepicker" style="width:230px">
                                                                                                    <input id="3timepicker<?php echo $ro["idtb_aluno"]; ?>" type="text" class="form-control" name="hora" style="width:230px">
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>


                                                                                    </div>


                                                                                    <div class="col-lg-12">


                                                                                        <button type="submit" value="enviar" class="btn btn-default in" style="float:right" >Confirmar</button><br> <br>

                                                                                    </div>

                                                                                </form>

                                                                            </div>
                                                                            <div class="tab-pane active" id="v-atraso<?php echo $ro['idtb_aluno'];?>">
                                                                                <form name="" method="POST" action="dao_front/cad_atraso.php">

                                                                                    <input type="hidden" name="aluno" value="<?php echo $ro['idtb_aluno'];?>">
                                                                                    <input type="hidden" name="turma" value="<?php echo $ro['tb_turma_idtb_turma'];?>">
                                                                                    <div class="col-lg-3">

                                                                                        <label class="control-label">Motivo:</label>
                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio"  value="Transporte" >
                                                                                            <label for="radio1">
                                                                                                Transporte
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio" value="Saúde">
                                                                                            <label for="radio2">
                                                                                                Saúde
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio" value="Acordou tarde" >
                                                                                            <label for="radio3">
                                                                                                Acordou tarde
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="radio radio-custom">
                                                                                            <input type="radio" name="radio"  value="Outro">
                                                                                            <label for="radio4">
                                                                                                Outro...
                                                                                            </label>

                                                                                        </div>


                                                                                    </div>


                                                                                    <div class="col-lg-4">


                                                                                        <label class="control-label col-sm-15">Data:</label>
                                                                                        <div class="">

                                                                                            <div class="input-group">
                                                                                                <input type="text" class="form-control" placeholder="Dia/Mês/Ano" name="data" id="4datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>" style="width:230px">

                                                                                            </div>

                                                                                        </div>


                                                                                        <br>  <br> <br>


                                                                                        <label class="control-label ">Hora:</label>

                                                                                        <div class="input-group m-b-70">
                                                                                            <div class="input-control">
                                                                                                <div class="bootstrap-timepicker" style="width:230px">
                                                                                                    <input id="4timepicker<?php echo $ro["idtb_aluno"]; ?>" type="text" class="form-control" name="hora" style="width:230px">
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <!-- aqui -->

                                                                                    <div class="col-lg-12">


                                                                                        <button type="submit" value="enviar" class="btn btn-default in" style="float:right" >Confirmar</button><br> <br>

                                                                                    </div>




                                                                                </form>
                                                                            </div>
                                                                        </div>




                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <div class="modal-footer">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Fim do body do modal -->
                                                            <!-- aqui -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- fim modal -->
                                                <script>
                                                    jQuery(document).ready(function() {

                                                        // Time Picker
                                                        jQuery('#timepicker').timepicker({
                                                            defaultTIme : false
                                                        });
                                                        jQuery('#timepicker<?php echo $ro["idtb_aluno"]; ?>').timepicker({
                                                            defaultTIme : false
                                                        });
                                                        jQuery('#2timepicker<?php echo $ro["idtb_aluno"]; ?>').timepicker({
                                                            defaultTIme : false
                                                        });
                                                        jQuery('#3timepicker<?php echo $ro["idtb_aluno"]; ?>').timepicker({
                                                            defaultTIme : false
                                                        });
                                                        jQuery('#4timepicker<?php echo $ro["idtb_aluno"]; ?>').timepicker({
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
                                                        jQuery('#datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>').datepicker({
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        });

                                                        jQuery('#2datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>').datepicker({
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        });

                                                        jQuery('#3datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>').datepicker({
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        });

                                                        jQuery('#4datepicker-autoclose<?php echo $ro["idtb_aluno"]; ?>').datepicker({
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

                                                <!-- fim do modal -->

                                            </td>
                                            <td>
                                                <a href="historico_aluno.php?id=<?php echo $ro['idtb_aluno']; ?>">
                                                    <button type="button" class="btn btn-default in" >Histórico</button></a>
                                            </td>
                                        </tr>


                                        <?php
                                    }
                                }
                                ?>
                                </tbody>


                            </table>
                        </div>
                        <?php
                        if ( $total == 0){
                            echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
               Nenhum Aluno Encontrado.</center></b>
        </div>";
                        };
                        ?>
                    </div>
                    <?php
                }

                ?>





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



    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>
    <script src="../assets/plugins/moment/moment.js"></script>







</body>
</html>