<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inicio</title>
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
    <link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>
    
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="{url}login/loginAsAdm">Conselho de Classe</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                 
                        <li><a href="{url}Login/efetuar_logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        <li><a href="{url}Login/alterarSenha"><i class="fa fa-sign-out fa-fw"></i> Alterar senha</a></li>
                    </ul>
                </li>
                <li> <?php echo $this->session->userdata('nome');?> </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" id="btn">
                    <ul class="nav" id="side-menu">
						<li>
                            <a href="{url}Login/telaInicial">Início</a>
                        </li>
                        <li>
                            <a href="{url}Listar/listar/0/0/0">Lista de Alunos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url}Listar/listar/0/0/1">Integrado<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                                    <a href="{url}Listar/listar/0/3/1">Edificações <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-fourth-level">
                                                        <li>
                                                            <a href="{url}Listar/listar/31/0/0">1° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/32/0/0">2° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/33/0/0">3° Ano</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{url}Listar/listar/0/1/1">Informática <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-fourth-level">
                                                        <li>
                                                            <a href="{url}Listar/listar/11/0/0">1° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/12/0/0">2° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/13/0/0">3° Ano</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{url}Listar/listar/0/2/1">Mecatrônica <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-fourth-level">
                                                        <li>
                                                            <a href="{url}Listar/listar/21/0/0">1° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/22/0/0">2° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/23/0/0">3° Ano</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{url}Listar/listar/0/0/2">Subsequente<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                                    <a href="{url}Listar/listar/0/6/2">Edificações <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-fourth-level">
                                                        <li>
                                                            <a href="{url}Listar/listar/61/0/0">1° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/62/0/0">2° Ano</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{url}Listar/listar/0/4/2">Informática <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-fourth-level">
                                                        <li>
                                                            <a href="{url}Listar/listar/41/0/0">1° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/42/0/0">2° Ano</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{url}Listar/listar/0/5/2">Mecatrônica <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-fourth-level">
                                                        <li>
                                                            <a href="{url}Listar/listar/51/0/0">1° Ano</a>
                                                        </li>
                                                        <li>
                                                            <a href="{url}Listar/listar/52/0/0">2° Ano</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                    </ul>
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
                            <a href="{url}Permissao/v_tela_listagem">Ajustar permissões de usuário</a>
                        </li>
                                <li>
                            <a href="{url}Questionario/v_cadastro">Questionários<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url}Questionario/v_cadastro">Criar questionário</a>
                                </li>
                                <li>
                                    <a href="{url}Questionario/v_listar">Editar questionários</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                                <li>
                            <a href="{url}Materia/v_cadastrar_materias">Turmas e Disciplinas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url}Materia/v_cadastrar_materias">Cadastrar disciplinas </a>
                                </li>
                                <li>
                                    <a href="{url}Materia/v_listar_materias">Listar disciplinas</a>
                                </li>
                                <li>
                                    <a href="{url}Materia/v_associar_materias">Associar disciplinas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!--
                        <li>
                            <a href="{url}Cadastro/addCurso">Cadastrar Curso</a>
                        </li>
                        <li>
                            <a href="{url}Cadastro/editCurso">Editar Curso</a>
                        </li>
                        -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="Main">
