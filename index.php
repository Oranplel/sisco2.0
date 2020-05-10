<?php include 'dao/connect_db.php'; ?>
<?php ob_start(); //Inicia o cache para a sessão
session_start(); //Inicia a sessão da página(login)
if (isset($_SESSION['nomeUser'])) {
    if (isset($_SESSION['tipoUser'])) {
        header("Location: adm/index.php");        
    }
	elseif (isset($_SESSION['tipoUser1'])) {
        header("Location: pdt/index.php");
        
    }elseif (isset($_SESSION['tipoUser2'])) {
        header("Location: professor/index.php");
         
    }elseif (isset($_SESSION['tipoUser3'])) {
        header("Location: coord/index.php");
        
    }elseif (isset($_SESSION['tipoUser4'])) {
        header("Location: aluno/aluno.php");
        exit;
    }
	 //Oculta todo o código abaixo quando existe erro
}//session_start();
//eq2020 - codigo abaixo faz log-off caso usuario volte ao index.php
/* if(isset($_SESSION[nomeUser])) {

 unset($_SESSION['id']);
 unset($_SESSION['emailUser']);
 unset($_SESSION['nomeUser']);
 unset($_SESSION['imgUser']);

 session_destroy();

 echo "<script> window.location.href=\"index.php\" </script>";
 }
 if(isset($_SESSION[nomeUser1])) {

 unset($_SESSION['id1']);
 unset($_SESSION['emailUser1']);
 unset($_SESSION['nomeUser1']);
 unset($_SESSION['imgUser1']);

 session_destroy();

 echo "<script> window.location.href=\"index.php\" </script>";
 }
 if(isset($_SESSION[nomeUser2])) {

 unset($_SESSION['id2']);
 unset($_SESSION['emailUser2']);
 unset($_SESSION['nomeUser2']);
 unset($_SESSION['imgUser2']);

 session_destroy();

 echo "<script> window.location.href=\"index.php\" </script>";
 }
 if(isset($_SESSION[nomeUser3])) {

 unset($_SESSION['id3']);
 unset($_SESSION['emailUser3']);
 unset($_SESSION['nomeUser3']);
 unset($_SESSION['imgUser3']);

 session_destroy();

 echo "<script> window.location.href=\"index.php\" </script>";
 }
 if(isset($_SESSION[nomeAluno4])) {

 unset($_SESSION['id4']);
 unset($_SESSION['emailAluno4']);
 unset($_SESSION['nomeAluno4']);
 unset($_SESSION['imgAluno4']);

 session_destroy();

 echo "<script> window.location.href=\"index.php\" </script>";
 }*/?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- <link rel="shortcut icon" href="assets/images/favicon_1.ico"> -->
        <link rel="shortcut icon" href="assets/images/espinho_basico.png">
         <title>Sisco 2.0 - Login</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/2020.css">
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class="branco card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"><strong class="text-custom">Acesse  <img class="logosisco" src="assets/images/espinho_basico.ico">ISCO²·</strong> </h3>
            </div> 


            <div class="panel-body">
               <form id="formulario" name="formulario" method="post" role="form" class="form-horizontal m-t-20"> 
                <?php
                if(isset($_POST['env'])){
            $usuario = $_POST['email'];
            $senha = $_POST['senha'];
            $lembrar = $_POST['lembrar'];
            //eq2020 - log-in estilo mysqli
            $queryvalidar = "SELECT * FROM tb_usuario WHERE email_usuario=:usuario AND senha_usuario=:senha AND status_usuario='1'";
            //eq2020 - mesmo que ->execute do PDO
            try {
                $result = $pdo->prepare($queryvalidar);
                $result->bindParam(':usuario',$usuario, PDO::PARAM_STR);
                $result->bindParam(':senha',$senha, PDO::PARAM_STR);
                $result->execute();
                $linha = $result->rowCount();
            if ($linha > 0){
                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    $id_user = $show->idtb_usuario;
                    $email_usuario = $show->email_usuario;
                    $nome_usuario = $show->nome_usuario;
                    $tipo_usuario = $show->tipo_usuario;
                    $img_usuario = $show->img_usuario;
                    $fone_usuario = $show->telefone_usuario;
                    $cel_usuario = $show->celular_usuario;
                    
                  }session_start();
                /*$id_user = $linha['idtb_usuario'];
                $email_usuario = $linha['email_usuario'];
                $nome_usuario = $linha['nome_usuario'];
                $tipo_usuario = $linha['tipo_usuario'];
                $img_usuario = $linha['img_usuario'];
                $fone_usuario = $linha['telefone_usuario'];
                $cel_usuario = $linha['celular_usuario'];
                session_start();*/

            
                if($tipo_usuario == 'PDT'){
                    if ($lembrar == 's') {
                    setcookie('usuario1', $email_usuario, time()+1200, "/");
                    setcookie('id1', $id_user, time()+1200, "/");
                    setcookie('nome1', $nome_usuario, time()+1200, "/");
                    setcookie('img1', $img_usuario, time()+1200, "/");

            }
            //inicia sessao
                $_SESSION['id1'] = $id_user;
                $_SESSION['emailUser1'] = $email_usuario;
                $_SESSION['nomeUser1'] = $nome_usuario;
                $_SESSION['imgUser1'] = $img_usuario;
                $_SESSION['tipoUser1'] = $tipo_usuario;
                //defino a sessão que demonstra que o usuário está autorizado
                $_SESSION["ultimoAcesso1"]= date("Y-n-j H:i:s");
            //throw $th;
                //redireciona para a pagina
                //eq2020 - é que nem o header(Location: url) 
                header("Location: pdt/index2.php");
                //echo "<script>window.location =\"pdt/index.php\"</script>"; 
            }
                if($tipo_usuario == 'ADM'){
                    if ($lembrar == 's') {
                    setcookie('usuario', $email_usuario, time()+1200, "/");
                    setcookie('id', $id_user, time()+1200, "/");
                    setcookie('nome', $nome_usuario, time()+1200, "/");
                    setcookie('img', $img_usuario, time()+1200, "/");

                    }
                //inicia sessao
                $_SESSION['id'] = $id_user;
                $_SESSION['emailUser'] = $email_usuario;
                $_SESSION['nomeUser'] = $nome_usuario;
                $_SESSION['imgUser'] = $img_usuario;
                $_SESSION['tipoUser'] = $tipo_usuario;
                //defino a sessão que demonstra que o usuário está autorizado
                $_SESSION["ultimoAcesso"]= date("Y-n-j H:i:s");
                //redireciona para a pagina
                header("Location: adm/index.php"); 
                //echo "<script>window.location =\"adm/index.php\"</script>"; 
                
                }
                if($tipo_usuario == 'Professor'){
                    if ($lembrar == 's') {
                    setcookie('usuario2', $email_usuario, time()+1200, "/");
                    setcookie('id2', $id_user, time()+1200, "/");
                    setcookie('nome2', $nome_usuario, time()+1200, "/");
                    setcookie('img2', $img_usuario, time()+1200, "/");

                    }
                //inicia sessao
                $_SESSION['id2'] = $id_user;
                $_SESSION['emailUser2'] = $email_usuario;
                $_SESSION['nomeUser2'] = $nome_usuario;
                $_SESSION['imgUser2'] = $img_usuario;
                $_SESSION['tipoUser2'] = $tipo_usuario;
                //defino a sessão que demonstra que o usuário está autorizado
                $_SESSION["ultimoAcesso2"]= date("Y-n-j H:i:s");
                //defino a data e hora de inicio de sessão em formato aaaa-mm-dd hh:mm:ss 
                //redireciona para a pagina
                header("Location: professor/index.php"); 
                //echo "<script>window.location =\"professor/index.php\"</script>"; 
                
                }
                if($tipo_usuario == 'Coordenador'){
                    if ($lembrar == 's') {
                    setcookie('usuario3', $email_usuario, time()+1200, "/");
                    setcookie('id3', $id_user, time()+1200, "/");
                    setcookie('nome3', $nome_usuario, time()+1200, "/");
                    setcookie('img3', $img_usuario, time()+1200, "/");
                    setcookie('fone3', $fone_usuario, time()+1200, "/");
                    setcookie('cel3', $cel_usuario, time()+1200, "/");

                    }
                //inicia sessao
                $_SESSION['id3'] = $id_user;
                $_SESSION['emailUser3'] = $email_usuario;
                $_SESSION['nomeUser3'] = $nome_usuario;
                $_SESSION['imgUser3'] = $img_usuario;
                $_SESSION['foneUser3'] = $fone_usuario;
                $_SESSION['celUser3'] = $cel_usuario;
                $_SESSION['tipoUser3'] = $tipo_usuario;
                //defino a sessão que demonstra que o usuário está autorizado
                $_SESSION["ultimoAcesso3"]= date("Y-n-j H:i:s");
                //redireciona para a pagina
                header("Location: coord/index.php"); 
                //echo "<script>window.location =\"coord/index.php\"</script>"; 
                }
            }
            if($linha == 0){
                $query = "SELECT * FROM tb_aluno WHERE matricula=:usuario AND matricula=:senha";
                $resulta = $pdo->prepare($query);
                $resulta->bindParam(':usuario',$usuario, PDO::PARAM_STR);
                $resulta->bindParam(':senha',$senha, PDO::PARAM_STR);
                $resulta->execute();
                
            $row = $resulta->rowCount();
            if($row == 0){
                echo "<meta charset=utf-8>
                    <div class='alert alert-danger alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            Usuário ou Senha inválido.
                    </div>";
            }else{
                while ($show = $resulta->FETCH(PDO::FETCH_OBJ)) {
                    $tipo_aluno = $show->tipo_user;
                    $id_aluno = $show->idtb_aluno;
                    $email_aluno = $show->email_aluno;
                    $nome_aluno = $show->nome_aluno;
                    $img_aluno = $show->foto_aluno;
                    $fone_aluno = $show->tel_aluno;
                    $cel_aluno = $show->cel_aluno;
                    session_start();
                }
                if($tipo_aluno == 'aluno'){
                    if ($lembrar == 's') {
                    setcookie('usuario4', $email_aluno, time()+1200, "/");
                    setcookie('id4', $id_aluno, time()+1200, "/");
                    setcookie('nome4', $nome_aluno, time()+1200, "/");
                    setcookie('img4', $img_aluno, time()+1200, "/");
                    setcookie('fone4', $fone_aluno, time()+1200, "/");
                    setcookie('cel4', $cel_aluno, time()+1200, "/");

                    }
                //defino a sessão que demonstra que o usuário está autorizado
                $_SESSION["ultimoAcesso4"]= date("Y-n-j H:i:s");
                $_SESSION['id4'] = $id_aluno;
                $_SESSION['emailAluno4'] = $email_aluno;
                $_SESSION["nomeAluno4"] = $nome_aluno;
                $_SESSION['imgAluno4'] = $img_aluno;
                $_SESSION['foneAluno4'] = $fone_aluno;
                $_SESSION['celAluno4'] = $cel_aluno;
                $_SESSION['tipoUser4'] = $tipo_usuario;
                header("Location: aluno/aluno.php");
                //echo "<script>window.location =\"aluno/aluno.php\"</script>"; 
                }
                
            }
                
            }
                           
            }catch (PDOException $e) {
                echo "ERRO DE LOGIN DO PDO : ".$e->getMessage();
            }}

?>
           
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input type="text" name="email" class="form-control" placeholder="Usuário" required="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="senha" type="password" required="" placeholder="*******">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" name="lembrar" value="s">
                            <label for="checkbox-signup">
                                Mantenha-me conectado
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button name="env" class="btn btn-default in btn-block text-uppercase" type="submit">Entrar</button>
                    </div>
                </div>
                
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="adm/recuperar-senha.php" class="text-dark"><i class="fa fa-lock m-r-5"></i> Esqueceu sua senha?</a>
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
               
            
        </div>
        
        

        
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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>