<?php

    session_start();

    $localhost = "localhost";
    $user = "root";
    $password ="";
    $banco ="deliverysorvete";

    $link = mysqli_connect($localhost, $user, $password, $banco);
    
    if(!$link){
        die('Erro:');
    }else{
        echo 'Sucesso'; 
    }
