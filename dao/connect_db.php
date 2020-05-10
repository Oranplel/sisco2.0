<?php
 @DEFINE('HOST','localhost');
 @DEFINE('DB','sisco1208');
 @DEFINE('USER','jmf');
 @DEFINE('PASS','qwe123');


 //error_reporting(1);
 
 try {
      //$mysqli = mysqli_connect("$hostname_db", "$username_db", "$password_db", "$database_db" ) or die ("Ocorreu um erro na conexao com o banco de dados! ");
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $selectC = "SELECT * FROM tb_turma"; /*
    $result = mysqli_query($mysqli, $sql);
    if($result){
        while($r=mysqli_fetch_assoc($result)){
            $ano_e = $r['ano'];
            $ano_a = date('Y');
            $serie = $ano_a - $ano_e + 1;
    $sql2 = "UPDATE tb_turma SET serie='$serie' WHERE idtb_turma=$r[idtb_turma]";
    $result2 = mysqli_query($mysqli, $sql2);
        }
    }
    */
   $resultC = $pdo->prepare($selectC);
   $resultC->execute();
   $contarC = $resultC->rowCount();
   if($contarC>0){
        while($show = $resultC->FETCH(PDO::FETCH_OBJ)){
            $ano_e = $show->ano;
            $ano_a = date('Y');
            $serie = $ano_a - $ano_e + 1;
            $updateC = "UPDATE tb_turma SET serie='$serie' WHERE idtb_turma=$show->idtb_turma";
            $result2 = $pdo->prepare($updateC);
            $result2->execute();
        }

   }

 } catch (PDOException $e) {
    echo "<b>ERRO DE PDO = </b>".$e->getMessage();
 }

/*
mysqli_query($mysqli,"SET NAMES 'utf8'");
mysqli_query($mysqli,'SET character_set_connection=utf8');
mysqli_query($mysqli,'SET character_set_client=utf8');
mysqli_query($mysqli,'SET character_set_results=utf8');
*/

 ?>
