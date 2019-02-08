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

// Recebe os dados do formulário
$login = (isset($_POST['login'])) ? $_POST['login'] : '' ;
$senha = (isset($_POST['pass'])) ? $_POST['pass'] : '' ;

// Construtor mensagem de erro
function mensagemLogin($noticia, $tipo="danger"){
  $errologin = '<small><div class="alert alert-'.$tipo.' alert-dismissible fade show" id="login-alert" role="alert">';
  $errologin.= '  <div id="mensagem"><strong>Erro!</strong> '.$noticia.'</div>';
  $errologin.= '  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="font-size:1.2rem">';
  $errologin.= '    <span aria-hidden="true">&times;</span>';
  $errologin.= '  </button>';
  $errologin.= '</div></small>';
  return $errologin;
}

// Dica 2 - Validações de preenchimento e-mail e senha se foi preenchido o e-mail
if (empty($login) and empty($senha)){
	$retorno = array('codigo' =>  '', 'mensagem' => mensagemLogin('Preencha seu login e senha!'));
  echo json_encode($retorno);
  exit();
};
if (empty($login)){
	$retorno = array('codigo' =>  '', 'mensagem' => mensagemLogin('Preencha seu login!'));
	echo json_encode($retorno);
	exit();
};
if (empty($senha)){
	$retorno = array('codigo' =>  '', 'mensagem' => mensagemLogin('Preencha sua senha!'));
  echo json_encode($retorno);
  exit(); 
};

//Usuario inativo
//$retorno = array('codigo' =>  '', 'mensagem' => mensagemLogin('Usuário inativo!','secondary'));

// Dica 3 - Verifica se o usuário já excedeu a quantidade de tentativas erradas do dia
$sql = "SELECT count(*) AS tentativas, MINUTE(TIMEDIFF(NOW(), MAX(data_hora))) AS minutos ";
$sql .= "FROM tab_userlogin_error WHERE ip = ? and DATE_FORMAT(data_hora,'%Y-%m-%d') = ? AND bloqueado = ?";
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $_SERVER['REMOTE_ADDR']);
$stm->bindValue(2, date('Y-m-d'));
$stm->bindValue(3, 'SIM');
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);

if (!empty($retorno->tentativas) && intval($retorno->minutos) <= MINUTOS_BLOQUEIO){
	$_SESSION['tentativas'] = 0;
	$retorno = array('codigo' => "0", 'mensagem' => mensagemLogin('Você excedeu o limite de '.TENTATIVAS_ACEITAS.' tentativas, login bloqueado por '.MINUTOS_BLOQUEIO.' minutos!'),'warning');
	echo json_encode($retorno);
	//$error='Você excedeu o limite de '.TENTATIVAS_ACEITAS.' tentativas, login bloqueado por '.MINUTOS_BLOQUEIO.' minutos!';
	setcookie("msgerro", $error, time()+3600);
	header('Location: /login/index.php');
	exit();
};


// Dica 4 - Válida os dados do usuário com o banco de dados
$sql = 'SELECT id, user, nome, senha, email,sexo, userLvl, foto, postagem, pai FROM tab_usuario WHERE user = ? AND status = ? LIMIT 1';
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $login);
$stm->bindValue(2, 'A');
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);


// Dica 5 - Válida a senha utlizando a API Password Hash
if(!empty($retorno) && password_verify($senha, $retorno->senha)){

	$sql2="SELECT * FROM `tab_usernivel` WHERE `nivel` LIKE '".$retorno->userLvl."'";
	$stm2 = $conexao->prepare($sql2);
	$stm2->execute();
	$retorno2 = $stm2->fetch(PDO::FETCH_OBJ);

	$_SESSION['nivel'] = $retorno2->nome;
	$_SESSION['niveldesc'] = $retorno2->descricao;
	$_SESSION['nivelid'] = $retorno->userLvl;

	$sql3="SELECT nome FROM `tab_usuario` WHERE `id` LIKE '".$retorno->pai."'";
	$stm3 = $conexao->prepare($sql3);
	$stm3->execute();
	$retorno2 = $stm3->fetch(PDO::FETCH_OBJ);
	$Nivelnome = $retorno3->nome;

	$_SESSION['paiNome'] = $retorno2->nome;
	$_SESSION['pai_id'] = $retorno->pai;

	$_SESSION['id'] = $retorno->id;
	$_SESSION['user'] = $retorno->user;
	$_SESSION['nome'] = $retorno->nome;
	$_SESSION['sexo'] = $retorno->sexo;
	$_SESSION['email'] = $retorno->email;
	$_SESSION['tentativas'] = 0;
	$_SESSION['foto'] = $retorno->foto;
	$_SESSION['postagem'] = $retorno->postagem;
	$_SESSION['logado'] = 'SIM';
}else{
	$_SESSION['logado'] = 'NAO';
	$_SESSION['tentativas'] = (isset($_SESSION['tentativas'])) ? $_SESSION['tentativas'] += 1 : 1;
	$bloqueado = ($_SESSION['tentativas'] == TENTATIVAS_ACEITAS) ? 'SIM' : 'NAO';

	// Dica 6 - Grava a tentativa independente de falha ou não
	$sql = 'INSERT INTO tab_userlogin_error (ip, email, senha, origem, bloqueado) VALUES (?, ?, ?, ?, ?)';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $_SERVER['REMOTE_ADDR']);
	$stm->bindValue(2, $login);
	$stm->bindValue(3, $senha);
	$stm->bindValue(4, $_SERVER['HTTP_REFERER']);
	$stm->bindValue(5, $bloqueado);
	$stm->execute();
};


// Se logado envia código 1, senão retorna mensagem de erro para o login
if ($_SESSION['logado'] == 'SIM'){

	$sql = 'INSERT INTO `tab_userlogin_sucess` (`ip`, `login`, `origem`) VALUES (?, ?, ?)';

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $_SERVER['REMOTE_ADDR']);
	$stm->bindValue(2, $login);
	$stm->bindValue(3, $_SERVER['HTTP_REFERER']);
	$stm->execute();
	
  $retorno = array('codigo' => 1, 'mensagem' => 'Logado com sucesso!');
  echo json_encode($retorno);
	exit();

}else{
	if ($_SESSION['tentativas'] == TENTATIVAS_ACEITAS){
		
    $retorno = array('codigo' => 0, 'mensagem' => mensagemLogin('Você excedeu o limite de '.TENTATIVAS_ACEITAS.' tentativas, login bloqueado por '.MINUTOS_BLOQUEIO.' minutos!'),'warning');
    echo json_encode($retorno);
    exit();

	}else{

		$retorno = array('codigo' => '0', 'mensagem' => mensagemLogin('Usuário não autorizado, você tem mais '. (TENTATIVAS_ACEITAS - $_SESSION['tentativas']) .' tentativa(s) antes do bloqueio!'));
    echo json_encode($retorno);
    exit();
	};
};