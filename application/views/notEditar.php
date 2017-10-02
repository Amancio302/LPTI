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
                            <a href="{url}Login/telaInicial">Início</a>
                        </li>
                        <li>
                            <a href="{url}Estagiario/aluCad">Cadastrar Alunos</a>
                        </li>
                        <li>
                            <a href="{url}Estagiario/aluEdit">Editar Alunos</a>
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
                            <a href="{url}xEstagiario/freqEdit">Editar Frequência</a>
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
                      <h1 class="page-header">Editar Turma</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row" id="principal">
                    <div class="col-lg-12 col-md-12" id="btn">
                                    <?php
                                        $atributos = array('name'=>'formulario_aluno', 'id'=>'formulario_aluno');
                                        $btn = array('name'=>'btn_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-lg btn-primary');
                                        echo br().form_open('Estagiario/notMatEditar/'. $id . '/' . $ano, $atributos).
                                        form_hidden('txt_ano', $ano).
                                        form_hidden('txt_id', $id);
                                        $i=0;
                                        foreach($materia as $data){
                                            echo form_radio('txt_materia', $data->idMATERIA, true). " " .
                                            form_label($data->NOME, "txt_materia");
                                            if($i==4){
                                                echo br();
                                                $i = 0;
                                            }
                                            else
                                                $i++;

                                        }
                                        echo br() . 
                                        form_radio('txt_bimestre', 1, true). " " .
										form_label("1º Bimestre", "txt_bimestre").
										form_radio('txt_bimestre', 2, true). " " .
										form_label("2º Bimestre", "txt_bimestre").
										form_radio('txt_bimestre', 3, true). " " .
										form_label("3º Bimestre", "txt_bimestre").
										form_radio('txt_bimestre', 4, true). " " .
										form_label("4º Bimestre", "txt_bimestre").
										form_radio('txt_bimestre', 12, true). " " .
										form_label("1º Semestre", "txt_bimestre").
										form_radio('txt_bimestre', 34, true). " " .
										form_label("2º Semestre", "txt_bimestre").
										form_radio('txt_bimestre', 1234, true). " " .
										form_label("Ano todo", "txt_bimestre").br().
                                        form_submit("btn_cadastrar", "Escolher Matéria", $btn).
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
    <script src="{url}assets/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script>$(document).ready(function(e){
        $('#myTable').DataTable();
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

    <script>
        {modal}
    </script>

</body>

</html>
