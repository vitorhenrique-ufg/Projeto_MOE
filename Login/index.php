<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
	<body>
		<div class="login">
			<h1 class="titulo">Bem-vindo ao MOE!</h1>
			<form method="POST">
				<input type="email" class= "escrita" name="email" placeholder="E-mail" required>
				<input type="password" class= "escrita" name="senha" placeholder="Senha" required>
				<input type="submit" value="Entrar" class="escrita botao">
				<a href="cadastrar.php" class="cadastrar">Não possui cadastro? Cadastre-se!</a>
			</form>
		</div>
		<?php 
		if(isset($_POST['email'])){
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);
			if(!empty($email) && !empty($senha)){
				$u->conectar("projeto_login", "localhost", "root", "");
				if($u->msg == ""){
					
					if($u->logarAluno($email,$senha)){
						header("location: estagiario.php");
					}elseif ($u->logarEmpregador($email,$senha)) {
						header("location: empregador.php");
					}
					else{
						?>
						<div class="erro">
							Email e/ou senha estão incorretos.
						</div>
						
						<?php
					}
				}else{
					echo "Erro: ".$u->msg;
				}
			}
		}
		?>	
	</body>
</html>