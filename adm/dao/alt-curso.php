<?php
	require_once '../../dao/connect_db.php'; 
 $id = $_GET['id'];
 
  $fild_curso = utf8_decode($_POST['nome_curso']);
  
    $sql = "UPDATE tb_cursos SET nome_curso = '$fild_curso' WHERE idtb_cursos = '$id'";

    
    $result = mysqli_query($mysqli, $sql);



   echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>window.location.href=\"../config_curso.php\" </script>";
   
?>

