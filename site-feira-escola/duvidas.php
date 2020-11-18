<!-- VALIDADANDO SE OS DADOS FORAM DECLARADOS -->
<?php

if ( (!isset($_POST['usuario'])) or (!isset($_POST['senha'])) ) {
	echo "<script>location.replace('login.html')</script>";
	die();
}
else {
	include_once "php/connect.php";
	$user = $_POST['usuario'];
	$senha = $_POST['senha'];
	$query = "SELECT * FROM usuarios WHERE user='$user';";
	$return = mysqli_query($connect, $query);
	$rows = mysqli_num_rows($return);
	
	if ($rows == 1) {
		while($value = mysqli_fetch_assoc($return)) {
			$senhaDB = $value['senha'];
		}

		if (!password_verify($_POST['senha'], $senhaDB)) {
			echo "<script>location.replace('login.html')</script>";
			die();
		}
	}

	else {
		echo "<script>location.replace('login.html')</script>";
		die();
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="André Willyan">
	<title>ADM - Dúvidas</title>
	<link rel="icon" href="img/adm.png">
	<link rel="stylesheet" href="css/style-duvidas.css">
</head>

<body>
	<header>
		<h1>DÚVIDAS</h1>
		<h2>Bem vindo(a), <span style="color: #ffe338;"><?php echo"$user"?></span>!</h2>
	</header>

	<section id="menu">
		<ul>
			<li id="op_1" class="right-border" onclick="exibir(0)">Pendentes</li>
			<li id="op_2" onclick="exibir(1)">Respondidas</li>
		</ul>
	</section>

	<section id="duvidas">
		<!-- AQUI FICARÃO AS PERGUNTAS -->
		<div class="duvida">
			<h3><!-- NOME DO USUÁRIO --></h3>
			<p><!-- PERGUNTA --></p>
			<div id="responder">
				<a href="mailto:" target="_blank" onclick="setRespondido()"><!-- BOTÃO DE RESPONDER--></a>
			</div>
		</div>
	</section>
</body>

<script src="js/jquery-3.5.1.js"></script>
<script src="js/scriptDuvidas.js"></script>
</html>