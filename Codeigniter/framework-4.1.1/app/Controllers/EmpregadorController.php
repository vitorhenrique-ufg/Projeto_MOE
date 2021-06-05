<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
global $id;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EmpregadorController');   
}

class EmpregadorController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('telaPrincipalEmpregador');
    }

    public function atualiza(){
        return view('atualizaEmpregador');
    }

    public function encerreLogin(){
        return view('login');
    }

    public function estagiarios(){
        return view('estagiariosInteressados');
    }

    
    public function cadastrarVagaEstagio(){
        return view('cadastrarVagaEstagio');
    }

    public function autentiqueUsuario($email,$senha){   
        @session_start();

        $db = db_connect();
        $sql = "SELECT * FROM empregador WHERE email = ? AND senha = ?";
        $senhaCriptografada = md5($senha);
        $result = $db->query($sql, [$email, $senhaCriptografada])->getRow();
        if($result){    
            $_SESSION['id_users'] = $result->id_users;
            return true;
        }else{
            return false;
        }
    }

    public function retornaInformacao(){
        @session_start();
        $db = db_connect();
        $sql = "SELECT * FROM empregador WHERE id_users = ?";
        $result = $db->query($sql, [$_SESSION['id_users']])->getRow();

        if($result){
            @session_start();
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => true, 
                'empresa' => $result->empresa, 
                'senha' => $result->senha, 
                'email' => $result->email, 
                'contato' => $result->contato, 
                'endereco' => $result->endereco, 
                'descricao' => $result->descricao 
            ];
            return $this->respondCreated($arr);
        
        }else{
            header('Content-Type: application/json');
            $array = [
                'sucesso' => false
            ];
            return $this->respondCreated($arr);
        }
    }

    public function atualizaEmpregador(){
        @session_start();
        if(!preg_match("/^[a-zA-Z'-]+$/", @$_POST['senha'])){
            if(@$_POST['senha'] == @$_POST['confirmasenha'] && @$_POST['senha'] != ''){

                $db = db_connect();
                $sql = "UPDATE empregador SET empresa = ?, email = ?, senha = ?, contato = ?, endereco = ?, descricao = ? WHERE id_users = ? ";
                $senhaCriptografada = md5(@$_POST['senha']); 
                $empresa = @$_POST['empresa'];
                $email = @$_POST['email'];
                $contato = @$_POST['contato'];
                $endereco = @$_POST['endereco'];
                $descricao = @$_POST['descricao'];
                $id = @$_SESSION['id_users'];
                $result = $db->query($sql, [$empresa, $email, $senhaCriptografada, $contato, $endereco, $descricao, $id])->getRow();

                header('Content-Type: application/json');
                $arr = [
                    'sucesso' => true,
                    'mensagem' => "cadastrado"
                ];
                return $this->respondCreated($arr);
                
            }else{
                 header('Content-Type: application/json');
                $arr = [
                    'sucesso' => false,
                    'mensagem' => "diferente"
                ];
                return $this->respondCreated($arr);;
            }
        }else{
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => false,
                'mensagem' => "possui"
            ];
            return $this->respondCreated($arr);
        }
    }

    public function obtenhaEmpresasCadastradas(){
        @session_start();
        $db = db_connect();
        $sql = "SELECT empresa, contato, endereco, descricao FROM empregador";
        $result = $db->query($sql)->getResultArray();
        //var_dump($result);
        if($result){
            header('Content-Type: application/json');
            $array = [
                'sucesso' => true,
                'empresas' => $result
            ];
            return $this->respondCreated($array);
        }
    }

    public function estagiariosInteressados(){
        @session_start();
        $db = db_connect();
        $sql = "SELECT nome, curso, ano, curriculo FROM estagiario, seguirempresa WHERE id_users = id_estagiario AND id_empregador = ?";
        $result = $db->query($sql, [@$_SESSION['id_users']])->getResultArray();
        //var_dump($result);
        if($result){
            header('Content-Type: application/json');
            $array = [
                'sucesso' => true,
                'vagas' => $result
            ];
            return $this->respondCreated($array);
        }
    }
}
