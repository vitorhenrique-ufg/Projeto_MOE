<?php
namespace App\ModelsEmpregador;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EmpregadorModel');   
}

use CodeIgniter\Model;

class Empregador extends Model{

		private $email; 
		private $senha;
		private $id;
		private $tipoUsuario;
		private $nomeEmpresa;
		private $nomeContato;
		private $endereco;
		private $descricao;

		public function __construct($email, $senha, $empresa, $contato, $endereco, $descricao, $tipo){
			$this->email = $email;
			$this->senha = $senha;
			$this->nomeContato = $contato;
			$this->endereco = $endereco;
			$this->nomeEmpresa = $empresa;
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
			return $this->nomeEmpresa;
		}
		
		public function obtenhaContato(){
			return $this->nomeContato;
		}
		
		public function obtenhaEndereco(){
			return $this->endereco;
		}
		
		public function obtenhaDescricao(){
			return $this->descricao;
		}
    }
