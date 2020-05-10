<?php require_once '../dao/connect_db.php'; ?>
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
<?php $pesquisa= $_POST['palavra'];?>

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
		
		<link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                        <a href="index.php" class="logo"><i class="ti-pencil-alt icon-c-logo"></i><span>Sisc<i class="md md-album"></i></span></a>
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
                                <a href="alunos.php" class="active"><i class="ti-menu-alt"></i><span>Alunos </span></a>
                               
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- corpo do site -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                       <?php  
                        $sql = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso, nome_usuario FROM tb_turma, tb_cursos, tb_usuario WHERE  tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario and tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos AND tb_turma.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND tb_usuario.idtb_usuario = $_SESSION[id1]";
                                            $resultado = mysqli_query($mysqli, $sql);
                        if($resultado){
                                                while ($row = mysqli_fetch_assoc($resultado)){
                                                    ?>
                     <div class="col-lg-12">
                                <div class="card-box">
                            <div>
                                <h4 ><i class="ti-angle-right"></i> <?php echo $row['serie']; ?>º <?php echo utf8_encode($row['nome_curso']); ?>
                                
                                 
                                </h4>
                                 
                                <hr>
                               <div class="col-lg-3">  <p><b> Nº de alunos: </b>
                                <?php
                                $sql = "SELECT idtb_aluno FROM tb_aluno, tb_usuario, tb_turma where tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario and tb_turma.idtb_turma = tb_aluno.tb_turma_idtb_turma and tb_usuario.idtb_usuario = $_SESSION[id1]";
                                //Conta quantos registros possuem na tabela
                                    $result = mysqli_query($mysqli, $sql);
                                $total = mysqli_num_rows($result);
                                //Mostra o valor
                                echo $total;
                                ?> 
                               </p></div>
                               <div class="col-lg-3">  <p><b> Registros disciplinares: </b>
                                <?php
                                $sql = "SELECT * FROM tb_ocorrencia, tb_usuario, tb_turma WHERE tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario and tb_turma.idtb_turma = tb_ocorrencia.tb_turma_idtb_turma and tb_usuario.idtb_usuario = $_SESSION[id1]";
                                //Conta quantos registros possuem na tabela
                                $result = mysqli_query($mysqli, $sql);
                                $total = mysqli_num_rows($result);
                                //Mostra o valor
                                echo $total;
                                ?>
                               </p></div>
                               

                               <div class="col-lg-3">  </div>
                               <br>
                            </div>
                        </div>
                    </div>


                    <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <form name="frmbusca" method="post" action="alunos.php?id">
                                                <div class="form-group contact-search m-b-30">
                                                   <div class="input-group">
                                                        <input type="text"  name="palavra" class="form-control" placeholder="Pesquisar">
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
                                                   <th><i class="ti-user"></i></th>
                                                    <th>Nome</th>
                                                    <th>Nº da matricula</th>
                                                    <th>N° de registros disciplinares</th>
                                                    <th>Consultar</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                        <?php  
                                            $sql = "SELECT idtb_aluno, nome_aluno, email_aluno, matricula, diario, responsavel_aluno, foto_aluno, idtb_turma  FROM tb_aluno, tb_turma, tb_usuario  where tb_usuario.idtb_usuario = tb_turma.tb_usuario_idtb_usuario and tb_turma.idtb_turma = tb_aluno.tb_turma_idtb_turma and tb_usuario.idtb_usuario = $_SESSION[id1] AND nome_aluno like '%$pesquisa%'  ORDER BY nome_aluno ASC";
                                            $resultad = mysqli_query($mysqli, $sql);    
                                             $total2 = mysqli_num_rows($resultad);
                                            if($resultad){
                                                    while ($ro = mysqli_fetch_assoc($resultad)){
                                                        ?>
                                                <tr>
                                                    <td>
                                                        <img src="../fotos/<?php echo $ro['foto_aluno']; ?>" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo utf8_encode($ro['nome_aluno']); ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $ro['matricula']; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php
                                                        $sql = "SELECT * FROM tb_ocorrencia where tb_aluno_idtb_aluno = $ro[idtb_aluno];";
                                                        //Conta quantos registros possuem na tabela
                                                        $result = mysqli_query($mysqli, $sql);
                                                        $total = mysqli_num_rows($result);
                                                        //Mostra o valor
                                                        echo $total;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="aluno.php?id=<?php echo $ro['idtb_aluno']; ?>">
                                                            <button type="button" class="btn btn-default in">Histórico</button>
                                                        </a>
                                                          
                                                               
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                            
                                             
                                        </table>                   
<?php
                                                
                                            if ($total2 == '0' || $total2 == null || $total2 == ""){
                             echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
               Nenhum Aluno Cadastro.</center></b>
        </div><br>";
                        }
                                            ?>
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


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>


        <script src="../assets/plugins/moment/moment.js"></script>
     	<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
     	<script src="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
     	<script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
     	<script src="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
     	<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        
        <script>
			jQuery(document).ready(function() {

				// Time Picker
				jQuery('#timepicker').timepicker({
					defaultTIme : false
				});
                                jQuery('#timepicker1').timepicker({
					defaultTIme : false
				});
                                jQuery('#timepicker2').timepicker({
					defaultTIme : false
				});
                                jQuery('#timepicker3').timepicker({
					defaultTIme : false
				});
				
				//colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-autoclose1').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-autoclose2').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-autoclose3').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-autoclose4').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-autoclose5').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple-date').datepicker({
                    format: "mm/dd/yyyy",
					clearBtn: true,
					multidate: true,
					multidateSeparator: ","
                });
                jQuery('#date-range').datepicker({
                    toggleActive: true
                });
                
                //Clock Picker
                $('.clockpicker').clockpicker({
                	donetext: 'Done'
                });
                
                $('#single-input').clockpicker({
				    placement: 'bottom',
				    align: 'left',
				    autoclose: true,
				    'default': 'now'
				});
				$('#check-minutes').click(function(e){
				    // Have to stop propagation here
				    e.stopPropagation();
				    $("#single-input").clockpicker('show')
				            .clockpicker('toggleView', 'minutes');
				});
				
				
				//Date range picker
				$('.input-daterange-datepicker').daterangepicker({
					buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white'
				});
		        $('.input-daterange-timepicker').daterangepicker({
		            timePicker: true,
		            format: 'MM/DD/YYYY h:mm A',
		            timePickerIncrement: 30,
		            timePicker12Hour: true,
		            timePickerSeconds: false,
		            buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white'
		        });
		        $('.input-limit-datepicker').daterangepicker({
		            format: 'MM/DD/YYYY',
		            minDate: '06/01/2015',
		            maxDate: '06/30/2015',
		            buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white',
		            dateLimit: {
		                days: 6
		            }
		        });
		
		        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
		
		        $('#reportrange').daterangepicker({
		            format: 'MM/DD/YYYY',
		            startDate: moment().subtract(29, 'days'),
		            endDate: moment(),
		            minDate: '01/01/2012',
		            maxDate: '12/31/2015',
		            dateLimit: {
		                days: 60
		            },
		            showDropdowns: true,
		            showWeekNumbers: true,
		            timePicker: false,
		            timePickerIncrement: 1,
		            timePicker12Hour: true,
		            ranges: {
		                'Today': [moment(), moment()],
		                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		                'This Month': [moment().startOf('month'), moment().endOf('month')],
		                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		            },
		            opens: 'left',
		            drops: 'down',
		            buttonClasses: ['btn', 'btn-sm'],
		            applyClass: 'btn-default',
		            cancelClass: 'btn-white',
		            separator: ' to ',
		            locale: {
		                applyLabel: 'Submit',
		                cancelLabel: 'Cancel',
		                fromLabel: 'From',
		                toLabel: 'To',
		                customRangeLabel: 'Custom',
		                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
		                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		                firstDay: 1
		            }
		        }, function (start, end, label) {
		            console.log(start.toISOString(), end.toISOString(), label);
		            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		        });
				
			});
		</script>




    </body>
</html>