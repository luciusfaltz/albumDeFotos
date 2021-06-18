<?php
function insert ($nome, $descr, $user, $senha){
	include('conexao.php');
	$insert = "insert into usuario (login, senha, nome, descricao) values ('$user', AES_ENCRYPT('$senha','1234'), '$nome', '$descr')";
	$resultado = mysqli_query($conexao, $insert);
	$qtdLinhas = mysqli_affected_rows($conexao);
	if($qtdLinhas == 1)
	{
		mkdir('./img/'.$user, 0777, true);
		echo "Cadastro concluído, realize seu login!<br><br>";
		echo "<a href='login.html'>Fazer Login</a>";
	}
	else
	{
		echo "Ocorreu um erro no cadastro.<br><br>";
		echo "<a href= 'cadastro.html'>Cadastrar novamente</a>";
	} 
};
function login ($user, $senha){
	include('conexao.php');
	$consulta = "select * from usuario where login='$user' and senha=AES_ENCRYPT('$senha','1234')";
	$resultado = mysqli_query($conexao, $consulta);
	$registro = mysqli_fetch_row($resultado);
	$idUsuario = $registro[0];
	$login = $registro[1];
	$nome = $registro[3];
	$descricao = $registro[4];
	$usuarioEncontrado = mysqli_affected_rows($conexao);
	if ($usuarioEncontrado == 1)
	{
		session_start();
		$_SESSION['usuario'] = $login;
		$_SESSION['id'] = $idUsuario;
		$_SESSION['nome'] = $nome;
		$_SESSION['descricao'] = $descricao;
		header("Location: album.php");
	}
	else
	{
		echo "Usuário ou Senha inválidos :(<br> Tente novamente. <a href='login.php'>Voltar</a>";
	}
}

function inserirFoto ($idUsuario, $descr, $foto){
	include('conexao.php');
	$insert = "insert into foto (usuario_id, descricao, arquivo) values ('$idUsuario', '$descr', '$foto')";
	$resultado = mysqli_query($conexao, $insert);
	$qtdLinhas = mysqli_affected_rows($conexao);
	if($qtdLinhas == 1)
	{
		echo "Foto enviada com sucesso!<br><br>";
		echo "<a href='album.php'>Álbum de fotos</a>";

	}
	else
	{
		echo "Ocorreu um erro no envio da foto.<br><br>";
		echo "<a href= 'postar.html'>Tentar novamente</a>";
	} 
}

function selectFoto ($idUsuario, $user){
	include('conexao.php');
	$select = "select * from foto where usuario_id='$idUsuario'";
	$resultado = mysqli_query($conexao, $select);
	$linhas = mysqli_num_rows($resultado);

	for ($i=0; $i < $linhas ; $i++) { 
		$registro = mysqli_fetch_row($resultado);
		$descricaoImg = $registro[2];
		$foto = $registro[3];
		echo "<figure>";
		echo "<img src='./img/$user/$foto'>";
		echo "<figcaption>$descricaoImg</figcaption>";
		echo "</figure>";
	}
}

function logout(){
	session_start();
	session_destroy();
	header("Location: login.html");
}


?>