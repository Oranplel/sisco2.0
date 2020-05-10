<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="full-width-modalLabel">Replicar Intervenção</h4>
                                                            </div>
                                                            <!--Fim da head do modal -->

                                                            <!--Body do modal -->
                                                            <div class="modal-body">
                                                                <div class="row">
                    <label class="col-lg-1 control-label center-block" for="turmaSelect"  style="font-family: Baskerville Old Face;font-size:17px;padding-top: 5px"><b>Turmas: </b>
                                                                                        </label>
                                                                   <div class="col-md-12">
                                                                        <!-- Form Elements -->

                                                                        <div class="row"><div class="col-md-2"></div>
                             <div class="">
                             <div class="col-md-12">
                             <div class="form-group clearfix">
                            <input type="hidden" name="idocor" value="<?= $ro['idtb_ocorrencia']?>">
                             <div class="col-lg-11">
                            <select class="form-control selectpicker btn-inverse btn-custom" id="turmaSelect" style="margin-left: 5px" name="turmaSelect">
                             <option value="" disabled selected>Selecione o Curso</option>
                                            <?php
            $sql = "SELECT * FROM tb_turma,tb_cursos where tb_cursos_idtb_cursos=idtb_cursos ORDER BY serie";
                             $result = mysqli_query($mysqli, $sql);
                             while($r=mysqli_fetch_assoc($result)){

                    echo '<option value="'.$r['idtb_turma'].'">'.$r['serie'].'° '.$r['nome_curso'].'</option>';

                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-1 control-label center-block" for="alunoSelect"  style="font-family: Baskerville Old Face; font-size:17px;padding-top: 5px"><b>Alunos: </b></label>
                                                 <div class="col-lg-11" id="alunoCheck">
                                                    <select class="form-control selectpicker btn-inverse btn-custom" id="alunoSelect" style="margin-left: 5px" name="alunoSelect" disabled>
                                        <option value="" >Selecione o Aluno</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Fim do body do modal -->
</body>
</html>