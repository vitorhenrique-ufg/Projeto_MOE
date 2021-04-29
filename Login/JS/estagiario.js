function escondaCamposAposCarregarTelaEstagiario(){
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
}
		
function aoSelecionarAlterarDadosEstagiario(){	
			divCamposEditarDados.classList.remove('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
}
		
function aoSelecionarConsultarVaga(){	
			divCamposConsultarVagaEstagio.classList.remove('d-none');		
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
}
		
function aoSelecionarConsultarEmpresa(){	
			divCamposConsultarEmpresa.classList.remove('d-none');
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposSeguirEmpresa.classList.add('d-none');
}
		
function aoSelecionarSeguirEmpresa(){	
			divCamposSeguirEmpresa.classList.remove('d-none');
			divCamposEditarDados.classList.add('d-none');
			divCamposConsultarVagaEstagio.classList.add('d-none');
			divCamposConsultarEmpresa.classList.add('d-none');
}
		