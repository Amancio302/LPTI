
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Inicio</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              <script>
				  {script1}
			  </script>
              <div class="row">
					<div id="Geral" style="width: 100%; height: 300px; display: inline-block;"></div>
              </div>
              <div class="row">
				  <?php $atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
						$btn = array('name'=>'btm_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
						echo form_open('Grafico/mostrar', $atributos).
						form_label("Selecionar gráficos a aparecer", "txt_graf").br();
				  ?>
				  <div class="col-lg-2">
					  <?php echo form_label("1º Info Int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '11', false).br().
						form_label("2º Info int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '12', false).br().
						form_label("3º Info int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '13', false).br();?>
				  </div>
				  <div class="col-lg-2">
					  <?php echo form_label("1º Meca int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '21', false).br().
						form_label("2º Meca int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '22', false).br().
						form_label("3º Meca int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '23', false).br();?>
				  </div>
				  <div class="col-lg-2">
					  <?php echo form_label("1º Edif int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '31', false).br().
						form_label("2º Edif int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '32', false).br().
						form_label("3º Edif int: ", "txt_graf").
						form_checkbox("txt_grafs[]", '33', false).br();?>
				  </div>
				  <div class="col-lg-2">
					  <?php echo form_label("1º Info sub: ", "txt_graf").
						form_checkbox("txt_grafs[]", '41', false).br().
						form_label("2º Info sub: ", "txt_graf").
						form_checkbox("txt_grafs[]", '42', false);?>
				  </div>
				  <div class="col-lg-2">
					  <?php echo form_label("1º Meca sub: ", "txt_graf").
						form_checkbox("txt_grafs[]", '51', false).br().
						form_label("2º Meca sub: ", "txt_graf").
						form_checkbox("txt_grafs[]", '52', false);?>
				  </div>
				  <div class="col-lg-2">
					  <?php echo form_label("1º Edif sub: ", "txt_graf").
						form_checkbox("txt_grafs[]", '61', false).br().
						form_label("2º Edif sub: ", "txt_graf").
						form_checkbox("txt_grafs[]", '62', false);?>
				  </div>
				</div>
				<?php echo form_submit("btn_busca", "Buscar", $btn).br().
				form_close();
				?>
					<div class="row">
						<div id="1InfoInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="2InfoInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="3InfoInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="1MecaInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="2MecaInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="3MecaInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="1EdifInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="2EdifInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="3EdifInt" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="1InfoSub" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="2InfoSub" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="1MecaSub" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="2MecaSub" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="1EdifSub" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
				  <div class="row">
						<div id="2EdifSub" style="width: 100%;  height: 300px; display: inline-block;"></div>
				  </div>
			</div>
			  
        </div>
      </div>


    <!-- jQuery -->
    <script src="{url}assets/js/jquery.min.js"></script>

    <script src="{url}assets/DataTables/media/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
      $(document).ready(function(e){
        $("#btn a").click(function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          $("#Main").load(href + " #Main", function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#myTable').DataTable({
                "bRetrieve": true,
                "bPaginate": true,
                "bJQueryUI": false,
                "sPaginationType": "full_numbers",
                "oLanguage": {
                    "sUrl": "{url}assets/language/ptbr.txt"
                }
            });
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
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

    <script>
        {modal}
    </script>
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>
