

<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
<div class="panel panel-default" style="display:inline-block;margin-left:90rem;margin-top:10rem;">
	<div class="panel-heading">
		<?php Messages::display() ?>
		<h3 class="panel-title">Register user</h3>
	</div>

	<div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" />
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" />
			</div>
			<div class="form-group">
				<label>Direccion</label>
				<input type="text" name="direccion" class="form-control" />
			</div>
			<div class="form-group">
				<label>password</label>
				<input type="password" name="password" class="form-control" />
			</div>

			<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
		</form>
	</div>
</div>