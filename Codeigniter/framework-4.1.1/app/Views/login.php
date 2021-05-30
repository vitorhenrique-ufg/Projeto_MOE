<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
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
      margin-bottom:15px;
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

    input {
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
      margin: 35px 0 35px 0;
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

</style>

<body>
    <div class="container">
        <div class="content">      
            <div id="login">
                <form onsubmit="return false"> 
                    <h1>Bem-vindo ao MOE!</h1> 
                    <p> 
                        <label for="email">E-mail:</label>
                        <input id="email" name="email"  type="email" placeholder="lucas@gmail.com" required/>
                    </p>
                       
                    <p> 
                        <label for="senha">Senha:</label>
                        <input id="senha" name="senha" type="password" placeholder="Sua senha" required /> 
                    </p>
                    <span class="msg-erro d-none"><i class="fa fa-exclamation-triangle">Login inválido!</i></span>   
                    <p> 
                        <input type="submit" value="Entrar" onclick="aoClicarEntrar()" /> 
                    </p>
                       
                    <p class="link">
                        Ainda não tem conta?
                        <a href="http://localhost/CadastrarUsuarioController/index">Cadastre-se</a>
                    </p>
                </form>
              </div>
        </div>
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