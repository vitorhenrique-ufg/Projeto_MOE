
<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Login Empregador</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script defer" src="JS/empregador.js"></script>
	</head>
	<body>
		
		<nav class="menu-empregador">
			<ul>
				<li><a href="#" onclick="aoSelecionarAlterarDados()">Alterar dados</a></li>
				<li><a href="#">Estágio</a>
					<ul>
						<li><a href="#" onclick="aoSelecionarVagasEstagio()">Cadastrar vaga</a></li>
						<li><a href="#" onclick="aoSelecionarEditarVagasEstagio()">Editar vaga</a></li>
					</ul>
				</li>
				<li><a href="#" onclick="aoSelecionarConsultarEstagiario()">Estagiários</a></li>
				<li><a href="index.php"> Sair</a></li>
			</ul>
		</nav>
		<div id="principal" class="login">
			<form method="POST">
			
				<div class="campos-editar-dados d-none">
					<h1 class="titulo">Informações cadastradas</h1>
				<input type="email" class= "escrita" name="email" placeholder="E-mail" maxlength="50" required>
				<input type="password" class= "escrita" name="senha" placeholder="Senha" maxlength="15" required>
				<input type="password" class= "escrita" name="confirmasenha" placeholder="Confirme a senha" maxlength="15" >
			
				<div class="div-empregador">
					<div>
						<input type="text" name="empresa" placeholder="Nome da empresa" class="escrita" maxlength="50" >
					</div>
					<div>
						<input type="text" name="contato" placeholder="Nome do contato" class="escrita" maxlength="50" >
					</div>
					<div>
						<input type="text" name="endereco" placeholder="Endereço" class="escrita" maxlength="50" >
					</div>
					<div>
						<textarea name="descricao" placeholder="Descrição" class="descricao" maxlength="50"></textarea>			
					</div>
				</div>
				<div>
					<div>
					<input type="submit" value="Editar" class="escrita botao-editar">
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

		
	</script>
	
</html>