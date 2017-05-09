<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?> 

	<div class="clear"></div>

	<div class="container" style="margin-bottom:5%;">
		<div class="row">
			<div class="col-lg-12">
				<h3>HASIL PENCARIAN :  <?php echo Input::get('search') ?></h3>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php foreach($findBlog as $blog): ?>
			<div class="col-lg-3 bg">
				<h4><i class="fa fa-quote-left fa-lg"></i> <?php echo strtoupper($blog->title) ?></h4>
				<?php if($blog->image != null): ?>
				<img src="<?php echo uploads($blog->image) ?>" class="img-responsive">
				<?php endif; ?>
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
