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
                            <a href="../Listar/listar/0/0/0">Lista de Alunos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a href="../Listar/listar/0/0/1">Integrado<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<?php
												if($Tipo[0] == '3'){	
													echo '<a href="../Listar/listar/0/3/1">Edificações <span class="fa arrow"></span></a>';
													echo '<ul class="nav nav-fourth-level">';
														echo '<li>';
															echo '<a href="../Listar/listar/31/0/0">1° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="../Listar/listar/32/0/0">2° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="../Listar/listar/33/0/0">3° Ano</a>';
														echo '</li>';
													echo '</ul>';
												}
											?>
										</li>
										<li>
											<?php
												if($Tipo[0] == '2'){	
													echo '<a href="../Listar/listar/0/2/1">Mecatrônica <span class="fa arrow"></span></a>';
													echo '<ul class="nav nav-fourth-level">';
														echo '<li>';
															echo '<a href="../Listar/listar/21/0/0">1° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="../Listar/listar/22/0/0">2° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="../Listar/listar/23/0/0">3° Ano</a>';
														echo '</li>';
													echo '</ul>';
												}
											?>
										</li>
										<li>
											<?php
												if($Tipo[0] == '1'){	
													echo '<a href="../Listar/listar/0/1/1">Informática <span class="fa arrow"></span></a>';
													echo '<ul class="nav nav-fourth-level">';
														echo '<li>';
															echo '<a href="../Listar/listar/11/0/0">1° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="../Listar/listar/12/0/0">2° Ano</a>';
														echo '</li>';
														echo '<li>';
															echo '<a href="../Listar/listar/13/0/0">3° Ano</a>';
														echo '</li>';
													echo '</ul>';
												}
											?>		
										</li>
									</ul>
                                </li>
                                <li>
									<?php if($Tipo[0]!=6){
										echo '<a href="../Listar/listar/0/0/2">Subsequente<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
												<li>';
														if($Tipo[0] == '3'){	
															echo '<a href="../Listar/listar/0/6/2">Edificações <span class="fa arrow"></span></a>';
															echo '<ul class="nav nav-fourth-level">';
																echo '<li>';
																	echo '<a href="../Listar/listar/61/0/0">1° Ano</a>';
																echo '</li>';
																echo '<li>';
																	echo '<a href="../Listar/listar/62/0/0">2° Ano</a>';
																echo '</li>';
															echo '</ul>';
														}
												echo '</li>';
												echo '<li>';
														if($Tipo[0] == '2'){	
															echo '<a href="../Listar/listar/0/5/2">Mecatrônica <span class="fa arrow"></span></a>';
															echo '<ul class="nav nav-fourth-level">';
																echo '<li>';
																	echo '<a href="../Listar/listar/51/0/0">1° Ano</a>';
																echo '</li>';
																echo '<li>';
																	echo '<a href="../Listar/listar/52/0/0">2° Ano</a>';
																echo '</li>';
															echo '</ul>';
														}
												echo '</li>
												<li>';
														if($Tipo[0] == '1'){	
															echo '<a href="../Listar/listar/0/4/2">Informática <span class="fa arrow"></span></a>';
															echo '<ul class="nav nav-fourth-level">';
																echo '<li>';
																	echo '<a href="../Listar/listar/41/0/0">1° Ano</a>';
																echo '</li>';
																echo '<li>';
																	echo '<a href="../Listar/listar/42/0/0">2° Ano</a>';
																echo '</li>';
															echo '</ul>';
														}
												echo '</li>
									</ul>';
									}
								?>
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
                            <a href= "{url}Coord/parametros">Parâmetros de Risco<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<?php echo anchor(base_url('coord/criarParametro/'.$Tipo[0]), 'Criar');?>
								</li>
								<li>
									<a href='{url}coord/parametros'>Editar</a>
								</li>
									</ul>
								</li>
							</ul>
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
                      <h1 class="page-header">Editar Parâmetro</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
					<div class="col-lg-6">
						<?php
													$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
													echo  form_open('coord/editaParametro', $atributos).
																form_hidden("txt_id", $PARAMETRO[0]->idPARAMETRO_DE_RISCO).
																form_label("Nota: ", "txt_nota").br().
																form_input('txt_nota', $PARAMETRO[0]->NOTA).br().
																form_label("Frequência: ", "txt_freq").br().
																form_input('txt_freq', $PARAMETRO[0]->FREQUENCIA).br().
																form_label("Matérias: ", "txt_materias").br().
																form_input('txt_materias', $PARAMETRO[0]->MATERIAS).br().br();
																if($Tipo != 6){
																	$parametros = $PARAMETRO[0]->idTURMA/10;
																	if(($parametros > 1) and ($parametros < 4)){
																		echo form_radio("txt_mod", '1', true).
																		form_label("Integrado", "txt_tipo").br();
																	}
																	else{
																		echo form_radio("txt_mod", '2', true).
																		form_label("Subsequente", "txt_tipo").br();
																	}
																}
																else{
																	echo form_hidden("txt_mod", '1');
																}
																echo form_submit("btn_cadastrar", "Editar", $btn).
																form_close();
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

    <!-- Morris Charts JavaScript
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>

