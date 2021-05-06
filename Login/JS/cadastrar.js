function aoClicarBotaoVoltar() {
	window.location.href = "http://localhost/Login/Login/index";
}

function aoSelecionarTipoUsuario() {
	debugger;
	const childrensEstagiario = Array.from(camposEstagiario.children);
	const childrensEmpregador = Array.from(camposEmpregador.children);

	if (radioEstagiario.checked) {
		camposEmpregador.classList.add('d-none');
		camposEstagiario.classList.remove('d-none');

		childrensEstagiario.forEach(el => {

			el.firstElementChild.setAttribute('required', '');
		});
		childrensEmpregador.forEach(el => {

			el.firstElementChild.removeAttribute('required', '');
		});

		return;
	}
	if (radioEmpregador.checked) {
		camposEmpregador.classList.remove('d-none');
		camposEstagiario.classList.add('d-none');

		childrensEstagiario.forEach(el => {

			el.firstElementChild.removeAttribute('required');
		});
		childrensEmpregador.forEach(el => {

			el.firstElementChild.setAttribute('required', '');
		});

		return;
	}
	camposEmpregador.classList.add('d-none');
	camposEstagiario.classList.add('d-none');

}
function aoClicarEntrar() {

	const radioEstagiario = document.querySelector('input[id="tipo1"]');

	const radioEmpregador = document.querySelector('input[id="tipo2"]');

	const invalido = document.querySelector('.invalido');
	const possui = document.querySelector('.possui');
	const diferente = document.querySelector('.diferente');


	if (radioEstagiario.checked) {
		$.ajax({
			type: "POST",
			//contentType: "application/json",
			//headers: {'Content-Type': 'application/x-www-form-urlencoded'},

			url: "http://localhost/Login/CadastrarUsuario/verificaCadastro",
			data: {

				email: document.getElementById('email').value,
				senha: document.getElementById('senha').value,
				confirmasenha: document.getElementById('confirmasenha').value,
				nome: document.getElementById('nome').value,
				curso: document.getElementById('curso').value,
				ano: document.getElementById('ano').value,
				curriculo: document.getElementById('curriculo').value,
				tipo: "estagiario"


			},
			success: function (result) {

				if (result.sucesso == false) {
					if (result.mensagem == 'invalido') {
						possui.classList.add('d-none');
						diferente.classList.add('d-none');
						invalido.classList.remove('d-none');
					} else if (result.mensagem == 'possui') {
						invalido.classList.add('d-none');
						diferente.classList.add('d-none');
						possui.classList.remove('d-none');
					} else {
						possui.classList.add('d-none');
						invalido.classList.add('d-none');
						diferente.classList.remove('d-none');
					}

				}
				if (result.sucesso == true) {
					if (result.mensagem == 'Estagiario') {
						alert('Usuário cadastrado com sucesso!');
						window.location.href = "http://localhost/Login/Login/index";
					}
				} else {
					if (result.mensagem == "possui") {
						alert('Usuário já cadastrado!');
					} else if (result.mensagem == "diferente") {
						alert('As senhas são diferentes!');
					} else if (result.mensagem == "invalido") {
						alert("A senha precisa conter pelo menos 1 caracter.");
					}
				}
			},
			error: function (e1) {
				alert("Algo deu errado!");
			}
		});
	}

	if (radioEmpregador.checked) {
		$.ajax({
			type: "POST",
			//contentType: "application/json",
			//headers: {'Content-Type': 'application/x-www-form-urlencoded'},

			url: "http://localhost/Login/CadastrarUsuario/verificaCadastro",
			data: {

				email: document.getElementById('email').value,
				senha: document.getElementById('senha').value,
				confirmasenha: document.getElementById('confirmasenha').value,
				tipo: "empregador",
				empresa: document.getElementById('empresa').value,
				contato: document.getElementById('contato').value,
				endereco: document.getElementById('endereco').value,
				descricao: document.getElementById('descricao').value

			},
			success: function (result) {

				if (result.sucesso == false) {
					if (result.mensagem == 'invalido') {
						possui.classList.add('d-none');
						diferente.classList.add('d-none');
						invalido.classList.remove('d-none');
					} else if (result.mensagem == 'possui') {
						invalido.classList.add('d-none');
						diferente.classList.add('d-none');
						possui.classList.remove('d-none');
					} else {
						possui.classList.add('d-none');
						invalido.classList.add('d-none');
						diferente.classList.remove('d-none');
					}

				}
				if (result.sucesso == true) {

					if (result.mensagem == 'Empregador') {
						alert('Usuário cadastrado com sucesso!');
						window.location.href = "http://localhost/Login/Login/index";
					}
				} else {
					if (result.mensagem == "possui") {
						alert('Usuário já cadastrado!');
					} else if (result.mensagem == "diferente") {
						alert('As senhas são diferentes!');
					} else if (result.mensagem == "invalido") {
						alert("A senha precisa conter pelo menos 1 caracter.");
					}
				}
			},
			error: function (e1) {
				

			}
		});
	}

}