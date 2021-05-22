<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Empresas</title>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/3f3417947e.js" crossorigin="anonymus"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<style>
    .escrita{
        height: 40px;
        width: 400px;
        margin: 5px;
        border: 1px solid #0F6FC5;
        font-size: 12pt;
        padding: 10px 20px;
        border-radius: 5px;
        font-family: Arial;
        font-weight: bold
    }
    .botao{
        background-color: red;
        width: 9rem;
        color: white;
	    background-color: red;
        width: 9rem;
	    color: white;
    }
    
    .botao:hover{
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .escrita.botao i{
        padding-right: 0.7rem;
    }

    .tableHeader{
        margin-left: 10rem;
        margin-top: 5rem;
    }

    .tableColumn{
        padding-right: 3rem;
    }
    
    .tableColumnHeader{
        padding-right: 13rem;
        font-size: 14pt;
        font-weight: bold;
    }

    .tableColumnHeader.contato{
        padding-right: 7rem !important;
    }

    .escrita.botao-seguir{
        width: 21rem;
        background: mediumblue;
        color: white;
        margin-left: 32rem;
        margin-top: 2rem;
    }

    .escrita.botao-seguir i {
        padding-right: 0.7rem;
    }

    .escrita.botao-seguir:hover{
        background: green;
        cursor: pointer;
    }

    input[type="checkbox"]:hover{
        cursor:pointer;
    }

    .titulo{
        margin-left: 31rem;
        text-decoration: underline;
        color: blue;
        font-size: 15pt
    }

</style>

<body>
    
    <button type="submit" value="VOLTAR" class="escrita botao" onclick="seguirVoltar()"">
        <i class="fas fa-arrow-circle-left" ></i>VOLTAR</button>
    <div class="titulo">
        <h1>Empresas cadastradas</h1>
    </div>

    <table class="tableHeader">
        <thead>
            <tr>
                <td class="tableColumnHeader">Nome</td>
                <td class="tableColumnHeader contato">Contato</td>
                <td class="tableColumnHeader">Endereço</td>
                <td class="tableColumnHeader">Descrição</td>
            </tr>
        </thead>
    </table>
    <button type="submit" value="SEGUIR" class="escrita botao-seguir" onclick="empresaParaSeguir()">
        <i class="fas fa-check-circle"></i>Seguir empresa(s) selecionada(s)</button>
</body>

<script defer>
        obtenhaEmpresas();

        function seguirVoltar(){
            window.location.href = "http://localhost/EstagiarioController/index";
        }
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
            const empresas = [];
            const empresasSelecionadas = Array.from(document.querySelectorAll('tr input:checked'));
            
            empresasSelecionadas.forEach(el => {
                const obj = {
                    Nome: el.parentElement.firstElementChild.textContent
                };
                empresas.push(obj);
            });

            const jsonEmpresas = JSON.stringify(empresas);
            debugger;
            $.ajax({
                type: "POST",
                url: "http://localhost/EstagiarioController/seguirEmpresasSelecionadas",
                data: {jsonEmpresas},
                success: function (result) {
                    if (result.sucesso) {
                        alert('Empresas seguidas com sucesso!');
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