<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
$servidor = 'localhost';
$usuario = 'root';
$senha = '260480tmk';
$banco = 'coin';
$con = mysqli_connect($servidor,$usuario,$senha,$banco)or die(mysqli_error($con));
$conadm = mysqli_connect($servidor,$usuario,$senha,$banco)or die(mysqli_error($conadm));

  mysqli_select_db($con,$banco);
  mysqli_select_db($conadm,$banco);
$usuario = $_GET['login'];
$chave = $_GET['chave'];
  $novousuario = mysqli_query($conadm,"insert into users (usuario_login,chave) values ('{$usuario}', '{$chave}')") or die(mysqli_error($conadm));
?>

