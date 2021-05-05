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
            		$user = new Estagiario;

            		$curso = @$_POST['curso'];
        	    	$ano = @$_POST['ano'];
        	    	$curriculo = @$_POST['curriculo'];
        	    	$nome = @$_POST['nome'];

            		if($user-> cadastrarEstagiario($nome, $email, $senha, $curso, $ano, $curriculo, $tipo)){
            			
                        header('Content-Type: application/json');
                        $arr = array('sucesso' => true, 'mensagem' => "Estagiario" );
                        echo json_encode($arr);
            		}else{
                        header('Content-Type: application/json');
                        $arr = array('sucesso' => false, 'mensagem' => "possui" );
                        echo json_encode($arr);
                    }

            	}elseif ($tipo == 'empregador') {
            		$user = new Empregador;

            		$empresa = @$_POST['empresa'];
        	    	$contato = @$_POST['contato'];
        	    	$endereco = @$_POST['endereco'];
        	    	$descricao = @$_POST['descricao'];

            		if($user-> cadastrarEmpregador( $email,$senha,$empresa,$contato,$endereco,$descricao,$tipo)){
            			header('Content-Type: application/json');
                        $arr = array('sucesso' => true, 'mensagem' => "Empregador" );
                        echo json_encode($arr);
            		}else{
                        
                         header('Content-Type: application/json');
                        $arr = array('sucesso' => false, 'mensagem' => "possui" );
                        echo json_encode($arr);
                    }
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
}