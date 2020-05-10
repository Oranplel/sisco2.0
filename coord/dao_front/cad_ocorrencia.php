<?php

require_once '../../dao/connect_db.php';

$fild_aluno = $_POST ['aluno'];
$fild_turma = $_POST ['turma'];
$fild_motivo = $_POST ['radio'];
$fild_obs =  ($_POST['obs']);
$fild_coordenador = $_POST['coordenador'];
$fild_data = $_POST['data'];
$fild_hora = $_POST['hora'];




$sql = "INSERT INTO tb_ocorrencia(tb_usuario_idtb_usuario, tb_aluno_idtb_aluno,tb_turma_idtb_turma,motivo_ocorrencia,obs_ocorrencia,nivel_ocorrencia,data_ocorrencia,hora_ocorrencia) VALUES ('$fild_coordenador', '$fild_aluno','$fild_turma','$fild_motivo','$fild_obs','g','$fild_data','$fild_hora')";
$result = mysqli_query($mysqli, $sql);



echo"
<script>
window.location=\"../turmas.php?id=$fild_turma\"
</script>
"   

?>
