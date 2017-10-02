<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inicio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alunos" >

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
                <a class="navbar-brand" href="{url}login/loginAsEst">Conselho de Classe</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{url}Login/efetuar_logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" id="btn">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{url}Login/telaInicial">Início</a>
                        </li>
                                <li>
                            <a href="../Estagiario/aluCad">Cadastrar Aluno<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Estagiario/aluCad">Cadastro único</a>
                                </li>
                                <li>
                                    <a href="../Estagiario/aluCadMassa">Cadastro em massa</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{url}Estagiario/aluEdit">Editar Turmas</a>
                        </li>
                        <li>
                            <a href="{url}Estagiario/notCad">Cadastrar Notas</a>
                        </li>
                        <li>
                            <a href="{url}Estagiario/notEdit">Editar Notas</a>
                        </li>
                        <li>
                            <a href="{url}Estagiario/freqCad">Cadastrar Frequência</a>
                        </li>
                        <li>
                            <a href="{url}Estagiario/freqEdit">Editar Frequência</a>
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
                      <h1 class="page-header">Edição de Nota</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
					<?php echo "<h5>" . $aluno[0]->NOME . "</h5>";
						echo "<h5>" . $turma . "</h5>";
						echo "<h5>" . $materia[0]->NOME . "</h5>";
						echo br();
						$atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
                        $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                        $cont = 0;
                        echo br();
						foreach($nota as $band)
							$cont++;
                        for($i=0; $i<$cont; $i++){
							echo form_open('Estagiario/alteraNotas').
                            form_hidden('txt_aluno', $aluno[0]->idALUNO).
                            form_hidden('txt_turma', $nota[$i]->TURMA_idTURMA).
                            form_hidden('txt_materia', $materia[0]->idMATERIA).
                            form_hidden('txt_ano', $materia[0]->idMATERIA).
                            form_hidden('txt_notaId', $nota[$i]->idNOTA).
                            form_label("Nota: ", "txt_nota").br().
                            form_input('txt_nota', $nota[$i]->NOTA).br().
							form_label("Bimestre: ", "txt_bimestre").br().
                            form_input(array('name'=>'txt_bim', 'type'=>'number', 'min'=>1, 'max'=>4, 'value'=>1), $nota[$i]->BIMESTRE).br().br().
                            form_submit("btn_cadastrar", "Alterar", $btn).
                            form_close();
						}
					?>
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
-->
    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>
	</div>
</body>
