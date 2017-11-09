          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Editar Usuário</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-3 col-md-6">
												<?php
												$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
												$btn = array('name'=>'btm_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
												echo form_open('Cadastro/edit', $atributos).
													 form_hidden('id', $USUARIO[0]->idUSUARIO).
													 form_label("Login: ", "txt_login").br().
													 form_input('txt_login', $USUARIO[0]->LOGIN).br().
													 form_label("Senha: ", "txt_senha").br().
													 form_password('txt_senha').br().
													 form_label("Confirmar senha: ", "txt_confirmarsenha").br().
													 form_password('txt_confirmarsenha').br().
													 form_label("Tipo: ", "txt_tipo").br().
													 form_input('txt_tipo', $USUARIO[0]->TIPO <script type="text/javascript">
      $(document).ready(function(e){
        $("#btn a").click(function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          $("#Main").load(href + " #Main");
        });
      });
    </script>).br().br().
													 form_submit("btn_cadastrar", "Salvar Alterações", $btn).br().
													 form_close().br().
											     anchor('../Login/loginAsAdm', "Cancelar", array('class'=>"btn btn-danger", 'id'=>"botao"));
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
