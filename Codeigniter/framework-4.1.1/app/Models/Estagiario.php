<?php
namespace App\Models;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioModel');   
}

use CodeIgniter\Model;

class Estagiario extends Model implements Observer{
    
		private $email; 
		private $senha;
		private $nomeCompleto;
		private $curso;
		private $ano;
		private $curriculo;
		private $tipoUsuario;

		public function __construct($nome, $email, $senha, $curso, $ano, $curriculo, $tipo){
			$this->email = $email;
			$this->nomeCompleto = $nome;
			$this->senha = $senha;
			$this->curso = $curso;
			$this->ano = $ano;
			$this->curriculo = $curriculo;
			$this->tipoUsuario = $tipo;
		}

		public function obtenhaNome(){
			return $this->nomeCompleto;			
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

		public function obtenhaCurso(){
			return $this->curso;
		}

		public function obtenhaAno(){
			return $this->ano;
		}

		public function obtenhaCurriculo(){
			return $this->curriculo;
		}
}
