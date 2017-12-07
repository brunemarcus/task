<?php $id_p = $_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Tarefas</title>
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
		<h1 id="tit-task">Editar Tarefa</h1>
		<hr class="row"></hr>
		<div style="margin-left: 2%;">
		<?php foreach($dados as $task) { ?>
			<?php echo form_open('edit', array('method' => 'POST', 'name' => 'editar')); ?>
				<input type="text" name="nome" value="<?php echo $task['nome']; ?>">
				</br></br>
				<textarea rows="10" cols="50" name="descricao">
					<?php echo $task['descricao']; ?>
				</textarea>
				<input type="hidden" name="id" value="<?php echo $id_p; ?>">
				</br></br>
				<button type="submit">Editar</button>
			<?php echo form_close(); ?>
		<?php } ?>
		</div>
	</section>
</body>
</html>