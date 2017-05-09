<?php require  BASE_VIEW . 'header.php'; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<h1 style="text-align:center">BWS SULAWESI III</h1>
				<hr>
				<p style="text-align:center">LOGIN</p>
				<br>
				
				<?php if(Session::exists('errors')): ?>
					<div class="alert alert-danger">
					<?php foreach (Session::flash('errors') as $error): ?>
						<?php echo '<div>' . $error . '</div>'; ?>
					<?php endforeach; ?>
					</div>
				<?php endif;?>

				<div class="panel panel-no-border">
					<div class="panel-body">
						<form method="POST" action="<?php echo $app->generate('auth-check'); ?>">
							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input type="password" name="password" class="form-control">
							</div>
							<br>
							<button class="btn btn-lg-blue btn-block">LOGIN</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php  require BASE_VIEW . 'footer.php'; ?>