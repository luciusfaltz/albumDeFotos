<!DOCTYPE html>
<html>
<head>
	<title>Postagem</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
	session_start();
	if (isset($_SESSION['usuario']) && isset($_SESSION['id'])) {
		require_once('bd.lib.php');
		$id = $_SESSION['id'];
		$usuario = $_SESSION['usuario'];
		$nome = $_SESSION['nome'];
		$descrImg = $_POST['descricao'];
		$foto = $_FILES['foto'];

		$diretorio = './img/'.$usuario.'/';
		move_uploaded_file($foto["tmp_name"], $diretorio.$foto["name"]);
		inserirFoto($id, $descrImg, $foto["name"]);
	}

?>
<body>

</body>
</html>
