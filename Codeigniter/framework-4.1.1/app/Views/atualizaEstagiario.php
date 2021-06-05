<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Login Estagiario</title>
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
      margin: 10px 0 35px 0;
      background: #f7f7f7;
      border: 1px solid #9600bf;
       
      -webkit-box-shadow: 5px;
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

    .invalido{
    color: red;
    font-size: 18px;
    margin-left: 132px;
  }

  .diferente{
    color: red;
    font-size: 18px;
    margin-left: 90px;
  }

</style>

<body>

        <div class="container">
            <div class="content">      
                <div id="login">
                    <form onsubmit="return false">
                         <h1>Alterar dados:</h1>
                        <p> 
                            <label for="email">E-mail:</label>
                            <input id="email" name="email"  type="email" required/>
                        </p>

                        <p> 
                            <label for="senha">Senha:</label>
                            <input id="senha" name="senha"  type="password" placeholder="Sua senha" required/>
                        </p>

                        <p> 
                            <label for="confirmasenha">Confirme a senha:</label>
                            <input id="confirmasenha" name="confirmasenha"  type="password" placeholder="Sua senha" required/>
                        </p>

                        <p> 
                            <label for="nome">Nome:</label>
                            <input id="nome" name="nome"  type="text" required/>
                        </p>


                        <p> 
                            <label for="curso">Curso:</label>
                            <input id="curso" name="curso"  type="text" required/>
                        </p>

                        <p> 
                            <label for="ano">Ano de ingresso:</label>
                            <input id="ano" name="ano"  type="text" placeholder="lucas@gmail.com" required/>
                        </p>

                        <p> 
                            <label for="curriculo">Curriculo:</label>
                            <input id="curriculo" name="curriculo"  type="curriculo" required/>
                        </p>
                        <span class="invalido d-none"><i class="fa fa-exclamation-triangle">Senhas Inválidas!</i></span>
					            	<span class="diferente d-none"><i class="fa fa-exclamation-triangle">As duas senhas são
							          	diferentes</i>
                        </span>
                        <p> 
                            <input type="submit" value="Alterar" onclick="aoClicarAlterar()" /> 
                        </p>
                        <p class="link">
                        Não deseja atualizar?
                        <a href="http://localhost/EstagiarioController/index">Voltar</a>
                    </p>
                    </form>
                </div>
            </div>
        </div>

</body>
<script defer>
  
aoSelecionarAlterarDadosEstagiario()
function aoSelecionarAlterarDadosEstagiario() {
  $.ajax({
      type: "POST",
      url: "http://localhost/EstagiarioController/retornaInformacao",
      data: {
      },
      success: function (result) {
          if (result.sucesso == true) {
              document.getElementById("email").value = result.email;
              document.getElementById("nome").value = result.nome;
              document.getElementById("curso").value = result.curso;
              document.getElementById("ano").value = result.ano;
              document.getElementById("curriculo").value = result.curriculo;
          }
      },
      error: function (e1) {
          alert("deu errado");
      }
  });

}

function aoClicarAlterar() {
  const invalido = document.querySelector('.invalido');
	const diferente = document.querySelector('.diferente');

    $.ajax({
        type: "POST",
        url: "http://localhost/EstagiarioController/atualizaEstagiario",
        data: {
            email: document.getElementById('email').value,
            senha: document.getElementById('senha').value,
            confirmasenha: document.getElementById('confirmasenha').value,
            nome: document.getElementById('nome').value,
            curso: document.getElementById('curso').value,
            ano: document.getElementById('ano').value,
            curriculo: document.getElementById('curriculo').value,
        },
        success: function (result) {
            if (result.sucesso == true) {
                window.location.href = "http://localhost/EstagiarioController/index";
            } else {
                if (result.mensagem == "diferente") {
                  invalido.classList.add('d-none');
					        diferente.classList.remove('d-none'); 
                } else if (result.mensagem == "possui") {
                  diferente.classList.add('d-none');
					        invalido.classList.remove('d-none');
                }
            }
        },
        error: function (e1) {
            alert("deu errado");
        }
    });
}
</script>
</html>