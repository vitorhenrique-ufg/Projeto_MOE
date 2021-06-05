<?php
namespace App\Models;
use CodeIgniter\Model;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioModel');   
}

interface Observer{
    
    public function receberEmail($idEstagiario, $empresaVaga);
}

class Estagiario extends Model implements Observer{
    
		private $email; 
		private $senha;
		private $nomeCompleto;
		private $curso;
		private $ano;
		private $curriculo;
		private $tipoUsuario;

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

		public function receberEmail($idEstagiario, $empresaVaga){
			$db = db_connect();
			$sql = "SELECT email FROM estagiario WHERE id_users = ?";
			$emailEstagiario = $db->query($sql, [$idEstagiario])->getRow();

			helper(['form', 'email','validate']);
			$email = \Config\Services::email();
			$config['mailType'] = 'html';
			$email->initialize($config);
			//$email->setFrom($empresaVaga->email);
			$email->setFrom('projeto_moe@hotmail.com');
			$email->setTo("vitorhfbc2@hotmail.com");
			//$email->setTo($emailEstagiario);
			$email->setSubject("Nova vaga de estágio cadastrada");
			
			$email->setMessage("<!DOCTYPE html>
				<head>
					<meta charset='utf-8'>
					<title>MOE</title>
				 </head>
				<body>
					<p> Olá, nós somos da empresa <strong>$empresaVaga->empresa</strong>
					e cadastramos uma nova oportunidade de vaga de estágio feita para você,
					para ver mais detalhes, acesse o Mural de estágios da UFG no link abaixo.
					</p>
					<a href='http://localhost'>Mural de oportunidades de estágio UFG</a>
				</body>
			</html>");
			
			$email->send();
			//echo $email->printDebugger();
		}
}
