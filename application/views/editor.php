<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastrar Usuário</title>
        <link href="{url}assets/css/estilo.css" rel="stylesheet">
		<link href="{url}assets/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
		$atributos = array('name'=>'formulario_cadastro', 'id'=>'formulario_cadastro');
		echo form_open('cadastro/cadastro', $atributos).
			 form_hidden('id', $USUARIO[0]->idUSUARIO).
			 form_label("Login: ", "txt_login").br().
			 form_input('txt_login', $USUARIO[0]->LOGIN).br().
			 form_label("Senha: ", "txt_senha").br().
			 form_password('txt_senha').br().
			 form_label("Confirmar senha: ", "txt_confirmarsenha").br().
			 form_password('txt_confirmarsenha').br().
			 form_label("Tipo: ", "txt_tipo").br().
			 form_input('txt_tipo', $USUARIO[0]->TIPO_USUARIO).br().
			 form_submit("btn_cadastrar", "Cadastrar", "login loginmodal-submit").
			 form_close();
		$atributos = array('name'=>'formulario_voltar', 'id'=>'formulario_voltar');
		echo form_open('cadastro/editar', $atributos).
			 form_submit("btn_editar", "Voltar", "login loginmodal-submit").
			 form_close();
		?>
	</body>
</html>
