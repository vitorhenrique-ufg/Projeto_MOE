<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Login Empregador</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style {csp-style-nonce}>

    *{
	    margin:0;
	    padding:0;	
    }

    #principal{
        width: 420px;
        margin: 90px auto 0px auto;
    }

    .menu-empregador{
        width: 100%;
        height: 50px;
        background: rgba(0, 0, 256, 0.1);
        font-family: 'Arial';
    }

    .menu-empregador ul{
        list-style: none;
        position: relative;
    }
    .menu-empregador ul ul{
        visibility: hidden;
    }

    .menu-empregador ul li{
        width: 150px;
        float: left;
    }

    .menu-empregador ul li a {
        padding: 15px;
        display: block;
        text-decoration: none;
        text-align: center;
        background-color: #0F6FC5;
        color: white;
    }
    .menu-empregador ul li a:hover {
        background-color: rgba(0, 0, 256, 0.2);
        color: black;
    }

    .menu-empregador ul li:hover ul{
        visibility: visible;
    }

    .login{
        width: 420px;
        margin: 100px auto 0px auto;
        border-radius: 10px;
        box-shadow: 0px 0px 10px;
    }

    .campos-editar-dados{
        height: 448px;
        box-shadow: 0px 2px 8px darkblue;
        border-radius:10px;
    }

    .titulo{
        text-align: center;
        color:  #0F6FC5;
    }

    .escrita{
        display: block;
        height: 40px;
        width: 400px;
        margin: 5px;
        border: 1px solid #0F6FC5;
        font-size: 16pt;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: Arial;
    }

    .descricao{
        display: block;
        height: 80px;
        width: 400px;
        margin: 5px;
        border: 1px solid #0F6FC5;
        font-size: 16pt;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: Arial;
    }

    .botao-editar{
	    background-color: #0F6FC5;
	    color: white;
	    width:95%;
	    height: 45px;
	    margin-left:7px;
    }

    .botao-editar:hover{
	    background-color: black;
	    color: white;
	    cursor:pointer;
    }

    .d-none{
    	display: none;
    }
</style>

<body>

	<nav class="menu-empregador">
		<ul>
			<li><a href="#" onclick="aoSelecionarAlterarDados()">Alterar dados</a></li>
			<li><a href="#">Estágio</a>
				<ul>
					<li><a href="http://localhost/EmpregadorController/cadastrarVagaEstagio">Cadastrar vaga</a></li>
					<li><a href="#" onclick="aoSelecionarEditarVagasEstagio()">Editar vaga</a></li>
				</ul>
			</li>
			<li><a href="#" onclick="aoSelecionarConsultarEstagiario()">Estagiários</a></li>
			<li><a href="http://localhost/EmpregadorController/encerreLogin"> Sair</a></li>
		</ul>
	</nav>
	<div id="principal" class="login">
		<form method="POST">

			<div class="campos-editar-dados">
				<h1 class="titulo">Informações cadastradas</h1>
				<input type="email" class="escrita" id="email" name="email" placeholder="E-mail" maxlength="50" required>
				<input type="password" class="escrita" id="senha" name="senha" placeholder="Senha" maxlength="15" required>
				<input type="password" class="escrita" id="confirmasenha"  name="confirmasenha" placeholder="Confirme a senha"
					maxlength="15" required="">

				<div class="div-empregador">
					<div>
						<input type="text" name="empresa" id="empresa" placeholder="Nome da empresa" class="escrita" maxlength="50">
					</div>
					<div>
						<input type="text" name="contato" id="contato" placeholder="Nome do contato" class="escrita" maxlength="50">
					</div>
					<div>
						<input type="text" name="endereco" id="endereco" placeholder="Endereço" class="escrita" maxlength="50">
					</div>
					<div>
						<textarea name="descricao" id="descricao" placeholder="Descrição" class="descricao" maxlength="50"></textarea>
					</div>
				</div>
				<div>
					<div>
						<input type="submit" value="Editar" class="escrita botao-editar" onclick="aoClicarAlterar()">
					</div>
				</div>
			</div>

			<div class="campos-cadastrar-vaga">
				<textarea placeholder="TELA DE CADASTRO VAGAS" class="descricao"></textarea>
			</div>

			<div class="campos-editar-vaga">
				<textarea placeholder="TELA DE EDITAR VAGAS" class="descricao"></textarea>
			</div>

			<div class="campos-consultar-estagiarios">
				<textarea placeholder="ESTAGIARIOS INTERESSADOS NAS VAGAS" class="descricao"></textarea>
			</div>

		</form>
	</div>
</body>

<script defer>

	const divCamposVagasEstagio = document.querySelector('.campos-cadastrar-vaga');
	const divCamposEditarVaga = document.querySelector('.campos-editar-vaga');
	const divCamposDadosCadastrados = document.querySelector('.campos-editar-dados');
	const divCamposConsultaEstagiarios = document.querySelector('.campos-consultar-estagiarios');

	escondaCamposAposCarregarTela();

    function escondaCamposAposCarregarTela() {
        divCamposVagasEstagio.classList.add('d-none');
        divCamposEditarVaga.classList.add('d-none');
        divCamposDadosCadastrados.classList.add('d-none');
        divCamposConsultaEstagiarios.classList.add('d-none');
    }

    function aoSelecionarAlterarDados() {
	$.ajax({
		type: "POST",
		url: "http://localhost/EmpregadorController/retornaInformacao",
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
		url: "http://localhost/EmpregadorController/atualizaEmpregador",
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

</script>

</html>