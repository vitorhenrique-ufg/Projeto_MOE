<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style {csp-style-nonce}>

    *{
	    margin:0;
	    padding:0;	
    }


    .login{
        width: 420px;
        margin: 100px auto 0px auto;
        background: rgba(0, 0, 256, 0.1);
        border-radius: 10px;
        box-shadow: 0px 0px 10px;
    }

    .escrita{
        display: block;
        height: 40px;
        width: 400px;
        margin: 5px;
        border: 1px solid #0F6FC5;
        font-size: 16pt;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: Arial;
    }

    .escrita.generalInput{
        height: 30%;
        width: 85%;
        background-color: white;
    }

    .botao{
	    background-color: #0F6FC5;
	    color: white;
    }
    
    .botao:hover{
        background-color: black;
        color: white;
        cursor: pointer;
    }
    .msg-erro{
	    color: red;
	    font-size: 18px;
	    margin-left: 132px;
    }
    
    .d-none{
    	display: none;
    }
    
    .cadastrar{
	    color: #0F6FC5;
	    text-decoration: none;
	    text-align: center;
	    display: block;
    }

    .titulo{
	    text-align: center;
	
    	color:  #0F6FC5;
    }

    a:hover{
    	text-decoration: underline;
	    color: red;
    }

    .fa.fa-exclamation-triangle::before{
	    margin-right: 10px;
    }

</style>

<body>
    <div class="login">
        <h1 class="titulo">Bem-vindo ao MOE!</h1>
        <!--form method="POST" action="http://localhost/Login/Login/verificaLogin"-->
        <form onsubmit="return false">
            <input type="email" class="escrita generalInput" id="email" name="email" placeholder="E-mail" required>
            <input type="password" class="escrita generalInput" id="senha" name="senha" placeholder="Senha" required>
            <input type="submit" value="Entrar" class="escrita botao" onclick="aoClicarEntrar()">

            <span class="msg-erro d-none"><i class="fa fa-exclamation-triangle">Login inválido</i></span>

            <a href="http://localhost/CadastrarUsuarioController/index" class="cadastrar">Não possui cadastro?
                Cadastre-se!</a>
        </form>
    </div>
</body>
<script type="text/javascript">
    
    function aoClicarEntrar() {

        const mensagemErro = document.querySelector('.msg-erro');
        $.ajax({
            type: "POST",
            //contentType: "application/json",
            //headers: {'Content-Type': 'application/x-www-form-urlencoded'},

            url: "http://localhost/LoginController/verificaLogin",
            data: { email: document.getElementById('email').value, senha : document.getElementById('senha').value},

            success: function (result) {
                
                if (result.sucesso == false) {
                    
                    mensagemErro.classList.remove('d-none');
                    return;
                }
                if(result.sucesso==true){
                    //location.href=result.redirect;
                    if(result.mensagem == 'Estagiario'){
                        
                        window.location.href = "http://localhost/EstagiarioController/index";
                    }
                    if(result.mensagem == 'Empregador'){
                        window.location.href = "http://localhost/EmpregadorController/index";
                    }
                }		
            },
            error: function (e1) {
                e = e1;
            }
        }); 
    }
</script>
</html>