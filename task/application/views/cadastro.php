<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<!-- Libs -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('libs/css/index.css'); ?>">
</head>
<body>
	<!-- Menu -->
	<ul>
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li><a class="active" href="<?php echo base_url('usuario'); ?>">Registar</a></li>
	</ul>
	<!-- End Menu -->
	<!-- Form -->
	<section id="secTask">
	</br>
	<h1>Cadastro de Usuário</h1>
	<hr></hr>
	<?php echo form_open('send', array('method' => 'POST', 'name' => 'cadastroUser')); ?>
		</br></br>
		<input type="text" id="email" name="email" placeholder="Email" required="">
		</br></br>
		<input type="password" id="senha" name="senha" placeholder="Senha" required="">
		</br></br>
		<input type="password" id="conf_senha" name="conf_senha" placeholder="Confirmar Senha" required="">
		</br></br>
		<button type="submit" id="btnSend">Cadastrar</button>
	<?php echo form_close(); ?>
	</section>
</body>
</html>