
	function aoClicarEntrar() {

		const mensagemErro = document.querySelector('.msg-erro');
		let t;
		$.ajax({
			type: "POST",
			//contentType: "application/json",
			//headers: {'Content-Type': 'application/x-www-form-urlencoded'},

			url: "http://localhost/Login/Login/verificaLogin",
			data: { email: document.getElementById('email').value, senha : document.getElementById('senha').value} ,

			success: function (result) {
				 
				if (result.sucesso == false) {
					
					mensagemErro.classList.remove('d-none');
					return;
				}
				if(result.sucesso==true){
					//location.href=result.redirect;
					if(result.mensagem == 'Estagiario'){
						 
						window.location.href = "http://localhost/Login/Estagiario/index";
					}
					if(result.mensagem == 'Empregador'){
						window.location.href = "http://localhost/Login/Empregador/index";
					}
				}		
				
			},
			error: function (e1) {
				e = e1;
				 
			}
		});
	}