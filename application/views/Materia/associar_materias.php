<!DOCTYPE html>
<html lang="en">

<head>

    <title>Editor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="elyas" >

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
                <a class="navbar-brand" href="../../Login/loginAsAdm">Conselho de Classe</a>
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
                            <a href="../">Início</a>
                        </li>
                        <li>
                            <a href="#">Lista de Alunos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Turmas <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Edificações <span class="fa arrow"></span></a>

                                        <ul class="nav nav-fourth-level">
                                        <li>
                                            <a href="#">1° Ano</a>
                                        </li>
                                        <li>
                                            <a href="#">2° Ano</a>
                                        </li>
                                        <li>
                                            <a href="#">3° Ano</a>
                                        </li>
                                        </ul>
                                        </li>
                                        <li>
                                            <a href="#">Informática <span class="fa arrow"></span></a>

                                        <ul class="nav nav-fourth-level">
                                        <li>
                                            <a href="#">1° Ano</a>
                                        </li>
                                        <li>
                                            <a href="#">2° Ano</a>
                                        </li>
                                        <li>
                                            <a href="#">3° Ano</a>
                                        </li>
                                        </ul>
                                        </li>

                                        <li>
                                            <a href="#">Mecatrônica <span class="fa arrow"></span></a>

                                        <ul class="nav nav-fourth-level">
                                        <li>
                                            <a href="#">1° Ano</a>
                                        </li>
                                        <li>
                                            <a href="#">2° Ano</a>
                                        </li>
                                        <li>
                                            <a href="#">3° Ano</a>
                                        </li>
                                        </ul>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="buttons.html">Todos Alunos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="../Cadastro/cadastrar">Cadastrar usuários</a>
                        </li>
                        <li>
                            <a href="../Cadastro/editar">Editar usuários</a>
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
                      <h1 class="page-header">Associação Disciplina-Classe</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-8 col-md-8">
												<?php
												
												echo "Disciplina: ".$MATERIA[0]->NOME.br();
												
												$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
												$btn = array('name'=>'btm_cadastrar', 'id'=>'botao1', 'class'=>'btn btn-primary');
												echo form_open('Materia/associar', $atributos).
													 form_hidden('idMATERIA', $MATERIA[0]->idMATERIA).
													 form_label("Ano: ", "txt_ano").
													 form_input('txt_ano').br().
													 form_label("1° Edif Int", "txt_1i") .
													 form_checkbox("turma[]", "1", FALSE) .
													 form_label("1° Info Int", "txt_1i") .
													 form_checkbox("turma[]", "6", FALSE) .
													 form_label("1° Meca Int", "txt_1i") .
													 form_checkbox("turma[]", "11", FALSE) .
													 form_label("1° Edif Sub", "txt_1i") .
													 form_checkbox("turma[]", "4", FALSE) .
													 form_label("1° Info Sub", "txt_1i") .
													 form_checkbox("turma[]", "9", FALSE) .
													 form_label("1° Meca Sub", "txt_1i") .
													 form_checkbox("turma[]", "14", FALSE) . br() .
													 form_label("2° Edif Int", "txt_1i") .
													 form_checkbox("turma[]", "2", FALSE) .
													 form_label("2° Info Int", "txt_1i") .
													 form_checkbox("turma[]", "7", FALSE) .
													 form_label("2° Meca Int", "txt_1i") .
													 form_checkbox("turma[]", "12", FALSE) . 
													 form_label("2° Edif Sub", "txt_1i") .
													 form_checkbox("turma[]", "5", FALSE) . 
													 form_label("2° Info Sub", "txt_1i") .
													 form_checkbox("turma[]", "10", FALSE) .
													 form_label("2° Meca Sub", "txt_1i") .
													 form_checkbox("turma[]", "15", FALSE) . br() .
													 form_label("3° Edif Int", "txt_1i") .
													 form_checkbox("turma[]", "3", FALSE) . 
													 form_label("3° Info Int", "txt_1i") .
													 form_checkbox("turma[]", "8", FALSE) . 
													 form_label("3° Meca Int", "txt_1i") .
													 form_checkbox("turma[]", "13", FALSE) . br().
													 
													 
													 form_submit("btn_cadastrar", " Salvar ", $btn).
													 form_close().
											     anchor('../Materia', "Cancelar", array('class'=>"btn btn-danger", 'id'=>"botao"));
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

    <!-- Morris Charts JavaScript -->
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>


