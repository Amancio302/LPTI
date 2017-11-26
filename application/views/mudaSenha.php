		<div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Mudar a Senha</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <div class="row">
				  <div class="col-lg-3 col-md-6">
												<?php
												$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
												$btn = array('name'=>'btm_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
												echo form_open('Login/novaSenha', $atributos).
													 form_label("Senha atual: ", "txt_senha").br().
													 form_password('txt_senha').br().
													 form_label("Nova senha: ", "txt_novasenha").br().
													 form_password('txt_novasenha').br().
													 form_label("Confirmar nova senha: ", "txt_confirmarnovasenha").br().
													 form_password('txt_confirmarnovasenha').br().
													 form_submit("btn_cadastrar", "Salvar Alterações", $btn).br().
													 form_close().br();
											     echo anchor($url . 'Login/telaInicial', "Cancelar", array('class'=>"btn btn-danger", 'id'=>"botao"));
												?>
											</div>
			  </div>
		</div>
    <!-- jQuery -->
    <script src="{url}assets/js/jquery.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(e){
        $("#btn a").click(function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          $("#Main").load(href + " #Main");
        });
      });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{url}assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{url}assets/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>
