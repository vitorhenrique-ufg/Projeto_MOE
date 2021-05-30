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

    
  	.hora{
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


</style>

<body>
	<div class="container">
        <div class="content">      
            <div id="login">
                <form onsubmit="return false"> 
                    <h1>Cadastrar vaga de estágio</h1> 
                    <p> 
                        <label for="descricaoVaga">Descricao:</label>
                        <input id="descricaoVaga" name="descricaoVaga"  type="text" placeholder="Descreva a vaga" required/>
                    </p>
                    
                    <p> 
                        <label for="listaAtividades">Lista de atividades:</label>
                        <input id="listaAtividades" name="listaAtividades"  type="text" placeholder="Listar atividades" required/>
                    </p>

                    <p> 
                        <label for="habilidadesRequeridas">Habilidades Requiridas:</label>
                        <input id="habilidadesRequeridas" name="habilidadesRequeridas"  type="text" placeholder="Descreva as habilidades requeridas" required/>
                    </p>

                    <p> 
                        <label for="semestre">Semestre requerido:</label>
                        <input id="semestre" name="semestre"  type="text" placeholder="Semestre" required/>
                    </p>   

                    <p> 
			            <label for="horas">Carga horária:</label>
			            <select id="horas" name="horas" class="hora">
			                <option value="20">
			                	20 horas
			                </option>
			                <option value="30">
			                	30 horas
			                </option>

			                

			                	
			            </select>
			                
			        </p>
                    <p> 
                        <label for="remuneracaoVaga">Remuneração:</label>
                        <input id="remuneracaoVaga" name="remuneracaoVaga"  type="text" placeholder="Remuneração" required/>
                    </p>

                    
                    
                    <p> 
                        <input type="submit" value="Cadastrar" onclick="aoClicarCadastrarVaga()" /> 
                    </p>
                       
                    <p class="link">
                        Cancelar cadastro de vaga?
                        <a href="http://localhost/EmpregadorController/index">Voltar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
	
</body>

<script defer>
    const inputRemuneracao = document.querySelector('#remuneracaoVaga');
    inputRemuneracao.value = 1;
    valideRemuneracao();

    function valideRemuneracao(){
        inputRemuneracao.addEventListener('blur', () => {
            if(inputRemuneracao.value < 1){
                inputRemuneracao.value = 1;
                return;
            }
            if(inputRemuneracao.value > 5000){
                inputRemuneracao.value = 5000;
             return;
            }
        });
    }
    
	function aoClicarCadastrarVaga(){
		$.ajax({
            type: "POST",
            url: "http://localhost/VagasController/cadastrarVaga",
            data: { 
				descricao: document.getElementById('descricaoVaga').value, 
				atividade: document.getElementById('listaAtividades').value,
				semestre: document.getElementById('semestre').value,
				habilidadesRequiridas: document.getElementById('habilidadesRequeridas').value,
				horasSemanais: document.getElementById('horas').value,
				remuneracao: document.getElementById('remuneracaoVaga').value
			},
            success: function (result) {
                
                if (result.sucesso == true) {
                   alert('deu certo');
                }
                if(result.sucesso==false){
                    alert('deu errado');
                }		
            },
            error: function (e1) {
                e = e1;
            }
        });
	}
	
</script>

</html>