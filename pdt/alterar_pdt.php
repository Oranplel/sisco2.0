<?php include '../dao/connect_db.php'; ?>
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

        <title>Sisco - Controle do PDT</title>

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
                    <div id="sidebar-menu">
                        <ul>
                            
                                        <li class="text-muted menu-title">Menu de Navegação</li>
                           <li>
                               <a href="index.php"><i class="ti-home"></i><span> Home </span></a>
                               
                            </li>

                            <li>
                                <a href="alunos.php"><i class="ti-menu-alt"></i><span> Alunos </span></a>
                               
                            </li>

<li>
                                <a href="perfil_pdt.php" class="active"><i class="ti-user"></i><span> Perfil </span></a>
                               
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
        
          
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
                        <h5>Atualize seus dados no sistema</h5>
                       
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
                                    
                                    <form name="form_alterar" method="post" action="dao/alterar_pdt.php" enctype="multipart/form-data">
                                         <?php
                                   
                                    $idAlt = $_GET['id'];
                                    $sql= "SELECT * FROM tb_usuario where idtb_usuario=$idAlt";
                                     $result = mysqli_query($mysqli, $sql);
                                     if($result){
                                        while ($row=  mysqli_fetch_assoc($result)){         
                                    ?>
                                           
                                              
                                           <div >
                                               <br>
                                          <div class="input-group">
                                              
						<input type="hidden" class="form-control" readonly="true" name="id" value="<?php echo $row['idtb_usuario'];?>">
						</div>
                                               <br>
                                          </div>
                                        
                                            <div class="form-group">
						<label class="control-label">Atualize a foto de perfil:</label>
						<input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="arquivo" value="<?php echo $row['img_usuario'];?>">
						</div>
                                          
                                         

                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Nome:</label>
                                            <input class="form-control inp" name="nome" name="nome" value="<?php echo $row['nome_usuario'];?>" required/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="email">E-mail:</label>
                                            <input class="form-control inp" id="email" name="email" value="<?php echo $row['email_usuario'];?>" required />
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="fone">Telefone:</label>
                                            <input class="form-control inp" id="fone" name="telefone" data-mask="(99)9999-9999" value="<?php echo $row['telefone_usuario'];?>" required/>
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">Celular:</label>
                                            <input class="form-control inp" id="cel" name="celular" data-mask="(99)99999-9999" value="<?php echo $row['celular_usuario'];?>" required/>
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label>Senha:</label>
                                            <input class="form-control inp"  name="senha" value="<?php echo $row['senha_usuario'];?>"   required/>
                                       </div>
                                       </div>
                                      <div class="col-md-6"><br><br><br></div>
                                        
                                        
                                        <a href="perfil_pdt.php"><button type="button" style="float:right" class="btn btn-inverse">Cancelar</button></a>
                                       
                                       
                                        
                                          <button type="submit" class="btn btn-default in" style="float:right; margin:0 10px ">Alterar</button>
                                         
                                         
                                         
                                              <?php
                                                        }
                                                    }
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
        <script src="../assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        	  
		  jQuery(function($) {
		      $('.autonumber').autoNumeric('init');    
		  });
        </script>




    </body>
</html>
