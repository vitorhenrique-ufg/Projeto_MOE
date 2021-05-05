<?php

	Class EmpregadorController{
		

		public function index(){
			$loader = new \Twig\Loader\FilesystemLoader('View');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);

            $template = $twig->load('telaPrincipalEmpregador.html');
            return $template->render();
		}

		public function encerreLogin(){
			session_destroy();
			header('Location: http://localhost/Login/Login/index');
		}


		public function autentiqueUsuario($email,$senha){
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT * FROM empregador WHERE email = :e AND senha = :s");
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

		public function retornaInformacao(){
			$id = $_SESSION['id_users'];
			$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");
			$sql = $pdo->prepare("SELECT * FROM empregador WHERE id_users = :id");
			$sql->bindValue(":id",$id);

			$sql->execute();

			if($sql->rowCount() > 0){

				$dado = $sql->fetch();
				@session_start();
				$_SESSION['id_users'] = $dado['id_users'];
				//echo $_SESSION['id_users'];
				
				header('Content-Type: application/json');
                $arr = array('sucesso' => true, 'empresa' => $dado['empresa'], 'senha' => $dado['senha'], 'email' => $dado['email'], 'contato' => $dado['contato'], 'endereco' => $dado['endereco'], 'descricao' => $dado['descricao'] );
                echo json_encode($arr);
			
			}else{
				header('Content-Type: application/json');
                $arr = array('sucesso' => false);
                echo json_encode($arr);
				
			}
		}

		public function atualizaEmpregador(){
			if(!preg_match("/^[a-zA-Z'-]+$/", @$_POST['senha'])){

				if(@$_POST['senha'] == @$_POST['confirmasenha'] && @$_POST['senha'] != ''){

					$pdo = new PDO("mysql:dbname="."projeto_login".";host="."localhost","root","");

					$sql = $pdo->prepare("UPDATE empregador SET empresa = :m,email = :e,senha = :s,contato = :c,endereco = :n,descricao = :d  WHERE id_users = :id");

					$sql->bindValue(":m",@$_POST['empresa']);
					$sql->bindValue(":e",@$_POST['email']);
					$sql->bindValue(":s",md5(@$_POST['senha']));
					$sql->bindValue(":c",@$_POST['contato']);
					$sql->bindValue(":n",@$_POST['endereco']);
					$sql->bindValue(":d",@$_POST['descricao']);
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