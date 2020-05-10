<?php
require_once '../../dao/connect_db.php';

$fild_turma = $_POST['turm'];
$fild_motivo = $_POST['motivo'];
$fild_user = $_POST['user'];
$fild_data = $_POST['data'];
$fild_hora = $_POST['hora'];


$sql="INSERT INTO tb_coletiva (tb_turma_idtb_tur, tb_usuario_idtb_user, obs_coletiva,data_coletiva,hora_coletiva) VALUES ('$fild_turma', '$fild_user', '$fild_motivo','$fild_data','$fild_hora' )";
$result = $pdo->prepare($sql);
$result->execute();
//$result = mysqli_query($mysqli, $sql);

header("Location: ../alunos.php?id=$fild_turma");
//echo"<script> window.location=\"../alunos.php?id=$fild_turma \" </script>"

 ?>