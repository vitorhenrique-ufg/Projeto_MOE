<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Login Empregador</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style {csp-style-nonce}>

    *{
        margin:0;
        padding:0;  
    }
    .menu-empregador{
        width: 100%;
        height: 47px;
        background: rgba(0, 0, 256, 0.1);
        font-family: 'Arial';
    }
    .menu-empregador ul{
        list-style: none;
        position: relative;
    }
    .menu-empregador ul ul{
        visibility: hidden;
    }
    .menu-empregador ul li{
        width: 150px;
        float: left;
    }
    .menu-empregador ul li a {
        padding: 15px;
        display: block;
        text-decoration: none;
        text-align: center;
        background-color: #9900bf;
        color: white;
    }
    .menu-empregador ul li a:hover {
        background-color: rgba(146, 0, 191, 0.2);
        color: black;
    }
    .menu-empregador ul li:hover ul{
        visibility: visible;
    }
    
    .botao-editar{
        background-color: #0F6FC5;
        color: white;
        width:95%;
        height: 45px;
        margin-left:7px;
    }
    .botao-editar:hover{
        background-color: black;
        color: white;
        cursor:pointer;
    }
    
   
    a{
      text-decoration: none;
    }
     
  
    a.links{
      display: none;
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
      margin-bottom:15px;
    }
     
    
     
    label{
      font-family: 'Arial';
      font-weight: bold;
      color: #405c60;
      position: relative;
    }

    ::-webkit-input-placeholder  {
      color: #bebcbc; 
      font-family: 'Arial';
      font-style: italic;
    }
     
    input:-moz-placeholder,
    textarea:-moz-placeholder{
      color: #bebcbc;
      font-style: italic;
      font-family: 'Arial';
    }

    input {
      font-family: 'Arial';
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
     
   
    input[type="submit"]:hover{
      background: #d27fe3;
    }
     
    #cadastro, 
    #login{
      position: relative;
      top: 0px;
      width: 400px;   
      padding: 18px 1% 0px 1%;
      margin: 10px 0 0px 400px;
      background: #f7f7f7;
      border: 1px solid #9600bf;
      border-radius: 5px;
       
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

</style>

<body>

	<nav class="menu-empregador">
		<ul>
			<li><a href="#" onclick="aoSelecionarAlterarDados()">Alterar dados</a></li>
			<li><a href="#">Estágio</a>
				<ul>
					<li><a href="http://localhost/EmpregadorController/cadastrarVagaEstagio">Cadastrar vaga</a></li>
					
				</ul>
			</li>
			<li><a href="#" onclick="aoSelecionarConsultarEstagiario()">Estagiários</a></li>
			<li><a href="http://localhost/EmpregadorController/encerreLogin"> Sair</a></li>
		</ul>
	</nav>
	
	
</body>

<script defer>


function aoSelecionarAlterarDados() {
	window.location.href = "http://localhost/EmpregadorController/atualiza";
	
}

function aoClicarAlterar() {
	$.ajax({
		type: "POST",
		url: "http://localhost/EmpregadorController/atualizaEmpregador",
		data: {
			email: document.getElementById('email').value,
			senha: document.getElementById('senha').value,
			confirmasenha: document.getElementById('confirmasenha').value,
			empresa: document.getElementById('empresa').value,
			contato: document.getElementById('contato').value,
			endereco: document.getElementById('endereco').value,
			descricao: document.getElementById('descricao').value,
		},
		success: function (result) {
			if (result.sucesso == true) {
				window.location.href = "http://localhost/EmpregadorController/index";
				
			} else {
				if (result.mensagem == "diferente") {
					alert("As senhas são diferentes.");
				} else if (result.mensagem == "possui") {
					alert("A senha deve contar pelo menos um caracter especial.");
				}
			}

		},
		error: function (e1) {
			alert("deu errado");
		}
	});
}



function aoSelecionarConsultarEstagiario() {
	window.location.href = "http://localhost/EmpregadorController/estagiarios";
}

</script>

</html>