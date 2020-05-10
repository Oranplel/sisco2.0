<?php

require_once '../../dao/connect_db.php';

$fild_aluno = $_POST ['aluno'];
$fild_turma = $_POST ['turma'];
$fild_motivo = $_POST['radio'];
$fild_data = $_POST['data'];
$fild_obs = $_POST['obs'];


$sql = "INSERT INTO tb_fardamento(tb_aluno_idtb_aluno,tb_turma_idtb_f,motivo_farda,obs_farda,data_farda) VALUES ('$fild_aluno','$fild_turma','$fild_motivo','$fild_obs','$fild_data')";
$result = mysqli_query($mysqli, $sql);



echo"
<script>
window.location=\"../turmas.php?id=$fild_turma\"
</script>
"   

?>
