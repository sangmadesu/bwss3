<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?> 

	<div class="clear"></div>

	<div class="container">
		<div class="row">
			<?php foreach($allCategoryBlog as $blog): ?>
			<div class="col-lg-3 bg">
				<div class="panel-head">
					<i class="fa fa-tags fa-lg"></i>
					<?php echo strtoupper($blog->name) ?>
				</div>
				<?php if($blog->image != null): ?>
				<img src="<?php echo uploads($blog->image) ?>" class="img-responsive">
				<?php endif; ?>
				<h4><i class="fa fa-quote-left fa-lg"></i> <?php echo strtoupper($blog->title) ?></h4>
				<small class="panel-head-no-border">
					<i class="fa fa-calendar fa-lg"></i>
					<?php echo $blog->created_at ?> |
					<i class="fa fa-envelope fa-lg"></i>
					<?php echo $blog->email ?>
				</small>
				<p><?php echo substr($blog->body, 0,100) ?></p>
				<a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>" class="btn btn-default">
				selanjutnya
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php require 'footer.php'; ?>
