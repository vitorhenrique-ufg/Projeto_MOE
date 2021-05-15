<?php
namespace App\ModelsVaga;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioModel');   
}

use CodeIgniter\Model;

class Vaga extends Model{
    
		private $descricao; 
		private $atividade;
		private $semestre;
		private $habilidadesRequiridas;
		private $horasSemanais;
		private $remuneracao;
        private $idEmpregador;
}

