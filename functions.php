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
  $sql = "SELECT id, nome FROM `tab_usuario`  WHERE `userLvl` = 6 or `userLvl`= 9 or `userLvl`= 21 or `userLvl`= 30 or `userLvl`= 31 or `userLvl`= 32 ORDER BY `userLvl` ASC";
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

function criaNome(){ // cria nome aleatórios para a utilização nas fotos de usuarios
    $tamanho = mt_rand(11,13);
    $all_str = "abcdefghijlkmnopqrstuvxyzwABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $nome = "";
    for ($i = 0;$i <= $tamanho;$i++){
      $nome .= $all_str[mt_rand(0,61)];
    }
    return $nome;
}