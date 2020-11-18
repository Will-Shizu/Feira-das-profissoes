const form = document.getElementById('form_pergunta');

form.addEventListener('submit', function(e) {
	e.preventDefault();
	enviar();
})

function enviar() {
	let nome = document.getElementById('nome')
	let email = document.getElementById('email')
	let pergunta = document.getElementById('pergunta')

	var dados = new FormData()
	dados.append('nome', nome.value)
	dados.append('email', email.value)
	dados.append('pergunta', pergunta.value)

	$.ajax({
		url: "php/enviar.php",
		method: "POST",
		data: dados,
		processData: false,
		contentType: false
	}).done(function() {
		nome.value = ''
		email.value = '';
		pergunta.value = '';
		document.getElementById('msg_envio').innerText = 'Pergunta enviada com sucesso!';
	})
}