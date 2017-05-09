<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php' ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<form action="<?php echo $app->generate('admin-blog-search') ?>" method="GET">
					<div class="input-group">
						<input type="text" name="search" class="form-control">
						<div class="input-group-btn">
							<button class="btn btn-default"><i class="fa fa-search fa-lg"></i></button>
							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIES <span class="caret"></span></button>
							<ul class="dropdown-menu">
							<?php foreach($allCategoryTypeBlog as $category): ?>
								<li><a href="<?php echo $app->generate('admin-blog-by-category', ['id' => $category->id]) ?>"><?php echo strtoupper($category->name) ?></a></li>
							<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2><i class="fa fa-quote-left fa-lg"></i> BLOGS</h2>
				<hr>
				<ol class="breadcrumb">
					<li class="active">#BLOGS</li>
					<li><a href="<?php echo $app->generate('admin-blog-create') ?>">#CREATE</a></li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<?php if(Session::exists('success')): ?>
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php $success = Session::flash('success'); ?>
					<?php echo $success; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php foreach($allCategoryBlogById as $blog): ?>
			<div class="col-sm-12 col-md-4 col-lg-4">
				<div>
					<i class="fa fa-calendar fa-lg"></i>
					<?php echo $blog->created_at ?> |
					<i class="fa fa-tags fa-lg"></i>
					<?php echo $blog->name ?> |
					<?php echo $blog->email ?> |
					Headline
					<?php if($blog->headline): ?>
						<i class="fa fa-check fa-lg"></i>
					<?php else: ?>
						<i class="fa fa-remove fa-lg"></i>
					<?php endif; ?>
				</div>
				<h5>
					<i class="fa fa-quote-left fa-lg"></i>
					<?php echo strtoupper($blog->title) ?>
				</h5>
				<div class="action-page">
					<a href="<?php echo $app->generate('admin-blog-edit', ['id' => $blog->id]) ?>" class="btn btn-default action-page-content">
						<i class="fa fa-edit fa-lg"></i> EDIT
					</a>
					<form method="POST" action="<?php echo $app->generate('admin-blog-destroy', ['id' => $blog->id, 'action' => 'delete']) ?>" enctype="multipart/form-data">
						<button class="btn btn-danger action-page-content">
							<i class="fa fa-trash fa-lg"></i> TRASH
						</button>
					</form>
					<div class="clear-both"></div>
				</div>
				<br>
			</div>
			<?php endforeach; ?>
			
		</div>
		
	</div>

<?php require BASE_VIEW . 'admin/footer.php' ?>