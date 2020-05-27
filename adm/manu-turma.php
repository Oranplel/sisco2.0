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
<?php  $id = $_GET['id']; ?>
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

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/17690442ca.js" crossorigin="anonymous"></script>
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
            <!-- corpo do site -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                       
                     <div class="col-lg-12">
                                <div class="card-box">
                            <div>
                                


                                 <?php   
                                            $p5 = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso, idtb_usuario, nome_usuario  FROM tb_turma, tb_cursos, tb_usuario WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos AND tb_turma.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND idtb_turma = $id";
                                          $resultad = $pdo->prepare($p5);
                                          $resultad->execute();

                                            if($resultad){
                                                while ($ro = $resultad->fetch(PDO::FETCH_OBJ)){
                                                    ?>

                                                    <div class="m-t-20">
                                            <h5 class="text-uppercase"><?php echo $ro->serie; ?>° <?php echo utf8_encode($ro->nome_curso); ?><span class="pull-right"></span></h5>
                                            
                                        </div>



                                 <button  type="button" class="tn btn-white btn-custom waves-effect" data-toggle="modal" data-target="#custom-width-moda"><i class=" icon-pencil"></i></button>
                                 <button type="button" class="tn btn-white btn-custom waves-effect" data-toggle="modal" data-target="#excel"><i class="far fa-file-excel"></i></button>            
                                 <button type="button" class="tn btn-white btn-custom waves-effect" data-toggle="modal" data-target="#imagesfolder"><i class="far fa-images"></i></button>                   
                               
                                 <!-- modal ALTERAR TURMA -->

                                    <div id="custom-width-moda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">   Alterar Dados da Turma</h4>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                
                       <form name="form" id="form" action="dao/editar_turma.php" method="POST" enctype="multipart/form-data">
                           <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row"><div class="col-md-1"></div>
                                <div class="col-md-11">
                                    
                                    
                                        <!-- ============================================================== -->
                                                            <!-- ALTERAR DADOS DA TURMA -->
                                        <!-- ============================================================== -->
                                   
                                        
                                          
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $ro->idtb_turma; ?>" name="id_t">


                                        <!-- SSELEÇÃO DA SERIE  -->
                                                <div class="form-group clearfix">
                                                    
                                                
                                                    <label 
                                                        class="col-lg-2 control-label " for="userName2" style="font-family: Baskerville Old Face; font-size:17px"><b>Ano</b>
                                                       
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <select class="selectpicker" data-style="btn-inverse btn-custom" name="ano">
                                                             <option  value="<?php echo $ro->ano ?>"><?php echo $ro->ano ?></option>
                                                             <option  value="2015">2015</option>
                                                             <option  value="2016">2016</option>
                                                             <option  value="2017">2017</option>
                                                             <option  value="2018">2018</option>
                                                             <option  value="2019">2019</option>
                                                             <option  value="2020">2020</option>
                                                             <option  value="2021">2021</option>
                                                             <option  value="2022">2022</option>
                                                             <option  value="2023">2023</option>
                                                             <option  value="2024">2024</option>
                                                             <option  value="2025">2025</option>
                                                             <option  value="2026">2026</option>
                            
                            </select> 
                                                       
                                                    </div>
                                                       
                                                    
                                                    
                                                    
                                                    
                                                    
                                                      
                                                  <br>
                                                </div>

                                                 <div class="form-group clearfix">
                                                    <label 
                                                 class="col-lg-2 control-label " for="userName2" style="font-family: Baskerville Old Face; font-size:17px"><b>Curso</b>
                                                </label>
                                                    <div class="col-lg-8">
                                                          <select  class="selectpicker" data-style="btn-inverse btn-custom " name="nome_curso" type="text">
                                                              <option value="<?php echo $ro->idtb_cursos; ?>"> <?php echo utf8_encode($ro->nome_curso); ?></option> 
                               <?php
                                                    $r = "select * from tb_cursos WHERE nome_curso <> '$ro->nome_curso'";
                                                     $resultado = $pdo->prepare($r);
                                                     $resultado->execute();
                                                            if($resultado){
                                                              while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                          
                                                          ?>
                                                <option value="<?php echo $row->idtb_cursos; ?>"> <?php echo utf8_encode($row->nome_curso); ?>
                                                            </option> 
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                        
                    </select>
                                                       
                                                    </div>
                                                    </div>




                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                           <div class="form-group clearfix">
                                               <label 
                                                   class="col-lg-2 control-label " for="userName2" style="font-family: Baskerville Old Face; font-size:17px"><b>PDT</b>
                                                  </label>
                                                    <div class="col-lg-8">
                                                         <select  class="selectpicker" data-style="btn-inverse btn-custom " style="width:100%; height:40px" name="nome_usuario">
                                                    <option value="<?php echo $ro->idtb_usuario; ?>"> <?php echo utf8_encode($ro->nome_usuario); ?> </option>
                                                      <?php
                                        $r2 = "select * from tb_usuario where tipo_usuario='PDT' AND nome_usuario <> '$ro->nome_usuario'";
                                         $resultad = $pdo->prepare($r2);
                                         $resultad->execute();
                                        if($resultad){
                                            while ($row = $resultad->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $row->idtb_usuario; ?>"> <?php echo $row->nome_usuario; ?> </option>
                                            <?php
                                            }
                                        }
                                        ?>
                                                    
                                                


                                                      </select> 
                                                       
                                                    </div>
                                                  
                                                </div>
                                       </div>
                                       </div>
                                        
                                        
                                       
                                    <br><br>
                                    
                                                    
                                        
                                            <!-- ============================================================== -->
                                                            <!-- FIM DO ALTERAR DADOS DA TURMA -->
                                            <!-- ============================================================== -->
                                        
                            
                         </div>
                </div>
                         </div> </div> </div>
                           <div style="float:right"> <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                
                                                    <button type="submit" class="btn btn-default waves-effect">Alterar</button>
                                              </div> 
                                    
                                         </form>
               
                         
                </div>
                                                
                                                </div>
                                                
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                 
                                 
                                <button style="float:right " type="button" class="btn waves-effect btn btn-default in" data-toggle="modal" data-target="#custom-width-modal"> <i class=" icon-user-follow" style="float:right "> Add Aluno</i></button>
                                 
                                <!-- sample modal content -->

                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">   Cadastro de Aluno</h4>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">
                                    
                                    
                                    

                                    
                                    
                                                  <!-- CADASTRO DE ALUNOS -->     
                                    
                                   
                                    <form name="form" id="form1" action="dao/insere-aluno.php" method="POST" enctype="multipart/form-data">
                                          <input class="form-control inp" value="<?php echo $ro->idtb_turma; ?>" name="t" id="t" type="hidden" />
                                          <center> <div class="form-group">
                                            <div class="form-group">
            <label class="control-label">Escolha uma foto de perfil</label>
            <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="arquivo">
                                            </div></div></center> 
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
                                            <input class="form-control inp" id="fone" name="telefone" data-mask="(99)9999-9999" />
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">Celular</label>
                                            <input class="form-control inp" id="cel" data-mask="(99)99999-9999" name="celular" required/>
                                       </div>
                                       </div> 
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">Matrícula</label>
                                            <input class="form-control inp" id="mat" name="matricula" required/>
                                       </div>
                                       </div> 
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">N° Diário</label>
                                            <input class="form-control inp" id="di" name="diario" required/>
                                       </div>
                                       </div> 
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Responsável</label>
                                            <input class="form-control inp" name="responsavel" id="resp" required/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Telefone do Responsável</label>
                                            <input class="form-control inp" data-mask="(99)99999-9999" name="fone_response" id="fone_resp" required/>
                                        </div>
                                        </div>   
                                        <div class="modal-footer">
                                                     
                                                    <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" name="envi" class="btn btn-default waves-effect" >Cadastrar</button>
                                                    
                                                </div>
                                        
                                        
                                         </form>
                                                      <!-- FIM DE CADASTRO DE ALUNOS -->   
                                        
                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
                                                
                                                </div>
                                               
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                </h4>
                                <div id="excel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">   Conexão com Planilha Excel/Calc</h4>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">
                                    
                                    
                                    

                                    
                                    
                                                  <!-- CONEXÃO COM EXCEL -->     
                                    
                                   
                                    <form name="form" id="form1" action="dao/insere-aluno.php" method="POST" enctype="multipart/form-data">
                                          <input class="form-control inp" value="<?php echo $ro->idtb_turma; ?>" name="t" id="t" type="hidden" />
                                          <center> <div class="form-group">
                                            <div class="form-group">
            <label class="control-label">Selecione uma planilha no formato padrão</label>
            <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="arquivo">
                                            </div></div></center> 
                                        
                                        <div class="modal-footer">
                                                     
                                                    <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" name="envi" class="btn btn-default waves-effect" >Cadastrar</button>
                                                    
                                                </div>
                                        
                                        
                                         </form>
                                                      <!-- FIM DE CONEXÃO COM EXCEL -->   
                                        
                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
                                                
                                                </div>
                                               
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                </h4>
                                <div id="imagesfolder" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">   Inserção de Fotos Automática</h4>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">
                                    
                                    
                                    

                                    
                                    
                                                  <!-- CONEXÃO COM EXCEL -->     
                                    
                                   
                                    <form name="form" id="form1" action="dao/insere-aluno.php" method="POST" enctype="multipart/form-data">
                                          <input class="form-control inp" value="<?php echo $ro->idtb_turma; ?>" name="t" id="t" type="hidden" />
                                          <center> <div class="form-group">
                                            <div class="form-group">
            <label class="control-label">Selecione uma pasta com fotos com o nome dos alunos</label>
            <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="arquivo">
                                            </div></div></center> 
                                        
                                        <div class="modal-footer">
                                                     
                                                    <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" name="envi" class="btn btn-default waves-effect" >Cadastrar</button>
                                                    
                                                </div>
                                        
                                        
                                         </form>
                                                      <!-- FIM DE CONEXÃO COM EXCEL -->   
                                        
                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
                                                
                                                </div>
                                               
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                </h4>
                                <hr>
                               <div class="col-lg-5">  <p><b> Diretor de Turma: </b> <?php echo utf8_encode($ro->nome_usuario); ?> </p></div>
                               <div class="col-lg-3">  <p><b> Nº de alunos: </b>

                               <?php $r3 = "SELECT * FROM tb_aluno where tb_turma_idtb_turma = $id";
                                $sql = $pdo->prepare($r3);
                                $sql->execute();
//Conta quantos registros possuem na tabela

                            $total = $sql->rowCount($sql);
//Mostra o valor
echo                        $total;
?> 

                               </p></div>
                               
                               <br>
                            </div>
                        </div>
                    </div>


                    <div class="card-box">
                                   <div class="row">
                                        <div class="col-sm-8">
                                            <form name="frmbusca" method="post" action="manu-turma.php?id=<?php echo $id; ?>">
                                                <div class="form-group contact-search m-b-30">
                                                   <div class="input-group">
                                                        <input type="text" name="palavra" class="form-control" placeholder="Pesquisar">
                                                        <span class="input-group-btn">
                                                        <button type="submit" class="btn waves-effect btn btn-default in"><i class="fa fa-search"></i></button>
                                                        </span>
                                                    </div>
                                                </div> <!-- form-group -->
                                            </form>
                                            <!-- botão para excel e imagens-->
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover mails m-0 table table-actions-bar">
                                            <thead>
                                                <tr>
                                                   <th><i class="icon-user"></i></th>
                                                    <th>Nome</th>
                                                    <th>Nº da matricula</th>
                                                    <th>Email</th>
                                                    <th>Alterar</th>
                                                    <th>Excluir</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                    $res= "select * from tb_aluno, tb_turma WHERE nome_aluno like '%$pesquisa%' AND tb_aluno.tb_turma_idtb_turma = tb_turma.idtb_turma AND idtb_turma = $id  ORDER BY nome_aluno ASC" ;
                                                     $resultado = $pdo->prepare($res);
                                                     $resultado->execute();        
                                                    if($resultado){
                                                              while ($row = $resultado->fetch(PDO::FETCH_OBJ)) {
                          
                                                          ?>
                                               
                                                <tr>
                                                <td><img src="../fotos/<?php echo $row->foto_aluno; ?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm" /></td>
                                                 <td> <?php echo utf8_encode($row->nome_aluno); ?></td>
                                                 <td> <?php echo $row->matricula ; ?></td>
                                                 <td> <?php echo $row->email_aluno ; ?></td>
                                                    
                                                    
                                                    <td>
                                                        <button type="button" class="btn waves-effect btn btn-default in" data-toggle="modal" data-target="#custom-width-modal<?php echo $row->idtb_aluno ; ?>"><i class=" icon-pencil"></i></button>
                                                   
                                                      <!-- sample modal content -->

                                                    
                                                    </td>
                                                    <td>
                                                       
                                                    
                                                    
                                                    <a href="dao/excluir_aluno.php?id=<?php echo $row->idtb_aluno; ?>&idt=<?php echo $id;?>"><button class="btn btn-inverse waves-effect waves-light" onclick=" return confirm('Deseja mesmo excluir aluno?')" ><i class="ion-trash-a "></i></button></a>
                                                                
                                                
                                                    
                                                    </td>
                                                </tr>
                                                
                                                  
                                                   
                                               
                                                
                                            
                                            </tbody>
                                            </form>
                
                                    <div id="custom-width-modal<?php echo $row->idtb_aluno ; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel"><?php echo utf8_encode($row->nome_aluno); ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row"><div class="col-md-2"></div>
                                <div class="col-md-8">
                                 
                      
                                    
                                    
                                    
                                    
                                        <!-- ALTERAR ALUNO  -->   
                                    
                                        <form name="form" id="<?php echo $row->idtb_aluno; ?>" action="dao/editar_aluno.php" method="POST" enctype="multipart/form-data">
                                            
                                          
                                            <input type="hidden" class="filestyle" value="<?php echo $row->idtb_aluno; ?>" name="id_a" data-iconname="fa fa-cloud-upload">
                                         <input type="hidden" class="filestyle" value="<?php echo $ro->idtb_turma; ?>" name="t" data-iconname="fa fa-cloud-upload">
                                        
                                        
                                          <center><div class="form-group">
                                            <div class="form-group">
            <label class="control-label">Escolha uma foto de perfil</label>
            <input type="file" class="filestyle" data-iconname="fa fa-cloud-upload" name="arquivo">
            
                                            </div></div></center> 
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Nome</label>
                                            <input class="form-control inp" value="<?php echo utf8_encode($row->nome_aluno); ?>" name="nome_aluno" id="nome" required/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="email">E-mail</label>
                                            <input class="form-control inp" id="email" value="<?php echo $row->email_aluno ; ?>" name="email_aluno" required />
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="fone">Telefone</label>
                                            <input class="form-control inp" id="fone" value="<?php echo $row->tel_aluno ; ?>" data-mask="(99)9999-9999" name="tel_aluno" />
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">Celular</label>
                                            <input class="form-control inp" id="cel" value="<?php echo $row->cel_aluno ; ?>" data-mask="(99)99999-9999" name="cel_aluno" required/>
                                       </div>
                                       </div> 
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">Matrícula</label>
                                            <input class="form-control inp" id="mat" value="<?php echo $row->matricula ; ?>" name="matricula" required/>
                                       </div> 
                                       </div> 
                                       <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="cel">N° Diário</label>
                                            <input class="form-control inp" id="di"value="<?php echo $row->diario ; ?>" name="diario" required/>
                                       </div>
                                       </div> 
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Responsável</label>
                                            <input class="form-control inp" value="<?php echo $row->responsavel_aluno ; ?>" name="responsavel_aluno" id="resp" required/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="nome">Telefone do Responsável</label>
                                            <input class="form-control inp" value="<?php echo $row->tel_responsavel ; ?>" data-mask="(99)99999-9999" name="tel_responsavel" id="fone_resp" required/>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                                    <button type="submit" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-default waves-effect">Salvar Alteração</button>
                                                </div>
                                        
                                         </form>
                                            <!-- FIM DE ALTERAR DE ALUNOS -->   
                        
                         </div>
                </div>
                         </div>
                                  
                </div>
                         </div>
                </div>
                                                
                                                </div>
                                                
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->


                                                    
                      

<?php
                                                    }
                                                }
                                                ?>
                                        </table>
                                    </div>
                                </div>

<?php } } ?>

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
        
        <script src="../assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

<script src="../assets/plugins/switchery/dist/switchery.min.js"></script>

        <script src="../assets/plugins/morris/morris.min.js"></script>
        <script src="../assets/plugins/raphael/raphael-min.js"></script>

        <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="../assets/pages/jquery.dashboard.js"></script>

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
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