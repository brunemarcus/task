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
			<h1>Add customer</h1>
			<?php if(isset($_GET['create_customer'])): ?>
				<div class="alert alert-success" role="alert">
					Customer added successfully.
				</div>
			<?php endif; ?>
			<form method="POST" action="#" id="customer_user">
				<input type="hidden" name="_customers">
				<div class="form-group">
					<label><b class="required">*</b> Customer name</label>
					<input type="text" class="form-control" name="customer-name" id="customer-name" placeholder="Marcus">
				</div>
				<div class="form-group">
					<label><b class="required">*</b> Customer last name</label>
					<input type="text" class="form-control" name="customer-last-name" placeholder="Brune">
				</div>
				<div class="form-group">
					<label><b class="required">*</b> Customer Email</b></label>
					<input type="email" class="form-control" name="customer-email" placeholder="Email">
				</div>
				<div class="form-group">
					<label><b class="required">*</b> Telephone</b></label>
					<input type="text" class="form-control" name="customer-telephone" id="customer-telephone" placeholder="(11) 4203-8723">
				</div>
				<div class="form-group">
					<label>Cell phone</label>
					<input type="text" class="form-control" name="customer-phone" id="customer-phone">
				</div>
				<div class="form-group">
					<label><b class="required">*</b> Country</label>
					<input type="text" class="form-control" name="customer-country" placeholder="United States of America">
				</div>
				<h3>Debts Customer</h3>
				<div class="form-group">
					<label>Company Name</label>
					<input type="text" class="form-control" name="company-name" placeholder="Goldman Sachs, Morgan Stanley, Merrill Lynch Brasil">
				</div>
				<div class="form-group">
					<label><b class="required">*</b> Debts (enter the value of debts separated by commas, only whole numbers)</label>
					<input type="text" class="form-control" name="debts" placeholder="Ex. 150,2500,345.....">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
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