	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>copyright &copy; <a href="http://bws-sulawesi3.com">bws-sulawesi3.com</a>. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?php echo in_public('js/map.js'); ?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6ue2BE57Dyr5dbiqUmRKiwvQnguXg5n8&callback=initMap"
    async defer></script>
	<script src="<?php echo in_public('js/jquery-3.1.0.js'); ?>"></script>
	<script src="<?php echo in_public('js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo in_public('js/fluidvids.js'); ?>"></script>
	<script>
		fluidvids.init({
      		selector: ['iframe'],
      		players: ['www.youtube.com','pu.go.id','sda.pu.go.id','sda.sultengprov.go.id','sultengprov.go.id']
    	});
	</script>
	<script src="<?php echo in_public('owl.carousel/owl-carousel/owl.carousel.min.js'); ?>"></script>
	<script>
		$(document).ready(function(){
			$("#owl-gallery").owlCarousel({
				items:4,
				lazyLoad:true,
				navigation:true
			})
		});
	</script>
</body>
</html>