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
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Conselho de Classe</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../Login/efetuar_logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" id="btn">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Procure...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../Login/telaInicial">Início</a>
                        </li>
                        <li>
                            <a href="../Estagiario/aluCad">Cadastrar Alunos</a>
                        </li>
                        <li>
                            <a href="../Estagiario/notCad">Cadastrar Notas</a>
                        </li>
                        <li>
                            <a href="../Estagiario/freqCad">Cadastrar Frequência</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
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
						$ano = date("Y");
						echo  form_open('Estagiario/aluno', $atributos).
						form_label("Matricula: ", "txt_matricula").br().
						form_input('txt_matricula').br().
						form_label("Nome: ", "txt_nome").br().
						form_input('txt_nome').br().
						form_label("Ano: ", "txt_ano").br().
						form_input(array('name'=>'txt_ano', 'type'=>'number', 'min'=>$ano, 'max'=>1+$ano, 'value'=>$ano)).br().
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
