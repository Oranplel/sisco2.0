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
                                        <h2>Cadastro de Usuário</h2>   
                                        <h5>Cadastre os  Usuários que irão utilizar o sistema </h5>

                                    </div>
                                </div>
                                <hr />


                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Form Elements -->
                                        <div class="panel panel-default">

                                            <div class="panel-body">
                                                <div class="row"><div class="col-md-1"></div>
                                                    <div class="col-md-10">
<?php








?>
                                                        <form name="form1" id="form1" action="dao/insere-user.php"  method="POST" enctype="multipart/form-data">

                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="col-lg-7">
                                                                            <!-- Form Elements -->
                                                                            <div class="panel panel-default">

                                                                                <div class="panel-body">
                                                                                    <div class="row"><div class="col-md-12"></div>
                                                                                        <div class="col-md-12">



                                                                                           
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label id="nome">Nome</label>
                                                                                                    <input class="form-control inp" name="nome" id="nome" required/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label id="email">E-mail ou Usuário</label>
                                                                                                    <input class="form-control inp" id="email" name="email" required />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="fone">Telefone</label>
                                                                                                    <input class="form-control inp" id="fone" name="telefone" data-mask="(99)9999-9999"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="cel">Celular</label>
                                                                                                    <input class="form-control inp" id="cel" name="celular" data-mask="(99)99999-9999" required/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label>Senha </label>
                                                                                                    <input class="form-control inp" type="password" id="txtSenha" name="senha" required/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label>Digite a senha novamente</label>
                                                                                                    <input class="form-control inp" name="consenha" id="consenha" type="password" oninput="validaSenha(this)"  />
                                                                                                
                                                                                                   
                                                                                                   
                                                                                                    <script>
                                                                                                        function validaSenha (input){ 
                                                                                                                if (input.value != document.getElementById('txtSenha').value) {
                                                                                                            input.setCustomValidity('Repita a senha corretamente');
                                                                                                          } else {
                                                                                                            input.setCustomValidity('');
                                                                                                          }
                                                                                                        } 
                                                                                                        </script>
                                                                                                       
                                                                                                 
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                           

                                                                                        </div>

                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>

                                                                        <br/>


                                                                        <div class="col-lg-5">
                                                                            <div class="col-lg-12">
                                                                                <center>
                                                                                    


                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Escolha uma foto de perfil</label>
                                                                                         
                                                                                        <input type="file" class="filestyle" name="arquivo" data-iconname="fa fa-cloud-upload">
                                                                                    </div>

                                                                                </center> 
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group clearfix">
                                                                                    <br>
                                                                                    <div class="col-lg-12">
                                                                                        <center>
                                                                                            <label class=" control-label " id="tipo"  >Tipo de Usuário</label>
                                                                                        </center>

                                                                                    </div>
                                                                                    <div class="col-lg-12">
                                                                                        <select class="selectpicker" name="tipo" data-style="btn-default btn-custom">

                                                                                            <option>Selecione...</option>
                                                                                            <option value="Coordenador">Coordenador</option>
                                                                                            <option value="PDT">PDT</option>
                                                                                            <option value="Professor">Professor</option>
                                                                                        </select> 

                                                                                    </div>




                                                                                    <div class="col-lg-12">
                                                                                        

                                                                                       
                                              <br><br>
                
                                                   <select class="selectpicker" data-style="btn-default btn-custom" name="perguntas">
                                                    
                                                             <option>Selecione Sua Pergunta de Segurança...</option>
                                                             <option  value="1">Qual é o nome do seu melhor amigo de Infância?</option>
                                                             <option  value="2">Qual os últimos quatro números do seu CPF?</option>
                                                             <option  value="3">Qual o nome do seu 1° animal de estimação?</option>
                            
                            </select>





                        
                        
                            <br>
                            <div class="col-lg-12 input-group">
                                  <br><input name="resposta" class="form-control" placeholder="Sua Resposta" required="">
                              
                            </div>
                        
                   
                     </div>




                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                               
                                                               




                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">

                                                                    <button type="submit" name="env" class="btn btn-default waves-effect" value="Enviar">Cadastrar</button>
                                                                </div>
                                                            </div>
                                                                    </form>
                                                    </div>
                                                            





                                                </div>
                                                    


<?php

/*if(isset($_POST[env])){
    echo "<script>alert('Cadastro Realizado com sucesso!')</script>";
}  else {
    echo "<script>alert('Cadastro não Realizado com sucesso!')</script>";
}*/
?>



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
    <script src="../assets/plugins/switchery/dist/switchery.min.js"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="../assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
    <script src="../assets/plugins/select2/select2.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>


    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>


    <script src="../assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        	  
		  jQuery(function($) {
		      $('.autonumber').autoNumeric('init');    
		  });
        </script>



</body>
</html>