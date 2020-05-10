<?php
require_once '../../dao/connect_db.php';

$fild_turma = $_POST['turma'];
$fild_aluno = $_POST['aluno'];
$fild_motivo = $_POST['radio'];
$fild_obs =  ($_POST['obs']);
$fild_user = $_POST['user'];
$fild_data = $_POST['data'];
$fild_hora = $_POST['hora'];


$sql = "INSERT INTO tb_ocorrencia(tb_usuario_idtb_usuario, tb_aluno_idtb_aluno,tb_turma_idtb_turma,motivo_ocorrencia,obs_ocorrencia,nivel_ocorrencia,data_ocorrencia,hora_ocorrencia) VALUES ('$fild_user', '$fild_aluno','$fild_turma','$fild_motivo','$fild_obs','s','$fild_data','$fild_hora')";
$result = $pdo->prepare($sql);
$result->execute();
//$result = mysqli_query($mysqli, $sql);
header("Location: ../alunos.php?id=$fild_turma");
//echo"<script> window.location=\"../alunos.php?id=$fild_turma \" </script>"

 ?>