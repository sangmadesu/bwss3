<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><i class="fa fa-user fa-lg"></i> USERS</h2>
				<hr>
				<ol class="breadcrumb">
					<li><a href="<?php echo $app->generate('users') ?>">#USERS</a></li>
					<li class="active">#PROFILE</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<img src="https://www.gravatar.com/avatar/<?php echo md5($profile->email) ?>?s=400" class="img img-responsive img-circle">
			</div>
			<div class="col-lg-8">
				<div class="panel-head">
					<h3><?php echo strtoupper($profile->firstname . ' ' . $profile->lastname) ?></h3>
				</div>
				<hr>
				<div><?php echo $profile->description  ?></div>
				<div class="action-page">
					<button class="btn btn-default">
						<i class="fa fa-envelope fa-lg"></i>
						<?php echo $profile->email ?>
					</button>
				</div>
				<br>
				<form method="POST" action="<?php echo $app->generate('auth-update', ['id' => $profile->id]) ?>">
					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
					<div class="form-group">
						<label>NEW PASSWORD</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label>PASSWORD CONFIRMATION</label>
						<input type="password" name="password_confirmation" class="form-control">
					</div>
					<button type="submit" class="btn btn-default">
						<i class="fa fa-save fa-lg"></i>
						UPDATE
					</button>
				</form>					
			</div>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>