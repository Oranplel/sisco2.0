<?php 
	include '../../dao/connect_db.php'; 
	$idt= $_GET['idt'];
	$id = $_GET['id'];
       
	$sql = "delete from tb_aluno where idtb_aluno=$id";
	$result = mysqli_query($mysqli, $sql);

	echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Arquivo excluído com sucesso'); window.location.href=\"../manu-turma.php?id=$idt\" </script>";
?>	

