<?php
require_once '../../dao/connect_db.php';


$aluno=$_GET['id'];
$oco=$_GET['oco'];

$sql="DELETE FROM tb_ocorrencia WHERE idtb_ocorrencia=$oco";

$result = $pdo->prepare($sql);
$result->execute();
//$result = mysqli_query($mysqli, $sql);

header("Location: ../aluno.php?id=$aluno");
//echo"<script> window.location=\"../aluno.php?id=$aluno \" </script>"
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

