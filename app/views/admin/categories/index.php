<?php require BASE_VIEW . 'admin/header.php'; ?>
<?php require BASE_VIEW . 'admin/navigation.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><i class="fa fa-tags fa-lg"></i> CATEGORIES</h2>
				<hr>
				<ol class="breadcrumb">
					<li class="active">#CATEGORIES</li>
					<li><a href="<?php echo $app->generate('admin-category-create') ?>">#CREATE</a></li>
				</ol>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-6 col-lg-12">
				<?php if(Session::exists('success')): ?>
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php $success = Session::flash('success'); ?>
					<?php  echo $success; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-6 col-lg-12">
				<?php if(Session::exists('info')): ?>
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php $info = Session::flash('info'); ?>
					<?php  echo $info; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php foreach($categories as $category): ?>
			<div class="col-sm-12 col-md-12 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<p style="color:<?php echo $category->color ?>">
						<?php echo strtoupper($category->type) ?>
						| <?php echo strtoupper($category->name) ?>
						</p>
					</div>
					<div class="panel-body">
						<?php echo strtoupper($category->description) ?>
						<div class="action-page">
							<form method="POST" action="<?php echo $app->generate('admin-category-destroy', ['id' => $category->id, 'action' => 'delete']) ?>">
								<a href="<?php echo $app->generate('admin-category-edit', ['id' => $category->id]) ?>" class="btn btn-default">
									<i class="fa fa-edit fa-lg"></i>
									EDIT
								</a>
								<button class="btn btn-danger">
									<i class="fa fa-trash fa-lg"></i>	
									TRASH
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>