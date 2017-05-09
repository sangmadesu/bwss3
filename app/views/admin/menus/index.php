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
			<div class="col-sm-12 col-md-12 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bars fa-lg"></i>
						CREATE MENU
					</div>
					<div class="panel-body">
						<form method="POST" action="<?php echo $app->generate('admin-menu-store') ?>">
							<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
							<div class="form-group">
								<label>TITLE</label>
								<input type="text" name="title" class="form-control">
							</div>
							<div class="form-group">
								<label>URL</label>
								<input type="text" name="url" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">
								<i class="fa fa-save fa-lg"></i>
								SAVE
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-8">
				<div class="dd" id="nestable">
					<ol class="dd-list">
						<?php foreach($menus as $menu): ?>
						<?php if($menu->parent == null): ?>
						<li class="dd-item dd3-item" data-id="<?php echo $menu->id ?>">
							<div class="dd-handle dd3-handle">
								drag
							</div>
							<div class="dd3-content">
								<a href="<?php echo $menu->url ?>">
									<?php echo $menu->title ?> | <?php echo $menu->url ?>	
								</a>
								<a href="<?php echo $app->generate('admin-menu-edit',['id' => $menu->id]) ?>">
									<i class="fa fa-edit fa-lg"></i>	
								</a>
							</div>
						<?php endif; ?>
							<?php $getChilds = getChilds($menu, $menus); ?>
							<?php if(count($getChilds) > 0): ?>
								<ol class="dd-list">
									<?php foreach($getChilds as $child): ?>
									<li class="dd-item dd3-item" data-id="<?php echo $child->id ?>">
										<div class="dd-handle dd3-handle">
											drag
										</div>
										<div class="dd3-content">
											<a href="<?php echo $child->url ?>">
												<?php echo $child->title ?> | <?php echo $child->url ?>
											</a>
											<a href="<?php echo $app->generate('admin-menu-edit',['id' => $child->id]) ?>">
												<i class="fa fa-edit fa-lg"></i>	
											</a>
										</div>	
									</li>
								<?php endforeach; ?>
								</ol>
							<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<br>
				<button id="saveMenuOrder" class="btn btn-default">
					<i class="fa fa-save fa-lg"></i>
					SAVE ORDER MENU
				</button>
			</div>
		</div>
	</div>

<?php require BASE_VIEW . 'admin/footer.php'; ?>