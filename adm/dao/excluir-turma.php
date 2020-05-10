<?php
include '../../dao/connect_db.php'; 
 
 $id = $_GET['id'];
	$sql = "delete from tb_turma where idtb_turma=$id";
	 $resultad = mysqli_query($mysqli, $sql);

	echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Turma excluída com sucesso'); window.location.href=\"../consul-turma.php\" </script>";

?>


