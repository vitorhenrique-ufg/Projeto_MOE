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


		public function cadastrarEstagiario($nome, $telefone, $email, $senha, $instituicao, $curso, $ano, $curriculo, $tipo){
			global $pdo;
			//verifica cadastro
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();
			if($sql->rowCount() > 0){
				
				return false;
			}else{
				$sql = $pdo->prepare("INSERT INTO estagiario(nome,telefone,email,senha,instituicao,curso,ano,curriculo,tipo) VALUES (:n, :t, :e, :s, :i, :c, :a, :m, :p)");

				$sql->bindValue(":n",$nome);
				$sql->bindValue(":t",$telefone);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
				$sql->bindValue(":i",$instituicao);
				$sql->bindValue(":c",$curso);
				$sql->bindValue(":a",$ano);
				$sql->bindValue(":m",$curriculo);
				$sql->bindValue(":p",$tipo);
				$sql->execute();
				return true;
			}
		}

		public function cadastrarEmpregador($nome, $telefone, $email, $senha, $contato, $endereco, $descricao, $tipo){
			global $pdo;
			//verifica cadastro
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();
			if($sql->rowCount() > 0){
				
				return false;
			}else{
				$sql = $pdo->prepare("INSERT INTO empregador(nome,telefone,email,senha,contato,endereco,descricao,tipo) VALUES (:n, :t, :e, :s, :c, :n, :d, :p)");

				$sql->bindValue(":n",$nome);
				$sql->bindValue(":t",$telefone);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
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