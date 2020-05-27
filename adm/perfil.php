<?php require_once '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario'])) {

$_SESSION['id'] =$_COOKIE['id'];
    $_SESSION['emailUser'] =$_COOKIE['usuario'];
    $_SESSION['nomeUser'] = $_COOKIE['nome'];
    $_SESSION['imgUser'] = $_COOKIE['img'];
 }else{
 if(!isset($_SESSION[nomeUser])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailUser])){
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

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>SISCO - Área Administraiva</title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
                  
       <link href="assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php
           
           include_once 'include/menu.php';
           
           ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Editar Perfil</h2>   
                        <h5>Alteração dos dados do Usuário que irá utilizar o sistema </h5>
                       
                    </div>
                </div>
                <hr />


                <div class="row">
                <div class="col-lg-12">
                                <div class="card-box">
                            <div>
                               
                                                    	

                                   
                                               
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">
                                   
                                    <form name="form" id="form1" action="" method="POST" enctype="multipart/form-data">
                                          <center><div class="form-group">
                                            <div class="form-group">
						<label class="control-label">Escolha uma foto de perfil</label>
						<input type="file" class="filestyle" data-iconname="fa fa-cloud-upload">
						</div></center> 
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Nome</label>
                                            <input class="form-control inp" name="nome" id="nome" required/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="email">E-mail</label>
                                            <input class="form-control inp" id="email" name="email" required />
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="fone">Telefone</label>
                                            <input class="form-control inp" id="fone" name="telefone"  required/>
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">Celular</label>
                                            <input class="form-control inp" id="cel" name="celular" required/>
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label>Senha Atual</label>
                                            <input class="form-control inp" type="password" name="senha" required/>
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label>Nova Senha</label>
                                            <input class="form-control inp" name="con-senha" type="password" required />
                                       </div>
                                        </div>
                                        
                                        
                                         </form>
                                        
                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-default waves-effect">Salvar Alteração</button>
                                                </div>
                                                    
                                    
                                </h4>
                                
                                <hr>
                               
                               <br>
                            </div>
                        </div>
                    </div>

                </div>
                         </div>
                </div>


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                 <center> 2016 © Todos os direitos reservados a SiSCO.</center>  
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
         
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
         <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        
        
        <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>

        
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
         





    </body>
</html>