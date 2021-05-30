<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Cadastrar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style {csp-style-nonce}>
	
	*, *:before, *:after { 
      margin:0;
      padding:0;
      font-family: Arial,sans-serif;
    }
   
    a{
      text-decoration: none;
    }
     
  
    a.links{
      display: none;
    }

    .content{
      width: 500px;
      min-height: 560px;    
      margin: 0px auto;
      position: relative;   
    }

    h1{
      
      color: #8303a3;
      padding: 2px 0 10px 0;
      font-family: Arial,sans-serif;
      font-weight: bold;
      text-align: center;
      padding-bottom: 30px;
    }

    h1:after{
      content: ' ';
      display: block;
      width: 100%;
      height: 2px;
      margin-top: 10px;
      background: -webkit-linear-gradient(left, rgba(181, 78, 204,0) 0%,rgba(181, 78, 204,0.8) 20%,rgba(181, 78, 204,1) 53%,rgba(181, 78, 204,0.8) 79%,rgba(181, 78, 204,0) 100%);
    }

    p{
      margin-top: 5px;
      margin-bottom:5px;
    }
     
    .content p:first-child{
      margin: 0px;
    }
     
    label{
      font-weight: bold;
      color: #405c60;
      position: relative;
    }

    ::-webkit-input-placeholder  {
      color: #bebcbc; 
      font-style: italic;
    }
     
    input:-moz-placeholder,
    textarea:-moz-placeholder{
      color: #bebcbc;
      font-style: italic;
    }

    
     
    input:not([type="radio"]){
      outline: none;
      width: 95%;
      margin-top: 4px;
      padding: 10px;    
      border: 1px solid #b2b2b2;
     
      -webkit-border-radius: 3px;
      border-radius: 3px;
     
      -webkit-box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
      box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
     
      -webkit-transition: all 0.2s linear;
      transition: all 0.2s linear;
    }
  
    input[type="submit"]{
      width: 100%!important;
      cursor: pointer;  
      background: #9900bf;
      padding: 8px 5px;
      color: #fff;
      font-size: 20px;  
      border: 1px solid #fff;   
      margin-bottom: 10px;  
      text-shadow: 0 1px 1px #333;
     
      -webkit-border-radius: 5px;
      border-radius: 5px;
     
      transition: all 0.2s linear;
    }
    
    .curso{
      outline: none;
      width: 100%;
      margin-top: 4px;
      padding: 10px;    
      border: 1px solid #b2b2b2;
     
      -webkit-border-radius: 3px;
      border-radius: 3px;
     
      -webkit-box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
      box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
     
      -webkit-transition: all 0.2s linear;
      transition: all 0.2s linear;
    }
   
    input[type="submit"]:hover{
      background: #d27fe3;
    }

    .link{
      position: absolute;
      background: #eedcf5;
      color: #7f7c7c;
      left: 0px;
      height: 20px;
      width: 440px;
      padding: 17px 30px 20px 30px;
      font-size: 16px;
      text-align: right;
      border-top: 1px solid #dbe5e8;
     
      -webkit-border-radius: 0 0  5px 5px;
      border-radius: 0 0  5px 5px;
    }
     
    .link a {
      font-weight: bold;
      background: #f7f8f1;
      padding: 6px;
      color: #9600bf;
      margin-left: 10px;
      border: 1px solid #eca6ff;
     
      -webkit-border-radius: 4px;
      border-radius: 4px;  
     
      -webkit-transition: all 0.4s linear;
      transition: all 0.4s  linear;
    }
     
    .link a:hover {
      color: #9600bf;
      background: #f7f7f7;
      border: 1px solid #9600bf;
    }

    #cadastro, 
    #login{
      position: absolute;
      top: 0px;
      width: 88%;   
      padding: 18px 6% 60px 6%;
      margin: 10px 0 35px 0;
      background: #f7f7f7;
      border: 1px solid #9600bf;
       
      -webkit-box-shadow: 5px;
      border-radius: 5px;
       
      -webkit-animation-duration: 0.5s;
      -webkit-animation-timing-function: ease;
      -webkit-animation-fill-mode: both;
     
      animation-duration: 0.5s;
      animation-timing-function: ease;
      animation-fill-mode: both;
    }
    .msg-erro{
        color: red;
        font-size: 18px;
        margin-left: 132px;
    }
    
    .d-none{
        display: none;
    }

    .fa.fa-exclamation-triangle::before{
        margin-right: 10px;
    }  

	input[type="radio"]:hover{
		cursor: pointer;
	}

	.perfil{
	  	border-radius: 50%;
	  	width: 20px;
	  	height: 20px;
	  	border: 2px solid #999;
	  	transition: 0.2s all linear;
	  	margin-right: 5px;
	  	position: relative;
	  	top: 4px;
	}

	.possui{
		color: red;
		font-size: 18px;
		margin-left: 115px;
	}

	.invalido{
		color: red;
		font-size: 18px;
		margin-left: 132px;
	}

	.diferente{
		color: red;
		font-size: 18px;
		margin-left: 97px;
	}

	.texto.radioButton{
		padding-right: 8%;
	}

	.tiposUsuario{
		margin-left:90px;
	}

	.div-empregador, .div-estagiario{
		margin-top: 15px;
	}

</style>

<body>
	<div class="container">
        <div class="content">      
            <div id="login">
				<form onsubmit="return false">
					<h1>Cadastro</h1>
					<p> 
		                <label for="email">E-mail:</label>
		                <input id="email" name="email"  type="email" placeholder="lucas@gmail.com" required/>
		            </p>

					<p> 
                        <label for="senha">Senha:</label>
                        <input id="senha" name="senha" type="password" placeholder="Sua senha" maxlength="15" required /> 
                    </p>

                    <p> 
                        <label for="confirmasenha">Confirme a senha:</label>
                        <input id="confirmasenha" name="confirmasenha" type="password" placeholder="Sua senha" maxlength="15" required /> 
                    </p>

					

					<div class="tiposUsuario">
						<input type="radio" id="tipo1" name="contact" value="estagiario" class="perfil"
							onclick=aoSelecionarTipoUsuario()>
						<label for="estagiario" class="texto radioButton">Estagiário</label>

						<input type="radio" id="tipo2" name="contact" value="empregador" class="perfil"
							onclick=aoSelecionarTipoUsuario()>
						<label for="empregador" class="texto ">Empregador</label>
					</div>

					<div class="div-estagiario">
						<p> 
			                <label for="nome">Nome completo:</label>
			                <input id="nome" name="nome"  type="text" placeholder="Ex: Lucas Oliveira de Souza" maxlength="50" required/>
			            </p>

			            <p> 
			                <label for="curso">Curso:</label>
			                <select id="curso" name="curso" class="curso">
			                	<option value="Engenharia de Software">
			                		Engenharia de Software
			                	</option>

			                	<option value="Sistema de Informação">
			                		Sistema de Informação
			                	</option>

			                	<option value="Engenharia de Computação">
			                		Engenharia de Computação
			                	</option>

			                </select>
			                
			            </p>

			            <p> 
			                <label for="ano">Ano de ingresso:</label>
			                <input id="ano" name="ano"  type="text" placeholder="Ex: 2019" maxlength="5" required/>
			            </p>

						<p> 
			                <label for="curriculo">Curriculo:</label>
			                <input id="curriculo" name="curriculo"  type="text" placeholder="Ex: Desenvolvedor" maxlength="5" required/>
			            </p>
						
						
					</div>

					<div class="div-empregador">
						<p> 
			                <label for="empresa">Nome da empresa:</label>
			                <input id="empresa" name="empresa"  type="text" placeholder="Ex: Totvs" maxlength="50" required/>
			            </p>

						<p> 
			                <label for="contato">Contato:</label>
			                <input id="contato" name="contato"  type="text" placeholder="Ex: Paulo" maxlength="50" required/>
			            </p>

			            <p> 
			                <label for="endereco">Endereço:</label>
			                <input id="endereco" name="endereco"  type="text" placeholder="Ex: Av. 2, 253, Marista" maxlength="50" required/>
			            </p>

						<p> 
			                <label for="descricao">Descrição:</label>
			                <input id="descricao" name="descricao"  type="text" placeholder="descreva a empresa" maxlength="50" required/>
			            </p>


					</div>

					<span class="invalido d-none"><i class="fa fa-exclamation-triangle">Senhas Inválidas!</i></span>
					<span class="diferente d-none"><i class="fa fa-exclamation-triangle">As duas senhas são
							diferentes</i></span>
					<span class="possui d-none"><i class="fa fa-exclamation-triangle">Usuário já possui cadastro</i></span>

					<p> 
                        <input type="submit" value="Entrar" onclick="aoClicarCadastrar()" /> 
                    </p>


					<p class="link">
                        Já possui cadastro?
                        <a href="http://localhost">Logar</a>
                    </p>
					
				</form>
			</div>
		<div>
	</div>

<script defer>
		const camposEstagiario = document.querySelector('.div-estagiario');
		const camposEmpregador = document.querySelector('.div-empregador');
		const radioEstagiario = document.querySelector('input[id="tipo1"]');
		const radioEmpregador = document.querySelector('input[id="tipo2"]');

		aoSelecionarTipoUsuario();

		function aoSelecionarTipoUsuario() {
			const childrensEstagiario = Array.from(camposEstagiario.children);
			const childrensEmpregador = Array.from(camposEmpregador.children);

			if (radioEstagiario.checked) {
				camposEmpregador.classList.add('d-none');
				camposEstagiario.classList.remove('d-none');

				childrensEstagiario.forEach(el => {

					el.firstElementChild.setAttribute('required', '');
				});
				childrensEmpregador.forEach(el => {

					el.firstElementChild.removeAttribute('required', '');
				});

				return;
			}
			if (radioEmpregador.checked) {
				camposEmpregador.classList.remove('d-none');
				camposEstagiario.classList.add('d-none');

				childrensEstagiario.forEach(el => {

					el.firstElementChild.removeAttribute('required');
				});
				childrensEmpregador.forEach(el => {

					el.firstElementChild.setAttribute('required', '');
				});

				return;
			}
			camposEmpregador.classList.add('d-none');
			camposEstagiario.classList.add('d-none');

		}

		
		function aoClicarCadastrar() {

			const radioEstagiario = document.querySelector('input[id="tipo1"]');
			const radioEmpregador = document.querySelector('input[id="tipo2"]');
			const invalido = document.querySelector('.invalido');
			const possui = document.querySelector('.possui');
			const diferente = document.querySelector('.diferente');

			

			if (radioEstagiario.checked) {
				debugger;
				$.ajax({
            		type: "POST",

		           	url: "http://localhost/CadastrarUsuarioController/verificaCadastro",
		            data: { 
		            	email: document.getElementById('email').value,
						senha: document.getElementById('senha').value,
						confirmasenha: document.getElementById('confirmasenha').value,
						nome: document.getElementById('nome').value,
						curso: document.getElementById('curso').value,
						ano: document.getElementById('ano').value,
						curriculo: document.getElementById('curriculo').value,
						tipo: "estagiario"
		        	},

		            success: function (result) {
		                if (result.sucesso == false) {
							if (result.mensagem == 'invalido') {
								possui.classList.add('d-none');
								diferente.classList.add('d-none');
								invalido.classList.remove('d-none');
							} else if (result.mensagem == 'possui') {
								invalido.classList.add('d-none');
								diferente.classList.add('d-none');
								possui.classList.remove('d-none');
							} else {
								possui.classList.add('d-none');
								invalido.classList.add('d-none');
								diferente.classList.remove('d-none');
							}

						}
						if (result.sucesso == true) {

							if (result.mensagem == 'Estagiario') {
								
								window.location.href = "http://localhost";
							}
						} 
		            },
		            error: function (e1) {
		                alert("deu errado");
		            }
       	 		}); 
			}

			if (radioEmpregador.checked) {
				$.ajax({
					type: "POST",
					//contentType: "application/json",
					//headers: {'Content-Type': 'application/x-www-form-urlencoded'},

					url: "http://localhost/CadastrarUsuarioController/verificaCadastro",
					data: {
						email: document.getElementById('email').value,
						senha: document.getElementById('senha').value,
						confirmasenha: document.getElementById('confirmasenha').value,
						tipo: "empregador",
						empresa: document.getElementById('empresa').value,
						contato: document.getElementById('contato').value,
						endereco: document.getElementById('endereco').value,
						descricao: document.getElementById('descricao').value
					},
					success: function (result) {
						
						if (result.sucesso == false) {
							if (result.mensagem == 'invalido') {
								possui.classList.add('d-none');
								diferente.classList.add('d-none');
								invalido.classList.remove('d-none');
							}  
							if (result.mensagem == 'possui') {
								
								invalido.classList.add('d-none');
								diferente.classList.add('d-none');
								possui.classList.remove('d-none');
							} if (result.mensagem == 'diferente'){
								possui.classList.add('d-none');
								invalido.classList.add('d-none');
								diferente.classList.remove('d-none');
							}

						}
						
						if (result.sucesso == true) {	
							window.location.href = "http://localhost";
							
						} 
					},
					error: function (e1) {
						alert('Algo deu errado');
					}
				});
			}
		}

</script>
</body>

</html>