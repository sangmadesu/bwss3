	<footer style="padding:10px;margin-top:20px;">
		<p style="text-align:center">MYMVC | 
			<small>
				<a href="https://github.com/adiatma">
				<i class="fa fa-github fa-lg"></i>
				adiatma
				</a>
			</small>
		</p>
	</footer>
	
	<script src="<?php echo in_public('admin/js/jquery-3.1.0.js') ?>"></script>
	<script src="<?php echo in_public('admin/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo in_public('admin/js/jquery.nestable.js'); ?>"></script>
	<script src="<?php echo in_public('admin/js/menu.js'); ?>"></script>
	<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
	<script>
	  tinymce.init({
	    selector: 'textarea',
	    plugins: 'link image code',
	    content_css: [
    		'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    		'//www.tinymce.com/css/codepen.min.css'
		]
	  });
  	</script>
</body>
</html>