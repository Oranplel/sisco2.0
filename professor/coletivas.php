<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario2'])) {

$_SESSION['id2'] =$_COOKIE['id2'];
    $_SESSION['emailUser2'] =$_COOKIE['usuario2'];
    $_SESSION['nomeUser2'] = $_COOKIE['nome2'];
    $_SESSION['imgUser2'] = $_COOKIE['img2'];
 }else{
 if(!isset($_SESSION[nomeUser2])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailUser2])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso2"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso2"] = $agora;
   }
}
 }

?> 
<?php $idTurma = $_GET['id'];?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta http-equiv="refresh" content="1200">

        <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

        <title>SISCO</title>
        <link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="../assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

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

        <script src="../assets/js/modernizr.min.js"></script>


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="../assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
        <script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        
    </head>


    <body class="fixed-left">
        
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
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgUser2'];?>" alt="user-img" class="img-circle"> 
                                    </a><ul class="dropdown-menu">
                                        <li><a href="manual_pdt.pdf" target="_blank"><i class="ti-book m-r-5"></i> Manual do Sistema</a></li>
                                        <li><a href="bloqueio-tela.php"><i class="ti-lock m-r-5"></i> Bloquear Tela</a></li>
                                        <li><a href="perfil_professor.php"><i class="ti-user m-r-5"></i> Perfil</a></li>
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
                                <a href="#" class="active"><i class="ti-menu-alt"></i><span>Alunos </span></a>
                               
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="wraper container-fluid">
                <?php  
                        $sql = "SELECT idtb_turma, serie, ano, idtb_cursos, nome_curso, nome_usuario FROM tb_turma, tb_cursos, tb_usuario WHERE tb_turma.tb_cursos_idtb_cursos = tb_cursos.idtb_cursos AND tb_turma.tb_usuario_idtb_usuario = tb_usuario.idtb_usuario AND idtb_turma = $idTurma";
                                          $resultado = mysqli_query($mysqli, $sql);  
                        while ($row = mysqli_fetch_assoc($resultado)){
                                                    ?>

                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <h2 class="m-b-5"><b><?php echo $row['serie']; ?>º <?php echo $row['nome_curso']; ?></b></h2>
                                    <p class="text-muted"> 

                                    <?php
$q1 = "SELECT * FROM tb_coletiva where tb_turma_idtb_tur = $idTurma";
                                        $sql = mysqli_query($mysqli, $q1);
                                        //Conta quantos registros possuem na tabela

                                        $total = mysqli_num_rows($sql);
                                        //Mostra o valor
                                        echo $total;
?> Intervenções Coletivas</p>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                     <?php } ?>
        

                                
                     <div class="row">
                         <div class="col-lg-12">
                                <div class="panel panel-border panel-custom">
                                    <div class="panel-heading">
                                    </div>
                                        <?php
                        $r = "SELECT * FROM tb_coletiva, tb_usuario WHERE tb_turma_idtb_tur = $idTurma AND tb_usuario.idtb_usuario = tb_coletiva.tb_usuario_idtb_user  ORDER BY data_reg_col DESC";
                                            $resultado = mysqli_query($mysqli, $r);
                                               $total = mysqli_num_rows($resultado);
                        if ( $total == 0){
                             echo "<div style='font-size:25px'><br><b><center> <i class='ion-alert-circled '></i>
               Nenhuma Intervenção Coletiva Encontrada.</center></b>
        </div>";
                        } while ($ro = mysqli_fetch_assoc($resultado)){
                                                    ?>
                                    
                                    <form name="formulario" action="dao/alterar_coletiva.php" method="POST">
                            <input type="hidden" class="form-control" name="turm" value="<?php echo $idTurma ?>">
                                       <div class="panel-body">
                                        <div class="text-muted"><?php echo $ro['data_coletiva']; ?> às <?php echo $ro['hora_coletiva']; ?></div>
                                        <p><a href="" class="text-custom">Aplicada por:</a> <?php echo $ro['nome_usuario']; ?> </p>
                                                <a href="" class="text-custom">Motivo:</a> <?php echo $ro['obs_coletiva']; ?>
                                                    <br>
                                                    <?php if($ro['nome_usuario'] == $_SESSION['nomeUser2']){ ?>
                                              <div><a href="dao/excluir_coletiva.php?id=<?php echo $ro['idtb_coletiva']; ?>&idT=<?php echo $idTurma; ?>"  onclick="return confirm(' Deseja realmente excluir registro? ')">
                                                    <button type="button" style="float:right;" class="btn btn-inverse waves-effect waves-light btn-sm" id="sa-params" data-dismiss="modal" id="salvarsaida"><i class=" icon-trash"></i></button></a></div>  
                                                <div style="padding-right:80px">
                                                <button type="button" class="btn btn-default in" style="float:right;"  data-toggle="modal" data-target="#custom-width-modal<?php echo $ro['idtb_coletiva']; ?> " ><i class="icon-pencil"></i></button> </div>
                                                   <?php }         ?>    
                                                            

                                    <div id="custom-width-modal<?php echo $ro['idtb_coletiva']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel"> Intervenção Coletiva</h4>
                                                </div>
                                                <div class="modal-body">
                                                   
                                                        <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                   
                                        <input type="hidden" class="form-control" name="sal" value="<?php echo $ro['idtb_coletiva'];?> ">
                                        
                                          <div class="form-group">

                                                             <div class="col-lg-9" style=""> 
                                                             
                                                            <label class="col-md-2 control-label">Motivo:</label>
                                                            <textarea  name="motivo"class="form-control" rows="5" style="height:200px"><?php echo $ro['obs_coletiva']; ?></textarea>
                                                             
                                                                   
                                                                 
                                                                
                                                                </div>    
                                                           <div class="col-lg-3"> 
                                                              
                                                                    <label  class="control-label col-sm-15">Data:</label>
                                                                     <div class="">
                                                                                     
                                                                       <div class="input-group">
                                                                                       <input type="text" value="<?php echo $ro['data_coletiva']; ?>" class="form-control" placeholder="dia/mês/ano" name="data" id="datepicker-autoclose<?php echo $ro['idtb_coletiva']; ?>" style="width:230px">
                                                            
                                                                                    </div>
                                                                                     
                                                                                     </div>
                                                                 
                                                                    <br>


                                                                     <label class="control-label ">Hora:</label>
                                                                    
                                                                    <div class="input-group m-b-70">
                                                                    <div class="input-control">
                                                                    <div class="bootstrap-timepicker" style="width:230px">
                                                                        <input value="<?php echo $ro['hora_coletiva']; ?>" id="timepicker<?php echo $ro['idtb_coletiva']; ?>" type="text" class="form-control" name="hora" style="width:230px">
                                                                    </div>


                                                                    </div>   
                                                                     </div>
                                                                     
                                                                   
                                                             </div> 
                                       </div> 

                                        
                                        
                                      
                                        
                        
                         </div>
                </div>
                         </div>
                </div>
                         </div>
                </div>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-default waves-effect">Alterar</button>
                                                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                               
                                    <script>
            jQuery(document).ready(function() {

                // Time Picker
                jQuery('#timepicker').timepicker({
                    defaultTIme : false
                });
                                jQuery('#timepicker<?php echo $ro["idtb_coletiva"]; ?>').timepicker({
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
                jQuery('#datepicker-autoclose<?php echo $ro["idtb_coletiva"]; ?>').datepicker({
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
                        monthNames: ['Janeiro', 'Fervereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });
                
            });
        </script>
                                    </div>                                     </form>            
<hr>

                                    
                                            <?php }  ?>

                            <br><hr>
                                </div>
                            </div>


                         
                        
                    </div>
                    <div class="row">
                        
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    2016 © Sisco.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->




        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>


        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
	
	</body>
</html>