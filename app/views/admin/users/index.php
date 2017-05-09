<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><i class="fa fa-user fa-lg"></i> USERS</h2>
				<hr>
				<ol class="breadcrumb">
					<li class="active">#USERS</li>
					<li><a href="<?php echo $app->generate('profile') ?>">#PROFILE</a></li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php foreach ($users as $user): ?>
			<div class="col-lg-4">
				<div class="panel-head">
					<img src="https://www.gravatar.com/avatar/<?php echo md5($user->email) ?>?s=400" class="img-responsive">
					<br>
					<p><?php echo strtoupper($user->firstname . ' ' . $user->lastname); ?></p>
					<p><?php echo $user->description ?></p>
				</div>
				<div class="action-page">
					<button class="btn btn-default">
					<i class="fa fa-envelope fa-lg"></i>
					<?php echo $user->email ?>
					</button>
					<div class="clear-both"></div>
				</div>
			</div>
			<?php endforeach; ?>	
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>