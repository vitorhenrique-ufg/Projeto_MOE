<?php
	require_once 'CLASSES/Estagiario.php';
	require_once 'CLASSES/Empregador.php';
	
	$s = new Estagiario;
	$m = new Empregador;
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

				$pdo;
				$msg = "";
				try {
					$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
				} catch (PDOException $e) {
					global $msg;
					$msg = $e->getMessage();
				}
				if($msg == ""){
					
					if($s->logarEstagiario($email,$senha,$pdo)){
						header("location: telaPrincipalEstagiario.php");
					}elseif ($m->logarEmpregador($email,$senha,$pdo)) {
						header("location: telaPrincipalEmpregador.php");
					}
					else{
						?>
						<div class="erro">
							Email e/ou senha estão incorretos.
						</div>
						
						<?php
					}
				}else{
					echo "Erro: ".$msg;
				}
			}
		}
		?>	
	</body>
</html>