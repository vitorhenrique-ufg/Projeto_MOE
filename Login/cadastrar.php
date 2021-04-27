
<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Cadastrar</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script type="text/javascript" src="JS/cadastrar.js"></script>
	</head>
	<body>
		<div id="principal" class="login">
			
			<form method="POST">
				<h1 class="titulo">Informações para cadastro</h1>
				<input type="text" class= "escrita" name="nome" placeholder="Nome" maxlength="30" required>
				<input type="email" class= "escrita" name="email" placeholder="E-mail" maxlength="40" required>
				<input type="text" class= "escrita" name="telefone" placeholder="Telefone" maxlength="30" required>
				<input type="password" class= "escrita" name="senha" placeholder="Senha" maxlength="15" required>
				<input type="password" class= "escrita" name="confirmasenha" placeholder="Confirme a senha" maxlength="15" >
				
				 <div>
				      <input type="radio" id="tipo1" name="contact" value="estagiario" class="perfil" onclick=estagiario()>
				      <label for="estagiario" class="texto">Estagiário</label>

				      <input type="radio" id="tipo3" name="contact" value="empregador" class="perfil" onclick=empregador()>
				      <label for="empregador" class="texto">Empregador</label>
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
					$nome = addslashes($_POST['nome']);
					$telefone = addslashes($_POST['telefone']);
					$email = addslashes($_POST['email']);
					$senha = addslashes($_POST['senha']);
					$confirmarSenha = addslashes($_POST['confirmasenha']);
					$tipo = addslashes($_POST['contact']);
				
					if($senha == $confirmarSenha){

						if($tipo == 'estagiario'){
							
							$nomeInstituicao = addslashes($_POST['nomeInstituicao']);
							$curso = addslashes($_POST['curso']);
							$ano = addslashes($_POST['ano']);
							$curriculo = addslashes($_POST['curriculo']);

							if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha) && !empty($nomeInstituicao) && !empty($curso) && !empty($ano) && !empty($curriculo)){
								$u->conectar("projeto_login", "localhost", "root", "");
								if($u->msg == ""){
									
									if($u->cadastrarEstagiario($nome,$telefone,$email,$senha,$nomeInstituicao,$curso,$ano,$curriculo,$tipo)){
										
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
										<?php echo "Erro: ".$u->msg; ?>
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
							
							$contato = addslashes($_POST['nomeContato']);
							$endereco = addslashes($_POST['endereco']);
							$descricao = addslashes($_POST['descricao']);

							if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha) && !empty($contato) && !empty($endereco) && !empty($descricao) ){
								$u->conectar("projeto_login", "localhost", "root", "");
								if($u->msg == ""){
									
									if($u->cadastrarEmpregador($nome,$telefone,$email,$senha,$contato, $endereco, $descricao, $tipo)){
										
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
										<?php echo "Erro: ".$u->msg; ?>
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
	</body>
</html>