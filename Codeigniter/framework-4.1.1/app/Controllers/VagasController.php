<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\EngenhariaSoftware;
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
        if($estagiario->curso == 'Engenharia de software'){
            $engenhariaSoftware = new \App\Models\EngenhariaSoftware();
            $estaAutorizado =  $engenhariaSoftware->interessarEmVaga($estagiario);
            $vagasSelecionadas = json_decode(@$_POST['jsonVagas'], true);
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
                        }else{
                            header('Content-Type: application/json');
                            $arr = [
                                'sucesso' => false
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
                        'sucesso' => 'nao-possui-integracao-necessaria',
                    ];
                    return $this->respondCreated($arr);
            }
        }else if($estagiario->curso == 'Engenharia da computação'){
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => 'teste2',
            ];
            return $this->respondCreated($arr);
        }else{
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => 'teste',
            ];
            return $this->respondCreated($arr);
        }
    }
}
