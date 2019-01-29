<?php
require "conexao.php";
require_once 'verifica_sessao.php';


$sql = "INSERT INTO tab_usuario(nome, email, senha, status)VALUES('{$nome}', '{$email}', '{$senha}', 'Ativo')";

$sql2 = "INSERT INTO `tab_usuario` (`id`, `user`, `senha`, `nome`, `sexo`, `email`, `userLvl`, `status`, `pai`, `foto`, `postagem`)";
$sql2.= "VALUES (NULL, 'victor', 'huehuehue', 'Victor Hugo', 'M', 'victor@helpmaiscredito.com.br', '32', 'A', '1', '', '');";

$updatesenha = "UPDATE `tab_usuario` SET `senha` = '$2y$10$aLEi/my0mdZi2LGN9erIXeaxkAskfv9gh4UTmNqVWVjRtUFjYjroW' WHERE `tab_usuario`.`id` = 6";


if (!isset($_POST['user'])) {
	echo "Usuario não informado";
}elseif (!isset($_POST['senha'])) {
	echo "Senha não informada";
}elseif (!isset($_POST['nome'])) {
	echo "Nome não informado";
}elseif (!isset($_POST['sexo'])) {
	echo "sexo não informado";
}elseif (!isset($_POST['userLvl'])) {
	echo "nivel de Usuário não setado";
}elseif (!isset($_POST['pai'])) {
	echo "Responsavel não Setado";
}else{
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$conexao = conexao::getInstance();

	$sql2 = "INSERT INTO `tab_usuario` (`id`, `user`, `senha`, `nome`, `sexo`, `email`, `userLvl`, `status`, `pai`, `foto`, `postagem`, `data_criacao`, `user_criacao`)";
	
	$sql2.= "VALUES (NULL, \"".$_POST['user']."\", \"".$senha."\", \"".$_POST['nome']."\", \"".$_POST['sexo']."\", \"".$_POST['email']."\", \"".$_POST['userLvl']."\", 'A', \"".$_POST['pai']."\", \"".$_POST['foto']."\", '', NOW(), \"".$_SESSION['id']."\")";

}
echo $sql2;

echo "<pre>";
var_dump($_POST);
echo "</pre>";


$stm = $conexao->prepare($sql2);
$stm->execute();

unset($stm);

?>