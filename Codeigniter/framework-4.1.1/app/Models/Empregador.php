<?php
namespace App\Models;
use CodeIgniter\Model;
if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EmpregadorModel');   
}

interface Subject{
    public function addObserver($idEstagiario, $idEmpregador);
    public function removeObserver($idEstagiario);
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

		public function addObserver($idEstagiario, $idEmpregador){
			$db = db_connect();
			$sql = "INSERT INTO seguirEmpresa(id_estagiario, id_empregador) VALUES (?, ?)";
			$db->query($sql, [$idEstagiario, $idEmpregador]);
			return true;
		}
		public function removeObserver($idEstagiario){
			$db = db_connect();
			$sql = "DELETE FROM seguirEmpresa(id_estagiario) WHERE id_estagiario = ?";
			$db->query($sql, [$idEstagiario]);
			return true;
		}

		public function enviarEmail($idEmpregador){
			$db = db_connect();
			$sql = "SELECT empresa, email FROM empregador WHERE id_users = ?";
			$empresaVaga = $db->query($sql, [$idEmpregador])->getRow();

			$sql = "SELECT id_estagiario FROM seguirEmpresa WHERE id_empregador = ?";
			$idEstagiariosSeguemEmpresa = $db->query($sql, [$idEmpregador])->getResultArray();

			foreach($idEstagiariosSeguemEmpresa as $id["id_estagiario"]){

				$estagiario = new \App\Models\Estagiario();
				$estagiario->receberEmail($id["id_estagiario"], $empresaVaga);
			}
		}
    }
