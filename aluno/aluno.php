<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario4'])) {

    $_SESSION['id4'] =$_COOKIE['id4'];
    $_SESSION['emailAluno4'] =$_COOKIE['usuario4'];
    $_SESSION['nomeAluno4'] = $_COOKIE['nome4'];
    $_SESSION['imgAluno4'] = $_COOKIE['img4'];
    $_SESSION['foneAluno4'] = $_COOKIE['fone4'];
    $_SESSION['celAluno4'] = $_COOKIE['cel4'];
 }else{
 if(!isset($_SESSION[nomeAluno4])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailAluno4])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso4"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso4"] = $agora;
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
                        <a href="aluno.php" class="logo"><i class="ti-pencil-alt icon-c-logo"></i><span>SISC<i class="md md-album"></i></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                           
                            

                            

                            <ul class="nav navbar-nav navbar-right pull-right">
                               
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgAluno4'];?>" alt="user-img" class="img-circle"> 
                                    </a>
                                    <ul class="dropdown-menu">
                                        
                                        <li><a href="manual_aluno.pdf" target="_blank"><i class=" ti-book m-r-5"></i> Manual do Sistema</a></li>
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

            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
         
                <!-- Start content -->
                <div class="content">
                    
                <?php  
                        $query = "SELECT * FROM tb_aluno, tb_turma, tb_cursos WHERE tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND  idtb_aluno = $_SESSION[id4]";
                        $result = mysqli_query($mysqli, $query); 
                        while ($row = mysqli_fetch_assoc($result)){
                                                    ?>

                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                       
                                             
                                                
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <br>

                                <div class="profile-info-name">
                                    <img src="../fotos/<?php echo $row['foto_aluno']; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h4 class="m-b-5"><b><?php echo utf8_encode($row['nome_aluno']); ?></b></h4>
                                    <p class="text-muted"> 
                                        <?php
                                        $sql = "SELECT * FROM tb_ocorrencia where tb_aluno_idtb_aluno = $row[idtb_aluno];";
                                        $result = mysqli_query($mysqli, $sql);
                                        //Conta quantos registros possuem na tabela

                                        $total = mysqli_num_rows($result);
                                        //Mostra o valor
                                        echo $total;
                                        ?>
                                     Intervenções</p>
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
                                            <span class="visible-xs"><i class="fa fa-pencil-square"></i></span> 
                                            <span class="hidden-xs">Intervenção Grave</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-21" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-pencil-square-o"></i></span> 
                                            <span class="hidden-xs">Intervenção de sala</span> 
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
        
                                            $q1 = "SELECT * FROM tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $_SESSION[id4] AND tb_ocorrencia.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND nivel_ocorrencia = 'g' ORDER BY data_reg DESC ";
                                            $result = mysqli_query($mysqli, $q1);
                                            $total = mysqli_num_rows($result);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhuma Intervenção Grave Encontrada.</center></b>
        </div>";
                        }elseif($result){  
                                                while ($ro = mysqli_fetch_assoc($result)){
                                                    ?>
                                    <div class="text-muted"><?php echo $ro['data_ocorrencia']; ?> às <?php echo $ro['hora_ocorrencia']; ?></div>
                                                <p><a href="" class="text-custom">Aplicada por: </a> <?php echo utf8_encode($ro['nome_usuario']); ?> <br>
                                               <a href="" class="text-custom">Motivo: </a><?php echo utf8_encode($ro['motivo_ocorrencia']); ?> <br>
                                               <a href="" class="text-custom">Observação: </a><?php echo utf8_encode($ro['obs_ocorrencia']); ?></p>
                                               <hr>
                                <?php } } ?>

                                    </div> 


                                    <div class="tab-pane" id="profile-21"> 
                                        <?php
        
                                            $q2 = "SELECT * FROM tb_aluno, tb_ocorrencia, tb_usuario WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $_SESSION[id4] AND tb_ocorrencia.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND nivel_ocorrencia = 's' ORDER BY data_reg DESC ";
                                            $result = mysqli_query($mysqli, $q2);
$total = mysqli_num_rows($result);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhuma Intervenção Encontrada.</center></b>
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
                                            $q3 = "SELECT * FROM tb_aluno, tb_fardamento WHERE tb_fardamento.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $_SESSION[id4] ORDER BY data_reg DESC ";
                                            $result = mysqli_query($mysqli, $q3);
                                            $total = mysqli_num_rows($result);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhum Registro de Fardamento Encontrado.</center></b>
        </div>";
                        }elseif($result){ 
                                                while ($ro = mysqli_fetch_assoc($result)){
                                                    ?>
                                     <div class="text-muted"><?php echo $ro['data_farda']; ?> </div>
                                                
                                                <p><a href="" class="text-custom">Motivo: </a><?php echo $ro['motivo_farda']; ?> <br>
                                               <a href="" class="text-custom">Observação: </a><?php echo $ro['obs_farda']; ?></p>
                                               <hr> 
                                       <?php } } ?>
                                    </div> 



                                    <div class="tab-pane" id="settings-21">
                                    <?php
                                            $q4 = "SELECT * FROM tb_aluno, tb_atraso WHERE tb_atraso.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_aluno = $_SESSION[id4] ORDER BY data_reg DESC ";
                                            $result = mysqli_query($mysqli, $q4);
                                            $total = mysqli_num_rows($result);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><b><center> <i class='ion-alert-circled '></i>
               Nenhuma Regstro de Atraso Encontrado.</center></b>
        </div>";
                        }elseif($result){ 
                                                while ($ro = mysqli_fetch_assoc($result)){
                                                    ?>
                                     <div class="text-muted"><?php echo $ro['data_atraso']; ?> às <?php echo $ro['hora_atraso']; ?></div>
                                                
                                     <p><a href="" class="text-custom">Motivo: </a><?php echo $ro['tipo_atraso']; ?> </p>
                                               <hr> 
                                         <?php } } ?>
                                    </div> 
                                </div>
                            </div> 
                            
                    <?php } ?>
                          
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->
<br><br>
<br>

                <footer class="footer">
                    2016 © Sisco.
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


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
	
	</body>
</html>