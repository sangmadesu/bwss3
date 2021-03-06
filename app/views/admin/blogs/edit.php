<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2><i class="fa fa-quote-left fa-lg"></i> BLOGS</h2>
				<hr>
				<ol class="breadcrumb">
					<li><a href="<?php echo $app->generate('admin-blog-index') ?>">#BLOGS</a></li>
					<li><a href="<?php echo $app->generate('admin-blog-create') ?>">#CREATE</a></li>
					<li class="active">#EDIT</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-6 col-lg-12">
				<?php if(Session::exists('errors')): ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php foreach(Session::flash('errors') as $error): ?>
						<div><?php echo $error ?></div>
					<?php endforeach;?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<form method="POST" action="<?php echo $app->generate('admin-blog-update', ['id' => $blogCategoryById->id]); ?>" enctype="multipart/form-data">
				<div class="col-sm-12 col-md-12 col-lg-8">

					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">

					<div class="form-group">
						<label>TITLE</label>
						<input type="text" name="title" class="form-control" value="<?php echo $blogCategoryById->title; ?>">
					</div>
					<div class="form-group">
						<label>CATEGORY</label>
						<select name="categories" class="form-control">
							<option value="<?php echo $blogCategoryById->category_id ?>">
							<?php echo $blogCategoryById->name ?>
							</option>
							<?php foreach($allCategoryTypeBlog as $category): ?>
							<option value="<?php echo $category->id ?>">
								<?php echo $category->name ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<textarea name="body" id="mytextarea" class="form-control" rows="10">
							<?php echo $blogCategoryById->body; ?>
						</textarea>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-cog fa-lg"></i>
							SETTING
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>DATE</label>
								<input type="date" name="created_at" class="form-control" value="<?php echo $blogCategoryById->created_at; ?>">
							</div>
							<hr>
							<div class="checkbox">
								<label>
									<?php if($blogCategoryById->headline){ ?>
									<input type="checkbox" name="headline" value="yes" checked> HEADLINE ?
									<?php } else { ?>
									<input type="checkbox" name="headline" value="yes"> HEADLINE ?
									<?php } ?>
								</label>
							</div>
							<?php if($blogCategoryById->image != null): ?>
							<div class="form-group">
								<img src="<?php echo uploads($blogCategoryById->image) ?>" class="img-responsive">
							</div>
							<?php endif; ?>
							<div class="form-group">
								<input type="file" name="image">
							</div>
							<hr>
							<button type="submit" class="btn btn-default">
								<i class="fa fa-save fa-lg"></i>
								UPDATE
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php' ?>