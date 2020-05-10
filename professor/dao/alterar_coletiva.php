<?php
require_once '../../dao/connect_db.php';

$hora = $_POST['hora'];
$data = $_POST['data'];
$motivo = $_POST['motivo'];
$idTurma=$_POST['turm'];
$sala=$_POST['sal'];


//$resultado = mysql_query("UPDATE t_assunto  SET assunto = '$nome_assunto' where idT_assunto='$id' ") or die(mysql_error());
 $sql = "UPDATE tb_coletiva SET hora_coletiva ='$hora', data_coletiva ='$data', obs_coletiva ='$motivo' WHERE idtb_coletiva='$sala' ";

 $result = mysqli_query($mysqli, $sql);
//rediremciona
//redireciona para a pagina de manuntenção
echo"<script> window.location=\"../coletivas.php?id=$idTurma \" </script>"
?> 