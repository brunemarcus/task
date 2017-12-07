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
	<title>Nova Tarefa</title>
	<meta charset="UTF-8">
	<!-- Libs -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('libs/css/index.css'); ?>">
</head>
<body>
	<!-- Menu -->
	<ul>
		<li><a href="<?php echo base_url('home'); ?>">Home</a></li>
		<li><a class="active" href="<?php echo base_url('registro'); ?>">Nova Tarefa</a></li>
		<li><a href="<?php echo base_url('sair'); ?>">Sair</a></li>
	</ul>
	<!-- End Menu -->
	<h1 id="tit-task">Nova Tarefa</h1>
	<hr class="row"></hr>
	<section id="secRegistro">
		<!-- Form -->
		<?php echo form_open('do_upload', array('method' => 'POST', 'name' => 'registro', 'enctype' => 'multipart/form-data')); ?>
		<input type="text" name="nome" placeholder="Nome tarefa" required="" maxlength="50" >
		</br></br>
		<label>*Arquivos permitidos: PDF</label>
		</br></br>
		<input type="file" name="file" required="">
		</br></br>
		<textarea rows="8" cols="50" name="descricao" required="" maxlength="80">

		</textarea>
		</br></br>
		<button type="submit" id="btnSend">Cadastrar Tarefa</button>
	<?php echo form_close(); ?>
</section>
</body>
</html>