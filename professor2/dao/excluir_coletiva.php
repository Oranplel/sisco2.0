<?php
require_once '../../dao/connect_db.php';



$idTurma=$_GET['idT'];
$ro=$_GET['id'];


    $sql = "DELETE FROM tb_coletiva WHERE idtb_coletiva='$ro'" ;

  	$result = $pdo->prepare($sql);
	$result->execute();
    //$result = mysqli_query($mysqli, $sql);
	header("Location: ../coletivas.php?id=$idTurma");
    //echo"<script> window.location=\"../coletivas.php?id=$idTurma \" </script>";
?>

