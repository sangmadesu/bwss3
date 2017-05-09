<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?>
	
	<div class="container" style="margin-top:50px;margin-bottom:50px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="head_title">
					<i class="fa fa-tags fa-lg"></i>	
					KONTEN | <small><?php echo strtoupper($blogCategoryById->name) ?></small> 				
				</h3>
				<hr class="head_botton_line">
			</div>
		</div>
	</div>	

	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h3><?php echo strtoupper($blogCategoryById->title); ?></h3>
				<hr>
				<?php if($blogCategoryById->image != null): ?>
					<img src="<?php echo uploads($blogCategoryById->image) ?>" class="img-responsive">
				<?php endif; ?>
				<div class="panel-head-no-border">
					<i class="fa fa-calendar fa-lg"></i> <?php echo $blogCategoryById->created_at ?> |
					<i class="fa fa-envelope fa-lg"></i> <?php echo $blogCategoryById->email ?>
				</div>
				<hr>
				<div><?php echo $blogCategoryById->body; ?></div>
			</div>
			<div class="col-lg-4">
				<div class="panel-head">
					<i class="fa fa-quote-left fa-lg"></i>
					NEWS
				</div>
				<ul class="media-list">
					<?php foreach($allBlogCategory as $blog): ?>
					<div class="media">
						<div class="media-left">
							<?php if($blog->image != null): ?>
							<a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>">
								<img src="<?php echo uploads($blog->image) ?>" class="media-object" style="width:64px;height:64px;">
							</a>
							<?php endif; ?>
						</div>
						<div class="media-body">
							<small class="panel-head-no-border"><i class="fa fa-calendar fa-lg"></i>
								<?php echo $blog->created_at; ?>
							</small>
							<h5 class="media-heading">
								<small><i class="fa fa-quote-left fa-lg"></i></small>
								<?php echo strtoupper($blog->title); ?>
							</h5>
						</div>
					</div>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

<?php  require 'footer.php'; ?>