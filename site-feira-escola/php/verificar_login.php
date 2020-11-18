<?php
if ( (!isset($_POST['usuario'])) or (!isset($_POST['senha'])) ) {
	header("location: ../login.html");
	die("Os dados não foram corretamente declarados");
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

require_once "connect.php";

$query = "SELECT * FROM usuarios WHERE user='$usuario';";
$return = mysqli_query($connect, $query);
$rows = mysqli_num_rows($return);

if($rows == 0) {
	echo "Usuário inválido!";
}

elseif($rows > 1) {
	echo "Erro desconhecido! entre em contato com o desenvolvedor.";
}

elseif($rows == 1) {
	while ($data = mysqli_fetch_assoc($return)) {
		$senhaDB = $data['senha'];
	}

	if (!password_verify($senha, $senhaDB)) {
		echo "Senha incorreta!";
	}

	else {
		echo "Logado com sucesso!";
	}
}