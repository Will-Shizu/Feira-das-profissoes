<?php
if (!isset($_POST['resp'])) {
	header("location: ../index.html");
	die("Os dados não foram corretamente declarados");
}

require_once "connect.php";

$resp = $_POST['resp'];

$query = "SELECT * FROM duvidas WHERE respondido = $resp;";
$return = mysqli_query($connect, $query) or die('Não foi possível acessar o servidor');
$rows = mysqli_num_rows($return);

if ($rows > 0) {
	$msgsHTML = ' ';
	while ($line = mysqli_fetch_assoc($return)) {
		$msgsHTML .= "<div class='duvida'>";
		$msgsHTML .= "<h3>".$line['nome']."</h3>";
		$msgsHTML .= "<p>".$line['pergunta']."</p>";
		$msgsHTML .= "<div id='responder'>";
		$msgsHTML .= "<a href='mailto:".$line['email']."' target='_blank' onclick='setRespondido(".$line['id'].")'>Responder</a>";
		$msgsHTML .= "</div>";
		$msgsHTML .= "</div>";
	}
}

else {
	$msgsHTML = "<div class='duvida'><h3>Sistema</h3><p>Sem mensagens nessa caixa de entrada.</p></div>";
}

echo $msgsHTML;