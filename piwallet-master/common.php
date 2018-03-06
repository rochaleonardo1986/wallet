<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();

define("WITHDRAWALS_ENABLED", true);

include('jsonRPCClient.php');
include('classes/Client.php');
include('classes/User.php');


function satoshitize($satoshitize) {
   return sprintf("%.8f", $satoshitize);
}


function satoshitrim($satoshitrim) {
   return rtrim(rtrim($satoshitrim, "0"), ".");
}

$server_url = "/";

$db_host = "localhost";
$db_user = "root";
$db_pass = "260480tmk";
$db_name = "wallet";

$rpc_host = "localhost";
$rpc_port = "31836";
$rpc_user = "bitmillionrpc";
$rpc_pass = "DogwDS4WiBdzrptRADsZboorQCfACvjL7MqjbNeM57ib";

$fullname = "Bitmillion";
$short = "BTM";
$blockchain_url = "37.97.242.80";
$support = "suporte@martexcoin.org";
$hide_ids = array(1);
$donation_address = "M8DSVG13j3qpNDRbuuUBh5juQmSd15wLXH";
?>
