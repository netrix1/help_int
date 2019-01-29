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

function selectUserLvl(){ //retorn um select com todos os Niveis de usuarios cadastrados no banco de dados
  require_once 'conexao.php';
  $conexao = conexao::getInstance();
  $sql = "SELECT id, nivel, nome FROM `tab_usernivel`";
  $stm = $conexao->prepare($sql);
  $stm->execute();

  $result = $stm -> fetchAll();
  $html ="<select class=\"form-control\">";
  foreach( $result as $row ) {
    $html.= "<option value=\"".$row['nivel']."\">".$row['nome']."</option>";
  }
  $html.="</select>";
  unset($stm);
  return $html;
}