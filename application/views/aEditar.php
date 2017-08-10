		<div id="Main">
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Editar Usuário</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
  		        	<div class="col-lg-12 col-md-12" id="btn">
									<?php
										foreach($TURMA as $band){
											echo anchor("Estagiario/aEdit/".$band->idTURMA, " Editar ", 'id="btn" class="btn btn-primary"');
											if($band->SERIE == '1')
												echo " 1°";
											else if($band->SERIE == '2')
												echo " 2°";
											else
												echo " 3°";
											if($band->idCURSO == '1')
												echo " - Informática Integrado";
											else if($band->idCURSO == '2')
												echo " - Mecatrônica Integrado";
											else if($band->idCURSO == '3')
												echo " - Edificações Integrado";
											else if($band->idCURSO == '4')
												echo " - Informática Subsequente";
											else if($band->idCURSO == '5')
												echo " - Mecatrônica Subsequente";
											else
												echo " - Edificações Subsequente";
											echo " - " . $band->ANO . br();
											
										}
									?>
					</div>
				</div>
			</div>
		</div>
