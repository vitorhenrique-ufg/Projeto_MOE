<?php

	Class Estagiario{

		public function cadastrarEstagiario($nome, $email, $senha, $curso, $ano, $curriculo, $tipo, $pdo){
			
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

		public function logarEstagiario($email, $senha, $pdo){
			
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e AND senha = :s");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			if($sql->rowCount() > 0){
				$dado = $sql->fetch();
				session_start();
				$_SESSION['id_users'] = $dado['id_users'];
				echo $_SESSION['id_users'];
				return true;
			}else{
				return false;
			}
		}

		public function atualizaEstagiario($id, $nome,$email,$senha,$curso,$ano,$curriculo, $pdo){
			
			$sql = $pdo->prepare("UPDATE estagiario SET nome = :n,email = :e,senha = :s,curso = :c,ano = :a,curiculo = :r  WHERE id_users = :id");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->bindValue(":c",$curso);
			$sql->bindValue(":a",$ano);
			$sql->bindValue(":r",$curriculo);
			$sql->bindValue(":id",$id);
			$sql->execute();
			return true;
		}
	}


?>