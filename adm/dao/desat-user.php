<?php

include '../../dao/connect_db.php'; 
$idbot = $_GET['id'];

$sql = "UPDATE tb_usuario SET status_usuario='2' WHERE idtb_usuario='$idbot'";
$result = mysqli_query($mysqli, $sql);

echo "<meta charset=utf-8>
<script>alert('Usuário Desativado.');
window.location=\"../manu-user.php\"
</script>
";
?>