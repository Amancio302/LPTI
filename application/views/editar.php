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
											if($band->TIPO != '0'){
												echo "Login: " . $band->LOGIN.br();
											echo "Tipo: ";
											if($band->TIPO == 4)
												echo "Estagiário" .br();
											else if($band->TIPO == 5)
												echo "Professor" .br();
											else
												echo "Coordenador" .br();
											echo anchor("Cadastro/editor/".$band->idUSUARIO, " Editar ", 'id="btn" class="btn btn-primary"').anchor("Cadastro/excluir/".$band->idUSUARIO, "Excluir ", 'class="btn btn-danger"').br();
											}
										}
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
