<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    use ResponseTrait;

	public function index()
	{
		return view('');
	}

    public function verificaLogin(){
              
        $userEstagio = new EstagiarioController;
        $userEmpresa = new EmpregadorController;
        if($userEstagio->autentiqueUsuario(@$_POST['email'],@$_POST['senha'])){
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => true,
                'mensagem' => "Estagiario"
            ]; 
            return $this->respondCreated($arr);
        }
        elseif ($userEmpresa->autentiqueUsuario(@$_POST['email'],@$_POST['senha'])) {
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => true,
                'mensagem' => "Empregador"
            ]; 
            return $this->respondCreated($arr);
            
        }else{
            header('Content-Type: application/json');
            $arr = [
                'sucesso' => false,
                'mensagem' => "Email ou Senha errados"
            ]; 
            return $this->respondCreated($arr);
        }
    }
}
