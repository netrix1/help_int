<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>XAKTI - Admin Template for Bootstrap</title>

    
      <link rel="shortcut icon" href="images/favicon.png">
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
      <!-- icon -->
      <link rel="stylesheet" type="text/css" href="plugins/material-icon/css/material-icons.css">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="help/help.css">
      <link rel="stylesheet" href="help/main.css">
    
    <style type="text/css">
      .v1-left-menu{
        position: relative; z-index: 1; margin-left: 50px;
      }
      .bd-left-4{
        border-left: 4px solid #fff;
        overflow: hidden;
      }
      .effect-lr{
        -webkit-animation: sign_in_v1 2s ease;
        animation: sign_in_v1 2s ease;
      }
      @-webkit-keyframes sign_in_v1 {
          from {
            opacity: 0.3; 
            margin-left: -500px;
          }
          to {
            opacity: 1;
          }
      }
      @keyframes sign_in_v1 {
          from {
            opacity: 0.3; 
            margin-left: -500px;
          }
          to {
            opacity: 1;
          }
      }
      .sign-up-v1{
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="row no-gutters login-page-v1">
      <div class="col-12 col-md-6 col-lg-8 text-white d-flex align-items-center align-content-stretch" style="background-color: #03499b;">
        <img class="img-login-page-v1" src="images/background/toraja.jpg">
        <div class="v1-left-menu my-2">
          <div class="px-4 bd-left-4">
            <div class="effect-lr">
              <h1>Intranet Help!</h1>
              <div class="text-white">Acesso restrito a funcionários!</div>
            </div>
          </div>
          <div class="pl-4 my-4">
            <a href="helpmaiscredito.com.br" class="btn btn-outline-light rounded-0 w-200px">Ir para o Site Principal</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 bg-white d-flex align-items-center">
        <div class="col-12 p-4 my-4 sign-in-v1">
          <h5 class="mb-4 text-center">Atenção, <small>Login Necessário</small></h5>

<?php /*
          <form id="login-form" class="form-horizontal" role="form" action="login.php" method="post" autocomplete="off">
            <p>Login: <input type="text" class="form-control" id="login" name="Username" required placeholder="Informe seu login de usuário"></p>
            <p>Senha: <input type="password" class="form-control" id="pass" name="Password" required placeholder="Informe sua senha"></p>
            <p><center><input type="submit" name="Enviar" id="btn-login"></center></p>
          </form>

*/?>
          <form id="login-form" class="form-horizontal" role="form" action="login.php" method="post" autocomplete="off">
            <div class="form-group form-group-icon">
              <input type="text" class="form-control cs-form" id="login" name="login" placeholder="Usuário" autocomplete="off">
              <span class="material-icons form-icon">person_outline</span>
            </div>
            <div class="form-group form-group-icon">
              <input type="password" class="form-control cs-form" id="pass" name="pass" placeholder="Senha" autocomplete="off">
              <span class="material-icons form-icon">lock_outline</span>
            </div>
            <?php /*
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="check-remember-me">
                <label class="custom-control-label" for="check-remember-me">Remember me</label>
              </div>
            </div> */ ?>
            <div class="form-group">
              <button class="btn btn-warning btn-block flat">Logar</button>
            </div>
            <!--div class="form-group">
              <a href="#" class="btn btn-outline-primary btn-block rounded-0 btn-sign-up">Pedir nova Senha</a>
            </div-->
          </form>
        </div>


        <div class="col-12 p-4 my-4 sign-up-v1">
          <h5 class="mb-4 text-center">Redefinição de Senha</h5>
          <form>
            <div class="form-row">
              <div class="form-group form-group-icon col-md-6">
                <input type="email" class="form-control cs-form" placeholder="First name">
                <span class="material-icons form-icon pl-1">person_outline</span>
              </div>
              <div class="form-group form-group-icon col-md-6">
                <input type="password" class="form-control cs-form" id="inputPassword4" placeholder="Last name">
                <span class="material-icons form-icon pl-1">person_outline</span>
              </div>
            </div>
            <div class="form-group form-group-icon">
              <input type="text" class="form-control cs-form" name="" placeholder="Username" autocomplete="off">
              <span class="material-icons form-icon">person_outline</span>
            </div>
            <div class="form-group form-group-icon">
              <input type="email" class="form-control cs-form" name="" placeholder="Email" autocomplete="off">
              <span class="material-icons form-icon">email</span>
            </div>
            <div class="form-group form-group-icon">
              <input type="text" class="form-control cs-form" name="" placeholder="Password" autocomplete="off">
              <span class="material-icons form-icon">lock_outline</span>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="check-terms">
                <label class="custom-control-label" for="check-terms">I read and agree to the <a href="#">terms of usage</a></label>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-warning btn-block flat wave">Create</button>
            </div>
            <div class="form-group">
              <a href="#" class="btn btn-outline-primary btn-block rounded-0 btn-sign-in">Sign In Now</a>
            </div>
          </form>
        </div>


        <div class="absolute-bottom p-3 bg-opc font-14 text-muted text-center">@Copyright 2018 - Intranet Help! <small>todos os direitos reservados</small></div>
      </div>
  </div>

	<script type="text/javascript" src="plugins/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="plugins/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="xakti-bs/xakti-bs.js"></script>
  <script type="text/javascript" src="xakti-bs/main.js"></script>
  <script type="text/javascript">
    $('.btn-sign-up').on('click', function(){
      $('.sign-in-v1').hide(500, function(){
        $('.sign-up-v1').show(500);
      });
    });
    $('.btn-sign-in').on('click', function(){
      $('.sign-up-v1').hide(500, function(){
        $('.sign-in-v1').show(500);
      });
    });
  </script>
  </body>
</html>
