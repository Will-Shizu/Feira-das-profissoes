const option1 = document.getElementById('op_1');
const option2 = document.getElementById('op_2');
window.onload = exibir(0);

function exibir(resp) {
	if (resp == 0) {
		option1.style.color = '#ffe338';
		option2.style.color = '#fff';
	}

	else if (resp == 1) {
		option1.style.color = '#fff';
		option2.style.color = '#ffe338';
	}

	let dados = new FormData();
	dados.append('resp', resp);

	$.ajax({
		url: 'php/lerPerguntas.php',
		method: 'POST',
		data: dados,
		processData: false,
		contentType: false
	}).done(function(msgs) {
		let duvidas = document.getElementById('duvidas');
		if (msgs == "<div class='duvida'><h3>Sistema</h3><p>Sem mensagens nessa caixa de entrada.</p></div>") {
			duvidas.style.textAlign = "center";
		}

		else {
			duvidas.style.textAlign = "left";
		}
		duvidas.innerHTML = msgs;
	})
}

function setRespondido(id) {
	let dados = new FormData();
	dados.append('id', id);

	$.ajax({
		url: 'php/setRespondido.php',
		method: 'POST',
		data: dados,
		processData: false,
		contentType: false
	}).done(function(re) {
		if (re == 0) {
			exibir(re);
		}
	})
}