<?php
if($_GET['a'] == "oi"){
$object = new stdclass();
$object->mensagem = "Hello World!";}
header("Access-Control-Allow-Origin: *");
echo json_encode($object);
?>
