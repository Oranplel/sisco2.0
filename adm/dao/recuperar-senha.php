<?php 

include '../../dao/connect_db.php';


$gera = rand(1000,10000);
$email_usuario = $_POST['email_usuario'];
$perguntas = $_POST['perguntas'];
$fild_resposta = $_POST['resposta'];

$sql = "SELECT * FROM tb_usuario WHERE email_usuario = '$email_usuario'";
$result = mysqli_query($mysqli, $sql);
         while ($row=mysqli_fetch_assoc($result)){
          $p = $row['pergunta'];
          $r = $row['resposta'];
         }                                

    if($perguntas == $p && $fild_resposta == $r){


  $sql = "UPDATE tb_usuario SET  senha_usuario =  '$gera' WHERE email_usuario = '$email_usuario'";

$result = mysqli_query($mysqli, $sql);
  ?>

  


  <?php
echo "<meta charset=utf-8>
      <script language='javascript' type='text/javascript'>alert('Sua nova senha será $gera '); window.location.href=\"../../index.php\" </script>

      ";

}else{
  echo "<meta charset=utf-8>
        <script language='javascript' type='text/javascript'>alert('Dados Inválidos'); window.location.href=\"../../index.php\" </script>";
                }
                    

?>