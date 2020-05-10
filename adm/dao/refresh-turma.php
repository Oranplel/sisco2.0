<?php
include '../../dao/connect_db.php'; 
 
 $id = $_GET['id'];
 
  $p  = "SELECT * FROM tb_turma ORDER BY idtb_turma DESC LIMIT 1";
                                         $resultado = mysqli_query($mysqli, $p); 

                                            if($resultado){
                                                while ($row = mysqli_fetch_assoc($resultado)){
                                                   $id_n = $row['idtb_turma'] + 1;
                                                  $sql = "UPDATE tb_turma SET idtb_turma = '$id_n' WHERE idtb_turma='$id'";
                                                  $result = mysqli_query($mysqli, $sql);  
                                                  $sql1 = "UPDATE tb_aluno SET tb_turma_idtb_turma = '$id_n' WHERE tb_turma_idtb_turma='$id'";
                                                  $result1 = mysqli_query($mysqli, $sql1);  
                                                  $sql2 = "UPDATE tb_atraso SET tb_turma_idtb_tr = '$id_n' WHERE tb_turma_idtb_tr='$id'";
                                                  $result2 = mysqli_query($mysqli, $sql2);  
                                                  $sql3 = "UPDATE tb_coletiva SET tb_turma_idtb_tur = '$id_n' WHERE tb_turma_idtb_tur='$id'";
                                                  $result3 = mysqli_query($mysqli, $sql3);  
                                                  $sql4 = "UPDATE tb_fardamento SET tb_turma_idtb_f = '$id_n' WHERE tb_turma_idtb_f='$id'";
                                                  $result4 = mysqli_query($mysqli, $sql4);  
                                                  $sql5 = "UPDATE tb_ocorrencia SET tb_turma_idtb_turma = '$id_n' WHERE tb_turma_idtb_turma='$id'";
                                                  $result5 = mysqli_query($mysqli, $sql5); 
                                                  $sql6 = "UPDATE tb_saida SET tb_turma_idtb_s = '$id_n' WHERE tb_turma_idtb_s='$id'";
                                                  $result6 = mysqli_query($mysqli, $sql6);  
                                                    
                                                }
                                                }
	echo "<meta charset=utf-8><script language='javascript' type='text/javascript'>alert('Turma reajustada com sucesso'); window.location.href=\"../consul-turma.php\" </script>";

?>


