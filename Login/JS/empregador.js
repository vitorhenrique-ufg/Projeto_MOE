		function escondaCamposAposCarregarTela(){
			divCamposVagasEstagio.classList.add('d-none');
			divCamposEditarVaga.classList.add('d-none');
			divCamposDadosCadastrados.classList.add('d-none');
			divCamposConsultaEstagiarios.classList.add('d-none');
		}
		
		function aoSelecionarAlterarDados(){	
			divCamposDadosCadastrados.classList.remove('d-none');
			divCamposVagasEstagio.classList.add('d-none');
			divCamposEditarVaga.classList.add('d-none');
			divCamposConsultaEstagiarios.classList.add('d-none');
		}
		
		function aoSelecionarVagasEstagio(){	
			divCamposVagasEstagio.classList.remove('d-none');
			divCamposDadosCadastrados.classList.add('d-none');
			divCamposEditarVaga.classList.add('d-none');
			divCamposConsultaEstagiarios.classList.add('d-none');
		}
		
		function aoSelecionarEditarVagasEstagio(){	
			divCamposEditarVaga.classList.remove('d-none');
			divCamposVagasEstagio.classList.add('d-none');
			divCamposDadosCadastrados.classList.add('d-none');
			divCamposConsultaEstagiarios.classList.add('d-none');
		}
		
		function aoSelecionarConsultarEstagiario(){	
			divCamposConsultaEstagiarios.classList.remove('d-none');
			divCamposVagasEstagio.classList.add('d-none');
			divCamposEditarVaga.classList.add('d-none');
			divCamposDadosCadastrados.classList.add('d-none');
		}