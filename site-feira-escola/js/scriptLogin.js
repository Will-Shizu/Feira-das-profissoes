const form = document.getElementById('form_login');
form.addEventListener('submit', function(e) {
	e.preventDefault();
})

function validar() {

	let dados = new FormData();
	dados.append('usuario',document.getElementById('user').value);
	dados.append('senha',document.getElementById('pw').value);

	$.ajax({
		url: 'php/verificar_login.php',
		method: 'POST',
		data: dados,
		processData: false,
		contentType: false,
	}).done(function(msg) {
			document.getElementById('aviso').innerText = msg;
			if (msg == "Logado com sucesso!") {
				form.action = "duvidas.php";
				form.method = 'POST';
				form.submit(); 
			}
		})
}
