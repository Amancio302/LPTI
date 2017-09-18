<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cadastro</title>
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
      <div id="Main">
          <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
					<h1 class="page-header">Cadastro de Questionário</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
  		                <div class="col-lg-12 col-md-12">
												<?php
													$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
													$btn = array('name'=>'btm_cadastrar', 'id'=>'btn_cadastro', 'class'=>'btn btn-primary');
													
													echo form_open('Questionario/criar', $atributos).
													form_label("Nome: ", "txt_nome").
													form_input('txt_nome').br().br().
													form_submit("btn_cadastrar", " Continuar ", $btn).
													form_close();
										 		?>
												
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

