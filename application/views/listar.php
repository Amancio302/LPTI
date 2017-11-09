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
				echo "<tr><td>". $band->SITUACAO ."</td>".
				"<td>".anchor(base_url('listar/alunoChamada/'. $band->idALUNO), $band->idALUNO). "</td>".
				"<td>".anchor(base_url('listar/alunoChamada/'. $band->idALUNO),$band->NOME_ALUNO). "</td>".
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
	<script src="{url}assets/js/jquery.min.js"></script>
	<script src="{url}assets/js/bootstrap.min.js"></script>
    <script src="{url}assets/js/metisMenu.min.js"></script>
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>
    <script src="{url}assets/js/sb-admin-2.js"></script>
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
    <script>{modal}</script>
	</body>
</html>
