<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

// Require de constantes gerais
require_once 'config.php';

// Require da classe de conexão
require 'conexao.php';

  
// Dica 1 - Verifica se a origem da requisição é do mesmo domínio da aplicação
if (VERIFICA_PAGINA==1){
  if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != PAGINA){
    //$retorno = array('codigo' => "0", 'mensagem' => 'Origem da requisição não autorizada!');
    //echo json_encode($retorno);

    exit();
  };
};

// Instancia Conexão PDO
$conexao = Conexao::getInstance();

$sql2="SELECT * FROM `tab_usernivel` WHERE `nivel` LIKE '32'";


//$stm = $conexao->prepare($sql);

$stm2 = $conexao->prepare($sql2);
$stm2->execute();
$retorno2 = $stm2->fetch(PDO::FETCH_OBJ);

$Nivelnome = $retorno2->nome;
$nivelDesc = $retorno2->descricao;


echo $Nivelnome;echo $nivelDesc;
