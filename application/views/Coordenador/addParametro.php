          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Parâmetros de Risco</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-3 col-md-6">
												<?php
												$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
												$btn = array('name'=>'btn_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
												echo '<h3>Integrado</h3>' . br();
												$cont = 0;
												foreach($PARAMETRO as $data){
													echo 'Nota: ' . $data->NOTA . br(). 
												   	     'Frequência: ' . $data->FREQUENCIA . br().
												   	     'Matérias: ' . $data->MATERIAS . br();
												   	     if($data->idTURMA == 11)
															 echo '1º Informática';
														else if($data->idTURMA == 12)
															echo '2º Informática';
														else if($data->idTURMA == 13)
															echo '3º Informática';
														else if($data->idTURMA == 21)
															echo '1º Mecatrônica';
														else if($data->idTURMA == 22)
															echo '2º Mecatrônica';
														else if($data->idTURMA == 23)
															echo '3º Mecatrônica';
														else if($data->idTURMA == 31)
															echo '1º Edificações';
														else if($data->idTURMA == 32)
															echo '2º Edificações';
														else if($data->idTURMA == 33)
															echo '3º Edificações';
												   	    echo br(). anchor(base_url('Coord/editarParametro/'. $data->idPARAMETRO_DE_RISCO), 'Editar', array("class"=>"btn btn-primary")) .br();
												}
												?>
						</div>
						<div class="col-lg-3 col-md-6">
							<?php
												echo '<h3>Subsequente</h3>' . br();
												$cont = 0;
												foreach($PARAMETROS as $data){
													echo br(). 'Nota: ' . $data->NOTA . br(). 
												   	     'Frequência: ' . $data->FREQUENCIA . br().
												   	     'Turma: ';
												   	    'Matérias: ' . $data->MATERIAS . br();
												   	     if($data->idTURMA == 41)
															 echo '1º Informática';
														else if($data->idTURMA == 42)
															echo '2º Informática';
														else if($data->idTURMA == 51)
															echo '1º Mecatrônica';
														else if($data->idTURMA == 52)
															echo '2º Mecatrônica';
														else if($data->idTURMA == 61)
															echo '1º Edificações';
														else if($data->idTURMA == 62)
															echo '2º Edificações';
												   	    echo br(). anchor(base_url('Coord/editarParametro/'. $data->idPARAMETRO_DE_RISCO), 'Editar', array("class"=>"btn btn-primary")) .br();
													$cont ++;
													if($cont == 3){
														echo br().br();
														$cont = 0;
													}
												}
												?>
											</div>
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
