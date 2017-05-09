<nav class="navbar navbar-blue" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo $app->generate('home'); ?>" class="navbar-brand">
				<img src="<?php echo in_public('img/logo_pu.jpg') ?>" style="width:20px;height:20px;float:left;margin-right:10px;">
				BWS SULAWESI III
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navigation">
			<?php $auth = new Auth; ?>
			<?php $user = $auth->user(); ?>
			<?php if($user != null): ?>
			<ul class="nav navbar-nav navbar-left">
				<li><a href="<?php echo $app->generate('overview') ?>">ADMINISTRATOR</a></li>
			</ul>
			<?php endif; ?>
			<ul class="nav navbar-nav navbar-right">
			<?php foreach($menus as $menu): ?>
				<?php $getChilds = getChilds($menu, $menus);  ?>
				<?php if($menu->parent == null && count($getChilds) == 0): ?>
				<li><a href="<?php echo $menu->url ?>"><?php echo strtoupper($menu->title) ?></a>
				<?php endif; ?>
				<?php if(count($getChilds) > 0): ?>
				<li class="dropdown blue">
					<a href="<?php echo $menu->title ?>" class="dropdown-toggle blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?php echo strtoupper($menu->title) ?> <span class="caret"></span></a>
						<ul class="dropdown-menu blue">
						<?php foreach($getChilds as $child): ?>
							<li><a href="<?php echo $child->url ?>"><?php echo strtoupper($child->title) ?></a></li>
						<?php endforeach; ?>
						</ul>
				<?php endif; ?>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</nav>

