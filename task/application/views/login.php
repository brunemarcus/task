<!DOCTYPE html>
<html>
<head>
	<title>Voxus</title>
	<!-- Libs -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('libs/css/index.css'); ?>">
</head>
<body>
	<!-- Menu -->
	<ul>
		<li><a class="active" href="<?php echo base_url(); ?>">Home</a></li>
		<li><a href="<?php echo base_url('usuario'); ?>">Registar</a></li>
	</ul>
	<!-- End Menu -->
	<!-- Form -->
	<div align="center">
		<h1>Voxus Login</h1>
		<?php echo form_open('login', array('method' => 'POST', 'name' => 'login')); ?>
			<input type="text" name="email" id="email" placeholder="Email" required="">
			<input type="password" name="senha" id="senha" placeholder="Senha" required="">
			<button type="submit" id="btnLogin">Entrar</button>
			</br></br>
		<?php echo form_close();?>
	</div>
</body>
</html>