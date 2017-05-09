<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?> 

	<div class="container" style="margin-top:50px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="head_title">
					<i class="fa fa-videos fa-lg"></i>	
					HALAMAN | <small><?php echo strtoupper($blogPageCategoryById->name) ?></small>
				</h3>
				<hr class="head_botton_line">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
				<h3><?php echo strtoupper($blogPageCategoryById->title); ?></h3>
				<hr>
				<?php if($blogPageCategoryById->image != null): ?>
				<img src="<?php echo uploads($blogPageCategoryById->image) ?>" class="img-responsive">
				<div class="panel-head-no-border">
					<i class="fa fa-calendar fa-lg"></i> <?php echo $blogPageCategoryById->created_at ?> |
					<i class="fa fa-envelope fa-lg"></i> <?php echo $blogPageCategoryById->email ?> |
					<i class="fa fa-tags fa-lg"></i> <?php echo $blogPageCategoryById->name ?>
				</div>
				<?php endif; ?>
				<div><?php echo $blogPageCategoryById->body; ?></div>
			</div>
		</div>
	</div>

<?php  require 'footer.php'; ?>