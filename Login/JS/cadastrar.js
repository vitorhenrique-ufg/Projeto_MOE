function aoClicarBotaoVoltar(){
	window.location.href = "index.php";
}

function aoSelecionarTipoUsuario(){
				
				const childrensEstagiario = Array.from(camposEstagiario.children);
				const childrensEmpregador = Array.from(camposEmpregador.children);
				
				if(radioEstagiario.checked){
					camposEmpregador.classList.add('d-none');
					camposEstagiario.classList.remove('d-none');
					
					childrensEstagiario.forEach(el => {
						
						el.firstElementChild.setAttribute('required', '');
					});
					childrensEmpregador.forEach(el => {
						
						el.firstElementChild.removeAttribute('required', '');
					});
					
					return;
				}
				if(radioEmpregador.checked){
					camposEmpregador.classList.remove('d-none');
					camposEstagiario.classList.add('d-none');	
					
					childrensEstagiario.forEach(el => {
						
						el.firstElementChild.removeAttribute('required');
					});
					childrensEmpregador.forEach(el => {
						
						el.firstElementChild.setAttribute('required', '');
					});
					
					return;
				}
				camposEmpregador.classList.add('d-none');
				camposEstagiario.classList.add('d-none');
				
}