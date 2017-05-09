	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">MYMVC - </a>
			</div>
			<div class="collapse navbar-collapse" id="top-nav">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo $app->generate('home') ?>">FRONT PAGE</a></li>
					<li><a href="<?php echo $app->generate('overview') ?>">OVERVIEW</a></li>
					<li><a href="<?php echo $app->generate('admin-blog-index') ?>">BLOGS</a></li>
					<li><a href="<?php echo $app->generate('admin-page-index') ?>">PAGES</a></li>
					<li><a href="<?php echo $app->generate('admin-category-index') ?>">CATEGORIES</a></li>
					<li><a href="<?php echo $app->generate('admin-menu-index') ?>">MENUS</a></li>
					<li><a href="<?php echo $app->generate('users') ?>">USERS</a></li>
				</ul>
				<ul class="nav navbar-nav default navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="botton" aria-haspopup="true" aria-expanded="false">
						<?php $curentUser = new Auth; ?>
						<?php $curentUser = $curentUser->user(); ?>
						<?php echo strtoupper($curentUser->email); ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu default">
							<li><a href="<?php echo $app->generate('profile'); ?>">PROFILE</a></li>
							<li><a href="<?php echo $app->generate('auth-logout'); ?>">LOGOUT</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>