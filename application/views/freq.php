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
                            <a href="{url}Estagiario/aluCad">Cadastrar Aluno<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url}Estagiario/aluCad">Cadastro único</a>
                                </li>
                                <li>
                                    <a href="{url}Estagiario/aluCadMassa">Cadastro em massa</a>
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
                      <h1 class="page-header">Cadastro de Frequência</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
                    <div class="col-lg-12 col-md-12" id="btn">
                                    <?php
                                        $i = 0;
                                        $data = array();
                                        foreach($TURMA as $band){
                                            $bool = true;
                                            foreach($data as $d){
                                                if($d == $band->SERIE.$band->idCURSO){
                                                    $bool = false;
                                                }
                                            }
                                            if($bool){
                                                echo anchor("Estagiario/freqInsert/".$band->idTURMA."/".$band->ANO, " Inserir ", 'id="btn" class="btn btn-primary"');
                                                if($band->SERIE == '1'){
                                                    echo " 1°";
                                                    $data[$i] = 1;
                                                }
                                                else if($band->SERIE == '2'){
                                                    echo " 2°";
                                                    $data[$i] = 2;
                                                }
                                                else{
                                                    echo " 3°";
                                                    $data[$i] = 3;
                                                }
                                                if($band->idCURSO == '1'){
                                                    echo " - Informática Integrado";
                                                    $data[$i] = $data[$i].'1';
                                                }
                                                else if($band->idCURSO == '2'){
                                                    echo " - Mecatrônica Integrado";
                                                    $data[$i] = $data[$i].'2';
                                                }
                                                else if($band->idCURSO == '3'){
                                                    echo " - Edificações Integrado";
                                                    $data[$i] = $data[$i].'3';
                                                }
                                                else if($band->idCURSO == '4'){
                                                    echo " - Informática Subsequente";
                                                    $data[$i] = $data[$i].'4';
                                                }
                                                else if($band->idCURSO == '5'){
                                                    echo " - Mecatrônica Subsequente";
                                                    $data[$i] = $data[$i].'5';
                                                }
                                                else{
                                                    echo " - Edificações Subsequente";
                                                    $data[$i] = $data[$i].'6';
                                                }
                                                echo " - " . $band->ANO . br();
                                                $data[$i] = $data[$i].$band->ANO;
                                                $i++;
                                            }
                                        }
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
-->
    <!-- Custom Theme JavaScript -->
    <script src="{url}assets/js/sb-admin-2.js"></script>

</body>

</html>
