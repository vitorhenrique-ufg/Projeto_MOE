<?php

    class LoginController{

        public function index(){

            $loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);
            $template = $twig->load('login.html');
                $parameters['error'] = $_SESSION['msg_error'] ?? null;    
            return $template->render($parameters);
        }

        public function verificaLogin(){
              
            $userEstagio = new EstagiarioController;
            $userEmpresa = new EmpregadorController;
            
            if($userEstagio->autentiqueUsuario(@$_POST['email'],@$_POST['senha'])){
                header('Content-Type: application/json');
                $arr = array('sucesso' => true, 'mensagem' => "Estagiario" );
                echo json_encode($arr);
                //header('Location: http://localhost/Login/Estagiario/index');
            }
            elseif ($userEmpresa->autentiqueUsuario(@$_POST['email'],@$_POST['senha'])) {
                header('Content-Type: application/json');
                $arr = array('sucesso' => true, 'mensagem' => "Empregador" );
                echo json_encode($arr);
                
            }else{
                $arr = array('sucesso' => false, 'mensagem' => "Email ou Senha errados");
                header('Content-Type: application/json');
                echo json_encode($arr);
                //header('Location: index');
            }
        }
    }