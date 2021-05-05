<?php
    
    session_start();

    require_once 'Terabyte/Core.php';
    require_once 'Controller/LoginController.php';
   ;
    require_once 'Controller/CadastrarUsuarioController.php';
    require_once 'Controller/EmpregadorController.php';
    require_once 'Controller/EstagiarioController.php';
    require_once 'vendor/autoload.php';
   
    require_once 'Model/Empregador.php';
    require_once 'Model/Estagiario.php';

    $core = new Core;
    echo $core->start($_GET);

