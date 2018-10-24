<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: index.php');
}

require_once 'template.php';
require_once 'includes/internal-menu.php';
require_once 'src/customers.php';
?>

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-md-12">
			<h1>View customer information</h1>
			<div class="view-content-user">
				<?php 
					$customer = new Customers();
					$customer->view_customer($_GET['id']);
				?>
			</div>
		</div>
	</div>
</div>