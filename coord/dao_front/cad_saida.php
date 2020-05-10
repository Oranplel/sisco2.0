<?php

require_once '../../dao/connect_db.php';


$a = $_POST['aluno'];
$t = $_POST['turma'];
$r = $_POST['r'];
$d = $_POST['data'];
$h = $_POST['hora'];


$sql = "INSERT INTO tb_saida(tb_aluno_idtb_aluno,tb_turma_idtb_s,data_saida,hora_saida,responsavel_saida,status_retorno,data_reg) VALUES ('$a','$t','$d','$h','$r','','0')";
$result = mysqli_query($mysqli, $sql);


echo"
<script>
window.location=\"../turmas.php?id=$t\"
</script>
"   
?>
