<style type="text/css">
	.breadcrumb {
	margin: 0px;
	}
	.bannerCarr{
	height: 19vw;
	}
</style>
<div class="row no-gutters">
	<!-- row -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<!--li data-target="#carouselExampleIndicators" data-slide-to="2"></li-->
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item bannerCarr active">
				<img class="d-block w-100 " src="<?php echo URL_SITE; ?>/images/banner/bemvindo.jpg" alt="First slide">
			</div>
			<div class="carousel-item ">
				<img class="d-block w-100 bannerCarr" src="<?php echo URL_SITE; ?>/images/banner/ajudasuporte.jpg" alt="Second slide">
			</div>
			<!--div class="carousel-item">
				<img class="d-block w-100 bannerCarr" src="https://cdn.allwallpaper.in/wallpapers/1920x1200/4998/boat-on-beautiful-sea-and-sky-1920x1200-wallpaper.jpg" alt="Third slide">
				</div-->
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Anterior</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Proximo</span>
		</a>
	</div>
</div>
<div class="content-block">
	<div class="row no-gutters">
		<div class="col-12 col-md-6 col-lg-12 p-1">
			<div class="card flat border-bottom bg-warning">
				<div class="card-body text-white bg-warning">
					<p>Bem-vindo a intranet Help, aqui você tem informações de nossa empresa como roteiros operacionais, guia de ajuda e ferramentas para agilizar e aperfeiçoar seu trabalho! </p>
					<p>Certo, esse canal ainda está em desenvolvimento e irá sofrer vários aprimoramentos e modificações, então nós pedimos ajuda para que você nos envie sugestões, dicas e críticas do sistema no canal de suporte clicando aqui. Obrigado!</p>
				</div>
			</div>
			<!-- end card-body -->
		</div>

		<?php
		$db = mysqli_connect("localhost", "root", "andersom11", "netrix");
		// retrieve posts from database
		$result = mysqli_query($db, "SELECT * FROM `tab_posts` ORDER BY `tab_posts`.`id` DESC LIMIT 3");
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		require_once 'functions.php';
		?>

		<!-- end col -->
		<div class="col-12 col-md-6 col-lg-6 p-1">
			<div class="card flat">
				<div class="card-header bg-white font-20 flat"><span class="mdi mdi-newspaper"></span> Notícias</div>
			</div>
			<!-- end card-body -->
			<div class="list-group">

			<?php
			if(isset($posts)){
				foreach ($posts as $post) {
					echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
					echo '	<div class="d-flex w-100 justify-content-between">';
					echo '		<h5 class="mb-1">'.$post['title'].'</h5>';
					echo '		<small class="text-muted">'.tempo_corrido($post['post_data']).'</small>';
					echo '	</div>';
					echo '	<p class="mb-1">'.limita_caracteres(htmlspecialchars_decode($post['body']), "140", FALSE).'</p>';
					echo '	<small>por '.pegaUsuario($post['post_user']).'</small>';
					echo '</a>';
				}
			}else{
				echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">';
				echo '	<div class="d-flex w-100 justify-content-between">';
				echo '		<h5 class="mb-1">Nenhuma Postagem Disponível.</h5>';
				echo '	</div>';
				echo '</a>';
			}
			?>

			</div>	
		</div>

		<!-- end col -->
		<div class="col-12 col-md-6 col-lg-6 p-1">
			<div class="card flat border-bottom ">
				<div class="card flat">
					<div class="card-header bg-white font-20 flat"><span class="mdi mdi-bullhorn"></span> Anuncios</div>
				</div>
				<div class="list-group">
<div class="list-group-item list-group-item-action flex-column align-items-start">
<div class="alert alert-success" role="alert">
  Nenhum novo Anúncio!
</div>	
</div>

				</div>
				<!-- end card-body -->
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</div>
</div>
<?php $scripsjs="
	<script type='text/javascript'>
	$('.carousel').carousel({
	  interval: 8000
	})
	  
	</script>
	";?>