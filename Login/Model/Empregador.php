<?php

	class Empregador{

		private $email; 
		private $senha;
		private $id;
		private $tipoUsuario;
		private $nomeEmpresa;
		private $nomeContato;
		private $endereco;
		private $descricao;

		public function definaEmail($email){
			$this->email = $email; 
		}

		public function definaSenha($senha){
			$this->senha = $senha; 
		}

		public function obtenhaEmail(){
			return $this->email;
		}

		public function obtenhaSenha(){
			return $this->senha;
		}

		public function definaTipoUsuario($tipo){
			$this->tipoUsuario = $tipo;
		}
		
		public function obtenhaTipoUsuario($tipo){
			return $this->tipoUsuario;
		}

		public function cadastrarEmpregador( $email,$senha,$empresa,$contato, $endereco, $descricao, $tipo){
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
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

				$this->nomeEmpresa = $empresa;
				$this->email = $email;
				$this->senha = $senha;
				$this->nomeContato = $contato;
				$this->endereco = $endereco;
				$this->descricao = $descricao;
				$this->tipoUsuario = $tipo;

				return true;
			}

		}
	}

?>