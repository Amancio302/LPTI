          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Criar Parâmetros de Risco</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-3 col-md-6">
												<?php
													$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
													echo  form_open('coord/insereParametro', $atributos).
																form_hidden("txt_tipo", $Tipo).
																form_label("Nota: ", "txt_nota").br().
																form_input('txt_nota').br().
																form_label("Frequência: ", "txt_freq").br().
																form_input('txt_freq').br().
																form_label("Matérias: ", "txt_materias").br().
																form_input('txt_materias').br().br();
																if($Tipo != 6){
																	echo form_radio("txt_mod", '1', false).
																form_label("Integrado", "txt_tipo").br().
																form_radio("txt_mod", '2', false).
																form_label("Subsequente", "txt_tipo").br();
																}
																else{
																	echo form_hidden("txt_mod", '1');
																}
																echo form_submit("btn_cadastrar", "Cadastrar", $btn).
																form_close();
												?>
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
