<?php 
	session_start(); 
	require_once 'template.php'; 
?>

<div class="menu"></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="login">
				<form method="POST" action="src/action.php">
					<div align="center">
						<h1>Login</h1>
					</div>
					<?php if(isset($_SESSION['empty-input'])): ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $_SESSION['empty-input'];session_destroy(); ?>
						</div>
					<?php elseif(isset($_SESSION['password-does-match'])): ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $_SESSION['password-does-match'];session_destroy(); ?>
						</div>
					<?php elseif(isset($_SESSION['user-not-exist'])):  ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $_SESSION['user-not-exist'];session_destroy(); ?>
						</div>
					<?php endif; ?>
					<input type="hidden" name="_login">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" placeholder="Enter username...">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter password...">
					</div>
					<div class="form-group" align="center">
						<a href="register.php">I do not have an account</a></br></br>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div