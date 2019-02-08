<style type="text/css">
	.breadcrumb {
	margin: 0px;
	}
	.bannerCarr{
	height: 19vw;
	}
</style>

<div class="row no-gutters"> <!-- row -->
	<div class="col-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1 p-2">
	</div>

	<?php include('incluirPost/server.php') ?>

	
	<div class="col-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1 p-2"> <!-- form row -->
		
		<div class="card flat border-bottom">
			<div class="card-header">Inserir Notícia</div>
			<div class="card-body">
				<form action="index.php?go=IncluirPostagem" method="post" enctype="application/x-www-form-urlencoded">
					<div class="form-group row">
						<label for="exFullName1" class="col-sm-2 col-form-label">Título</label>
						<div class="col-sm-10">
							<input type="text" class="form-control cs-form" id="title" name="title" placeholder="Título">
							<small id="passwordHelpInline" class="text-muted">
							Insita um Título da postagem curta e objetiva.
						</small>
						</div>
					</div>

					<div class="form-group row">
						<label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Corpo da Notícia</label>
						<div class="col-sm-10">
							<textarea class="form-control cs-form" id="body" name="body" rows="3"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<input type="submit" class="btn flat shadow-1 rounded-100 bg-gradient-blue text-white btn-lg" style="padding: .5rem 3rem;" name="enviado" />
						</div>
					</div>
				</form>
			</div>
		</div>
		<form>
	</div> <!-- end form row -->

</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        /// Quando usuário clicar em salvar será feito todos os passo abaixo
        $('#salvar').click(function() {
 
            var dados = $('#cadUsuario').serialize();
 
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'salvar.php',
                async: true,
                data: dados,
                success: function(response) {
                    location.reload();
                }
            });
 
            return false;
        });
    }
</script>

<?php $scripsjs ='<script src="./admin/ckeditor/ckeditor.js"></script>';?>
<?php $scripsjs.='<script src="./admin/ckeditor/scripts.js"></script>';?>