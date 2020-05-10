<?php
//Conecta com o Banco
require_once '../../dao/connect_db.php';

//Campos recebidoso valor pelo usu�rio
$ida = $_POST['idal'];
$id = $_POST['id'];
$fild_hora= $_POST['hora'];
$fild_data = $_POST['data'];
$fild_resp = $_POST['resp'];


//Enviar uma query
$sql = "UPDATE tb_saida SET hora_saida='$fild_hora', data_saida='$fild_data', responsavel_saida='$fild_resp' WHERE idtb_saida='$id'";

$result = mysqli_query($mysqli, $sql);

//Ap�s a inser��o retornar a p�gina de consulta.php
echo"
<script>
window.location=\"../historico_aluno.php?id=$ida\"
</script>
"  
?>
