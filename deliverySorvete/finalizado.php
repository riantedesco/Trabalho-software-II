<?php

session_start();

include("protect.php");
    protect();

$idUsuario = $_SESSION["idUsuario"];
$idPedido = 0;
$valorTotalPedido = 0;
$quantidadeAtualEstoque = 0;
$novaQuantidadeEstoque = 0;

$localhost = "localhost";
$user = "root";
$password = "";
$banco = "deliverysorvete";

$link = mysqli_connect($localhost, $user, $password, $banco);

//Verifica se tem pedido aberto para o usuario logado
$consulta_pedido_aberto = "select * from pedido where usuario = '$idUsuario' and situacao = 'Aberto'";
$resultado_pedido_aberto = mysqli_query($link, $consulta_pedido_aberto);

if ($resultado_pedido_aberto->num_rows > 0) {
    while ($row = mysqli_fetch_array($resultado_pedido_aberto)) {
        $idPedido = $row["numPedido"];
        $valorTotalPedido = $row['valorTotal'];
    }

    //Consulta os itens do pedido
    $consulta_itens_pedido = "select * from item where pedido = '$idPedido'";
    $resultado_itens_pedido = mysqli_query($link, $consulta_itens_pedido);

    if ($resultado_itens_pedido->num_rows > 0) {
        while ($rowItens = mysqli_fetch_array($resultado_itens_pedido)) {

            $idEstoque = $rowItens['estoque'];

            //Consulta estoque atual 
            $consulta_estoque_sabor = "select * from estoque where codigo = '$idEstoque'";
            $resultado_estoque_sabor = mysqli_query($link, $consulta_estoque_sabor);

            while ($rowEstoque = mysqli_fetch_array($resultado_estoque_sabor)) {
                $quantidadeAtualEstoque = $rowEstoque['quantidade'];
            }

            //Dá baixa no estoque de cada item do pedido
            $novaQuantidadeEstoque = $quantidadeAtualEstoque - $rowItens['quantidade'];

            //Seta a nova quantidade de estoque, dando baixa dos itens inseridos no pedido
            $update_estoque = mysqli_query($link, "UPDATE estoque SET quantidade = '$novaQuantidadeEstoque' WHERE codigo = '$idEstoque'");
        }
    }

    //Seta a situacao do pedido
    $update_estoque = mysqli_query($link, "UPDATE pedido SET situacao = 'Finalizado' WHERE numPedido = '$idPedido'");
}
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
                <h5 class="titulo2">Pedido:</h5>
            </div>
            <div class="borda">
                <h3>Seu pedido é o numero:<?php echo $idPedido ?> </h3>
                <h3>Valor total:<?php echo $valorTotalPedido ?> </h3>
            </div><br>
            <div class="card-group">
                <button type="submit" formaction="historico.php">Confirmar pedido</button>
            </div>
            <div class="card-group">
                <button type="submit" formaction="home.php">Cancelar</button>
            </div>
        </div>
    </form>
</body>

</html>