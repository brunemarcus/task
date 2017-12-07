<?php 
	if($this->session->userdata('email') == false)
	{
		$url = base_url();
		header("Location: $url");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task's</title>
	<meta charset="UTF-8">
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
	<section id="secTask">
		<h1 id="tit-task">tarefas recentes</h1>
		<hr class="row"></hr>
		<!-- Tabela -->
		<div align="center">
		<?php
			if(isset($_GET['cadastrado']) && $_GET['cadastrado'] == 'sucesso')
			{
				echo "<h4>Tarefa Cadastrada com sucesso.</h4>";
			}
		?>
		<table>
			<?php foreach($index as $query) { ?>
			<?php 
				$id_t = $query['id'];
				$nome = $query['nome'];
			?>
			<tr>
				<th>Cod.</th>
				<th>Nome</th>
				<th>Ação</th>
			</tr>
			<tr>
				<td><?php echo $id_t; ?></td>
				<td><?php echo $nome; ?></td>
				<td>
					<?php $protect_id = urlencode($id_t); ?>
					<a href="<?php echo base_url('view'); ?>?id=<?php echo $protect_id; ?>" class="btn">Visualizar</a>
					<a href="<?php echo base_url('drop'); ?>?id=<?php echo $protect_id; ?>" class="btn">Deletar</a>
					<a href="<?php echo base_url('editar'); ?>?id=<?php echo $protect_id; ?>" class="btn">Editar</a>
				</td>
			</tr>
		<?php } ?>
		</table>
		</div>
	</section>
</body>
</html>