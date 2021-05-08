

<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
<div class="panel panel-default" style="display: inline-block;margin-left:90rem;margin-top:10rem;">
	<div class="panel-heading">
		<h3 class="panel-title">login</h3>
	</div>
	<div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" />
			</div>
			<div class="form-check">
				<label>password</label>
				<input type="password" name="password" class="form-control" />
			</div>
			<div class="form-group">
				<label class="form-check-label">Permanecer logueado</label>
				<input type="checkbox" name="cookie" class="form-check-input">
			</div>
			<input class="btn btn-primary" name="submit" type="submit" value="login" />
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
		</form>
	</div>
</div>