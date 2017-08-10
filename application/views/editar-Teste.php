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
										foreach($USUARIO as $band){
											if($band->TIPO == '4'){
												echo "Login: " . $band->LOGIN.br();
											echo "Tipo: " . "Estagiário" .br();
											echo anchor("Cadastro/editor/".$band->idUSUARIO, " Editar ", 'id="btn" class="btn btn-primary"').anchor("Cadastro/excluir/".$band->idUSUARIO, "Excluir ", 'class="btn btn-danger"').br();
											}
										}
									?>
              </div>
						</div>
          </div>
          </div>

		<div id="edita">
		
		</div>
    <!-- jQuery -->
    <script src="{url}assets/js/jquery.min.js"></script>
     <script type="text/javascript">
      $(document).ready(function(e){
        $("#btn").click(function(e){
          e.preventDefault();
          var href = $(this).attr('href');
          console.log(href);
//          $("#edita").load(href + " #principal");
			return false;
        });
      });
    </script>
