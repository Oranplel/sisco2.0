<?php
include '../../dao/connect_db.php'; 
$fild_nome = utf8_decode($_POST['nome']);
$fild_email= $_POST['email'];
$fild_fone = $_POST['telefone'];
$fild_cel = $_POST['celular'];
$t = $_POST['t'];
$fild_matri = $_POST['matricula'];
$fild_diario = $_POST['diario'];
$fild_respon = utf8_decode($_POST['responsavel']);
$fild_fone_response = $_POST['fone_response'];
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../../fotos/';
 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 5; // 5Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0 && $_FILES['arquivo']['error'] != 4) {
   $t = $_POST['t'];
 
echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Ocorreu um erro'); window.location.href=\"../manu-turma.php?id=$t\" </script>";

}

if ($_FILES['arquivo']['error'] == 4) {
  if(isset($_POST[envi])){
   $sql = "INSERT INTO tb_aluno(tb_turma_idtb_turma, nome_aluno, email_aluno,tel_aluno,cel_aluno,matricula,diario,responsavel_aluno,tel_responsavel,foto_aluno)"
        . "VALUES ('$t', '$fild_nome', '$fild_email' ,'$fild_fone', '$fild_cel', '$fild_matri', '$fild_diario' , '$fild_respon' ,'$fild_fone_response', 'perfil2.jpg')";
        $resultad = mysqli_query($mysqli, $sql);
echo "<script>alert('Cadastro Realizado!')</script>";
echo "<script> window.location=\"../manu-turma.php?id=$t\"</script>";
    
}else{
    echo "<script>alert('Cadastro não realzado!)'</script>";
}
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
 
$img = $nome_final;

if(isset($_POST['envi'])){
    $sq = "INSERT INTO tb_aluno(tb_turma_idtb_turma, nome_aluno, email_aluno,tel_aluno,cel_aluno,matricula,diario,responsavel_aluno,tel_responsavel,foto_aluno)"
        . "VALUES ('$t', '$fild_nome', '$fild_email' ,'$fild_fone', '$fild_cel', '$fild_matri', '$fild_diario' , '$fild_respon' ,'$fild_fone_response', '$img')";
       $resultad = mysqli_query($mysqli, $sq); 
//echo "<script>alert('Cadastro Realizado!')</script>";
//echo "<script> window.location=\"../manu-turma.php?id=$t\"</script>";
            if ($resultad == true):
                echo "<script>alert('Cadastro Realizado!')</script>";
                echo "<script> window.location=\"../manu-turma.php?id=$t\"</script>";
            else:
                echo "<script>alert('Cadastro não realzado!')</script>";
            endif;
}else{
    echo "<script>alert('Cadastro não realzado!')</script>";
}
 
}
}
 
?>
