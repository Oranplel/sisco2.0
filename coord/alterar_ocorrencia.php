<?php include '../dao/connect_db.php'; ?>
<?php
 session_start();
  if(isset($_COOKIE['usuario3'])) {

    $_SESSION['id3'] =$_COOKIE['id3'];
    $_SESSION['emailUser3'] =$_COOKIE['usuario3'];
    $_SESSION['nomeUser3'] = $_COOKIE['nome3'];
    $_SESSION['imgUser3'] = $_COOKIE['img3'];
    $_SESSION['foneUser3'] = $_COOKIE['fone3'];
    $_SESSION['celUser3'] = $_COOKIE['cel3'];
 }else{
 if(!isset($_SESSION[nomeUser3])){
    echo "<script> window.location.href=\"../index.php\" </script>";
 }
 if(!isset($_SESSION[emailUser3])){
    echo "<script> window.location.href=\"bloqueio-tela.php\" </script>";
 }else{
    //senão, calculamos o tempo transcorrido
    $dataSalva = $_SESSION["ultimoAcesso3"];
    $agora = date("Y-n-j H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));

    if($tempo_transcorrido >= 1200) {
     //se passaram 10 minutos ou mais
      echo "
<meta charset=utf-8>
        
      <script> alert('Sua sessão expirou, dígite sua senha!'); window.location.href=\"bloqueio-tela.php\" </script>";
      //senão, atualizo a data da sessão
    }else {
    $_SESSION["ultimoAcesso3"] = $agora;
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

        <title>Sisco - Sistema de controle</title>

        <!--Morris Chart CSS -->
		    <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

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

        <script src="../assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- menu -->
                <?php include_once 'include_front/menu.php'; ?>
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
                        <h5>Altere os dados da ocorrência.</h5>
                       
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
                                    
                                   <form name="form_alterar" method="post" action="dao_front/alterar_oco.php">
          
    <?php  
     $idAlt = $_GET['id'];
     $sql = "SELECT * FROM tb_aluno, tb_ocorrencia WHERE tb_ocorrencia.tb_aluno_idtb_aluno = tb_aluno.idtb_aluno AND idtb_ocorrencia = $idAlt";
     $result = mysqli_query($mysqli, $sql);
     $ro=mysqli_fetch_assoc($result);
          ?>
                                       
                                       
                                        
                <input value="<?php echo $ro['idtb_aluno'];?>" name="idal" type="hidden">
           
                                          <center>
                                             
                                            
                                          <div class="col-md-12">
                                          <div class="input-group">
                                              
						<input type="hidden" class="form-control" readonly="true" name="id" value="<?php echo $ro['idtb_ocorrencia'];?>">
					</div>
                                          </div>
                                          <br>
                                          </center> 

                                      
                                            <div class="col-md-6">
                                                <br>
                                                <label id="nome">Data:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="data"  value="<?php echo $ro['data_ocorrencia'];?>" id="datepicker-autoclose">
						<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
					</div>
                                            </div>
                                       
                                        

                                        <div class="col-md-6">
                                            <br>
                                            <label id="email">Hora:</label>
                                        <div class="bootstrap-timepicker input-group">
                                            
                                            <input type="text" class="form-control" name="hora" value="<?php echo $ro['hora_ocorrencia'];?>" id="timepicker">
                                            <span class="input-group-addon bg-custom b-0 text-white"><i class="ti-arrow-circle-down "></i></span>
                                       </div>
                                        </div>
                                       
                                       <div class="col-md-12">
                                           <br>
                                           <label for="fone">Motivo:</label>
                                       <div class="input-group">
                                           <input class="form-control" name="mot" value="<?php echo $ro['motivo_ocorrencia'];?>">
                                          <span class="input-group-addon bg-custom b-0 text-white"><i class=" ti-pencil-alt "></i></span>
                                         
                                       </div>
                                       </div>
                                       <div class="col-md-12">
                                           <br>
                                           <label for="fone">Observação:</label>
                                       <div class="input-group">
                                           <textarea class="form-control" name="obs"><?php echo $ro['obs_ocorrencia'];?></textarea>
                                          <span class="input-group-addon bg-custom b-0 text-white"><i class=" ti-pencil-alt "></i></span>
                                         
                                       </div>
                                            <br> <br> <br> 
                                       </div>
                                      
                                        
            <a href="historico_aluno.php?id=<?php echo $ro['idtb_aluno'];?>"><button type="button" style="float:right" class="btn btn-inverse">Cancelar</button></a>
                                       
                                       
                                        
                                          <button  type="submit" class="btn btn-default in" style="float:right; margin:0 10px ">Alterar</button>
          
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
            jQuery(document).ready(function() {

                // Time Picker
                jQuery('#timepicker').timepicker({
                    defaultTIme : false
                });
                                jQuery('#timepicker').timepicker({
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
               

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
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
