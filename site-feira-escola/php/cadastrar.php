<?php
/* PHP PARA CADASTRAR USUÁRIO NO BANCO DE DADOS (SÓ PARA TESTES) */
require_once "connect.php";

$nome = "Willyan";	 //Insira o nome aqui
$senha = "277353isart"; //insira a senha aqui
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$query = "INSERT INTO usuarios(user, senha) VALUES ('$nome','$senha_hash')";
mysqli_query($connect, $query) or die('Não foi possível realizar o cadastro');