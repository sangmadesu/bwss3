<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><i class="fa fa-tags fa-lg"></i> CATEGORIES</h2>
				<hr>
				<ol class="breadcrumb">
					<li><a href="<?php echo $app->generate('admin-category-index') ?>">#CATEGORIES</a></li>
					<li class="active">#CREATE</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-4">
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
			<form method="POST" action="<?php echo $app->generate('admin-category-store') ?>">
				<div class="col-lg-4">
					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
					<div class="form-group">
						<select name="type" class="form-control">
							<option value="default">DEFAULT</option>
							<option value="page">PAGE</option>
						</select>
					</div>
					<div class="form-group">
						<label>Category</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Color</label>
						<input type="color" name="color">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" cols="30" rows="10" class="form-control"></textarea>
					</div>
					<button type="submit" class="btn btn-default">
						<i class="fa fa-save fa-lg"></i>
						SAVE
					</button>
				</div>
			</form>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>