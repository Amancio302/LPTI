          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Cadastro de Disciplina</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-12 col-md-12">
							<?php
								$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
								$btn = array('name'=>'btm_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
								echo  form_open('materia/cadastro_materias', $atributos).
									form_label("Disciplina: ", "txt_materia").br().
									form_input('txt_materia').br().
									form_label("Horas-aula: ", "txt_qtd").br().
									form_input('txt_qtd').br().br().
									form_submit("btn_cadastrar", "Cadastrar", $btn).
									form_close();
							?>
											
  		                </div>
              </div>
            </div>
          </div>
         </div>


    <!-- jQuery -->
    <script src="{url}assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{url}assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{url}assets/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>

		<script>
			{modal}
		</script>

</body>

</html>

