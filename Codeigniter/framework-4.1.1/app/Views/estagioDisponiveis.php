<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Vagas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/3f3417947e.js" crossorigin="anonymus"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style>


    .tableHeader{
        margin-left: 2rem;
       
    }

    .tableColumn{
        padding-right: 3rem;
        padding-bottom: 1rem;
    }
    
    .tableColumnHeader{
        padding-right: 4rem;
        font-size: 14pt;
        font-weight: bold;
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

    table{
        border-collapse: collapse; /* CSS2 */
        
    }
     
    td {
        border: 1px solid #8303a3;
    }
     
    th {
        border: 1px solid #8303a3;
        
    }
   

</style>

<body>
    

    <div class="container">
        <div class="content">      
            <div id="estagiario">
                <form onsubmit="return false"> 
                    <h1>Vagas Disponíveis!</h1> 
                     <table class="tableHeader">
                        <thead>
                            <tr>
                                <td class="tableColumnHeader">Descrição</td>
                                <td class="tableColumnHeader">Atividades</td>
                                <td class="tableColumnHeader">Habilidades Requeridas</td>
                                <td class="tableColumnHeader">Horas Semanais</td>
                                <td class="tableColumnHeader">Remuneração</td>
                            </tr>
                            </tr>
                        </thead>
                    </table>
                    <p class="link">
                       
                        <a href="http://localhost/EstagiarioController/index">Voltar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    
</body>

<script defer>
        obtenhaVagas();

        
        function obtenhaVagas(){
            $.ajax({
                type: "POST",
                url: "http://localhost/EstagiarioController/vagasDisponiveis",
                data: {},
                success: function (result) {

                    if (result.sucesso) {
                        const empresasCadastradas = result.vagas;
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
                    
                    tableData.classList.add('tableColumn');
                    row.appendChild(tableData);
                    body.appendChild(row);
                }
                
                header.appendChild(body);
            });
        }  

</script>

</html>