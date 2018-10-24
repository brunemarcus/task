<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: index.php');
}
require_once 'template.php';
require_once 'includes/internal-menu.php';
?>

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-md-12">
			<h1>Recently Added Clients</h1>
			<div class="alert alert-warning" role="alert">
				Welcome to <b>Crud System</b> <?php echo $_SESSION['username']; ?> our system offers an intuitive way to manage customers with negative balance and the respective company.
			</div>
			<div class="content-clients"></div>
		</div>
	</div>
</div