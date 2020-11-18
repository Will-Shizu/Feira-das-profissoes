<?php
if ((!isset($_POST['nome'])) or (!isset($_POST['email'])) or (!isset($_POST['pergunta']))) {
	header("location: ../index.html");
	die("Os dados não foram corretamente declarados");
}

require_once "connect.php";

$nome = $_POST['nome'];
$email =  $_POST['email'];
$pergunta = $_POST['pergunta'];

$query = "SELECT * FROM duvidas WHERE nome='$nome' AND email='$email' AND pergunta='$pergunta';";
$return = mysqli_query($connect, $query);
$rows = mysqli_num_rows($return);

if ($rows == 0) {
	$query = "INSERT INTO duvidas (nome, email, pergunta) VALUES ('$nome','$email','$pergunta')";
	mysqli_query($connect, $query) or die("Não foi possível enviar a pergunta.");	
}