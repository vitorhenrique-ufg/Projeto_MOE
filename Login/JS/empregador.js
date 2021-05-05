function escondaCamposAposCarregarTela() {
	divCamposVagasEstagio.classList.add('d-none');
	divCamposEditarVaga.classList.add('d-none');
	divCamposDadosCadastrados.classList.add('d-none');
	divCamposConsultaEstagiarios.classList.add('d-none');
}

function aoSelecionarAlterarDados() {
	$.ajax({
		type: "POST",
		url: "http://localhost/Login/Empregador/retornaInformacao",
		data: {

		},
		success: function (result) {
			if (result.sucesso == true) {

				document.getElementById("email").value = result.email;
				document.getElementById("empresa").value = result.empresa;
				document.getElementById("contato").value = result.contato;
				document.getElementById("endereco").value = result.endereco;
				document.getElementById("descricao").value = result.descricao;
			}

		},
		error: function (e1) {
			alert("deu errado");
		}
	});
	divCamposDadosCadastrados.classList.remove('d-none');
	divCamposVagasEstagio.classList.add('d-none');
	divCamposEditarVaga.classList.add('d-none');
	divCamposConsultaEstagiarios.classList.add('d-none');
}

function aoClicarAlterar() {
	$.ajax({
		type: "POST",
		url: "http://localhost/Login/Empregador/atualizaEmpregador",
		data: {
			email: document.getElementById('email').value,
			senha: document.getElementById('senha').value,
			confirmasenha: document.getElementById('confirmasenha').value,
			empresa: document.getElementById('empresa').value,
			contato: document.getElementById('contato').value,
			endereco: document.getElementById('endereco').value,
			descricao: document.getElementById('descricao').value,
		},
		success: function (result) {
			if (result.sucesso == true) {
				alert("Dados alterados com sucesso!");
			} else {
				if (result.mensagem == "diferente") {
					alert("As senhas são diferentes.");
				} else if (result.mensagem == "possui") {
					alert("A senha deve contar pelo menos um caracter especial.");
				}
			}

		},
		error: function (e1) {
			alert("deu errado");
		}
	});
}
function aoSelecionarVagasEstagio() {
	divCamposVagasEstagio.classList.remove('d-none');
	divCamposDadosCadastrados.classList.add('d-none');
	divCamposEditarVaga.classList.add('d-none');
	divCamposConsultaEstagiarios.classList.add('d-none');
}

function aoSelecionarEditarVagasEstagio() {
	divCamposEditarVaga.classList.remove('d-none');
	divCamposVagasEstagio.classList.add('d-none');
	divCamposDadosCadastrados.classList.add('d-none');
	divCamposConsultaEstagiarios.classList.add('d-none');
}

function aoSelecionarConsultarEstagiario() {
	divCamposConsultaEstagiarios.classList.remove('d-none');
	divCamposVagasEstagio.classList.add('d-none');
	divCamposEditarVaga.classList.add('d-none');
	divCamposDadosCadastrados.classList.add('d-none');
}