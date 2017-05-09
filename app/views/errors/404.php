<?php require BASE_VIEW . 'header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12" style="margin-top:20%">
				<div class="not-found">
					<i class="fa fa-exclamation-triangle fa-5x"></i>
					<h1>Oops page not found! :(</h1>
					<br>
					<br>
					<a href="<?php echo $app->generate('home') ?>">come on back to home</a>
				</div>
			</div>
		</div>
	</div>

<?php  require BASE_VIEW . 'footer.php'; ?>