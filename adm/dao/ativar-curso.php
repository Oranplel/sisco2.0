<?php
include '../../dao/connect_db.php'; 
$idbot = $_GET['id'];

$sql = "UPDATE tb_cursos SET status_curso = '1' WHERE idtb_cursos='$idbot'";
$result = mysqli_query($mysqli, $sql);

echo "<meta charset=utf-8>
<script>alert('Curso Ativado.');
window.location=\"../config_curso.php?id=$idbot\"
</script>
";

?>

