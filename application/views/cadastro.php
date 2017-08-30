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
                            <a href="../Listar/listar/0/0">Lista de Alunos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a href="#">Integrado<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Turmas <span class="fa arrow"></span></a>
											<ul class="nav nav-fourth-level">
												<li>
													<a href="#">Edificações <span class="fa arrow"></span></a>
													<ul class="nav nav-fifth-level">
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
													<ul class="nav nav-fifth-level">
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
													<ul class="nav nav-fifth-level">
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
										</li>
									</ul>
                                </li>
                                <li>
									<a href="#">Subsequente<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Turmas <span class="fa arrow"></span></a>
											<ul class="nav nav-fourth-level">
												<li>
													<a href="#">Edificações <span class="fa arrow"></span></a>
													<ul class="nav nav-fifth-level">
														<li>
															<a href="#">1° Ano</a>
														</li>
														<li>
															<a href="#">2° Ano</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="#">Informática <span class="fa arrow"></span></a>
													<ul class="nav nav-fifth-level">
														<li>
															<a href="#">1° Ano</a>
														</li>
														<li>
															<a href="#">2° Ano</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="#">Mecatrônica <span class="fa arrow"></span></a>
													<ul class="nav nav-fifth-level">
														<li>
															<a href="#">1° Ano</a>
														</li>
														<li>
															<a href="#">2° Ano</a>
														</li>
													</ul>
												</li>
											</ul>
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
                            <a href="../Cadastro/cadastrar">Cadastrar usuários</a>
                        </li>
                        <li>
                            <a href="../Cadastro/editar">Editar usuários</a>
                        </li>
                        <!--
                        <li>
                            <a href="../Cadastro/addCurso">Cadastrar Curso</a>
                        </li>
                        <li>
                            <a href="../Cadastro/editCurso">Editar Curso</a>
                        </li>
                        -->
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
                      <h1 class="page-header">Cadastrar Usuário</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-12 col-md-12" id="btn">
												<?php
													//$d1 = $this->db->get('CURSO');
													$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
													echo  form_open('cadastro/cadastro', $atributos).
																form_label("Login: ", "txt_login").br().
																form_input('txt_login').br().
																form_label("Senha: ", "txt_senha").br().
																form_password('txt_senha').br().
																form_label("Confirmar senha: ", "txt_confirmarsenha").br().
																form_password('txt_confirmarsenha').br().
																form_radio("txt_tipo", '0', false).
																form_label("Administrador", "txt_tipo").br().
																form_radio("txt_tipo", '4', false).
																form_label("Estagiário", "txt_tipo").br().
																form_radio("txt_tipo", '5', false).
																form_label("Professor", "txt_tipo").br().
																form_radio("txt_tipo", '1', false).
																form_label("Coordenador Informática", "txt_tipo").br().
																form_radio("txt_tipo", '2', false).
																form_label("Coordenador Mecatrônica", "txt_tipo").br().
																form_radio("txt_tipo", '3', false).
																form_label("Coordenador Edficações", "txt_tipo").br();
																
																/*$data = array();
																foreach($curso as $c){
																	$bool = true;
																	foreach($c as $x){
																		foreach($data as $d){
																			if($d == $x->NOME)
																				$bool = false;
																		}
																	}
																	if($bool){
																		foreach($d1 as $x){
																			if($c->NOME == $x->NOME){
																				echo form_label("Coordenador ".$x->NOME, "txt_tipo").
																				 form_radio("txt_tipo", $x->idCURSO, false);
																			}
																		}
																	}
																}
																*/
															echo form_submit("btn_cadastrar", "Cadastrar", $btn).
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
    
    <script src="{url}assets/DataTables/media/js/jquery.dataTables.min.js"></script>
    
    
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

    <!-- Bootstrap Core JavaScript -->
    <script src="{url}assets/js/bootstrap.min.js"></script>
    

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{url}assets/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript
    <script src="{url}assets/js/raphael.min.js"></script>
    <script src="{url}assets/js/morris.min.js"></script>
    <script src="{url}assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    
    <script>
		{modal}
    </script>
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>

