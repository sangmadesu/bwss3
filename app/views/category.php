<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?>

	<div class="clear"></div>
	<?php if(count($allCategoryBlogById) > 0): ?>
	<div class="container">
		<div class="row">
			<?php foreach($allCategoryBlogById as $blog): ?>
			<div class="col-sm-12 col-md-12 col-lg-3">
				<h4><?php echo strtoupper($blog->title) ?></h4>
				<div class="panel-head-no-border">
					<i class="fa fa-calendar fa-lg"></i>
					<?php echo $blog->created_at ?> |
					<i class="fa fa-envelope fa-lg"></i>
					<?php echo $blog->email ?> |
					<i class="fa fa-tags fa-lg"></i>
					<?php echo $blog->name ?>
				</div>
				<?php if($blog->image != null): ?>
					<img src="<?php echo uploads($blog->image) ?>" class="img-responsive">
				<?php endif; ?>
				<p><?php echo substr($blog->body, 0,225) ?></p>
				<a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>" class="btn btn-default">selantjutnya
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

<?php  require 'footer.php'; ?>