<?php
require_once '../../dao/connect_db.php';
if (isset($_POST['enviar'])):
    $fild_ocorrencia=$_POST['idocor'];
    $fild_turma=$_POST['turmaSelect'];
    $fild_aluno=$_POST['alunoSelect'];

    $sql = "SELECT * FROM tb_ocorrencia WHERE idtb_ocorrencia=$fild_ocorrencia";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "INSERT INTO tb_ocorrencia(tb_usuario_idtb_usuario, tb_aluno_idtb_aluno,tb_turma_idtb_turma,motivo_ocorrencia,obs_ocorrencia,nivel_ocorrencia,data_ocorrencia,hora_ocorrencia) VALUES ('".$row['tb_usuario_idtb_usuario']."', '$fild_aluno','$fild_turma','".$row['motivo_ocorrencia']."','".$row['obs_ocorrencia']."','s','".$row['data_ocorrencia']."','".$row['hora_ocorrencia']."')";
    $result = mysqli_query($mysqli, $sql);

    echo"<script> window.location=\"../aluno.php?id=$fild_aluno\" </script>";
endif;
if (isset($_REQUEST['turmaSelect'])):
    $id= $_REQUEST['turmaSelect'];

    $sql = "SELECT * FROM tb_aluno WHERE tb_turma_idtb_turma=$id ORDER BY diario";
    $resultado = mysqli_query($mysqli, $sql);

    while ($row= mysqli_fetch_assoc($resultado) ) {
        $alunos[] = array(
            'id'	=> $row['idtb_aluno'],
            'nome_sub_categoria' => utf8_encode($row['nome_aluno']),
        );
    }

    echo(json_encode($alunos));
endif;