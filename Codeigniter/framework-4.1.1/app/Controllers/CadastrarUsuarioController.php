<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioController');   
}	

class CadastrarUsuarioController extends Controller
{
	use ResponseTrait;

	public function index()
	{
		return view('cadastrar');
	}

    public function conferesenha($senha){
        if (!preg_match("/^[a-zA-Z'-]+$/", $senha)) {
            return true;
        }else{
            return false;
        }
    }

    public function verificaCadastro(){
    	$email = @$_POST['email'];
    	$senha = @$_POST['senha'];
		/*var_dump($_POST['email']);
		var_dump($_POST['senha']);
		var_dump($_POST['confirmasenha']);
		var_dump($_POST['curso']);
		var_dump($_POST['ano']);
		var_dump($_POST['curriculo']);
		var_dump($_POST['tipo']);*/	

    	$confirmaSenha = @$_POST['confirmasenha'];
    	$tipo = @$_POST['tipo'];

        if(!preg_match("/^[a-zA-Z'-]+$/", $senha)){
            if($senha == $confirmaSenha){
            	if($tipo == 'estagiario'){
                   

			        header('Content-Type: application/json');
			        
			        $curso = @$_POST['curso'];
                    $ano = @$_POST['ano'];
                    $curriculo = @$_POST['curriculo'];
                    $nome = @$_POST['nome'];
 					$db = db_connect();

					$sql = "SELECT id_users FROM estagiario WHERE email = ? AND senha = ?";
					$senhaCriptografada = md5($senha);
					$result = $db->query($sql, [$email, $senhaCriptografada])->getRow();

					if($result){
						 $arr = [
			                'sucesso' => false, 'mensagem' => 'possui']; 
			        		return $this->respondCreated($arr);
					}else{
						$sql = "INSERT INTO estagiario(nome,email,senha,curso,ano,curriculo,tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";
						$db->query($sql, [$nome, $email,
											md5($senha), $curso,
											$ano, $curriculo,
											$tipo]);

						
						 $arr = [
			                'sucesso' => true, 'mensagem' => 'Estagiario']; 
			        	return $this->respondCreated($arr);
					}

            	}elseif ($tipo == 'empregador') {
            		
                   	header('Content-Type: application/json');
			        
			        $empresa = @$_POST['empresa'];
        	    	$contato = @$_POST['contato'];
        	    	$endereco = @$_POST['endereco'];
        	    	$descricao = @$_POST['descricao'];
        	    	$db = db_connect();

					$sql = "SELECT id_users FROM empregador WHERE email = ?";
					$senhaCriptografada = md5($senha);
					$result = $db->query($sql, [$email])->getRow();

					if($result){
						 $arr = [
			                'sucesso' => true, 'mensagem' => 'possui']; 
			        		return $this->respondCreated($arr);
					}else{
						$sql = "INSERT INTO empregador(empresa,email,senha,contato,endereco,descricao,tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";
						$db->query($sql, [$empresa, $email,
											md5($senha), $contato,
											$endereco, $descricao,
											$tipo]);

						
						 $arr = [
			                'sucesso' => true, 'mensagem' => 'Empregador']; 
			        	return $this->respondCreated($arr);
					}
                    
            	}
            }else{
            	header('Content-Type: application/json');
				$arr = [
					'sucesso' => false,
					'mensagem' => 'diferente'
				];
                return $this->respondCreated($arr);
            }

        }else{
			header('Content-Type: application/json');
			$arr = [
				'sucesso' => false,
				'mensagem' => 'invalido'
			];
			return $this->respondCreated($arr);
        }
    }
    
		
}