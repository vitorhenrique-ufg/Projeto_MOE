<?php

	Class EstagiarioController{

		public function index(){
			$loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);

            $template = $twig->load('telaPrincipalEstagiario.html');
            return $template->render();
		}

		public function encerreLogin(){
			session_destroy();
			header('Location: http://localhost/Login/Login/index');
		}

		public function retornaInformacao(){
			$id = $_SESSION['id_users'];
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT * FROM estagiario WHERE id_users = :id");
			$sql->bindValue(":id",$id);

			$sql->execute();

			if($sql->rowCount() > 0){

				$dado = $sql->fetch();
				@session_start();
				$_SESSION['id_users'] = $dado['id_users'];
				//echo $_SESSION['id_users'];
				
				header('Content-Type: application/json');
                $arr = array('sucesso' => true, 'nome' => $dado['nome'], 'senha' => $dado['senha'], 'email' => $dado['email'], 'curso' => $dado['curso'], 'ano' => $dado['ano'], 'curriculo' => $dado['curiculo'] );
                echo json_encode($arr);
			
			}else{
				header('Content-Type: application/json');
                $arr = array('sucesso' => false);
                echo json_encode($arr);
				
			}
		}

		
		public function autentiqueUsuario($email,$senha){
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT * FROM estagiario WHERE email = :e AND senha = :s");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();	
			
			
			if($sql->rowCount() > 0){

				$dado = $sql->fetch();
				@session_start();
				$_SESSION['id_users'] = $dado['id_users'];
				//echo $_SESSION['id_users'];
				
				return true;
			
			}else{
				return false;
				
			}
		}
		

		public function atualizaEstagiario(){
			if(!preg_match("/^[a-zA-Z'-]+$/", @$_POST['senha'])){
				if(@$_POST['senha'] == @$_POST['confirmasenha'] && @$_POST['senha'] != ''){
					$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
					$sql = $pdo->prepare("UPDATE estagiario SET nome = :n,email = :e,senha = :s,curso = :c,ano = :a,curiculo = :r  WHERE id_users = :id");
					$sql->bindValue(":n",@$_POST['nome']);
					$sql->bindValue(":e",@$_POST['email']);
					$sql->bindValue(":s",md5(@$_POST['senha']));
					$sql->bindValue(":c",@$_POST['curso']);
					$sql->bindValue(":a",@$_POST['ano']);
					$sql->bindValue(":r",@$_POST['curriculo']);
					$sql->bindValue(":id",$_SESSION['id_users']);
					$sql->execute();
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
	}


?>