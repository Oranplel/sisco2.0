<?php
//Conecta com o Banco
require_once '../../dao/connect_db.php';

//Campos recebidoso valor pelo usu�rio
$ida = $_POST['idal'];
$id = $_POST['id'];
$fild_data = $_POST['data'];
$fild_motivo = $_POST['motivo'];
$fild_obs = $_POST['obs'];

//Enviar uma query
$sql = "UPDATE tb_fardamento SET obs_farda='$fild_obs', data_farda='$fild_data', motivo_farda='$fild_motivo' WHERE idtb_fardamento='$id'";

$result = mysqli_query($mysqli, $sql);

//Ap�s a inser��o retornar a p�gina de consulta.php
echo"
<script>
window.location=\"../historico_aluno.php?id=$ida\"
</script>
"  
?>
