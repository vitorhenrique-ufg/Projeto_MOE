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

    public function encerreLogin(){
        return view('login');
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
               /* $pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
                $sql = $pdo->prepare("UPDATE empregador SET empresa = :m,email = :e,senha = :s,contato = :c,endereco = :n,descricao = :d  WHERE id_users = :id");
                $sql->bindValue(":m",@$_POST['empresa']);
                $sql->bindValue(":e",@$_POST['email']);
                $sql->bindValue(":s",md5(@$_POST['senha']));
                $sql->bindValue(":c",@$_POST['contato']);
                $sql->bindValue(":n",@$_POST['endereco']);
                $sql->bindValue(":d",@$_POST['descricao']);
                $sql->bindValue(":id",$_SESSION['id_users']);
                $sql->execute();*/

                header('Content-Type: application/json');
                $arr = array('sucesso' => true, 'mensagem' => "cadastrado" );
                echo json_encode($arr);

            }else{
                header('Content-Type: application/json');
                $arr = array('sucesso' => false, 'mensagem' => "diferente" );
                echo json_encode($arr);
            }
        }else{
            header('Content-Type: application/json');
            $arr = array('sucesso' => false, 'mensagem' => "possui" );
            echo json_encode($arr);
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
}
