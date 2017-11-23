          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Editar Turma</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
                    <div class="col-lg-12 col-md-12" id="btn">
                                    <?php
                                        $atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
                                        $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                                        echo br().form_open('Estagiario/notMatEditar/'. $id . '/' . $ano, $atributos).
                                        form_hidden('txt_ano', $ano).
                                        form_hidden('txt_id', $id);
                                        $i=0;
                                        foreach($materia as $data){
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
