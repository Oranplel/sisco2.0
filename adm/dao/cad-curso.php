<?php
	include '../../dao/connect_db.php'; 

	$curso = utf8_decode($_POST['nome_curso']);
	

	$sql = "INSERT INTO tb_cursos (nome_curso) VALUES ('$curso')";
	 $result = mysqli_query($mysqli, $sql);

echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Curso cadastrado com sucesso'); window.location.href=\"../cad-turma.php\" </script>";
	


	?>