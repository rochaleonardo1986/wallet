<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '260480tmk';
$banco = 'coin';
$con = mysqli_connect($servidor,$usuario,$senha,$banco)or die(mysqli_error($con));
$conadm = mysqli_connect($servidor,$usuario,$senha,$banco)or die(mysqli_error($conadm));

  mysqli_select_db($con,$banco);
  mysqli_select_db($conadm,$banco);

include('common.php');
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$balance = 0;
switch ($_GET['action']) {
	case "enviar":
$usuario = $_GET['nome'];
$chave = $_GET['chave'];
$query = mysqli_query($conadm,"SELECT * FROM users WHERE usuario_login='$usuario' and chave='$chave'")or die(mysqli_error($conadm));
if(mysqli_num_rows($query) > 0){

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
}
	break;
          }
        header("Access-Control-Allow-Origin: *");
        //echo json_encode($object);
?>

