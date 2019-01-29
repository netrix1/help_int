<?php
session_start();

if(!isset($_SESSION['logado']) or !isset($_SESSION)){
	header("Location: logar.php");
};

?>