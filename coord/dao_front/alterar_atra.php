<?php
//Conecta com o Banco
require_once '../../dao/connect_db.php';

//Campos recebidoso valor pelo usu�rio
$ida = $_POST['idal'];
$id = $_POST['id'];
$fild_hora= $_POST['hora'];
$fild_data = $_POST['data'];
$fild_tipo = $_POST['tipo'];

//Enviar uma query
 $sql="UPDATE tb_atraso SET hora_atraso='$fild_hora', data_atraso='$fild_data', tipo_atraso='$fild_tipo' WHERE idtb_atraso='$id'";

$result = mysqli_query($mysqli, $sql);

//Ap�s a inser��o retornar a p�gina de consulta.php
echo"
<script>
window.location=\"../historico_aluno.php?id=$ida\"
</script>
"  
?>

