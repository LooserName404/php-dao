<?php

    require_once("config.php");

    // $thy = new Usuario();

    // $thy->loadById(1);

    // echo $thy;

    // $list = Usuario::getList();

    // echo json_encode($list);
    
    // $search = Usuario::search("to");

    // echo json_encode($search);

    $usuario = new Usuario;
    $usuario->login("thy","senha");

    echo $usuario;

?>