<?php
//Conecta com o Banco
require_once '../../dao/connect_db.php';

$id = $_GET['id_t'];
//Enviar uma query
 $sql="UPDATE tb_atraso SET status_at='1'";

$result = mysqli_query($mysqli, $sql);

//Ap�s a inser��o retornar a p�gina de consulta.php
echo"
<script>
window.location=\"../turmas.php?id=$id\"
</script>
"  
?>

