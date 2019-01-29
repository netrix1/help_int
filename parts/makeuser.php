<style type="text/css">
	.breadcrumb {
	margin: 0px;
	}
	.bannerCarr{
	height: 19vw;
	}
</style>

<div class="content-block">
	<div class="row no-gutters">


			<div class="col-12 col-md-12 col-lg-12 p-12">
				<div class="card flat">
					<div class="card-header bg-primary flat text-white py-3"><span class="mdi mdi-account-settings"></span> Criação de Usuário</div>

<div class="row">
  <div class="col-12 col-md-6 col-lg-6 p-2">
    <form id="login-form" class="form-horizontal" role="form" action="insere.php" method="post" autocomplete="off">

					<div class="card-body">
						<div class="form-group form-group-icon form-material">
							<input class="form-control" type="text" placeholder="Nome do agente" id="nome" name="nome">
							<span class="form-border"></span>
							<span class="form-icon material-icons mdi mdi-account-outline"></span>
						</div>
						<div class="form-group form-group-icon form-material">
							<input class="form-control" type="text" placeholder="Usuario" id="user" name="user" autocomplete="off">
							<span class="form-border"></span>
							<span class="form-icon material-icons mdi mdi-account-key-outline"></span>
						</div>
						<div class="form-group form-group-icon form-material">
							<input class="form-control" type="password" placeholder="Senha" id="senha" name="senha" autocomplete="off">
							<span class="form-border"></span>
							<span class="form-icon material-icons mdi mdi-lock-outline"></span>
						</div>
            <div class="form-group form-group-icon form-material">
              <select class="form-control" placeholder="sexo" name="sexo">
                <!--optgroup label="Sexo">Sexo</optgroup-->
                <option disabled hidden selected>Sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
              </select>
              <span class="form-border"></span>
              <span class="form-icon material-icons mdi mdi-account-supervisor"></span>
            </div>
						<div class="form-group form-group-icon form-material">
							<?php echo selectUserLvl("userLvl"); ?>
							<span class="form-border"></span>
							<span class="form-icon material-icons mdi mdi-account-star-outline"></span>
						</div>

						<div class="form-group form-group-icon form-material">
              <input class="form-control" type="email" placeholder="E-mail" id="email" name="email" autocomplete="off">
              <span class="form-border"></span>
              <span class="form-icon material-icons mdi mdi-email-outline"></span>
            </div>

            <div class="form-group form-group-icon form-material">
              <?php echo selectPai("pai"); ?>
              <span class="form-border"></span>
              <span class="form-icon material-icons mdi mdi-account-child-circle"></span>
            </div>

            <div class="form-group text-left">
              <button type="submit" class="btn btn-primary shadow-2 flat">Incluir Usuário</button>
              <button type="reset" class="btn btn-secondary shadow-2 flat">Limpar Cadastro</button>
            </div>

					</div>

    </form>
  </div>
</div>
				</div>
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