<?php

	Class Empregador{


		public function cadastrarEmpregador( $email,$senha,$empresa,$contato, $endereco, $descricao, $tipo, $pdo){
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

		public function logarEmpregador($email, $senha, $pdo){
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
		public function atualizaEmpregador($id,$email,$senha,$empresa,$contato,$enderco,$descricao, $pdo){
			$sql = $pdo->prepare("UPDATE empregador SET email = :e,senha = :s,empresa = :m,contato = :c,endereco = :n,descricao = :d WHERE id_users = :id");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->bindValue(":m",$empresa);
			$sql->bindValue(":c",$contato);
			$sql->bindValue(":n",$endereco);
			$sql->bindValue(":d",$descricao);
			$sql->bindValue(":id",$id);
			$sql->execute();
			return true;
		}

	

	}


?>