<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Cadastrar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    .login{
	    width: 420px;
	    margin: 100px auto 0px auto;
	    border-radius: 10px;
	    box-shadow: 0px 0px 10px;
    }

    .login.form-cadastrar{
	    width: 34%;
	    margin-top: 3%;
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


.escrita.generalInput{
	height: 30%;
	width: 85%;
	background-color: white;
}


input[type="radio"]:hover{
	cursor: pointer;
}

.perfil{
  	border-radius: 50%;
  	width: 20px;
  	height: 20px;
  	border: 2px solid #999;
  	transition: 0.2s all linear;
  	margin-right: 5px;
  	position: relative;
  	top: 4px;
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

.alinharBotoes{
	display: inline-flex;
	margin-left: 5%;
}

.invalido{
	color: red;
	font-size: 18px;
	margin-left: 132px;

}

.d-none{
	display: none;
}

.diferente{
	color: red;
	font-size: 18px;
	margin-left: 97px;

}

.possui{
	color: red;
	font-size: 18px;
	margin-left: 112px;
}

.botao{
	background-color: #0F6FC5;
	color: white;
}

.botao.tela-cadastro{
	background-color: #0F6FC5;
	color: white;
	width:200px;
	height: 45px;
}

.botao.tela-cadastro:hover{
	background-color: black;
	color: white;
	width:200px;
    cursor:pointer;
}

.botao.voltar{
	background:red;
}

.botao.voltar:hover{
	background:black;
    cursor:pointer;
}

.texto{
	font-family: Arial;
	font-size: 12pt;
	font-weight: bold;
}

.texto.radioButton{
	padding-right: 8%;
}

.texto.curso{
	margin-left: 16px;
}

.tiposUsuario{
	margin-left:90px;
}

.dropdown-cursos{
	border: groove;
    border-color: dodgerblue;
    border-radius: 5px;
    width: 81%;
	height: 36px;
}

</style>

<body>
	<div id=" principal" class="login form-cadastrar">

		<form onsubmit="return false">
			<h1 class="titulo">Informações para cadastro</h1>
			<input type="email" class="escrita generalInput" id="email" name="email" placeholder="E-mail" required>
				
			<input type="password" id="senha" class="escrita generalInput" name="senha" placeholder="Senha"
				maxlength="15" required>
			<input type="password" id="confirmasenha" class="escrita generalInput" name="confirmasenha"
				placeholder="Confirme a senha" maxlength="15">

			<div class="tiposUsuario">
				<input type="radio" id="tipo1" name="contact" value="estagiario" class="perfil"
					onclick=aoSelecionarTipoUsuario()>
				<label for="estagiario" class="texto radioButton">Estagiário</label>

				<input type="radio" id="tipo2" name="contact" value="empregador" class="perfil"
					onclick=aoSelecionarTipoUsuario()>
				<label for="empregador" class="texto ">Empregador</label>
			</div>

			<div class="div-estagiario">
				<div>
					<input type="text" name="nome" id="nome" placeholder="Nome completo" maxlength="50"
						class="escrita generalInput">
				</div>
				<div>
					<label for="curso" class="texto curso">Curso</label>
					<select id="cursos-disponiveis" class="dropdown-cursos">
						<option value="Selecione">Selecione</option>
						<option value="Engenharia de software">Engenharia de software</option>
						<option value="Engenharia da computação">Engenharia da computação</option>
						<option value="Sistemas de informações">Sistemas de informações</option>
					</select>					
				</div>
				<div>
					<input type="text" name="ano" id="ano" placeholder="Ano de ingresso" class="escrita generalInput">
				</div>
				<div>
					<textarea name="curriculo" id="curriculo" placeholder="Curriculo" class="descricao"
						maxlength="300"></textarea>
				</div>
			</div>

			<div class="div-empregador">
				<div>
					<input type="text" name="empresa" id="empresa" placeholder="Nome da empresa"
						class="escrita generalInput" maxlength="50">
				</div>
				<div>
					<input type="text" name="contato" id="contato" placeholder="Nome do contato"
						class="escrita generalInput" maxlength="50">
				</div>
				<div>
					<input type="text" name="endereco" id="endereco" placeholder="Endereço" class="escrita generalInput"
						maxlength="50">
				</div>
				<div>
					<textarea name="descricao" id="descricao" placeholder="Descrição" class="descricao"
						maxlength="50"></textarea>

				</div>
			</div>

			<div>
				<div class="alinharBotoes">
					<input type="submit" value="Cadastrar" class="escrita botao tela-cadastro"
						onclick="aoClicarCadastrar()">
					<input type="submit" value="Voltar" class="escrita botao tela-cadastro voltar"
						onclick="aoClicarBotaoVoltar()">
				</div>
			</div>
			<span class="invalido d-none"><i class="fa fa-exclamation-triangle">Senhas Inválidas!</i></span>
			<span class="diferente d-none"><i class="fa fa-exclamation-triangle">As duas senhas são
					diferentes</i></span>
			<span class="possui d-none"><i class="fa fa-exclamation-triangle">Usuário já possui cadastro</i></span>
		</form>
	</div>

<script defer>
		const camposEstagiario = document.querySelector('.div-estagiario');
		const camposEmpregador = document.querySelector('.div-empregador');
		const radioEstagiario = document.querySelector('input[id="tipo1"]');
		const radioEmpregador = document.querySelector('input[id="tipo2"]');

		aoSelecionarTipoUsuario();

		function aoSelecionarTipoUsuario() {
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

		function aoClicarBotaoVoltar() {
			window.location.href = "http://localhost";
		}

		function aoClicarCadastrar() {

			const radioEstagiario = document.querySelector('input[id="tipo1"]');
			const radioEmpregador = document.querySelector('input[id="tipo2"]');
			const invalido = document.querySelector('.invalido');
			const possui = document.querySelector('.possui');
			const diferente = document.querySelector('.diferente');

			if (radioEstagiario.checked) {
				debugger;
				$.ajax({
            		type: "POST",

		           	url: "http://localhost/CadastrarUsuarioController/verificaCadastro",
		            data: { 
		            	email: document.getElementById('email').value,
						senha: document.getElementById('senha').value,
						confirmasenha: document.getElementById('confirmasenha').value,
						nome: document.getElementById('nome').value,
						curso: document.getElementById('cursos-disponiveis').value,
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
								
								window.location.href = "http://localhost";
							}
						} 
		            },
		            error: function (e1) {
		                alert("deu errado");
		            }
       	 		}); 
			}

			if (radioEmpregador.checked) {
				$.ajax({
					type: "POST",
					//contentType: "application/json",
					//headers: {'Content-Type': 'application/x-www-form-urlencoded'},

					url: "http://localhost/CadastrarUsuarioController/verificaCadastro",
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
								
								window.location.href = "http://localhost";
							}
						} 
					},
					error: function (e1) {
						alert('Algo deu errado');
					}
				});
			}
		}
</script>
</body>

</html>