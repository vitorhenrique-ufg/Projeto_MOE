<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Cadastrar</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style {csp-style-nonce}>
    *{
	    margin:0;
	    padding:0;	
    }

    #principal{
	    width: 420px;
	    margin: 90px auto 0px auto;
    }

    .login{
	    width: 420px;
	    margin: 100px auto 0px auto;
	    border-radius: 10px;
	    box-shadow: 0px 0px 10px;
    }

    .login.form-cadastrar{
	    width: 34%;
	    margin-top: 3%;
    }

    .titulo{
	    text-align: center;
    	color:  #0F6FC5;
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

.descricao{
	display: block;
	height: 80px;
	width: 400px;
	margin: 5px;
	border: 1px solid #0F6FC5;
	font-size: 16pt;
	padding: 10px 20px;
	border-radius: 5px;
	font-family: Arial;
}

.alinharBotoes{
	display: inline-flex;
	margin-left: 5%;
}

.invalido{
	color: red;
	font-size: 18px;
	margin-left: 132px;

}

.d-none{
	display: none;
}

.diferente{
	color: red;
	font-size: 18px;
	margin-left: 97px;

}

.possui{
	color: red;
	font-size: 18px;
	margin-left: 112px;
}

.botao{
	background-color: #0F6FC5;
	color: white;
}

.botao.tela-cadastro{
	background-color: #0F6FC5;
	color: white;
	width:200px;
	height: 45px;
}

.botao.tela-cadastro:hover{
	background-color: black;
	color: white;
	width:200px;
    cursor:pointer;
}

.botao.voltar{
	background:red;
}

.botao.voltar:hover{
	background:black;
    cursor:pointer;
}

.texto{
	font-family: Arial;
	font-size: 12pt;
	font-weight: bold;
}

.texto.radioButton{
	padding-right: 8%;
}

.tiposUsuario{
	margin-left:90px;
}

</style>

<body>
	<div id=" principal" class="login form-cadastrar">

		<form onsubmit="return false">
			<h1 class="titulo">Cadastro de vaga de estágio</h1>
			<div>
                <textarea name="descricaoVaga" id="descricaoVaga" placeholder="Descrição da vaga" class="descricao"
						maxlength="300" required></textarea>
            </div>
            <div>
                <textarea name="listaAtividades" id="listaAtividades" placeholder="Lista de atividades" class="descricao"
						maxlength="300" required></textarea>
            </div>
            <div>
                <textarea name="listaAtividades" id="habilidadesRequeridas" placeholder="Habilidades requeridas" class="descricao"
						maxlength="300" required></textarea>
            </div>
            <div>
                <input type="text" class="escrita generalInput" id="semestre" placeholder="Semestre do curso" required>
            </div>
            <div>
                <input type="timed" class="escrita generalInput" id="horas" placeholder="Quantidade de horas" required>
            </div>
            <div>
                <input type="number" id="remuneracaoVaga" class="escrita generalInput" id="remuneracao" placeholder="Remuneração" required>
            </div>
				<div class="alinharBotoes">
					<input type="submit" value="Cadastrar" class="escrita botao tela-cadastro"
						onclick="aoClicarCadastrarVaga()">
					<input type="submit" value="Voltar" class="escrita botao tela-cadastro voltar"
						onclick="aoClicarBotaoVoltar()">
				</div>
			</div>
			
		</form>
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
    function aoClicarBotaoVoltar(){
    	window.location.href = "http://localhost/EmpregadorController/index";
    }
	function aoClicarCadastrarVaga(){
		$.ajax({
            type: "POST",
            url: "http://localhost/VagasController/cadastrarVaga",
            data: { 
				descricao: document.getElementById('descricaoVaga').value, 
				atividade: document.getElementById('listaAtividades').value,
				semestre: document.getElementById('habilidadesRequeridas').value,
				habilidadesRequiridas: document.getElementById('semestre').value,
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