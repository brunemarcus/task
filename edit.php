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
			<h1>Edit client</h1>
			<?php if(isset($_GET['success'])): ?>
				<div class="alert alert-success" role="alert">
  					Customer edited successfully!!
				</div>
			<?php endif; ?>
			<?php 
				$customers = new Customers();
				$customers->edit($_GET['edit']);
			?>
			<script type="text/javascript">
				$("#customer-telephone").mask('(00) 0000-0000');
				$("#customer-phone").mask('(00) 00000-0000');
				$("#customer_user").validate({
					rules: {
						'customer-name': {
							required: true,
							minlength: 5
						},
						'customer-last-name': {
							required: true,
							minlength: 5
						}, 
						'customer-email': { 
							required: true,
							minlength: 5,
							email: true
						}, 
						'customer-telephone': { 
							required: true
						},
						'customer-country': {
							required: true
						},
						'company-name':{
							required: true,
							minlength: 5
						},
						'debts': {
							required: true
						}
					}
				})
			</script>
		</div>
	</div>
</div>