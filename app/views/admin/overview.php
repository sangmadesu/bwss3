<?php require 'header.php' ?>
<?php require 'navigation.php' ?>

	<div class="container">
		<div class="col-lg-12">
			<h1>Overview</h1>
			<hr>
		</div>
	</div>

	<div class="container">
		<div class="row placeholders">
			<div class="col-xs-6 col-sm-3 placeholder">
				<a href="<?php echo $app->generate('admin-blog-index') ?>">
				<i class="fa fa-newspaper-o fa-5x"></i>
				<h4>BLOGS</h4>
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
				<a href="<?php echo $app->generate('admin-category-index') ?>">
				<i class="fa fa-tags fa-5x"></i>
				<h4>CATEGORIES</h4>
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
				<a href="#">
				<i class="fa fa-camera fa-5x"></i>
				<h4>MEDIA</h4>
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
				<a href="<?php echo $app->generate('admin-page-index') ?>">
				<i class="fa fa-list-alt fa-5x"></i>
				<h4>PAGE</h4>
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 placeholder">
				<a href="<?php echo $app->generate('admin-menu-index') ?>">
				<i class="fa fa-bars fa-5x"></i>
				<h4>MENU</h4>
				</a>
			</div>
		</div>
	</div>

<?php require 'footer.php' ?>

