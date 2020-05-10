
                                                             
                                                            
                                                            
                                                           

                                                       
                                                         
                                                           
                                                            
                                                        
                                                            
                                                            <div class="col-lg-4">
                                                                    <?php
                                                                
                                                                    $result = "SELECT *
FROM tb_atraso
WHERE status_at = '0'
AND tb_atraso.tb_aluno_idtb_aluno = $ro[idtb_aluno]
AND tipo_atraso = 'Acordou Tarde'
AND tb_atraso.tb_aluno_idtb_aluno = $ro[idtb_aluno]
OR tipo_atraso = 'Outro'
AND status_at = '0'
AND tb_atraso.tb_aluno_idtb_aluno = $ro[idtb_aluno]
AND tipo_atraso = 'Acordou Tarde'
AND tb_atraso.tb_aluno_idtb_aluno = $ro[idtb_aluno];";
                                                                    $resulta = mysqli_query($mysqli, $result);
                                                                    $numero  = mysqli_num_rows($resulta);
                                                                    if ($numero == 3) {
                                                                    echo "<div class='alert alert-danger'><strong>ALERTA:</strong> O aluno já apresenta $numero atrasos sem justificativa e no próximo a entrada será permitida somente com a presença do responsável!"
                                                                            . "<br><br><strong><a href='dao_front/zerar.php?id_t=$idTurma'>ZERAR ALERTA</a></strong><br></div>";
                                                                    } elseif ($numero >= 3) {
                                                                    echo "<div class='alert alert-danger'><strong>ALERTA:</strong> Limite de atraso expirado!</div>";
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    
                                                                    ?>
                                                            </div>