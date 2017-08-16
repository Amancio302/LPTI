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
										$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
													echo  form_open('cadastro/addCurso1', $atributos).
																form_label("Curso: ", "txt_curso").br().
																form_input('txt_curso').br().
																form_radio("Int", 'Integrado', false).
																form_label("Integrado", "txt_1i").br().
																form_radio("Sub", 'Subsequente', false).
																form_label("Subsequente", "txt_1i").br().
																form_submit("btn_cadastrar", "Cadastrar", $btn).
																form_close();
									?>
									<div class="modal fade" id="erro-modal">
										<div class="modal-dialog">
											<div class="erromodal-container">
												<h1>Alguns dados estão inválidos</h1>
											</div>
										</div>
									</div>
					</div>
				</div>
			</div>
		</div>
