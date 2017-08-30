		<div id="Main">
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Cadastro de Notas</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
  		        	<div class="col-lg-12 col-md-12" id="btn">
									<?php
										$i = 0;
										$data = array();
										foreach($TURMA as $band){
											$bool = true;
											foreach($data as $d){
												if($d == $band->SERIE.$band->idCURSO){
													$bool = false;
												}
											}
											if($bool){
												echo anchor("Estagiario/notEditar/".$band->idTURMA."/".$band->ANO, " Cadastrar ", 'id="btn" class="btn btn-primary"');
												if($band->SERIE == '1'){
													echo " 1°";
													$data[$i] = 1;
												}
												else if($band->SERIE == '2'){
													echo " 2°";
													$data[$i] = 2;
												}
												else{
													echo " 3°";
													$data[$i] = 3;
												}
												if($band->idCURSO == '1'){
													echo " - Informática Integrado";
													$data[$i] = $data[$i].'1';
												}
												else if($band->idCURSO == '2'){
													echo " - Mecatrônica Integrado";
													$data[$i] = $data[$i].'2';
												}
												else if($band->idCURSO == '3'){
													echo " - Edificações Integrado";
													$data[$i] = $data[$i].'3';
												}
												else if($band->idCURSO == '4'){
													echo " - Informática Subsequente";
													$data[$i] = $data[$i].'4';
												}
												else if($band->idCURSO == '5'){
													echo " - Mecatrônica Subsequente";
													$data[$i] = $data[$i].'5';
												}
												else{
													echo " - Edificações Subsequente";
													$data[$i] = $data[$i].'6';
												}
												echo " - " . $band->ANO . br();
												$data[$i] = $data[$i].$band->ANO;
												$i++;
											}
										}
									?>
					</div>
				</div>
			</div>
		</div>
