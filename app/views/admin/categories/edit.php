<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><i class="fa fa-tags fa-lg"></i> CATEGORIES</h2>
				<hr>
				<ol class="breadcrumb">
					<li><a href="<?php echo $app->generate('admin-category-index'); ?>">#CATEGORIES</a></li>
					<li class="active">#EDIT</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<form method="POST" action="<?php echo $app->generate('admin-category-update', ['id' => $category->id]); ?>">
				<div class="col-lg-4">
					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
					<div class="form-group">
						<select name="type" class="form-control">
							<option value="<?php echo  $category->type ?>">
							<?php echo  $category->type ?></option>
							<option value="default">DEFAULT</option>
							<option value="page">PAGE</option>
						</select>
					</div>
					<div class="form-group">
						<label>Category</label>
						<input type="text" name="name" class="form-control" value="<?php echo $category->name; ?>">
					</div>

					<div class="form-group">
						<label">Color</label>
						<input type="color" name="color" value="<?php echo $category->color ?>">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" cols="30" rows="10" class="form-control">
						<?php echo $category->description; ?></textarea>
					</div>
					<button type="submit" class="btn btn-default">
						<i class="fa fa-save fa-lg"></i>
						UPDATE
					</button>
				</div>
			</form>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>