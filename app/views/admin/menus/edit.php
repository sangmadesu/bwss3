<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2><i class="fa fa-bars fa-lg"></i> MENUS</h2>
				<hr>
				<ol class="breadcrumb">
					<li class="active">#MENUS</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form method="POST" action="<?php echo $app->generate('admin-menu-update', ['id' => $menu->id]) ?>">
					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
					<div class="form-group">
						<label>TITLE</label>
						<input type="text" name="title" class="form-control" value="<?php echo $menu->title ?>">
					</div>
					<div class="form-group">
						<label>URL</label>
						<input type="text" name="url" class="form-control" value="<?php echo $menu->url ?>">
					</div>
					<div class="form-group">
						<label>MENU ORDER</label>
						<input type="text" name="menu_order" class="form-control" value="<?php echo $menu->menu_order ?>">
					</div>
					<div class="form-group">
						<label>PARENT</label>
						<input type="text" name="parent" class="form-control" value="<?php echo $menu->parent ?>">
					</div>
					<button class="btn btn-default">
						<i class="fa fa-save fa-lg"></i>
						SAVE EDIT
					</button>
				</form>
			</div>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>