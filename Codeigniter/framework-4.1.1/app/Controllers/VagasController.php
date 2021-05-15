<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
global $id;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioController');   
}

class VagasController extends BaseController
{
    use ResponseTrait;
    

    public function cadastrarVaga(){
        @session_start();
        $db = db_connect();

        header('Content-Type: application/json');
        $descricao = @$_POST['descricao'];
		$atividade = @$_POST['atividade'];
		$semestre = @$_POST['semestre'];
		$habilidadesRequiridas = @$_POST['habilidadesRequiridas'];
		$horasSemanais = @$_POST['horasSemanais'];
		$remuneracao = @$_POST['remuneracao'];
        $idEmpregador = $_SESSION['id_users'];

        $sql = "INSERT INTO vaga (descricao, atividade, semestre, habilidadesRequeridas, horasSemanais, remuneracao, idEmpregador) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $result = $db->query($sql, [$descricao, $atividade, $semestre, $habilidadesRequiridas, 
                                $horasSemanais, $remuneracao, $idEmpregador]);
        
        $arr = [
                'sucesso' => true,
               ]; 
        return $this->respondCreated($arr);
    }
}
