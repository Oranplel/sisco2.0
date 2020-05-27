<?php require_once '../dao/connect_db.php'; ?>
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
<?php  $id= $_GET['id']; ?>
<?php $pesquisa = "a";//$pesquisa = $_POST['palavra'];?>
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
        <link href="../assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
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
        <script src="../assets/js/jQueryMasked.js"></script>


    </head>
<script type="text/javascript">
$(document).ready(function(){
	$("#telefone_usuario").mask("(99)9999-9999");
        $("#celular_usuario").mask("(99)99999-9999");
       
});
</script>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php
            include_once 'include/menu.php';
            ?>
            <!-- Left Sidebar End -->




            <!-- ============================================================== -->
            <!-- corpo do site -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                       
                     <div class="col-lg-12">
                                <div class="card-box">
                          
                                <h4 ><i class="ti-angle-right"></i> Usuários
                               <a href="cad-user.php"> <button style="float:right " type="button" class="btn waves-effect btn btn-default in" data-toggle="modal" > <i class=" icon-user-follow" style="float:right "> Add Usuário</i></button></a>
                                                   
                                   
                                </h4>
                                
                                <hr>
                               
                        </div>

                    </div>


                    <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <form name="frmbusca" method="post" action="manu-user.php?id=<?php echo $id ?>">
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
                                                   <th><i class="icon-user"></i></th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Tipo</th>
                                                    <th>Alterar</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            
                                           
                                               
                                                

                                                  <?php
                                                 include "../dao/connect_db.php";
                                                 $sql = "SELECT * FROM tb_usuario where nome_usuario = nome_usuario AND tipo_usuario <> 'ADM' and nome_usuario like '%$pesquisa%' ORDER BY nome_usuario ASC";
                                                 //$result = mysqli_query($mysqli, $sql);
                                                 $result = $pdo->prepare($sql);
                                                 $result->execute();
                                                 $i=1;
                                                 while($r=$result->fetch(PDO::FETCH_OBJ)){
                                                   ?> 
                                                         <tbody>
                                                        <tr>
                                                          <td><img src='../fotos/<?php echo $r->img_usuario; ?>' alt='contact-img' title='contact-img' class='img-circle thumb-sm' /></td>

                                                          <td> <?php echo utf8_encode($r->nome_usuario); ?></td>

                                                         <td> <?php echo $r->email_usuario; ?></td>

                                                         <td> <?php echo $r->tipo_usuario; ?></td>

                                                         <td>
                                                         <button type='button' class='btn waves-effect btn btn-default in' data-toggle='modal' data-target='#custom-width-modal<?php echo $r->idtb_usuario; ?>'><i class='icon-pencil'></i></button>
                                                         </td>



       

                                    <form name='form' id='form_altUser' action='dao/editar_user.php?id=<?php echo $r->idtb_usuario; ?>' method='POST' enctype='multipart/form-data'>
                                    <div id='custom-width-modal<?php echo $r->idtb_usuario; ?>' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='custom-width-modalLabel' aria-hidden='true' style='display: none;'>
                                        <div class='modal-dialog' style='width:55%;'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                    


                                                
                                                    <h4 class='modal-title' id='custom-width-modalLabel' value='<?php echo $r->idtb_usuario; ?>'><?php echo utf8_encode($r->nome_usuario); ?>
                                                             </h4>
                                                   
                                                   
                                                </div>
                                                <div class='modal-body'>
                                                   
                                                        <div class='row'>
                <div class='col-md-12'>
                    <!-- Form Elements -->
                    <div class='panel panel-default'>
                       
                        <div class='panel-body'>
                            <div class='row'><div class='col-md-2'></div>
                                <div class='col-md-8'>
                                   
                                         
                                          <center><div class='form-group'>
                                            <div class='form-group'>
                        <label class='control-label'>Escolha uma foto de perfil</label>
                        <input type='file' class='filestyle' name='arquivo' data-iconname='fa fa-cloud-upload'>
                        </div></center> 


                                        <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label id='nome'>Nome</label>
                                            <input value='<?php echo utf8_encode($r->nome_usuario); ?>' class='form-control inp' name='nome_usuario' id='nome_usuario' required/>
                                        </div>
                                        </div>
                                        <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label id='email'>E-mail ou Usuário</label>
                                            <input value='<?php echo $r->email_usuario; ?>' class='form-control inp' id='email_usuario' name='email_usuario' required />
                                       </div>
                                       </div>
                                       <div class='col-md-6'>
                                       <div class='form-group'>
                                            <label for='fone'>Telefone</label>
                                            <input value='<?php echo $r->telefone_usuario; ?>' class='form-control inp' id='telefone_usuario' name='telefone_usuario' required/>
                                       </div>
                                       </div>
                                       <div class='col-md-6'>
                                       <div class='form-group'>
                                            <label for='cel'>Celular</label>
                                            <input value='<?php echo $r->celular_usuario; ?>' class='form-control inp' id='celular_usuario' name='celular_usuario'  required/>
                                       </div>
                                       </div>
                                            <br>
                                      <div class="col-lg-12">
                                                                                    
                                         <label class=" control-label " id="tipo"  >Tipo de Usuário</label>
                                                                                       

                                         </div>
                                          <div class="col-lg-12">
                                            <select class="selectpicker" name="tipo" data-style="btn-default btn-custom">
                                                <option value="<?php echo $r->tipo_usuario; ?>"> <?php echo $r->tipo_usuario; ?></option>
                                                <?php if($r->tipo_usuario == "PDT"){  ?>
                                                <option value="Coordenador">Coordenador</option>
                                                <option value="Professor">Professor</option>
                                                <?php }  ?>
                                                <?php if($r->tipo_usuario == "Coordenador"){  ?>
                                                <option value="PDT">PDT</option>
                                                <option value="Professor">Professor</option>
                                                <?php }  ?>
                                                <?php if($r->tipo_usuario == "Professor"){  ?>
                                                <option value="Coordenador">Coordenador</option>
                                                <option value="PDT">PDT</option>
                                                <?php }  ?>
                                            </select> 

                                          </div>

                                    
                              
                                        
                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
 
                                                
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-inverse waves-effect waves-light' data-dismiss='modal'>Cancelar</button>
                                                    <a href=''><button type='submit' class='btn btn-default waves-effect'>Salvar Alteração</button></a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                                    

                                         </form>

                                                         <td>
                                                         
                                                         <div class=''>
                                                          <?php
                                                          
                                                         if ( $r->status_usuario == '2'){
                                                         ?>
                                                        <a href='dao/ativar-user.php?id=<?php echo $r->idtb_usuario; ?>'>  <button type='submit' style="  width: 85px; height: 40px;" class='btn btn-default btn-custom waves-effect waves-light'>  Ativar </button> </a>
                                                         <?php
                                                         
                                                         } else{ 
                                                             if($r->status_usuario == '1'){
                                                             
                                                         ?>
                                                        <a href='dao/desat-user.php?id=<?php echo $r->idtb_usuario; ?>' ><button type='submit' style="  width: 85px;  
     height: 40px; font-size:13px  " type="button" class='btn btn-inverse btn-custom waves-effect waves-light'>Desativar</button> </a>
                                                         </div> <?php } ?>
                                                            </td>
                                                          </tr>
                                                           </tbody>
                                                         <?php
                                                             
                                                         }
                                                 }
                                                 
                                                ?>  
                                                  
                                            
                                            
                                        </table>
                                    </div>
                                </div>
                      





                </div> <!-- <button type="button" class="btn btn-danger btn-custom waves-effect waves-light">Danger</button> -->

                <footer class="footer text-right">
                    <center>  2016 © Sisco.</center>
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
        <script src="../assets/plugins/switchery/dist/switchery.min.js"></script>

        <!-- jQuery  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="../assets/plugins/morris/morris.min.js"></script>
        <script src="../assets/plugins/raphael/raphael-min.js"></script>

        <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="../assets/pages/jquery.dashboard.js"></script>

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        
    <script src="../assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
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




    </body>
</html>