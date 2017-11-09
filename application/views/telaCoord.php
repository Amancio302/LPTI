
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Inicio</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              <div class="row">
  		                <div id="chartContainer" style="width: 100%; height: 300px;display: inline-block;"></div>
              </div>
              <div class="row">
				  <?php $atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
						$btn = array('name'=>'btm_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
						echo form_open('Grafico/mostrar', $atributos).
						form_label("Selecionar gráficos a aparecer", "txt_graf").br().
						form_label("1º Info Integrado: ", "txt_graf").
						form_checkbox("txt_grafs", '11', false).
						form_label("2º Info Integrado: ", "txt_graf").
						form_checkbox("txt_grafs", '12', false).
						form_label("3º Info Integrado: ", "txt_graf").
						form_checkbox("txt_grafs", '13', false).br().
						form_submit("btn_cadastrar", "Buscar", $btn).br().
						form_close();
				  ?>
			  </div>
            </div>
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
