<?php
namespace App\ModelsCursoEngenhariaComputacao;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioModel');   
}

use CodeIgniter\Model;
use namespace App\InterfaceVaga;

class EngenhariaComputacao extends Model implements IOfertarVaga{
    
    public function interessarEmVaga(){
        return "Engenharia da computação";
    }
    
}

