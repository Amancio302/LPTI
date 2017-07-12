<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inicio</title>
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

            <div class="navbar-default sidebar" role="navigation" id="teste">
                <div class="sidebar-nav navbar-collapse">
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
                            <a href="index.html">Início</a>
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
                            <a href="#">Inserir Alunos</a>
                        </li>
                        <li>
                            <a href="#">Notas e Faltas</a>
                        </li>
                        <li>
                            <a href="#">Editar Matérias</a>
                        </li>
                        <li>
                            <a href="../Cadastro/cadastrar">Cadastrar usuários</a>
                        </li>
                        <li>
                            <a href="#">Editar usuários</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Cadastrar Usuário</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-12 col-md-12">
												<?php
													$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btm_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
													echo  form_open('cadastro/cadastro', $atributos).
																form_label("Login: ", "txt_login").br().
																form_input('txt_login').br().
																form_label("Senha: ", "txt_senha").br().
																form_password('txt_senha').br().
																form_label("Confirmar senha: ", "txt_confirmarsenha").br().
																form_password('txt_confirmarsenha').br().
																form_label("Tipo: ", "txt_tipo").br().
																form_input('txt_tipo').br().
																form_submit("btn_cadastrar", "Cadastrar", $btn).
																form_close();
										 		?>
												<div class="modal fade" id="erro-modal">
													<div class="modal-dialog">
														<div class="erromodal-container">
															<p>Alguns dados estão inválidos</p>
															<li>
			                            <a href="../Login/loginAsAdm" class="btn btn-lg btn-primary">Voltar</a>
			                        </li>
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
