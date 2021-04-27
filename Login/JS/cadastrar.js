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

			function estagiario(){
				document.getElementById("teste").innerHTML =""; 

				var inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);
			    

			    att = document.createAttribute("required");
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

			    inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Curso";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "curso";                           
			    inp.setAttributeNode(att);
				
			    document.getElementById("teste").appendChild(inp); 

				 inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Ano de Ingresso";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "ano";                           
			    inp.setAttributeNode(att);

			    document.getElementById("teste").appendChild(inp); 

			    inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Mini-curriculo";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "curriculo";                           
			    inp.setAttributeNode(att);
				
			    document.getElementById("teste").appendChild(inp);  
			 	//alert("Você escolheu Coordenador!");
			}

			function empregador(){
				document.getElementById("teste").innerHTML =""; 

				var inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Nome do contato";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "nomeContato";                           
			    inp.setAttributeNode(att);
				
			    document.getElementById("teste").appendChild(inp); 

			     inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Endereço";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "endereco";                           
			    inp.setAttributeNode(att);
				
			    document.getElementById("teste").appendChild(inp); 

			    inp = document.createElement("input");
			    var att = document.createAttribute("type");       
			    att.value = "text";   
			    inp.setAttributeNode(att);

			    att = document.createAttribute("placeholder");       
			    att.value = "Descrição";                           
			    inp.setAttributeNode(att); 

			    att = document.createAttribute("class");       
			    att.value = "escrita";                           
			    inp.setAttributeNode(att);

			    att = document.createAttribute("name");       
			    att.value = "descricao";                           
			    inp.setAttributeNode(att);
				
			    document.getElementById("teste").appendChild(inp); 
			 	//alert("Você escolheu Empregador!");
			 	//alert("Você escolheu Empregador!");
			}
			