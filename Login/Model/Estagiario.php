<?php

	class Estagiario{

		private $email; 
		private $senha;
		private $nomeCompleto;
		private $curso;
		private $ano;
		private $curriculo;
		private $tipoUsuario;

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

		public function cadastrarEstagiario($nome, $email, $senha, $curso, $ano, $curriculo, $tipo){
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
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
				
				$this->nome = $nome;
				$this->email = $email;
				$this->senha = $senha;
				$this->curso = $curso;
				$this->curriculo = $curriculo;
				$this->ano = $ano;
				$this->tipoUsuario = $tipo;
				
				return true;
			}
		}
	}

?>