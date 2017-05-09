<?php require 'header.php'; ?>
<?php require 'navigation.php'; ?>
	
	<div class="clear"></div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<form method="GET" action="<?php echo $app->generate('search') ?>">
					<div class="input-group">
						<input type="text" name="search" class="form-control">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-search fa-lg"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container" style="margin-top:50px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="head_title">
					<i class="fa fa-newspaper-o fa-lg"></i>	
					HEADLINE
				</h3>
				<hr class="head_botton_line">
			</div>
		</div>
	</div>

	<div class="container peta-sulteng">
		<?php foreach($blogs as $blog): ?>
			<?php if($blog->headline == 1): ?>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4">
					<?php if($blog->image != null): ?>
						<a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>"><img src="<?php echo uploads($blog->image) ?>" class="img-responsive"></a>
					<?php endif; ?>
				</div>
				<div class="col-lg-8">
					<div class="headline">
						<h2>
							<i class="fa fa-quote-left fa-lg"></i>
							<?php echo strtoupper($blog->title) ?>
						</h2>
					</div>
					<small class="panel-head-no-border">
						<i class="fa fa-calendar fa-lg"></i> <?php echo $blog->created_at ?> |
						<i class="fa fa-envelope fa-lg"></i> <?php echo $blog->email ?> |
						<i class="fa fa-tags fa-lg"></i> <?php echo $blog->name ?> 
					</small>
					<div><?php echo substr($blog->body, 0, 350) ?></div>
					<a class="btn btn-default" href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>">
					selanjutnya
					</a>
				</div>
			</div>
			<br>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="head_title">
					<i class="fa fa-rocket fa-lg"></i>	
					TERKINI
				</h3>
				<hr class="head_botton_line">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php foreach($blogs as $blog): ?>
					<?php if($blog->headline == 0): ?>
					<div class="articles col-lg-4">
						<div class="panel-head" style="color:<?php echo $blog->color ?>;margin-bottom:5px;">
							<i class="fa fa-tags fa-lg"></i>
							<?php echo strtoupper($blog->name); ?>
							<a href="<?php echo $app->generate('category-id', ['id' => $blog->category_id]) ?>"><i class="fa fa-toggle-right fa-lg" style="float:right"></i></a>
						</div>
						<?php if($blog->image != null): ?>
							<a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>"><img src="<?php echo uploads($blog->image) ?>" class="img-responsive"></a>
						<?php endif; ?>
						<br>
						<small class="panel-head-no-border">
							<i class="fa fa-calendar fa-lg"></i>
							<?php echo $blog->created_at ?>
						</small>
						<a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>">
						<h5><?php echo strtoupper($blog->title) ?></h5></a>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="col-lg-4">
				<?php foreach($pages as $page): ?>
					<?php if($page->category_id == 8): ?>
					<div class="videos">
						<div class="panel-head">
							<i class="fa fa-youtube fa-lg"></i>
							<?php echo strtoupper($page->name) ?>
							<small style="padding-left:10px"><i class="fa fa-calendar fa-lg"></i> <?php echo $page->created_at ?></small>
							<a href="<?php echo $app->generate('pages', ['id' => $page->category_id]) ?>"><i class="fa fa-video-camera fa-lg" style="float:right"></i></a>
						</div>
						<div><?php echo $page->body ?></div>
						<a href="<?php echo $app->generate('page-id', ['id' => $page->id]) ?>"><h5><?php echo strtoupper($page->title) ?></h5></a>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="head_title">
					<i class="fa fa-camera-retro fa-lg"></i>	
					GALERI
				</h3>
				<hr class="head_botton_line">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="owl-gallery" class="owl-carousel">
				<?php foreach($blogs as $blog): ?>
					<div class="item"><a href="<?php echo $app->generate('home-detail', ['id' => $blog->id]) ?>"><img src="<?php echo uploads($blog->image) ?>" class="lazyOwl" style="width:100%;height:200px;" data-src="<?php echo uploads($blog->image) ?>"></a></div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

<?php  require 'footer.php'; ?>