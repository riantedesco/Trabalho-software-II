<?php

session_start();

include("protect.php");
protect();

$localhost = "localhost";
$user = "root";
$password = "";
$banco = "deliverysorvete";

$idUsuario = $_SESSION["idUsuario"];
$link = mysqli_connect($localhost, $user, $password, $banco);


$sql  = mysqli_query($link, "SELECT * FROM pedido where usuario = '$idUsuario'");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Delivery de Sorvete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Estilos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="meusestilos.css">
    <script src="main.js"></script>

    <!-- Scripts -->
    <script src="jquery.maskedinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form action="form" method="POST">
        <div class="card">
            <div class="card-top">
                <img class="imagem" src="sorvete.png" alt="">
                <h2 class="titulo">Delivery de Sorvete</h2>
                <h5 class="titulo2">Historico:</h5>

                <div class="borda">
                    <table class="tabela">
                        <thead style="text-align: center;">
                            <tr>
                                <th>Numero</th>
                                <th>Valor</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($linha = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $linha['numPedido']; ?></td>
                                    <td><?php echo $linha['valorTotal']; ?></td>
                                    <td><?php echo $linha['situacao']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div><br>
            </div>
            <div class="card-group">
                <button type="submit" formaction="home.php">Home</button>
            </div>
            <div class="card-group">
                <button type="submit" formaction="pedido.php">Novo pedido</button>
            </div>
            <div class="card-group">
                <button type="submit" formaction="logout.php">Sair</button>
            </div>
        </div>
    </form>
</body>

</html>