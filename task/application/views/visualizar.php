<!DOCTYPE html>
<html>
<head>
	<title>Visualizar Task</title>
	<!-- Libs -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('libs/css/index.css'); ?>">
</head>
<body>
	<!-- Menu -->
	<ul>
		<li><a class="active" href="<?php echo base_url('home'); ?>">Home</a></li>
		<li><a href="<?php echo base_url('registro'); ?>">Nova Tarefa</a></li>
		<li><a href="<?php echo base_url('sair'); ?>">Sair</a></li>
	</ul>
	<!-- End Menu -->
	<!-- Form -->
	<section id="secTask">
		<?php foreach($dados as $tarefas) { ?>
		<h1 id="tit-task"><?php echo $tarefas['nome']; ?></h1>
		<hr class="row"></hr>

		<h4 id="tit-task">Descrição Tarefa: </h>
		</br></br>
		<?php echo $tarefas['descricao']; ?>
		</br></br>
		<a href="<?php echo base_url('download'); ?>?up=<?php echo $tarefas['upload']; ?>" class="btn">Download Anexo</a>
		<?php } ?>
	</section>
</body>
</html>