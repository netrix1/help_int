				<div class="navbar-head d-md-block ml-auto">
					
					<ul class="navbar-nav">
						
						<!-- dropdown avatar -->
						<li class="nav-item dropdown">
							<!-- <a class="nav-link dropdown-toggle text-wrap" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
							<a class="nav-link text-wrap" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="images/male-11.jpg" class="rounded-circle img-avatar-header" style="height: 30px; width: 30px;">
								<?php echo $_SESSION['nome']; ?> <span class="mdi mdi-chevron-down"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
								<a class="dropdown-item wave" href="#">
									<div class="avatar-img mr-2">
										<img src="images/male-11.jpg" class="rounded-circle" style="height: 40px; width: 40px;">
									</div>
									<div class="dd-content">
										<div class="font-16"><b><?php echo $_SESSION['nome']; ?></b></div>
										<div class="font-13 text-muted"><?php /*tipoNivel($_SESSION['nivel']);*/ tpNivel($_SESSION['nivelid']); ?></div>
									</div>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item wave" href="#"><span class="gg-icon material-icons">flag</span>Noticias para MIM</a>
								<a class="dropdown-item wave" href="#"><span class="gg-icon material-icons">assignment</span>Meu Perfil</a>
								<a class="dropdown-item wave" href="#"><span class="gg-icon material-icons">settings</span>Configuração</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item wave" href="logout.php"> <span class="gg-icon material-icons">power_settings_new</span>Deslogar</a>
							</div> 
						</li>

					</ul>

				</div>