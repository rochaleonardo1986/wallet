<?php
$error = array('type' => "none", 'message' => "");
include('common.php');
$balance = 0;
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$object = new stdclass();
switch ($_GET['action']) {
  case "balance":
  $noresbal = $client->getBalance($_GET['nome']);
  $resbalance = $client->getBalance($_GET['nome']) - $reserve;
  $transactionList = $client->getTransactionList($_GET['nome']);
  foreach($transactionList as $transaction) {
    if($transaction['category']=="send") { $balance = $balance-abs($transaction['amount'])-0.0001; } else { $balance = $balance+abs($transaction['amount']); }
  }
  if($balance <= 0){
    $balance = 0;
  }
  else{
    $balance = $balance-0.0001;
  }
  echo $balance;
  break;
  case "address":
  $addressList = $client->getAddressList($_GET['nome']);
  foreach ($addressList as $address)
  {
      $carteira = $address;
  }
  echo $carteira;
  break;
  case "newaddress":
$user_session = $_GET['nome'];
   $client->getnewaddress($_GET['nome']);
  break;
  case "transacao":
$addressList = $client->getAddressList($_GET['address']);
 foreach ($addressList as $address)
 {
     $carteira = $address;
 }

$user_session = $_GET['nome'];
  $noresbal = $client->getBalance($_GET['nome']);
  $resbalance = $client->getBalance($_GET['nome']) - $reserve;
  $transactionList = $client->getTransactionList($_GET['nome']);
  foreach($transactionList as $transaction) {
    if($transaction['category']=="send") { $balance = $balance-abs($transaction['amount'])-0.0001; } else { $balance = $balance+abs($transaction['amount']); }
  }
  if($balance <= 0){
    $balance = 0;
  }
  else{
    $balance = $balance-0.0001;
  }
if ($_GET['amount'] > $balance) {

                    $json['message'] = "0";
		    echo "0";
                } else {
                    $withdraw_message = $client->withdraw($user_session, $carteira, (float)$_GET['amount']);
                    $_SESSION['token'] = sha1('@s%a$l£t#'.rand(0,10000));
                    $json['newtoken'] = $_SESSION['token'];
                    $json['success'] = true;
                    $json['message'] = "Withdrawal successful";
                    $json['balance'] = $client->getBalance($user_session);
                    $json['addressList'] = $client->getAddressList($user_session);
                    $json['transactionList'] = $client->getTransactionList($user_session);
echo "1";
                }

  break;
case "wtransacao":
     $carteira = $_GET['address'];

$user_session = $_GET['nome'];
  $noresbal = $client->getBalance($_GET['nome']);
  $resbalance = $client->getBalance($_GET['nome']) - $reserve;
  $transactionList = $client->getTransactionList($_GET['nome']);
  foreach($transactionList as $transaction) {
    if($transaction['category']=="send") { $balance = $balance-abs($transaction['amount'])-0.0001; } else { $balance = $balance+abs($transaction['amount']); }
  }
  if($balance <= 0){
    $balance = 0;
  }
  else{
    $balance = $balance-0.0001;
  }
if ($_GET['amount'] > $balance) {
                    $json['message'] = "0";
                    echo "0";
                } else {
                    $withdraw_message = $client->withdraw($user_session, $carteira, (float)$_GET['amount']);
                    $_SESSION['token'] = sha1('@s%a$l£t#'.rand(0,10000));
                    $json['newtoken'] = $_SESSION['token'];
                    $json['success'] = true;
                    $json['message'] = "Withdrawal successful";
                    $json['balance'] = $client->getBalance($user_session);
                    $json['addressList'] = $client->getAddressList($user_session);
                    $json['transactionList'] = $client->getTransactionList($user_session);
echo "1";
                }
break;


}
header("Access-Control-Allow-Origin: *");
//echo json_encode($object);
?>

