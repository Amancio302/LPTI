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
                            <a href="../Login/telaInicial">Início</a>
                        </li>
                        <li>
                            <a href="#">Lista de Alunos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a href="#">Integrado<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<?php
												if($Tipo[0] == '3'){	
													echo '<a href="#">Edificações <span class="fa arrow"></span></a>';
													echo '<ul class="nav nav-fourth-level">';
														echo '<li>';
															echo '<a href="#">1° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="#">2° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="#">3° Ano</a>';
														echo '</li>';
													echo '</ul>';
												}
											?>
										</li>
										<li>
											<?php
												if($Tipo[0] == '2'){	
													echo '<a href="#">Mecatrônica <span class="fa arrow"></span></a>';
													echo '<ul class="nav nav-fourth-level">';
														echo '<li>';
															echo '<a href="#">1° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="#">2° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="#">3° Ano</a>';
														echo '</li>';
													echo '</ul>';
												}
											?>
										</li>
										<li>
											<?php
												if($Tipo[0] == '1'){	
													echo '<a href="#">Informática <span class="fa arrow"></span></a>';
													echo '<ul class="nav nav-fourth-level">';
														echo '<li>';
															echo '<a href="#">1° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="#">2° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="#">3° Ano</a>';
														echo '</li>';
													echo '</ul>';
												}
											?>		
										</li>
									</ul>
                                </li>
                                <li>
									<a href="#">Subsequente<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
												<li>
													<?php
														if($Tipo[0] == '3'){	
															echo '<a href="#">Edificações <span class="fa arrow"></span></a>';
															echo '<ul class="nav nav-fourth-level">';
																echo '<li>';
																	echo '<a href="#">1° Ano</a>';
																echo '</li>';
																echo '<li>';
																	echo '<a href="#">2° Ano</a>';
																echo '</li>';
															echo '</ul>';
														}
													?>
												</li>
												<li>
													<?php
														if($Tipo[0] == '2'){	
															echo '<a href="#">Mecatrônica <span class="fa arrow"></span></a>';
															echo '<ul class="nav nav-fourth-level">';
																echo '<li>';
																	echo '<a href="#">1° Ano</a>';
																echo '</li>';
																echo '<li>';
																	echo '<a href="#">2° Ano</a>';
																echo '</li>';
															echo '</ul>';
														}
													?>
												</li>
												<li>
													<?php
														if($Tipo[0] == '1'){	
															echo '<a href="#">Informática <span class="fa arrow"></span></a>';
															echo '<ul class="nav nav-fourth-level">';
																echo '<li>';
																	echo '<a href="#">1° Ano</a>';
																echo '</li>';
																echo '<li>';
																	echo '<a href="#">2° Ano</a>';
																echo '</li>';
															echo '</ul>';
														}
													?>
												</li>
									</ul>
                                </li>
                                <li>
                                    <a href="buttons.html">Todos Alunos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{url}Cadastro/cadastrar">Cadastrar usuários</a>
                        </li>
                        <li>
                            <a href="{url}Cadastro/editar">Editar usuários</a>
                        </li>
                        <li>
                            <a href= "{url}Coord/parametros">Parâmetros de Risco</a>
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
                      <h1 class="page-header">Inicio</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                
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

    <!-- Morris Charts JavaScript
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>
