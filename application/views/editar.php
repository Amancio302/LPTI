<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Editar Usuário</title>
        <link href="{url}assets/css/estilo.css" rel="stylesheet">
		<link href="{url}assets/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
			foreach($USUARIO as $band){
				echo "Login: " . $band->LOGIN.br().
					 "Tipo: " . $band->TIPO_USUARIO .br();
				$atributos = array('name'=>'formulario_editar', 'id'=>'formulario_editar');
				 echo form_open('cadastro/editor/'. $band->idUSUARIO, $atributos).
				 	  form_submit("btn_editor", "Editar", "login loginmodal-submit").
					  form_close();
				$atributos = array('name'=>'formulario_editar', 'id'=>'formulario_editar');
				echo form_open('cadastro/excluir/'. $band->idUSUARIO, $atributos).
				 	  form_submit("btn_excluir", "Excluir", "login loginmodal-submit").
					  form_close();	 
			}
			$atributos = array('name'=>'formulario_voltar', 'id'=>'formulario_voltar');
			echo form_open('cadastro/inicio', $atributos).
				 form_submit("btn_editar", "Voltar", "login loginmodal-submit").
				 form_close();
		?>
	</body>
</html>
