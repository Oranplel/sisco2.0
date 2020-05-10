

<?php
 require_once '../../dao/connect_db.php';

 $id = $_GET['id'];
 $ida = $_GET['aluno'];
 
 $sql = "DELETE FROM tb_saida where idtb_saida='$id'";
 $result = mysqli_query($mysqli, $sql);


 	echo "<meta charset=utf-8>"
 . "<script language='javascript' type='text/javascript'>alert('Registro excluído') </script>";

 
 	echo "<script>
window.location=\"../historico_aluno.php?id=$ida\"
</script>";
 
?>




