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
											echo anchor("Estagiario/aExcluir/".$band->idALUNO, " Excluir ", 'id="btn" class="btn btn-danger"') . 
											"Matrícula: " . $band->idALUNO . " - Nome: " . $band->NOME .br();
										}
										$atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
										$btn = array('name'=>'btm_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
										echo  form_open('Estagiario/aluno', $atributos).
										form_hidden('Ano', $band[0]->ANO).
										form_hidden('idTurma', $band[0]->idTURMA).
										form_label("Matricula: ", "txt_matricula").br().
										form_input('txt_matricula').br().
										form_label("Nome: ", "txt_nome").br().
										form_input('txt_nome').br().
										form_submit("btn_cadastrar", "Cadastrar", $btn).
										form_close();
									?>
					</div>
				</div>
			</div>
		</div>
