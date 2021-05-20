<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Login Estagiario</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style {csp-style-nonce}>

    *{
	    margin:0;
	    padding:0;	
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

    .alterar{
        width: 420px;
        margin: 50px auto 0px auto;
        background: rgba(0, 0, 256, 0.1);
        border-radius: 10px;
        box-shadow: 0px 0px 10px;
    }

    .campos-editar-dados-estagiario{
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
			<li><a href="#" onclick="aoSelecionarAlterarDadosEstagiario()">Alterar dados</a></li>
			<li><a href="#">Empresas</a>
				<ul>
					
					<li><a href="#" onclick="aoSelecionarSeguirEmpresa()">Seguir empresas</a></li>
				</ul>
			</li>
			<li><a href="#" onclick="aoSelecionarConsultarVaga()">Estágios</a></li>
			<li><a href="http://localhost/EstagiarioController/encerreLogin"> Sair</a></li>

		</ul>
	</nav>

	<div class="alterar">
		<form>

			<div class="campos-editar-dados-estagiario">
				<h1 class="titulo">Alterar dados cadastrais</h1>

				<input type="email" class="escrita" id="email" name="email" placeholder="E-mail" maxlength="50">
				<input type="password" class="escrita" id="senha" name="senha" placeholder="Senha" maxlength="15" required>
				<input type="password" class="escrita" id="confirmasenha" name="confirmasenha" placeholder="Confirme a senha"
					maxlength="15" required>

				<div class="div-estagiario">
					<div>
						<input type="text" name="nome" id="nome" placeholder="Nome completo" maxlength="50" class="escrita">
					</div>
					<div>
						<input type="text" name="curso" id="curso" placeholder="Curso" maxlength="50" class="escrita">
					</div>
					<div>
						<input type="text" name="ano" id="ano" placeholder="Ano de ingresso" class="escrita">
					</div>
					<div>
						<textarea name="curriculo" id="curriculo" placeholder="Curriculo" class="descricao" maxlength="300"></textarea>
					</div>
				</div>

				<div>
					<div>
						<input type="submit" value="Editar" class="escrita botao-editar" onclick="aoClicarAlterar()">
					</div>
				</div>
			</div>

			<div class="campos-consultar-vaga">
				<textarea placeholder="CONSULTAR VAGAS ESTAGIO" class="descricao"></textarea>
			</div>

			<div class="campos-consultar-empresa">
				<textarea placeholder="CONSULTAR EMPRESAS DISPONIVEIS" class="descricao"></textarea>
			</div>

			<div class="campos-seguir-empresa">
				<textarea placeholder="SEGUIR EMPRESAS / VER EMPRESAS QUE ESTOU SEGUINDO" class="descricao"></textarea>
			</div>

		</form>
	</div>

</body>

<script defer>

	const divCamposEditarDados = document.querySelector('.campos-editar-dados-estagiario');
	const divCamposConsultarVagaEstagio = document.querySelector('.campos-consultar-vaga');
	const divCamposConsultarEmpresa = document.querySelector('.campos-consultar-empresa');
	const divCamposSeguirEmpresa = document.querySelector('.campos-seguir-empresa');

	escondaCamposAposCarregarTelaEstagiario();

function escondaCamposAposCarregarTelaEstagiario() {
	divCamposEditarDados.classList.add('d-none');
	divCamposConsultarVagaEstagio.classList.add('d-none');
	divCamposConsultarEmpresa.classList.add('d-none');
	divCamposSeguirEmpresa.classList.add('d-none');
}

function aoSelecionarAlterarDadosEstagiario() {

$.ajax({
    type: "POST",
    url: "http://localhost/EstagiarioController/retornaInformacao",
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

function aoSelecionarConsultarVaga() {
    window.location.href = "http://localhost/EstagiarioController/estagioDisponiveis";
}



function aoSelecionarSeguirEmpresa() {
    window.location.href = "http://localhost/EstagiarioController/seguirEmpresa";
}

function aoClicarAlterar() {
    $.ajax({
        type: "POST",
        url: "http://localhost/EstagiarioController/atualizaEstagiario",
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
</script>

</html>