<!DOCTYPE html>
<html lang="en">

<head>

    <title>Alunos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="alunos" >

    <title>Início</title>
    <link href="{url}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{url}assets/css/metisMenu.min.css" rel="stylesheet">
    <link href="{url}assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="{url}assets/css/morris.css" rel="stylesheet">
    <link href="{url}assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="{url}assets/css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">
		<div id="Main">
			<div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Cadastrar Aluno</h1>
                  </div>
              </div>
              <div class="row">
				<div class="col-lg-12 col-md-12">
					<?php
						$atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
						$btn = array('name'=>'btm_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
						echo  form_open('Estagiario/aluno', $atributos).
						form_label("Matricula: ", "txt_matricula").br().
						form_input('txt_matricula').br().
						form_label("Nome: ", "txt_nome").br().
						form_input('txt_nome').br().
						form_label("1° Info Int", "txt_1i").
						form_radio("Turma", '11', false).
						form_label("1° Meca Int", "txt_1i").
						form_radio("Turma", '21', false).
						form_label("1° Edif Int", "txt_1i").
						form_radio("Turma", '31', false).
						form_label("1° Info Sub ", "txt_1i").
						form_radio("Turma", '41', false).
						form_label("1° Meca Sub ", "txt_1i").
						form_radio("Turma", '51', false).
						form_label("1° Edif Sub", "txt_1i").
						form_radio("Turma", '61', false).br().
						form_label("2° Info Int", "txt_1i").
						form_radio("Turma", '12', false).
						form_label("2° Meca Int", "txt_1i").
						form_radio("Turma", '22', false).
						form_label("2° Edif Int", "txt_1i").
						form_radio("Turma", '32', false).
						form_label("2° Info Sub ", "txt_1i").
						form_radio("Turma", '42', false).
						form_label("2° Meca Sub ", "txt_1i").
						form_radio("Turma", '52', false).
						form_label("2° Edif Sub", "txt_1i").
						form_radio("Turma", '62', false).br().
						form_label("3° Info Int", "txt_1i").
						form_radio("Turma", '13', false).
						form_label("3° Meca Int", "txt_1i").
						form_radio("Turma", '23', false).
						form_label("3° Edif Int", "txt_1i").
						form_radio("Turma", '33', false).br().
						form_submit("btn_cadastrar", "Cadastrar", $btn).
						form_close();
					?>
					<div class="modal fade" id="erro-modal">
						<div class="modal-dialog">
							<div class="erromodal-container">
								<p>Alguns dados estão inválidos</p>
							</div>
						</div>
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
