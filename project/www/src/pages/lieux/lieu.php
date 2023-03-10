<div class="page_choix">

	<div class="flex-container">

		<div class="flex-slide home">
			<div class="flex-title flex-title-home">Systèmes</div>
			<div class="flex-about flex-about-home">
				<div class="bouton-lieu">
					<a class="btn_lieu" href="?ind=systemes"><span>Visiter</span></a>
				</div>
			</div>
		</div>
		<div class="flex-slide planete">
			<div class="flex-title">Planètes</div>
			<div class="flex-about">
				<div class="bouton-lieu">
					<a class="btn_lieu" href="?ind=planetes"><span>Visiter</span></a>
				</div>
			</div>
		</div>
		<div class="flex-slide lune">
			<div class="flex-title">Lunes</div>
			<div class="flex-about">
				<div class="bouton-lieu">
					<a class="btn_lieu" href="?ind=lunes"><span>Visiter</span></a>
				</div>
			</div>
		</div>
		<div class="flex-slide ville">
			<div class="flex-title">Villes</div>
			<div class="flex-about">
				<div class="bouton-lieu">
					<a class="btn_lieu" href="?ind=villes"><span>Visiter</span></a>
				</div>
			</div>
		</div>
		<div class="flex-slide station">
			<div class="flex-title">Stations spatiales</div>
			<div class="flex-about">
				<div class="bouton-lieu">
					<a class="btn_lieu" href="?ind=station_spatiale"><span>Visiter</span></a>
				</div>
			</div>
		</div>
		<div class="flex-slide insolite">
			<div class="flex-title">Lieux insolites</div>
			<div class="flex-about">
				<div class="bouton-lieu">
					<a class="btn_lieu" href="?ind=lieu_insolite"><span>Visiter</span></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/769286/jquery.waitforimages.min.js"></script>
<script>
	(function() {

		$(".flex-slide").each(function() {
			$(this).hover(function() {
				$(this).find('.flex-title').css({
					transform: 'rotate(0deg)',
					top: '250'
				});
				$(this).find('.flex-about').css({
					opacity: '1'
				});
			}, function() {
				$(this).find('.flex-title').css({
					transform: 'rotate(90deg)',
					top: '250'
				});
				$(this).find('.flex-about').css({
					opacity: '0'
				});
			})
		});
	})();
</script>

