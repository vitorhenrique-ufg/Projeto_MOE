
<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Login Estagiario</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script defer" src="JS/cadastrar.js"></script>
	</head>
	<body>
		
		<nav class="menu-empregador">
			<ul>
				<li><a href="#" onclick="aoSelecionarAlterarDadosEstagiario()">Alterar dados</a></li>
				<li><a href="#">Empresas</a>
					<ul>
						<li><a href="#" onclick="aoSelecionarConsultarEmpresa()">Empresas cadastradas</a></li>
						<li><a href="#" onclick="aoSelecionarSeguirEmpresa()">Seguir empresas</a></li>
					</ul>
				</li>
				<li><a href="#" onclick="aoSelecionarConsultarVaga()">Estágios</a></li>
			</ul>
		</nav>
		
		<div>
			<h1 style="position: absolute">ESTAGIARIO 01</h1>
		</div>
		
		<div id="principal" class="login">
			<form method="POST">
			
				<div class="campos-editar-dados-estagiario">
					<h1 class="titulo">Informações cadastradas</h1>
				<input type="email" class= "escrita" name="email" placeholder="E-mail" maxlength="50" required>
				<input type="password" class= "escrita" name="senha" placeholder="Senha" maxlength="15" required>
				<input type="password" class= "escrita" name="confirmasenha" placeholder="Confirme a senha" maxlength="15" >
			
				<div class="div-estagiario">
					<div>
						<input type="text" name="nome" placeholder="Nome completo" maxlength="50" class="escrita" >
					</div>
					<div>
						<input type="text" name="curso" placeholder="Curso" maxlength="50" class="escrita" >
					</div>
					<div>
						<input type="text" name="ano" placeholder="Ano de ingresso" class="escrita" >
					</div>
					<div>
						<textarea name="curriculo" placeholder="Curriculo" class="descricao" maxlength="300" ></textarea>
					</div>
				</div>
				
				<div>
					<div>
					<input type="submit" value="Editar" class="escrita botao-editar">
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
		
		const divCamposEditarDados= document.querySelector('.campos-editar-dados-estagiario');
		const divCamposConsultarVagaEstagio = document.querySelector('.campos-consultar-vaga');
		const divCamposConsultarEmpresa = document.querySelector('.campos-consultar-empresa');
		const divCamposSeguirEmpresa = document.querySelector('.campos-seguir-empresa');
		
		escondaCamposAposCarregarTelaEstagiario();
		
		function escondaCamposAposCarregarTelaEstagiario(){
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
		}
		
		function aoSelecionarAlterarDadosEstagiario(){	
			divCamposEditarDados.classList.remove('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
		}
		
		function aoSelecionarConsultarVaga(){	
			divCamposConsultarVagaEstagio.classList.remove('d-none');		
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
		}
		
		function aoSelecionarConsultarEmpresa(){	
			divCamposConsultarEmpresa.classList.remove('d-none');
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
		 }
		
		function aoSelecionarSeguirEmpresa(){	
			divCamposSeguirEmpresa.classList.remove('d-none');
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
		}
		
	</script>
	
</html>