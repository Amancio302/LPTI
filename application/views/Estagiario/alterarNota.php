			<div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Edição de Nota</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
					<?php echo "<h5>" . $aluno[0]->NOME . "</h5>";
						echo "<h5>" . $turma . "</h5>";
						echo "<h5>" . $materia[0]->NOME . "</h5>";
						echo br();
						$atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
                        $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                        $cont = 0;
                        echo br();
						foreach($nota as $band)
							$cont++;
                        for($i=0; $i<$cont; $i++){
							echo form_open('Estagiario/alteraNotas').
                            form_hidden('txt_aluno', $aluno[0]->idALUNO).
                            form_hidden('txt_turma', $nota[$i]->TURMA_idTURMA).
                            form_hidden('txt_materia', $materia[0]->idMATERIA).
                            form_hidden('txt_ano', $materia[0]->idMATERIA).
                            form_hidden('txt_notaId', $nota[$i]->idNOTA).
                            form_label("Nota: ", "txt_nota").br().
                            form_input('txt_nota', $nota[$i]->NOTA).br().
							form_label("Bimestre: ", "txt_bimestre").br().
                            form_input(array('name'=>'txt_bim', 'type'=>'number', 'min'=>1, 'max'=>4, 'value'=>1), $nota[$i]->BIMESTRE).br().br().
                            form_submit("btn_cadastrar", "Alterar", $btn).
                            form_close();
						}
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
