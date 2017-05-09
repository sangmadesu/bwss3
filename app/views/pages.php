<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?> 

	<div class="clear"></div>

	<div class="container">
		<div class="row">
			<?php foreach($categoryPageById as $page): ?>
			<div class="col-lg-3">
				<div class="panel-head">
					<i class="fa fa-tags fa-lg"></i>
					<?php echo strtoupper($page->name) ?>
				</div>
				<?php if($page->image != null): ?>
				<img src="<?php echo uploads($page->image) ?>" class="img-responsive">
				<?php endif; ?>
				<h4><?php echo strtoupper($page->title) ?></h4>
				<div class="panel-head-no-border">
					<i class="fa fa-calendar fa-lg"></i>
					<?php echo $page->created_at ?> |
					<i class="fa fa-envelope fa-lg"></i>
					<?php echo $page->email ?>
				</div>
				<div ><?php echo substr($page->body, 0,225) ?></div>
				<a href="<?php echo $app->generate('page-id', ['id' => $page->id]) ?>" class="btn btn-default">
				selanjutnya
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php  require 'footer.php'; ?>