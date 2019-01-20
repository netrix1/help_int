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
		<!-- end col -->
		<div class="col-12 col-md-6 col-lg-6 p-1">
			<div class="card flat">
				<div class="card-header bg-white font-20 flat"><span class="mdi mdi-newspaper"></span> Notícias</div>
			</div>
			<!-- end card-body -->
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Ajuste na Plataforma</h5>
						<small class="text-muted">Hoje</small>
					</div>
					<p class="mb-1">Amanhã, dia 25/01/2019 o sistema não estará disponível em alguns momentos para a implementação do sistema de tickets diretamente [...]</p>
					<small>Administrador.</small>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Inclusão da Calculadora de margem</h5>
						<small class="text-muted">Ontem</small>
					</div>
					<p class="mb-1">Oi, Hoje 23/01/2019 incluímos no sistema a <b>Calculadora de margem</b> conforme nos foi pedido para acessar acesse [...]</p>
					<small class="text-muted">Donec id elit non mi porta.</small>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Abertura da intranet</h5>
						<small class="text-muted">à 3 dias atrás</small>
					</div>
					<p class="mb-1">Hoje estamos Iniciando a operação de nossa intranet para ao apoio operacional na empresa, essa ferramenta tem por [...]</p>
					<small>Administrador.</small>
				</a>
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
<?php $scripsjs="
	<script type='text/javascript'>
	$('.carousel').carousel({
	  interval: 8000
	})
	  
	</script>
	";?>