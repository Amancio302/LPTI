          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Ficha do Aluno</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
			<div class="row">
				<div class="col-lg-2" id="data2">
					 <img id="image" src="/LPTI/assets/img/not-found.png"> 
				</div>
				<div class="col-lg-8" id="linha">
					<div class="row">
						<div class="col-lg-5" id="data">
							<?php echo "Matrícula: ". $matricula?>
						</div>
						<div class="col-lg-7" id="data">
							<?php echo "Nome: ". $aluno_nome?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4" id="data">
							<?php echo "Série: ". $serie?>
						</div>
						<div class="col-lg-4" id="data">
							<?php echo "Curso: ". $curso_nome?>
						</div>
						<div class="col-lg-4" id="data">
							<?php echo "Modalidade: ". $modalidade?>
						</div>
					</div>
				</div>
			</div>
			<div class = "row">
				<div class="col-lg-12" id="data3">
					<table id='myTable'>
					  <thead>
						<tr>
							<th>Situação</th>
							<th>Materia</th>
							<th>Nota</th>
							<th>Frequencia</th>
							<th>Bimestre</th>
						</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Situação</th>
								<th>Materia</th>
								<th>Nota</th>
								<th>Frequencia</th>
								<th>Bimestre</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
								for($i = 1; $i <= 4; $i++){
									foreach($materias as $materia){
										echo '<tr>
										<td>'.'</td>
										<td>'.'</td>
										<td>'.'</td>
										<td>'.'</td>
										<td>'.'</td>
										</tr>';
									}
								}	
							?>
						</tbody>
					</table>
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
