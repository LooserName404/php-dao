<?php

    require_once("config.php");

    $thy = new Usuario();

    $thy->loadById(1);

    echo $thy;
    
?>