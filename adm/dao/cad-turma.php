<?php
if(isset($_POST[env])){
                
                    include '../../dao/connect_db.php'; 

  $curso = $_POST['nome_curso'];
  $pdt = $_POST['nome_usuario'];
  $ano = $_POST['ano'];
        
        if($curso == '0' || $pdt == '0' || $ano == '0'){
echo "<script language='javascript' type='text/javascript'> window.location.href=\"../cad-turma.php?dados=null\" </script>";       


        }else{


 $sql = "INSERT INTO tb_turma (idtb_turma, tb_usuario_idtb_usuario, tb_cursos_idtb_cursos, ano) VALUES (null,'$pdt', '$curso', '$ano' )";
 $result = mysqli_query($mysqli, $sql);


echo "<script language='javascript' type='text/javascript'> window.location.href=\"../cad-turma.php?dados=sucesso\" </script>";    
                }
              }
              ?>