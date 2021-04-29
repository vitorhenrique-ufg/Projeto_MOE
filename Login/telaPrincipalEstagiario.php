
<?php
	require_once 'CLASSES/Estagiario.php';
	require_once 'CLASSES/Empregador.php';
	$s = new Estagiario;
	$m = new Empregador;
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Login Estagiario</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script defer" src="JS/estagiario.js"></script>
	</head>
	<body>
		
		<?php
			require_once 'CLASSES/usuarios.php';
			$u = new Usuario;

			session_start();
			if(!isset($_SESSION['id_users'])){
				header("location: index.php");
				exit;
			}
			$pdo;
			$msg = "";
			try {
				$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			} catch (PDOException $e) {
				$msg;
				$msg = $e->getMessage();
			}
			
			if($msg == ""){
					$sql = $pdo->prepare("SELECT * FROM estagiario WHERE id_users = :e");
					$sql->bindValue(":e",$_SESSION['id_users']);
					$sql->execute();
					if($sql->rowCount() > 0){
						$dado = $sql->fetch();
						
						?>

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
								<li><a href="index.php"> Sair</a></li>
								
							</ul>
						</nav>
						
						<div class="alterar">
							<form method="POST">
							
								<div class="campos-editar-dados-estagiario">
									<h1 class="titulo">Alterar dados cadastrais</h1>

									<input type="email" class= "escrita" name="email" placeholder="E-mail" maxlength="50" value="<?php echo $dado['email'] ?>" >
									<input type="password" class= "escrita" name="senha" placeholder="Senha" maxlength="15">
									<input type="password" class= "escrita" name="confirmasenha" placeholder="Confirme a senha" maxlength="15">
								
									<div class="div-estagiario">
										<div>
											<input type="text" name="nome" placeholder="Nome completo" maxlength="50" class="escrita" value="<?php echo $dado['nome'] ?>">
										</div>
										<div>
											<input type="text" name="curso" placeholder="Curso" maxlength="50" class="escrita" value="<?php echo $dado['curso'] ?>">
										</div>
										<div>
											<input type="text" name="ano" placeholder="Ano de ingresso" class="escrita" value="<?php echo $dado['ano'] ?>">
										</div>
										<div>
											<textarea name="curriculo" placeholder="Curriculo" class="descricao" maxlength="300" >
													<?php echo $dado['curiculo'] ?>
											</textarea>
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
					<?php
						if(isset($_POST['nome'])){
							$email = addslashes($_POST['email']);
							$senha = addslashes($_POST['senha']);
							$confirmarSenha = addslashes($_POST['confirmasenha']);
							$nome = addslashes($_POST['nome']);
							$curso = addslashes($_POST['curso']);
							$ano = addslashes($_POST['ano']);
							$curriculo = addslashes($_POST['curriculo']);
							if($senha == $confirmarSenha){

								if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha) && !empty($curso) && !empty($ano) && !empty($curriculo)){
										if($s->atualizaEstagiario($dado['id_users'],$nome,$email,$senha,$curso,$ano,$curriculo,$pdo)){
											?>
											<div id="sucesso">
												Dados atualizados com sucesso;
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
											Não deixe campos vazios
										</div>
									<?php
								}
							}else{
								?>
								<div class="erro">
									As senhas não conferem!
								</div>
								<?php
							}
						}	
					}
			}
	?>
	</body>
	
	<script defer>
		
		const divCamposEditarDados= document.querySelector('.campos-editar-dados-estagiario');
		const divCamposConsultarVagaEstagio = document.querySelector('.campos-consultar-vaga');
		const divCamposConsultarEmpresa = document.querySelector('.campos-consultar-empresa');
		const divCamposSeguirEmpresa = document.querySelector('.campos-seguir-empresa');
		
		escondaCamposAposCarregarTelaEstagiario();
		
	</script>
	
</html>