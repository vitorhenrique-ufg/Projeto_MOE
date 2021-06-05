<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Empresas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/3f3417947e.js" crossorigin="anonymus"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
 
<style>
    .escrita{
        height: 40px;
        width: 400px;
        margin: 5px;
        border: 1px solid #eca6ff;
        font-size: 12pt;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: Arial;
        font-weight: bold
    }

    .escrita.botao i{
        padding-right: 0.7rem;
    }

   .tableHeader{
        margin-left: 2rem;
       
    }

    .tableColumn{
        padding-right: 3rem;
        padding-bottom: 1rem;
    }
    
    .tableColumnHeader{
        padding-right: 5rem;
        font-size: 14pt;
        font-weight: bold;
    }

    .tableColumnHeader.contato{
        padding-right: 7rem !important;
    }

    .escrita.botao-seguir{
        width: 21rem;
        background: #8303a3;
        color: white;
        margin-left: 16rem;
        margin-top: 2rem;
    }

    .escrita.botao-seguir i {
        padding-right: 0.7rem;
    }

    .escrita.botao-seguir:hover{
        background: #eca6ff;
        cursor: pointer;
    }

    input[type="checkbox"]:hover{
        cursor:pointer;
    }


    .link a {
      font-weight: bold;
      background: #f7f8f1;
      padding: 6px;
      color: #9600bf;
      padding: 6px;
      margin-left: 750px;
      background: #f7f7f7;
      border: 1px solid #eca6ff;
     
      -webkit-border-radius: 4px;
      border-radius: 4px;  
     
      
    }
     
    .link a:hover {
      color: #9600bf;
      background: #f7f7f7;
      border: 1px solid #9600bf;
    }


    .content{
      width: 80%;
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

    #estagiario{
      position: absolute;
      top: 0px;
      width: 70%;   
      padding: 18px 6% 5px 0;
      margin: 35px 0 35px 100px;
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
        color: green;
        font-size: 18px;
        margin-left: 20rem;
    }
    
    .d-none{
        display: none;
    }

    .fa.fa-check::before{
        margin-right: 10px;
    }

    

</style>

<body>
  
     <div class="container">
        <div class="content">      
            <div id="estagiario">
                <form onsubmit="return false"> 
                    <h1>Empresas cadastradas</h1> 
                     <table class="tableHeader">
                        <thead>
                            <tr>
                               <td class="tableColumnHeader">Nome</td>
                                <td class="tableColumnHeader contato">Contato</td>
                                <td class="tableColumnHeader">Endereço</td>
                                <td class="tableColumnHeader">Descrição</td>
                            </tr>
                            </tr>
                        </thead>
                    </table>
                    <span class="msg-erro d-none"><i class="fa fa-check">Empresas seguidas!</i></span> 
                    <button type="submit" value="Seguir" class="escrita botao-seguir" onclick="empresaParaSeguir()">
                        <i class="fas fa-check-circle"></i>Seguir empresa(s) selecionada(s)
                    </button>
                    <p class="link">
                       
                        <a href="http://localhost/EstagiarioController/index">Voltar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>


   
  
</body>

<script defer>
        obtenhaEmpresas();
        
        function obtenhaEmpresas(){
            $.ajax({
                type: "POST",
                url: "http://localhost/EmpregadorController/obtenhaEmpresasCadastradas",
                data: {},
                success: function (result) {
                    if (result.sucesso) {
                        const empresasCadastradas = result.empresas;
                        monteGrid(empresasCadastradas);
                        return;
                    }
                },
                error: function (e1) {
                    alert(e1.responseText);
                }
            }); 
        }

        function monteGrid(empresas){
            const header = document.querySelector('.tableHeader');
            const body = document.createElement('tbody');

            empresas.forEach(empresa => {
                const row = document.createElement('tr');

                for(propriedade in empresa){
                    const tableData = document.createElement('td');
                    tableData.innerText = empresa[propriedade];
                    if(empresa[propriedade] == 'contato'){
                        tableData.classList.add('tableColumn contato');
                        row.appendChild(tableData);
                        continue;
                    }
                    tableData.classList.add('tableColumn');
                    row.appendChild(tableData);
                    body.appendChild(row);
                }
                monteCheckSeguirEmpresa(row, body);
                header.appendChild(body);
            });
        }

        function monteCheckSeguirEmpresa(row, body){
            const input = document.createElement('input');
            input.setAttribute('type', 'checkbox');
            const label = document.createElement('label');
            label.innerText = "Seguir empresa";

            row.appendChild(input);
            row.appendChild(label);
            body.appendChild(row);
        }

        function empresaParaSeguir(){
            const mensagemErro = document.querySelector('.msg-erro');
            const empresas = [];
            const empresasSelecionadas = Array.from(document.querySelectorAll('tr input:checked'));
            
            if(empresasSelecionadas.length == 0){
                alert('É preciso selecionar ao menos uma empresa para seguir!');
                return;
            }

            empresasSelecionadas.forEach(el => {
                const obj = {
                    Nome: el.parentElement.firstElementChild.textContent
                };
                empresas.push(obj);
            });

            const jsonEmpresas = JSON.stringify(empresas);
            $.ajax({
                type: "POST",
                url: "http://localhost/EstagiarioController/seguirEmpresasSelecionadas",
                data: {jsonEmpresas},
                success: function (result) {
                    if (result.sucesso) {
                        mensagemErro.classList.remove('d-none');
                        return;
                    }
                },
                error: function (e1) {
                    alert(e1.responseText);
                }
            }); 
        }

</script>

</html>