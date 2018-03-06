<html>
<head>
<title></title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
	<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
	?>
<form action="http://191.252.185.13/wallet/api.php" method="POST" id="newaddressform">
	<input type="hidden" name="action" value="new_address" />
	<input type="text" name="nome">
	<button type="submit" class="btn btn-default"><?php echo "Gerar carteira"; ?></button>
</form>
<form action="http://191.252.185.13/wallet/api.php" method="GET" id="newaddressform">
	<input type="hidden" name="action" value="saldo" />
	<input type="text" name="nome">
	<button type="submit" class="btn btn-default"><?php echo "Submeter"; ?></button>
</form>
<form action="http://191.252.185.13/wallet/api.php" method="POST" id="newaddressform">
	<input type="hidden" name="action" value="address" />
	<input type="text" name="nome">
	<button type="submit" class="btn btn-default"><?php echo "Submeter"; ?></button>
</form>
<form>
<input id="go" type="button" value="Diga ola ao REST"/>
</form>
<script type="text/javascript">

$(document).ready(function() {

$('#go').click(function()

{
alert("Hello! I am an alert box!!");
$.ajax({

url: "api2.php",

dataType: 'json'

}).done(function(data) {

alert(data.mensagem);
alert("teste");

});

})

});

</script>
</body>
</html>

