<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

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
				<div class="panel-heading">
					<h3 class="text-center">Recupere sua senha </h3>
				</div>

				<div class="panel-body">
					<form method="post" action="dao/recuperar-senha.php" role="form" class="text-center">
					
						 <div class="form-group ">
                    <div class="form-group m-b-0">
                        <input type="text" name="email_usuario" class="form-control" placeholder="Usuário" required="">
                    </div>
                </div>
							
							<br>
				
                                                   <select class="form-group m-b-0 selectpicker" data-style="btn-default btn-custom" name="perguntas">
                                                    
                                                             <option>Selecione Sua Pergunta de Segurança...</option>
                                                             <option  value="1">Qual é o nome do seu melhor amigo de Infância?</option>
                                                             <option  value="2">Qual os últimos quatro números do seu CPF?</option>
                                                             <option  value="3">Qual o nome do seu 1° animal de estimação?</option>
                            
                            </select>
						
						<div class="form-group m-b-0">
							<br>
							<div class="input-group">
								<input name="resposta" class="form-control" placeholder="Sua Resposta" required="">
								
								<span class="input-group-btn"><br>
									<button type="submit" class="btn btn-default in">
										Enviar
									</button> 
								</span>
							</div>
						</div>
						<div class="row">
				<div class="col-sm-12 text-center">
					<p>
						<br> <br>Voltar para tela de <a href="../index.php" class="text-primary m-l-5"><b>Login</b></a>
					</p>
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


        <script src="../assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>

	</body>
</html>