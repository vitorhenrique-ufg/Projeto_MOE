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

		public function __constructor($email, $senha, $empresa, $contato, $endereco, $descricao, $tipo){
			$this->email = $email;
			$this->senha = $senha;
			$this->contato = $contato;
			$this->endereco = $endereco;
			$this->descricao = $descricao;
			$this->tipoUsuario = $tipo;
		}

		public function obtenhaEmail(){
			return $this->email;
		}

		public function obtenhaSenha(){
			return $this->senha;
		}
		
		public function obtenhaTipoUsuario(){
			return $this->tipoUsuario;
		}
		
		public function obtenhaEmpresa(){
			return $this->empresa;
		}
		
		public function obtenhaContato(){
			return $this->contato;
		}
		
		public function obtenhaEndereco(){
			return $this->endereco;
		}
		
		public function obtenhaDescricao(){
			return $this->tipoUsuario;
		}
	}
?>