
<?php
	
	require_once 'CLASSES/Estagiario.php';
	require_once 'CLASSES/Empregador.php';
	
	$s = new Estagiario;
	$m = new Empregador;
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Cadastrar</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script defer" src="JS/cadastrar.js"></script>
	</head>
	<body>
		<div id="principal" class="login">
			
			<form method="POST">
				<h1 class="titulo">Informações para cadastro</h1>
				<input type="email" class= "escrita" name="email" placeholder="E-mail" maxlength="50" required>
				<input type="password" class= "escrita" name="senha" placeholder="Senha" maxlength="15" required>
				<input type="password" class= "escrita" name="confirmasenha" placeholder="Confirme a senha" maxlength="15" >
				
				 <div class="tiposUsuario">
				      <input type="radio" id="tipo1" name="contact" value="estagiario" class="perfil" onclick=aoSelecionarTipoUsuario()>
				      <label for="estagiario" class="texto">Estagiário</label>

				      <input type="radio" id="tipo2" name="contact" value="empregador" class="perfil" onclick=aoSelecionarTipoUsuario()>
				      <label for="empregador" class="texto">Empregador</label>
				</div>
				
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
				
				<div id="teste">
				</div>
				
				<div>
					<div class="alinharBotoes">
					<input type="submit" value="Cadastrar" class="escrita botao tela-cadastro">
					<input type="submit" value="Voltar" class="escrita botao tela-cadastro voltar" onclick="aoClicarBotaoVoltar()">
					</div>
				</div>
			</form>
		</div>
		<?php 
				if(isset($_POST['nome'])){
					$email = addslashes($_POST['email']);
					$senha = addslashes($_POST['senha']);
					$confirmarSenha = addslashes($_POST['confirmasenha']);
					$tipo = addslashes($_POST['contact']);
					$pdo;
					$msg = "";
					try {
						$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
					} catch (PDOException $e) {
						global $msg;
						$msg = $e->getMessage();
					}
					

					if($senha == $confirmarSenha){

						if($tipo == 'estagiario'){
							
							$nome = addslashes($_POST['nome']);
							$curso = addslashes($_POST['curso']);
							$ano = addslashes($_POST['ano']);
							$curriculo = addslashes($_POST['curriculo']);

							if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha) && !empty($curso) && !empty($ano) && !empty($curriculo)){
								if($msg == ""){
									
									if($s->cadastrarEstagiario($nome,$email,$senha,$curso,$ano,$curriculo,$tipo,$pdo)){
										
										?>
										<div id="sucesso">
											Usuário cadastrado com sucesso!
										</div>
										<?php
									}else{
										?>
											<div class="erro">
												Usuário já cadastrado!
											</div>
										<?php
									}

								}else{
									?>
									<div class="erro">
										<?php echo "Erro: ".$msg; ?>
									</div>
									<?php
								}
							}else{
								?>
									<div class="erro">
										Preencha todas as informações!!
									</div>
								<?php
							}
						}

						if($tipo == 'empregador'){
							
							$empresa = addslashes($_POST['empresa']);
							$contato = addslashes($_POST['contato']);
							$endereco = addslashes($_POST['endereco']);
							$descricao = addslashes($_POST['descricao']);

							if(!empty($email) && !empty($senha) && !empty($confirmarSenha) && !empty($empresa) && !empty($contato) && !empty($endereco) && !empty($descricao)){
								
								if($msg == ""){
									
									if($m->cadastrarEmpregador($email,$senha,$empresa,$contato, $endereco, $descricao, $tipo,$pdo)){
										
										?>
										<div id="sucesso">
											Usuário cadastrado com sucesso!
										</div>
										<?php
									}else{
										?>
											<div class="erro">
												Usuário já cadastrado!
											</div>
										<?php
									}

								}else{
									?>
									<div class="erro">
										<?php echo "Erro: ".$msg; ?>
									</div>
									<?php
								}
							}else{
								?>
									<div class="erro">
										Preencha todas as informações!
									</div>
								<?php
							}
						}
					}else{
						?>
						<div class="erro">
							As senhas não conferem!
						</div>
						<?php
					}
				}
			?>	
			<script defer>
				const camposEstagiario = document.querySelector('.div-estagiario');
				const camposEmpregador = document.querySelector('.div-empregador');
				const radioEstagiario = document.querySelector('input[id="tipo1"]');
				const radioEmpregador = document.querySelector('input[id="tipo2"]');
				
				aoSelecionarTipoUsuario();
			</script
	</body>
</html>