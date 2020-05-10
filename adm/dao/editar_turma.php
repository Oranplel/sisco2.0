<?php

 include '../../dao/connect_db.php'; 
 
 
 
 $id = $_POST['id_t'];
 
  $serie = $_POST['ano'];
  $curso = $_POST['nome_curso'];
  $pdt = $_POST['nome_usuario'];
  

  $sql= "UPDATE tb_turma SET ano =  '$serie', tb_cursos_idtb_cursos =  '$curso', tb_usuario_idtb_usuario= '$pdt' WHERE idtb_turma = '$id'";

   $resultad = mysqli_query($mysqli, $sql);

   echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>window.location.href=\"../manu-turma.php?id=$id\" </script>";

?>