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
                    $curso = @$_POST['curso'];
                    $ano = @$_POST['ano'];
                    $curriculo = @$_POST['curriculo'];
                    $nome = @$_POST['nome'];

					$estagiario = new App\Models\Estagiario($nome, $email, $senha, $curso, $ano, $curriculo, $tipo);
					
					if($this->cadastrarEstagiario($estagiario)){
                        header('Content-Type: application/json');
						$arr = [
							'sucesso' => true,
							'mensagem' => 'Estagiario'
						];
                        return $this->respondCreated($arr);
            		}else{
                        header('Content-Type: application/json');
						$arr = [
							'sucesso' => false,
							'mensagem' => 'possui'
						];
                        return $this->respondCreated($arr);
                    }

            	}elseif ($tipo == 'empregador') {
            		$empresa = @$_POST['empresa'];
        	    	$contato = @$_POST['contato'];
        	    	$endereco = @$_POST['endereco'];
        	    	$descricao = @$_POST['descricao'];

                    $empregador = new App\ModelsEmpregador\Empregador( $email, $senha, $empresa, $contato, $endereco, $descricao, $tipo);

            		if($this->cadastrarEmpregador($empregador)){
            			header('Content-Type: application/json');
						$arr = [
							'sucesso' => true,
							'mensagem' => 'Empregador'
						];
						return $this->respondCreated($arr);
            		}else{
                         header('Content-Type: application/json');
						 $arr = [
							'sucesso' => false,
							'mensagem' => 'possui'
						];
						return $this->respondCreated($arr);
                    }
                    header('Content-Type: application/json');
					$arr = [
						'sucesso' => false,
						'mensagem' => 'estou com problemas'
					];
					return $this->respondCreated($arr);
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
    
		public function cadastrarEstagiario($estagiario){
			$db = db_connect();
			$sql = "SELECT id_users FROM estagiario WHERE email = ? AND senha = ?";
			$senhaCriptografada = md5($estagiario->obtenhaSenha());
			$result = $db->query($sql, [$estagiario->obtenhaEmail(), $senhaCriptografada])->getRow();

			/*$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e");
			$sql->bindValue(":e",$estagiario->obtenhaEmail());
			$sql->execute();*/

			if($result){
				return false;
			}else{
				$sql = "INSERT INTO estagiario(nome,email,senha,curso,ano,curriculo,tipo) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$db->setQuery($sql, [$estagiario->obtenhaEmail(), $estagiario->obtenhaNome(),
									md5($estagiario->obtenhaSenha()), $estagiario->obtenhaCurso(),
									$estagiario->obtenhaAno(), $estagiario->obtenhaCurriculo(),
									$estagiario->obtenhaTipoUsuario()]);

                /*$sql->bindValue(":e",$estagiario->obtenhaEmail());
				$sql->bindValue(":n",$estagiario->obtenhaNome());
				$sql->bindValue(":s",md5($estagiario->obtenhaSenha()));
				$sql->bindValue(":c",$estagiario->obtenhaCurso());
				$sql->bindValue(":a",$estagiario->obtenhaAno());
				$sql->bindValue(":m",$estagiario->obtenhaCurriculo());
				$sql->bindValue(":p",$estagiario->obtenhaTipoUsuario());
				$sql->execute();*/
				
				return true;
			}
		}
        
		public function cadastrarEmpregador( $empregador){

			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT id_users FROM empregador WHERE email = :e");
			$sql->bindValue(":e",$empregador->obtenhaEmail());
			$sql->execute();
			if($sql->rowCount() > 0){
				return false;
			}else{
				$sql = $pdo->prepare("INSERT INTO empregador(email,senha,empresa,contato,endereco,descricao,tipo) VALUES (:e, :s, :m, :c, :n, :d, :p)");
				$sql->bindValue(":e",$empregador->obtenhaEmail());
				$sql->bindValue(":s",md5($empregador->obtenhaSenha()));
				$sql->bindValue(":m",$empregador->obtenhaEmpresa());
				$sql->bindValue(":c",$empregador->obtenhaContato());
				$sql->bindValue(":n",$empregador->obtenhaEndereco());
				$sql->bindValue(":d",$empregador->obtenhaDescricao());
				$sql->bindValue(":p",$empregador->obtenhaTipoUsuario());
				$sql->execute();

				return true;
			}
		}
    }