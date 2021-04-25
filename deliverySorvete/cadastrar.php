<?php

    $localhost = "localhost";
    $user = "root";
    $password = "";
    $banco = "deliverysorvete";

    $link = mysqli_connect($localhost, $user, $password, $banco);

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $cadastro = "INSERT INTO usuario (nome, cpf, nascimento, telefone, email, senha) VALUES  ('$nome', '$cpf', '$nascimento', '$telefone', '$email', '$senha')";
    $cadastro = mysqli_query($link, $cadastro);
             
    header("location: home.php");
?>