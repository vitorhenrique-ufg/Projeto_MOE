function escondaCamposAposCarregarTelaEstagiario() {
	divCamposEditarDados.classList.add('d-none');
	divCamposConsultarVagaEstagio.classList.add('d-none');
	divCamposConsultarEmpresa.classList.add('d-none');
	divCamposSeguirEmpresa.classList.add('d-none');
}


function aoSelecionarAlterarDadosEstagiario() {

	$.ajax({
		type: "POST",
		url: "http://localhost/Login/Estagiario/retornaInformacao",
		data: {

		},
		success: function (result) {
			if (result.sucesso == true) {

				document.getElementById("email").value = result.email;
				document.getElementById("nome").value = result.nome;
				document.getElementById("curso").value = result.curso;
				document.getElementById("ano").value = result.ano;
				document.getElementById("curriculo").value = result.curriculo;
			}

		},
		error: function (e1) {
			alert("deu errado");
		}
	});
	divCamposEditarDados.classList.remove('d-none');
	divCamposConsultarVagaEstagio.classList.add('d-none');
	divCamposConsultarEmpresa.classList.add('d-none');
	divCamposSeguirEmpresa.classList.add('d-none');

}

function aoClicarAlterar() {
	$.ajax({
		type: "POST",
		url: "http://localhost/Login/Estagiario/atualizaEstagiario",
		data: {
			email: document.getElementById('email').value,
			senha: document.getElementById('senha').value,
			confirmasenha: document.getElementById('confirmasenha').value,
			nome: document.getElementById('nome').value,
			curso: document.getElementById('curso').value,
			ano: document.getElementById('ano').value,
			curriculo: document.getElementById('curriculo').value,
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

function aoSelecionarConsultarVaga() {
	divCamposConsultarVagaEstagio.classList.remove('d-none');
	divCamposEditarDados.classList.add('d-none');
	divCamposConsultarEmpresa.classList.add('d-none');
	divCamposSeguirEmpresa.classList.add('d-none');
}

function aoSelecionarConsultarEmpresa() {
	divCamposConsultarEmpresa.classList.remove('d-none');
	divCamposEditarDados.classList.add('d-none');
	divCamposConsultarVagaEstagio.classList.add('d-none');
	divCamposSeguirEmpresa.classList.add('d-none');
}

function aoSelecionarSeguirEmpresa() {
	divCamposSeguirEmpresa.classList.remove('d-none');
	divCamposEditarDados.classList.add('d-none');
	divCamposConsultarVagaEstagio.classList.add('d-none');
	divCamposConsultarEmpresa.classList.add('d-none');
}

