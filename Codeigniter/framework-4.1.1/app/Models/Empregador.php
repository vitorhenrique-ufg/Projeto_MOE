<?php
namespace App\Models;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EmpregadorModel');   
}

use CodeIgniter\Model;
use \App\Models\Subject;

interface Subject{
    public function addObserver();
    public function removeObserver();
    public function enviarEmail($idEmpregador);
}

class Empregador extends Model implements Subject{

		private $email; 
		private $senha;
		private $id;
		private $tipoUsuario;
		private $nomeEmpresa;
		private $nomeContato;
		private $endereco;
		private $descricao;

		// public function __construct($email, $senha, $empresa, $contato, $endereco, $descricao, $tipo){
		// 	$this->email = $email;
		// 	$this->senha = $senha;
		// 	$this->nomeContato = $contato;
		// 	$this->endereco = $endereco;
		// 	$this->nomeEmpresa = $empresa;
		// 	$this->descricao = $descricao;
		// 	$this->tipoUsuario = $tipo;
		// }

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

		public function addObserver(){
			return true;
		}
		public function removeObserver(){
			return true;
		}

		public function enviarEmail($idEmpregador){
			$db = db_connect();
			$sql = "SELECT empresa, email FROM empregador WHERE id_users = ?";
			$empresaVaga = $db->query($sql, [$idEmpregador])->getRow();

			$sql = "SELECT id_estagiario FROM seguirEmpresa WHERE id_empregador = ?";
			$idEstagiariosSeguemEmpresa = $db->query($sql, [$idEmpregador])->getResultArray();

			foreach($idEstagiariosSeguemEmpresa as $id["id_estagiario"]){

				$sql = "SELECT email FROM estagiario WHERE id_users = ?";
				$emailEstagiario = $db->query($sql, [$id["id_estagiario"]])->getRow();

				helper(['form', 'email','validate']);
				$email = \Config\Services::email();
				$config['mailType'] = 'html';
				$email->initialize($config);
				$email->setFrom('projeto_moe@hotmail.com');
				$email->setTo("vitorhfbc2@hotmail.com");
				//$email->setCC('britobrito@discente.ufg.br');
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
    }
