<?php require_once '../dao/connect_db.php'; ?>
<?php
 session_start();
 error_reporting(0);
if(!isset($_SESSION[nomeUser2])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 unset($_SESSION[emailUser2]);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="../assets/images/favicon_1.ico">

		 <title>SISCO - Área Administraiva</title>

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
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				
				<div class="panel-body">
					<form id="formulario" name="formulario" method="post" role="form" class="text-center"> 
                
						<div class="user-thumb">
                                                          
                        <img src="../fotos/<?php echo $_SESSION['imgUser2'];?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                             
						</div>
						<div class="form-group">
							<h3><?php echo $_SESSION['nomeUser2'];?></h3>
							<p class="text-muted">
								Insira a senha para acessar.
							</p>
							<?php
                            if (isset($_POST[env])) {

                                $usuario = $_POST['email'];
                                $senha = $_POST['senha'];

                                $queryvalidar = "select * from tb_usuario where idtb_usuario = $_SESSION[id2] and senha_usuario='$senha'";
                                $result = mysqli_query($mysqli, $queryvalidar);
                                $linha = $result->fetch_array(MYSQLI_ASSOC);
                                if ($result->num_rows == 0) {
                                    echo "<meta charset=utf-8>
        <div class='alert alert-danger alert-dismissable'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                Senha inválida.
        </div>";
                                } else {
                                    $id_user = $linha['idtb_usuario'];
                                    $email_usuario = $linha['email_usuario'];
                                    $nome_usuario = $linha['nome_usuario'];
                                    $img_usuario = $linha['img_usuario'];


                                    $_SESSION['id2'] = $id_user;
                                    $_SESSION['emailUser2'] = $email_usuario;
                                    $_SESSION['nomeUser2'] = $nome_usuario;
                                    $_SESSION['imgUser2'] = $img_usuario;
                                    $_SESSION["ultimoAcesso2"] = date("Y-n-j H:i:s");
                                    echo "<script>window.location =\"index.php\"</script>";
                                }
                            }
                            ?>
							<div class="input-group m-t-30">
								<input name="senha" type="password" class="form-control" placeholder="********" required="">
								<span class="input-group-btn">
									<button name="env" type="submit" class="btn btn-default in">
										Entrar
									</button> 
								</span>
							</div>
						</div>
						
					</form>
       

				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						Deseja trocar usuário?<a href="dao/logout.php" class="text-primary m-l-5"><b>Login</b></a>
					</p>
				</div>
			</div>

		</div>

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