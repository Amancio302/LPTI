          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Cadastrar Usuário</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-12 col-md-12">
												<?php
													//$d1 = $this->db->get('CURSO');
													$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btm_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
													echo  form_open('cadastro/cadastroCoord', $atributos).
																form_label("Login: ", "txt_login").br().
																form_input('txt_login').br().
																form_label("Senha: ", "txt_senha").br().
																form_password('txt_senha').br().
																form_label("Confirmar senha: ", "txt_confirmarsenha").br().
																form_password('txt_confirmarsenha').br().
																form_radio("txt_tipo", '4', false).
																form_label("Estagiário", "txt_tipo").br().
																form_radio("txt_tipo", '5', false).
																form_label("Professor", "txt_tipo").br().
																form_submit("btn_cadastrar", "Cadastrar", $btn).
																form_close();
										 		?>
												<div class="modal fade" id="erro-modal">
													<div class="modal-dialog">
														<div class="erromodal-container">
															<p>Alguns dados estão inválidos</p>
															<li>
																<a href="../Login/loginAsAdm" class="btn btn-lg btn-primary">Voltar</a>
															</li>
														</div>
													</div>
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
