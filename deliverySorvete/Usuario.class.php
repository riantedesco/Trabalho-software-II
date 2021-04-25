<?php

session_start();

    class Usuario{

        public function login($email, $senha)
        {

            $localhost = "localhost";
            $user = "root";
            $password = "";
            $banco = "deliverysorvete";


            $link = mysqli_connect($localhost, $user, $password, $banco);

            $result = mysqli_query($link, "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'");
                
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION["idUsuario"] = $row["idUsuario"];                
                    header("location: home.php"); 
            }
            } else {
                header("location: index.php");
            }
            
        }
    }
?>
