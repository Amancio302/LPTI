<div id="Main">
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Listar Alunos</h1>
            </div>
        </div>
    <div class="row" id="principal">
		<div class="col-lg-12 col-md-12" id="btn">
			<div>
			<?php
				echo br()."<table id='myTable'>".
				"<thead><tr>".
				"<th>Situação</th>".
				"<th>Matricula</th>".
				"<th>Nome</th>".
				"<th>Serie</th>".
				"<th>Curso</th>".
				"<th>Modalidade</th>".
				"<th>Ano</th>".
				"</tr></thead><tbody>";
				foreach($TURMA_has_ALUNO as $band){
				echo "<tr><td></td>".
				"<td>".$band->idALUNO. "</td>".
				"<td>".$band->NOME_ALUNO. "</td>".
				"<td>".$band->SERIE. "</td>".
				"<td>".$band->NOME_CURSO. "</td>".
				"<td>".$band->MODALIDADE. "</td>".
				"<td>".$band->ANO. "</td>".
				"</tr>";
				}
				echo "</tbody></table>";
			?>
			</div>
		</div>
	</div>
</div>
