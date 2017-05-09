<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php'; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2><i class="fa fa-quote-left fa-lg"></i> PAGES</h2>
				<hr>
				<ol class="breadcrumb">
					<li><a href="<?php echo $app->generate('admin-page-index') ?>">#PAGES</a></li>
					<li class="active">#CREATE</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<form method="POST" action="<?php echo $app->generate('admin-page-store') ?>" enctype="multipart/form-data">
			<div class="col-lg-8">
				<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
				<div class="form-group">
					<label>TITLE</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<select name="categories" class="form-control">
						<?php foreach($allCategoryTypePage as $category): ?>
							<option value="<?php echo $category->id ?>">
								<?php echo $category->name ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<textarea name="body" id="mytextarea" class="form-control"></textarea>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-cog fa-lg"></i>
						SETTING
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>DATE</label>
							<input type="date" name="created_at" class="form-control">
						</div>
						<hr>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="headline" value="yes"> HEADLINE ?
							</label>
						</div>
						<hr>
						<div class="form-group">
							<input type="file" name="image">
						</div>
						<hr>
						<button type="submit" class="btn btn-default">
							<i class="fa fa-save fa-lg"></i>
							SAVE
						</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>