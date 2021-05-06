<?php
class CadastrarUsuarioController{

    public function index(){
            
        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
            'auto_reload' => true,
        ]);

        $template = $twig->load('cadastrar.html');
        return $template->render();
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

    	$confirmaSenha = @$_POST['confirmasenha'];
    	$tipo = @$_POST['tipo'];

        if(!preg_match("/^[a-zA-Z'-]+$/", $senha)){
            if($senha == $confirmaSenha){
            	if($tipo == 'estagiario'){

                    $curso = @$_POST['curso'];
                    $ano = @$_POST['ano'];
                    $curriculo = @$_POST['curriculo'];
                    $nome = @$_POST['nome'];

            		$estagiario = new Estagiario($nome, $email, $senha, $curso, $ano, $curriculo, $tipo);
 
            		if($this->cadastrarEstagiario($estagiario)){
                        header('Content-Type: application/json');
                        $arr = array('sucesso' => true, 'mensagem' => "Estagiario");
                        echo json_encode($arr);
            		}else{
                        header('Content-Type: application/json');
                        $arr = array('sucesso' => false, 'mensagem' => "possui" );
                        echo json_encode($arr);
                    }

            	}elseif ($tipo == 'empregador') {

            		$empresa = @$_POST['empresa'];
        	    	$contato = @$_POST['contato'];
        	    	$endereco = @$_POST['endereco'];
        	    	$descricao = @$_POST['descricao'];

                    $empregador = new Empregador( $email, $senha, $empresa, $contato, $endereco, $descricao, $tipo);

            		if($this->cadastrarEmpregador($empregador)){
            			header('Content-Type: application/json');
                        $arr = array('sucesso' => true, 'mensagem' => "Empregador" );
                        echo json_encode($arr);
            		}else{
                        
                         header('Content-Type: application/json');
                        $arr = array('sucesso' => false, 'mensagem' => "possui" );
                        echo json_encode($arr);
                    }
                    header('Content-Type: application/json');
                    $arr = array('sucesso' => false, 'mensagem' => "estou com problemas" );
                    echo json_encode($arr);
            	}
            }else{
                    $arr = array('sucesso' => false, 'mensagem' => "diferente");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
            }

        }else{
            $arr = array('sucesso' => false, 'mensagem' => "invalido");
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
    }
    
		public function cadastrarEstagiario($estagiario){
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT id_users FROM estagiario WHERE email = :e");
			$sql->bindValue(":e",$estagiario->obtenhaEmail());
			$sql->execute();
			if($sql->rowCount() > 0){
				return false;
			}else{

				$sql = $pdo->prepare("INSERT INTO estagiario(nome,email,senha,curso,ano,curiculo,tipo) VALUES (:n, :e, :s, :c, :a, :m, :p)");

                $sql->bindValue(":e",$estagiario->obtenhaEmail());
				$sql->bindValue(":n",$estagiario->obtenhaNome());
				$sql->bindValue(":s",md5($estagiario->obtenhaSenha()));
				$sql->bindValue(":c",$estagiario->obtenhaCurso());
				$sql->bindValue(":a",$estagiario->obtenhaAno());
				$sql->bindValue(":m",$estagiario->obtenhaCurriculo());
				$sql->bindValue(":p",$estagiario->obtenhaTipoUsuario());
				$sql->execute();
				
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