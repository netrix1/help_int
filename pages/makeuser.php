<style type="text/css">
	.breadcrumb {
	margin: 0px;
	}
	.bannerCarr{
	height: 19vw;
	}
</style>
    <?php //echo '<script type="text/javascript" src="help/jquery.min.js"></script>'; ?>
    <script type="text/javascript" src="help/jquery.Jcrop.js"></script>
    <link rel="stylesheet" type="text/css" href="help/jquery.Jcrop.css" />

    <script type="text/javascript">
      function getCoords(){
      var api;
      $('#toCrop').Jcrop({
      minSize: [160,160],
      aspectRatio: 1,
      bgOpacity: 0.4,
      addClass: 'jcrop-light',
      onSelect: updateCoords,
      onChange: updateCoords,
      setSelect: [0,0,160,160]
      });
      }
       
      function updateCoords(c){
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
      };
       
      function _(element){
      if(document.getElementById(element))
      return document.getElementById(element);
      else
      return false;
      }
       
      function submitForm(){
      if(_('arquivo').files[0]){//Se houver um arquivo, faremos alguns testes no mesmo
      var arquivo = _('arquivo').files[0];
      if(arquivo.type != 'image/png' && arquivo.type != 'image/jpeg')
      _('result').innerHTML = 'Por favor, selecione uma imagem do tipo JPEG ou PNG';
      else if(arquivo.size > 1024 * 2048)//2MB
      _('result').innerHTML = 'Por favor selecione uma image mo máximo 2MB de tamanho.';
      else{
      var x = _('x').value;
      var y = _('y').value;
      var w = _('w').value;
      var h = _('h').value;
      var formData = new FormData();
      formData.append('arquivo', arquivo);
      formData.append('x', x);
      formData.append('y', y);
      formData.append('w', w);
      formData.append('h', h);
      if(_('imgType')){
      var imgType = _('imgType').value;
      formData.append('imgType', imgType);
      }
      if(_('imgName')){
      var imgName = _('imgName').value;
      formData.append('imgName', imgName);
      }
      var request  = new XMLHttpRequest();
      if(_('toCrop'))
      var includeFile = 'cropFile.php';
      else
      var includeFile = 'recebeFile.php';
      request.open('post', includeFile, true);
      request.onreadystatechange = function(){
      if(request.readyState == 4 && request.status == 200)
      _('result').innerHTML = request.responseText;
      if(_('toCrop'))
      _('sendButton').value = 'Anexar';
      }
      request.send(formData);
      _('result').innerHTML = '<img src="images/5.gif" />';
      }
      }
      else
      _('result').innerHTML = 'Por favor, selecione uma imagem para ser enviada!';
      }
    </script>
<div class="content-block">
	<form id="login-form" class="form-horizontal" role="form" action="insere.php" method="post" autocomplete="off"><div class="row no-gutters">

    
			<div class="col-12 col-md-12 col-lg-12 p-12">
				<div class="card flat">
					<div class="card-header bg-primary flat text-white py-3"><span class="mdi mdi-account-settings"></span> Criação de Usuário</div>

<div class="row">
  <div class="col-12 col-md-6 col-lg-6 p-2">


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

    
  </div>

  <div class="col-12 col-md-6 col-lg-6 p-2">


    <div class="card-body">
              

      <form>
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
        <input type="file" id="arquivo" />
        <input onclick="submitForm();" type="button" id="sendButton" value="Enviar" />
      </form>

     </div>
     <div id="result"></div>
      
    
  </div>




				</div>
			</div>



		<!-- end row -->
	</div></form>
</div>
<?php $scripsjs="
	<script type='text/javascript'>
	$('.carousel').carousel({
		interval: 8000
	})
		
	</script>
	";?>