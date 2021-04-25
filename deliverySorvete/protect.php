<?php
if(!function_exists("protect")){

    function protect(){
        if(!isset($_SESSION))
        session_start();

        if(!isset($_SESSION['idUsuario'])  || !is_numeric($_SESSION['idUsuario'])){
            header("location: index.php");
        }
    }
}

?>