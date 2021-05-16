<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
global $id;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioController');   
}

class EstagiarioController extends BaseController
{
    use ResponseTrait;
    
    public function index()
	{
        session_start();
		return view('telaPrincipalEstagiario');
	}

    public function encerreLogin(){
        return view('login');
    }

    public function seguirEmpresa(){
        return view('seguirEmpresa');
    }

    public function retornaInformacao(){
        @session_start();
        $db = db_connect();
        $sql = "SELECT * FROM estagiario WHERE id_users = ?";
        $result = $db->query($sql, [$_SESSION['id_users']])->getRow();

        if($result){
            @session_start();
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => true,
                'nome' => $result->nome,
                'senha' => $result->senha,
                'email' => $result->email,
                'curso' => $result->curso,
                'ano' => $result->ano,
                'curriculo' => $result->curriculo,
                'tipo' => $result->tipo
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

    public function autentiqueUsuario($email,$senha){   
        @session_start();

        $db = db_connect();
        $sql = "SELECT * FROM estagiario WHERE email = ? AND senha = ?";
        $senhaCriptografada = md5($senha);
        $result = $db->query($sql, [$email, $senha])->getRow();
        if($result){
            $_SESSION['id_users'] = $result->id_users;
            return true;
        }else{
            return false;
        }
    }

    public function atualizaEstagiario(){
        @session_start();
        if(!preg_match("/^[a-zA-Z'-]+$/", @$_POST['senha'])){
            if(@$_POST['senha'] == @$_POST['confirmasenha'] && @$_POST['senha'] != ''){
                
                $db = db_connect();
                $sql = "UPDATE estagiario SET nome = ?, email = ?, senha = ?, curso = ?, ano = ?, curriculo = ? WHERE id_users = ? ";
                $senhaCriptografada = md5(@$_POST['senha']);
                $nome = @$_POST['nome'];
                $email = @$_POST['email'];
                $curso = @$_POST['curso'];
                $ano = @$_POST['ano'];
                $curriculo = @$_POST['curriculo'];
                $id = @$_SESSION['id_users'];
                $result = $db->query($sql, [$nome, $email, $senhaCriptografada, $curso, $ano, $curriculo, $id])->getRow();

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
                return $this->respondCreated($arr);
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
    
    public function seguirEmpresasSelecionadas(){
        @session_start();
        $db = db_connect();
        $empresasSelecionadas = json_decode(@$_POST['jsonEmpresas'], true);
        //unserialize(base64_decode(@$_POST['empresas']));
      // var_dump($empresasSelecionadas[0]["Nome"]);
        try{
            foreach($empresasSelecionadas as $empresa["Nome"]){
                $sqlEmpresasAssociadas = "SELECT * from empregador WHERE empresa = ?";
                $empresasAssociadas = $db->query($sqlEmpresasAssociadas, [$empresa["Nome"]])->getRow();
                
                $sql = "INSERT INTO seguirEmpresa (id_estagiario, id_empregador) VALUES (?, ?)";
                $db->query($sql, [@$_SESSION['id_users'], $empresasAssociadas->id_users]);
            }
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => true
            ];
            return $this->respondCreated($arr);
        }
        catch(PDOException $e){
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => false,
            ];
            return $this->respondCreated($arr);
        }
    }
}
