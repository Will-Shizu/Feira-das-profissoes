<?php
if (!isset($_POST['id'])) {
	header('location: ../index.html');
	die("Os dados não foram corretamente declarados");
}

require_once "connect.php";

$id = $_POST['id'];
$query = "SELECT * FROM duvidas WHERE id=$id AND respondido=1";
$return = mysqli_query($connect, $query);
$rows = mysqli_num_rows($return);

if ($rows == 0){
	$query = "UPDATE duvidas SET respondido = 1 WHERE id = $id;";
	mysqli_query($connect, $query) or die('Não foi possível alterar o banco de dados.');
	echo 0;
}

else {
	echo 1;
}

