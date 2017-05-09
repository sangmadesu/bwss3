<?php require  BASE_VIEW . 'header.php'; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<h1 style="text-align:center">BWS SULAWESI III</h1>
				<hr>
				<p style="text-align:center">REGISTER</p>
				<br>
				<div class="panel panel-no-border">
					<div class="panel-body">
						<form method="POST" action="<?php echo $app->generate('auth-store'); ?>">

							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

							<div class="form-group">
								<label>FIRST NAME</label>
								<input type="text" name="firstname" class="form-control">
							</div>
							
							<div class="form-group">
								<label>LAST NAME</label>
								<input type="text" name="lastname" class="form-control">
							</div>

							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label>PASSWORD CONFIRMATION</label>
								<input type="password" name="password_confirmation" class="form-control">
							</div>
							<br>
							<button class="btn btn-lg-blue btn-block">REGISTER</button>
						</form>
					</div>
				</div>
				<p style="text-align:center"><a href="<?php echo $app->generate('auth-login'); ?>">
				Back to login</a></p>
			</div>
		</div>
	</div>
	
<?php  require BASE_VIEW . 'footer.php'; ?>