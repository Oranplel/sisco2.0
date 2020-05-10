<?php require_once '../dao/connect_db.php'; ?>
<?php $idAluno = $_GET['id'];?>
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

        <title>Sisco - Controle da PDT</title>

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
                   <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12"> 
                <?php  
                        $sql = "SELECT * FROM tb_aluno, tb_turma, tb_cursos WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND  idtb_aluno = $idAluno LIMIT 1";
                                    $result = mysqli_query($mysqli, $sql);        
                                                $row = mysqli_fetch_assoc($result);
                                                    ?>

                
                            <!--<a href="mpdf/index.php?id=<?php echo $idAluno ?>&idt=<?php echo $row['idtb_turma']; ?>" target="_BLANK"><button type="button" style="float:right;" class="btn btn-default btn-rounded waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-print"></i></span> Relatório</button>
                                            </a>-->   
                              <a data-toggle="modal" data-target="#full-width-modal">
                                <button type="button" style="float:right;" class="btn btn-default btn-rounded waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-print"></i></span> Relatório
                                </button>
                            </a>
                            
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
                                                                    <input type="hidden" name="id" value="<?= $idAluno?>">
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
                            </div>
                            
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="../fotos/<?php echo $row['foto_aluno']; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h4 class="m-b-5"><b><?php echo utf8_encode($row['nome_aluno']); ?></b></h4>
                                    <p class="text-muted"> 
                                        <?php
                                        $sql = "SELECT * FROM tb_ocorrencia where tb_aluno_idtb_aluno = $row[idtb_aluno];";
                                        //Conta quantos registros possuem na tabela
                                            $result = mysqli_query($mysqli, $sql);
                                        $total = mysqli_num_rows($result);
                                        //Mostra o valor
                                        echo $total;
                                        ?>
                                     Registros disciplinares </p> 
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    
                    
                    <div class="row">
                    	<div class="col-md-4">
                    		
                    		<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><b>Ficha Bibliográfica</b></h4>
								<div class="p-20">
									<div class="about-info-p">
                                        <strong>Nome</strong>
                                        <br>
                                        <p class="text-muted"><?php echo utf8_encode($row['nome_aluno']); ?></p>
                                    </div>
                                     <div class="about-info-p">
                                        <strong>Número da matrícula</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['matricula']; ?></p>
                                    </div>
                                                                     <div class="about-info-p">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['email_aluno']; ?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Telefone</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['tel_aluno']; ?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>Celular</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['cel_aluno']; ?></p>
                                    </div>
                                   <div class="about-info-p">
                                        <strong>Responsável</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['responsavel_aluno']; ?></p>
                                    </div>
                                                                    <div class="about-info-p">
                                        <strong>Telefone do responsável</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['tel_responsavel']; ?></p>
                                    </div>
                                    
								</div>
							</div>
							
							
							
												
												
                        </div>
                        
                        
                        <div class="col-md-8">
                        	<br>
								  <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs tabs-top">
                                    <li class="active tab">
                                        <a href="#home-21" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-pencil-square-o"></i></span> 
                                            <span class="hidden-xs">Registros Graves</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-21" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-pencil-square"></i></span> 
                                            <span class="hidden-xs">Registros de sala</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#messages-21" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-female"></i></span> 
                                            <span class="hidden-xs">Fardamento</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#settings-21" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-car"></i></span> 
                                            <span class="hidden-xs">Atraso</span> 
                                        </a> 
                                    </li> 
                                </ul> 

                                <div class="tab-content"> 

                                    <div class="tab-pane active" id="home-21"> 
                                         <?php
        
                        $sql = "SELECT * FROM tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno AND nivel_ocorrencia = 'g' AND tb_usuario.idtb_usuario = tb_ocorrencia.tb_usuario_idtb_usuario ORDER BY data_reg DESC ";
                        $resultado = mysqli_query($mysqli, $sql);  
                        $total = mysqli_num_rows($resultado);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhum Registro Disciplinar Grave Encontrada.</center></b>
        </div>";
                        }elseif($resultado){ 
                                                while($ro = mysqli_fetch_assoc($resultado)){
                                                    
                                                    ?>
                                        <div class="text-muted"><?php echo utf8_encode($ro['(data_ocorrencia']); ?> às <?php echo $ro['hora_ocorrencia']; ?></div>
                                                <p><a href="" class="text-custom">Aplicada por: </a>  <?php echo utf8_encode($ro['nome_usuario']); ?> <br>
                                               <a href="" class="text-custom">Motivo: </a><?php echo utf8_encode($ro['motivo_ocorrencia']); ?> <br>
                                               <a href="" class="text-custom">Observação: </a><?php echo utf8_encode($ro['obs_ocorrencia']); ?></p>
                                               <hr>
                                <?php } } ?>

                                    </div> 


                                    <div class="tab-pane" id="profile-21"> 
                                        <?php
        
                        $sql = "SELECT * FROM tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno AND nivel_ocorrencia = 's' AND tb_usuario.idtb_usuario = tb_ocorrencia.tb_usuario_idtb_usuario ORDER BY data_reg DESC ";
                        $result = mysqli_query($mysqli, $sql);                    
                        $total = mysqli_num_rows($result);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhum Registro Disciplinar de Sala Encontrada.</center></b>
        </div>";
                        }elseif($result){ 
                                                while ($ro = mysqli_fetch_assoc($result)){
                                                    ?>
                                       <div class="text-muted"><?php echo $ro['data_ocorrencia']; ?> às <?php echo $ro['hora_ocorrencia']; ?></div>
                                                <p><a href="" class="text-custom">Aplicada por: </a><?php echo $ro['nome_usuario']; ?><br>
                                               <a href="" class="text-custom">Motivo: </a><?php echo $ro['obs_ocorrencia']; ?></p>
                                               <hr> 
                        <?php } } ?>
                                        </div>



                                    <div class="tab-pane" id="messages-21">
                                     <?php
                         $sql = "SELECT * FROM tb_aluno, tb_fardamento WHERE tb_fardamento.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno ORDER BY data_reg DESC ";
                         $resultado = mysqli_query($mysqli, $sql);                   
                         $total = mysqli_num_rows($resultado);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhum Registro de Fardamento Encontrado.</center></b>
        </div>";
                        }elseif($resultado){ 
                                                while ($ro = mysqli_fetch_assoc($resultado)){
                                                    ?>
                                     <div class="text-muted"><?php echo $ro['data_farda']; ?> </div>
                                     <p> <a href="" class="text-custom">Motivo: </a><?php echo $ro['motivo_farda']; ?> <br>
                                               <a href="" class="text-custom">Observação: </a><?php echo $ro['obs_farda']; ?></p>
                                               <hr> 
                                       <?php } } ?>
                                    </div> 



                                    <div class="tab-pane" id="settings-21">
                                    <?php
                        $sql = "SELECT * FROM tb_aluno, tb_atraso WHERE tb_atraso.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $idAluno ORDER BY data_reg DESC ";
                        $resultado = mysqli_query($mysqli, $sql);                    
                        $total = mysqli_num_rows($resultado);
                        if ( $total == 0){
                            echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhum Registro de Atraso Encontrado.</center></b>
        </div>";
                        }elseif($resultado){ 
                                                while ($ro = mysqli_fetch_assoc($resultado)){
                                                    ?>
                                     <div class="text-muted"><?php echo $ro['data_atraso']; ?> às <?php echo $ro['hora_atraso']; ?></div>
                                               <a href="" class="text-custom">Motivo: </a><?php echo $ro['tipo_atraso']; ?> </p>
                                               <hr> 
                                         <?php } } ?>
                                    </div> 
                                </div>
                            </div> 
                            
                          
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    2015 © Sisco.
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
	
	</body>
</html>