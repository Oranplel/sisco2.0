
<?php 
	require_once '../../dao/connect_db.php'; 

	$id = $_GET['id'];
	mysql_query("delete from tb_usuario where idtb_usuario=$id");
	mysql_close($dbconn);

	echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Arquivo excluído com sucesso'); window.location.href=\"../manu-user.php\" </script>";
?>	
