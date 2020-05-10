<?php

require_once '../../dao/connect_db.php';

$fild_id = $_POST['id'];
$fild_aluno = $_POST['aluno'];
$fild_retorno = $_POST['radio'];
$t = $_POST['t'];

$data=date("Y-m-d H:i:s");

$sql = "UPDATE tb_saida set status_retorno='$fild_retorno',hora_retorno='$data' where tb_aluno_idtb_aluno='$fild_aluno' and idtb_saida='$fild_id' ";
$result = mysqli_query($mysqli, $sql);

echo"
<script>
window.location=\"../index.php?id=$t\"
</script>
"  
?>