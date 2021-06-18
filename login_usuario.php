<!DOCTYPE html>
<html>
<head>
	<title>Logando...</title>
	<?php
	require('bd.lib.php');
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	login($login, $senha);
?>
</head>
<?php
	require('bd.lib.php');
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	login($login, $senha);
?>
<body>

</body>
</html>
