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
			<h1>Manage my clients</h1>
			<div class="alert alert-info" role="alert">
				Here you can manage the clients you have created, edit, delete and view.
			</div>
			<?php if(isset($_GET['success'])): ?>
				<div class="alert alert-success" role="alert">
  					Customer successfully removed!
				</div>
			<?php elseif(isset($_GET['error'])): ?>
				<div class="alert alert-danger" role="alert">
  					Error removing user.
				</div>
			<?php endif; ?>
			<div class="manage-my-clients">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Last Name</th>
							<th scope="col">Date Register</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$customers = new Customers();
							$customers->my_clients($_SESSION['id_user']);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>