          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Editar Frequência</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
                    <div class="col-lg-12 col-md-12" id="btn">
                        <?php
                            $atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
                            $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                            echo br().form_open('Estagiario/freqMatEditar/'. $id . '/' . $ano, $atributos).
                            form_hidden('txt_ano', $ano).
                            form_hidden('txt_id', $id);
                            $i=0;
                            foreach($Materia as $data){
                                echo form_radio('txt_materia', $data->idMATERIA, true). " " .
                                form_label($data->NOME, "txt_materia");
                                if($i==4){
                                    echo br();
                                    $i = 0;
                                }
                                else
                                        $i++;
                            }
                            echo br() . 
                            form_radio('txt_bimestre', 1, true). " " .
                            form_label("1º Bimestre", "txt_bimestre").
                            form_radio('txt_bimestre', 2, true). " " .
                            form_label("2º Bimestre", "txt_bimestre").
                            form_radio('txt_bimestre', 3, true). " " .
                            form_label("3º Bimestre", "txt_bimestre").
                            form_radio('txt_bimestre', 4, true). " " .
                            form_label("4º Bimestre", "txt_bimestre").
                            form_radio('txt_bimestre', 12, true). " " .
                            form_label("1º Semestre", "txt_bimestre").
                            form_radio('txt_bimestre', 34, true). " " .
                            form_label("2º Semestre", "txt_bimestre").
                            form_radio('txt_bimestre', 1234, true). " " .
                            form_label("Ano todo", "txt_bimestre").br().
                            form_submit("btn_cadastrar", "Escolher Matéria", $btn).
                            form_close();
                            echo br().
                            "<table id='myTable'>".
                            "<thead><tr>".
                            "<th>Matricula</th>".
                            "<th>Nome</th>".
                            "<th>Serie</th>".
                            "<th>Curso</th>".
                            "<th>Modalidade</th>".
                            "<th>Ano</th>".
                            "<th>".$materia[0]->NOME."</th> <th></th>".
                            "</tr></thead><tbody>";
                            $cont = 0;
                            foreach($TURMA_has_ALUNO as $band)
                                $cont++;
                            for($i=0; $i<$cont; $i++){
                                echo "<tr>".
                                "<td>".$TURMA_has_ALUNO[$i]->idALUNO. "</td>".
                                "<td>".$TURMA_has_ALUNO[$i]->NOME_ALUNO. "</td>".
                                "<td>".$TURMA_has_ALUNO[$i]->SERIE. "</td>".
                                "<td>".$TURMA_has_ALUNO[$i]->NOME_CURSO. "</td>".
                                "<td>".$TURMA_has_ALUNO[$i]->MODALIDADE. "</td>".
                                "<td>".$TURMA_has_ALUNO[$i]->ANO. "</td>".
                                "<td>".$FREQUENCIA[$i]."</td>".
                                "<td>" . anchor('/Estagiario/alterarFreq/'.$TURMA_has_ALUNO[$i]->idALUNO.'/'. $TURMA_has_ALUNO[$i]->ANO. '/'. $materia[0]->idMATERIA . '/' .$TURMA_has_ALUNO[$i]->SERIE. '/' . urlencode($TURMA_has_ALUNO[$i]->NOME_CURSO). '/' . $TURMA_has_ALUNO[$i]->MODALIDADE . '/' . $TURMA_has_ALUNO[$i]->idTURMA
                                , ' Alterar ', 'class="btn btn-warning"').
                                "</tr>";
                            }
                            echo "</tbody></table>";
                        ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<script src="{url}assets/js/jquery.min.js"></script>
	<script src="{url}assets/js/bootstrap.min.js"></script>
    <script src="{url}assets/js/metisMenu.min.js"></script>
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>
    <script src="{url}assets/js/sb-admin-2.js"></script>
    <script>{modal}</script>
	</body>
</html>
