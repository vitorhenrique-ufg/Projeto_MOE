<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\StrategyEngSoft;
use App\Models\StrategyEngComp;
use App\Models\StrategySisInf;

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

    public function seInscrevaEmVagas(){
        @session_start();
        $db = db_connect();

        $sql = "SELECT * FROM estagiario WHERE id_users = ?";
        $estagiario = $db->query($sql, [@$_SESSION['id_users']])->getRow();
        $vagasSelecionadas = json_decode(@$_POST['jsonVagas'], true);
        
        if($estagiario->curso == 'Engenharia de software'){
            return $this->vagasEngenhariaSoftware($estagiario, $vagasSelecionadas);
        }
        else if($estagiario->curso == 'Engenharia da computação'){
           return $this->vagasEngenhariaComputacao($estagiario, $vagasSelecionadas);
        }else{
           return $this->vagasSistemaInformacoes($estagiario, $vagasSelecionadas);
        }
    }

    function vagasEngenhariaSoftware($estagiario, $vagasSelecionadas){

        $engenhariaSoftware = new \App\Models\StrategyEngSoft();
        $estaAutorizado =  $engenhariaSoftware->interessarEmVaga($estagiario);

        if($estaAutorizado){
                foreach($vagasSelecionadas as $vaga["Descricao"]){
                    $sqlVagasAssociadas = "SELECT * from vaga WHERE descricao = ?";
                    $vagaAssociada = $db->query($sqlVagasAssociadas, [$vaga["Descricao"]])->getRow();
                    
                    if($vagaAssociada){
                        $sql = "INSERT INTO seguirvaga (id_vaga, id_estagiario) VALUES (?, ?)";
                        $db->query($sql, [$vagaAssociada->id_vaga, @$_SESSION['id_users']]); 

                        header('Content-Type: application/json');
                        $arr = [
                            'sucesso' => true
                        ];
                        return $this->respondCreated($arr);
                    }
                }
                header('Content-Type: application/json');
                $arr = [
                    'sucesso' => false,
                ];
                return $this->respondCreated($arr);
        }else{
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => false,
                'curso' => 'EngenhariaSoftware'
            ];
            return $this->respondCreated($arr);
        }
    }

    function vagasEngenhariaComputacao($estagiario, $vagasSelecionadas){

        $engenhariaComputacao = new \App\Models\StrategyEngComp();
        $estaAutorizado =  $engenhariaComputacao->interessarEmVaga($estagiario);

        if($estaAutorizado){
                foreach($vagasSelecionadas as $vaga["Descricao"]){
                    $sqlVagasAssociadas = "SELECT * from vaga WHERE descricao = ?";
                    $vagaAssociada = $db->query($sqlVagasAssociadas, [$vaga["Descricao"]])->getRow();
                    
                    if($vagaAssociada){
                        $sql = "INSERT INTO seguirvaga (id_vaga, id_estagiario) VALUES (?, ?)";
                        $db->query($sql, [$vagaAssociada->id_vaga, @$_SESSION['id_users']]); 

                        header('Content-Type: application/json');
                        $arr = [
                            'sucesso' => true
                        ];
                        return $this->respondCreated($arr);
                    }
                }
                header('Content-Type: application/json');
                $arr = [
                    'sucesso' => false,
                ];
                return $this->respondCreated($arr);
        }else{
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => false,
                'curso' => 'EngenhariaComputacao'
            ];
            return $this->respondCreated($arr); 
        }
    }

    function vagasSistemaInformacoes($estagiario, $vagasSelecionadas){

        $sistemaInformacao = new \App\Models\StrategySisInf();
        $estaAutorizado =  $sistemaInformacao->interessarEmVaga($estagiario);

        if($estaAutorizado){
            try{
                foreach($vagasSelecionadas as $vaga["Descricao"]){
                    $sqlVagasAssociadas = "SELECT * from vaga WHERE descricao = ?";
                    $vagaAssociada = $db->query($sqlVagasAssociadas, [$vaga["Descricao"]])->getRow();
                    
                    if($vagaAssociada){
                        $sql = "INSERT INTO seguirvaga (id_vaga, id_estagiario) VALUES (?, ?)";
                        $db->query($sql, [$vagaAssociada->id_vaga, @$_SESSION['id_users']]); 

                        header('Content-Type: application/json');
                        $arr = [
                            'sucesso' => 'vaga-seguida'
                        ];
                        return $this->respondCreated($arr);
                    }
                }
            }
            catch(PDOException $e){
                header('Content-Type: application/json');
                $arr = [
                    'sucesso' => false,
                ];
                return $this->respondCreated($arr);
            }
        }else{
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => false,
                'curso' => 'SistemaInformacao'
            ];
            return $this->respondCreated($arr); 
        }
    }
}
