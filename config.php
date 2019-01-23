<?php
header('Content-Type: text/html; charset=utf-8');

define('URL_SITE', ".");			// Caminho até a pasta de inicio home (index.php)
define('PASTA_PARTS', "parts");			// Pasta Onde está os recortes do site

//====================== DEFINIÇÕES DA PAGINA

// Constante que apresenta a descrição do site
define('SITE_DESC', "descrição site"); 

// Descrição com o nome do autor do site
define('SITE_AUTHOR', "autor site"); 

// descrição com o nome do site
define('SITE_NAME', "nome do site");

// descrição com o titulo do site 
define('SITE_TITLE', "titulo do site");

// Mais descrição do site
define('SITE_DESC', "descrição site"); 

// Constante com a quantidade de tentativas aceitas
define('TENTATIVAS_ACEITAS', 200); 

// Constante com a quantidade minutos para bloqueio
define('MINUTOS_BLOQUEIO', 120); 

// Constante para HABILITAR ou não a vefificação da origem do login (1 para habilitar; 0 para desabilitar)
define('VERIFICA_PAGINA', 0);

// Constante contendo pagina que pode receber o formulário de login
define('PAGINA', 'http://localhost:8090/login/index.php');

// Constante contendo pagina que pode receber o formulário de login
define('PAGINA2', 'http://localhost:8090/login/');

include_once 'functions.php';
?>