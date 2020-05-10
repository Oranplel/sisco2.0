<?php
//Conecta com o Banco
require_once '../../dao/connect_db.php';


//Campos recebidoso valor pelo usu�rio
$ida = $_POST['idal'];
$id = $_POST['id'];
$fild_hora= $_POST['hora'];
$fild_data = $_POST['data'];
$fild_obs = utf8_decode($_POST['obs']);
$fild_mot = $_POST['mot'];

//Enviar uma query
$sql = "UPDATE tb_ocorrencia SET hora_ocorrencia='$fild_hora',motivo_ocorrencia='$fild_mot',obs_ocorrencia='$fild_obs', data_ocorrencia='$fild_data' WHERE idtb_ocorrencia='$id'";

$result = mysqli_query($mysqli, $sql);

//Ap�s a inser��o retornar a p�gina de consulta.php
echo"
<script>
window.location=\"../historico_aluno.php?id=$ida\"
</script>
"  
?>
