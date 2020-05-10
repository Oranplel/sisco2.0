<?php
include '../../dao/connect_db.php'; 
$id = $_GET['id'];
  $nome_user = $_POST['nome_usuario'];
  $email_user = $_POST['email_usuario'];
  $fone_user = $_POST['telefone_usuario'];
  $cell_user = $_POST['celular_usuario'];
  $tipo_usuario = $_POST['tipo'];
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../../fotos/';
 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 5; // 5Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;
 
// Array com os tipos de erros de upload do PHPe
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0 && $_FILES['arquivo']['error'] != 4) {
   $t = $_POST['t'];
 
echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Ocorreu um erro'); window.location.href=\"../manu-user.php\" </script>";

}
if ($_FILES['arquivo']['error'] == 4) {
  
   $sql = "UPDATE tb_usuario SET nome_usuario =  '$nome_user',  email_usuario =  '$email_user', telefone_usuario =  '$fone_user', celular_usuario =  '$cell_user', tipo_usuario = '$tipo_usuario' WHERE idtb_usuario = '$id'";


   $result = mysqli_query($mysqli, $sql);



   echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Alterado com sucesso'); window.location.href=\"../manu-user.php\" </script>";
  
  
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}
 
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = date('d-m-Y-H-i-s').'.jpg';
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
  include '../../fotos/wideimage/WideImage.php';
        $wide=WideImage::load($_UP['pasta'].$nome_final)->resize(448,252,'fill')->saveToFile($_UP['pasta'].$nome_final);
 
  $img_user = $nome_final;


  $sql = "UPDATE tb_usuario SET nome_usuario =  '$nome_user', img_usuario =  '$img_user', email_usuario =  '$email_user', telefone_usuario =  '$fone_user', celular_usuario =  '$cell_user', tipo_usuario = '$tipo_usuario' WHERE idtb_usuario = '$id'";

 $result = mysqli_query($mysqli, $sql);

   echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Alterado com sucesso'); window.location.href=\"../manu-user.php\" </script>";
	
}else{
    echo "<script>alert('Alteração não realzada!')</script>";
}
 
}

 
?>
