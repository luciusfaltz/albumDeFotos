<!DOCTYPE html>
<html>
<head>
	<title>Álbum de fotos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
	session_start();
	if (isset($_SESSION['usuario']) && isset($_SESSION['id'])){
		require_once('bd.lib.php');
		$id = $_SESSION['id'];
		$user = $_SESSION['usuario'];
		$nome = $_SESSION['nome'];
		$descricao = $_SESSION['descricao'];
	}
?>
<style type="text/css">
	body{
		margin: 0px;
	}
</style>
<body>
	<a class='sair' href="logout.php"><button>Sair</button></a>

	<?php echo "<h1>Bem vinda(o) $nome!</h1><h2>$descricao</h2>"; ?>
	<br><br>
	<a class="postar" href='postar.html'><button>Postar foto</button></a>
 	<h2>Álbum</h2>
 	<?php
 		selectFoto($id, $user);

 	?>

</body>
</html>