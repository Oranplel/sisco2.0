<?php
require_once '../../dao/connect_db.php';

$hora = $_POST['hora'];
$data = $_POST['data'];
$motivo = $_POST['motivo'];
$aluno=$_POST['aluno'];
$oco=$_POST['oco'];


//$resultado = mysql_query("UPDATE t_assunto  SET assunto = '$nome_assunto' where idT_assunto='$id' ") or die(mysql_error());
 $sql = "UPDATE tb_ocorrencia SET hora_ocorrencia ='$hora', data_ocorrencia ='$data', obs_ocorrencia ='$motivo' WHERE tb_aluno_idtb_aluno='$aluno' AND idtb_ocorrencia='$oco'";

 $result = mysqli_query($mysqli, $sql);
//rediremciona
//redireciona para a pagina de manuntenção
echo"<script> window.location=\"../aluno.php?id=$aluno \" </script>"
?> 