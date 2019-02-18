<?php

function tpNivel($tpNivel){ //retorn um select com todos os Niveis de usuarios cadastrados no banco de dados
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT nome FROM `tab_usernivel` WHERE `nivel` = ".$tpNivel;
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$retorno = $stm->fetch(PDO::FETCH_OBJ);
	echo $retorno->nome;
	unset($stm);
}

function selectUserLvl($nomeID){ //retorn um select com todos os Niveis de usuarios cadastrados no banco de dados
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT id, nivel, nome FROM `tab_usernivel` WHERE `status` = \"A\"";
	$stm = $conexao->prepare($sql);
	$stm->execute();

	$result = $stm -> fetchAll();
	$html ="<select class=\"form-control\" name=\"".$nomeID."\">";
	$html.="<option disabled hidden selected>Nível de Previlégio do usuario</option>";
	foreach( $result as $row ) {
		$html.= "<option value=\"".$row['nivel']."\">".$row['nome']."</option>";
	}
	$html.="</select>";
	unset($stm);
	return $html;
}

function selectPai($nomeID){ //retorn um select com todos os Niveis de usuarios cadastrados no banco de dados
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT id, nome FROM `tab_usuario`	WHERE `userLvl` = 6 or `userLvl`= 9 or `userLvl`= 21 or `userLvl`= 30 or `userLvl`= 31 or `userLvl`= 32 ORDER BY `userLvl` ASC";
	$stm = $conexao->prepare($sql);
	$stm->execute();

	$result = $stm -> fetchAll();
	$html ="<select class=\"form-control\" name=\"".$nomeID."\">";
	$html.="<option disabled hidden selected>Escolha o Usuário Responsavel</option>";
	foreach( $result as $row ) {
		$html.= "<option value=\"".$row['id']."\">".$row['nome']."</option>";
	}
	$html.="</select>";
	unset($stm);
	return $html;
}

function pegaUsuario($id){// pega o nome do usuario pela ID
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT nome FROM `tab_usuario` WHERE `id` = ".$id;
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$result = $stm -> fetch();
	$result = $result[0];
	return $result;
}

function criaNome(){ // cria nome aleatórios para a utilização nas fotos de usuarios
		$tamanho = mt_rand(11,13);
		$all_str = "abcdefghijlkmnopqrstuvxyzwABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$nome = "";
		for ($i = 0;$i <= $tamanho;$i++){
			$nome .= $all_str[mt_rand(0,61)];
		}
		return $nome;
}

function limita_caracteres($texto, $limite, $quebra = true){ // Limita caracteres de um texto com ou sem a quebra da palavra
	$tamanho = strlen($texto);
	if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
		$novo_texto = $texto;
	}else{ // Se o tamanho do texto for maior que o limite
		if($quebra == true){ // Verifica a opção de quebrar o texto
			$novo_texto = trim(substr($texto, 0, $limite))." [...]";
		}else{ // Se não, corta $texto na última palavra antes do limite
			$ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
			$novo_texto = trim(substr($texto, 0, $ultimo_espaco))." [...]"; // Corta o $texto até a posição localizada
		}
	}
	return $novo_texto; // Retorna o valor formatado
}


function tempo_corrido($time) { // mostra tempo da postagem de forma amigável
date_default_timezone_set('America/Sao_Paulo');
$now = strtotime(date('m/d/Y H:i:s'));
	$time = strtotime($time);
	$diff = $now - $time;
	$seconds = $diff;
	$minutes = round($diff / 60);
	$hours = round($diff / 3600);
	$days = round($diff / 86400);
	$weeks = round($diff / 604800);
	$months = round($diff / 2419200);
	$years = round($diff / 29030400);
	if ($seconds <= 60) return "Agora pouco";
	else if ($minutes <= 60) return $minutes==1 ?'1 min atrás':$minutes.' minu atrás';
	else if ($hours <= 24) return $hours==1 ?'1 hrs atrás':$hours.' horas atrás';
	else if ($days <= 7) return $days==1 ?'1 dia atras':$days.' dias atrás';
	else if ($weeks <= 4) return $weeks==1 ?'1 semana atrás':$weeks.' semanas atrás';
	else if ($months <= 12) return $months == 1 ?'1 mês atrás':$months.' meses atrás';
	else return $years == 1 ? 'um ano atrás':$years.' anos atrás';
}



function pegaFoto($id){
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT foto FROM `tab_usuario` WHERE `id` = ".$id;
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$result = $stm -> fetch();
	$result = $result[0];
	if ($result == "") {
		$result="defaut.png";
	}
	return $result;
}
function NomeNivelUsuario($tpNivel){
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT nome FROM `tab_usernivel` WHERE `nivel` = ".$tpNivel;
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$retorno = $stm->fetch(PDO::FETCH_OBJ);
	echo $retorno->nome;
	unset($stm);
}

function pegaNoticias(){
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT * FROM `tab_posts` ORDER BY `tab_posts`.`id` DESC LIMIT 3";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);

	return $retorno;
	unset($stm);
}

function pegaNoticia($noticiaId){
	require_once 'conexao.php';
	$conexao = conexao::getInstance();
	$sql = "SELECT * FROM `tab_posts` WHERE `id`=".$noticiaId;
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$retorno = $stm->fetch(PDO::FETCH_ASSOC);

	return $retorno;
	unset($stm);
}
