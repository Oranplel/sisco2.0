<?php

require_once '../../dao/connect_db.php';


$fild_aluno = $_POST['aluno'];
$fild_turma = $_POST['turma'];
$fild_motivo = $_POST['radio'];
$fild_data = $_POST['data'];
$fild_hora = $_POST['hora'];


$sql = "INSERT INTO tb_atraso(tb_aluno_idtb_aluno,tb_turma_idtb_tr,tipo_atraso,data_atraso,hora_atraso) VALUES ('$fild_aluno','$fild_turma','$fild_motivo','$fild_data','$fild_hora')";
$result = mysqli_query($mysqli, $sql);


echo"
<script>
window.location=\"../turmas.php?id=$fild_turma\"
</script>
"   
?>
