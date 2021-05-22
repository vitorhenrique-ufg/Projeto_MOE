<?php
namespace App\Models;
use CodeIgniter\Model;

if(defined('BASEPATH') && !$this->input->is_ajax_request()){
    exit ('No direct script acess allowed in EstagiarioModel');   
}

interface Strategy{
    public function interessarEmVaga($estagiario);
}

class StrategyEngComp extends Model implements Strategy{
    
    public function interessarEmVaga($estagiario){
        
        if(2021 - $estagiario->ano > 3 || 2021 - $estagiario->ano > 5 ){
             return true;
        }else{
             return false;
         }    
     }
    
}

