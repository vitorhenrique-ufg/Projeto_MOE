<?php

	Class Usuario{
		private $pdo;
		public $msg = "";
		public function conectar($nome, $host, $usuario, $senha){
			global $pdo;
			try {
				$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
			} catch (PDOException $e) {
				global $msg;
				$msg = $e->getMessage();
			}
			
		}


		public function cadastrarEstagiario($nome, $email, $senha, $curso, $ano, $curriculo, $tipo){
			global $pdo;
			//verifica cadastro
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();
			if($sql->rowCount() > 0){
				
				return false;
			}else{
				$sql = $pdo->prepare("INSERT INTO estagiario(nome,email,senha,curso,ano,curiculo,tipo) VALUES (:n, :e, :s, :c, :a, :m, :p)");

				$sql->bindValue(":n",$nome);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
				$sql->bindValue(":c",$curso);
				$sql->bindValue(":a",$ano);
				$sql->bindValue(":m",$curriculo);
				$sql->bindValue(":p",$tipo);
				$sql->execute();
				return true;
			}
		}

		public function cadastrarEmpregador( $email,$senha,$empresa,$contato, $endereco, $descricao, $tipo){
			global $pdo;
			//verifica cadastro
			$sql = $pdo->prepare("SELECT id_users FROM empregador WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();
			if($sql->rowCount() > 0){
				
				return false;
			}else{
				$sql = $pdo->prepare("INSERT INTO empregador(email,senha,empresa,contato,endereco,descricao,tipo) VALUES (:e, :s, :m, :c, :n, :d, :p)");
				
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
				$sql->bindValue(":m",$empresa);
				$sql->bindValue(":c",$contato);
				$sql->bindValue(":n",$endereco);
				$sql->bindValue(":d",$descricao);
				$sql->bindValue(":p",$tipo);
				$sql->execute();
				return true;
			}

		}

		public function logarAluno($email, $senha){
			global $pdo;
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e AND senha = :s");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			if($sql->rowCount() > 0){
				$dado = $sql->fetch();
				session_start();
				$_SESSION['id_users'] = $dado['id_users'];
				return true;
			}else{
				return false;
			}
		}

		public function logarEmpregador($email, $senha){
			global $pdo;
			$sql = $pdo->prepare("SELECT id_users FROM empregador WHERE email = :e AND senha = :s");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			if($sql->rowCount() > 0){
				$dado = $sql->fetch();
				session_start();
				$_SESSION['id_users'] = $dado['id_users'];
				return true;
			}else{
				return false;
			}
		}
	}
?>