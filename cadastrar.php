<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
include('conexao.php');
require('bd.lib.php');
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
if($nome == ''|| $descricao == ''|| $usuario == ''|| $senha == '' ){
	echo "Faltam dados a serem preenchidos";
	echo "<br><a href='cadastro.html'>Tentar novamente</a>";
}
else
	insert($nome, $descricao, $usuario, $senha);
?>
<body>

</body>
</html>
