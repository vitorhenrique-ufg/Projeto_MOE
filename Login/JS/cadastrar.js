function aoClicarBotaoVoltar(){
	window.location.href = "index.php";
}

function coordenador(){
				document.getElementById("teste").innerHTML =""; 

				var inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Nome da Instituição";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "nomeInstituicao";                           
			    inp.setAttributeNode(att);
				
			    document.getElementById("teste").appendChild(inp); 
			 	//alert("Você escolheu Coordenador!");
			}

			function aoSelecionarTipoUsuario(){
				debugger;
				if(radioEstagiario.checked){
					camposEmpregador.classList.add('d-none');
					camposEstagiario.classList.remove('d-none');
					return;
				}
				if(radioEmpregador.checked){
					camposEmpregador.classList.remove('d-none');
					camposEstagiario.classList.add('d-none');	
					return;
				}
				camposEmpregador.classList.add('d-none');
				camposEstagiario.classList.add('d-none');
				
			}