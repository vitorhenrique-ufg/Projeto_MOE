<?php
namespace App\ModelsCursoSistemasInformacoes;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioModel');   
}

use CodeIgniter\Model;
use App\Models;
use namespace App\InterfaceVaga;

class SistemasInformacoes extends Model implements IOfertarVaga{
    
    public function interessarEmVaga($estagiario){
        return true;
    }
    
}

