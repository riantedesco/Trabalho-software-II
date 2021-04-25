<?php

session_start();

$localhost = "localhost";
$user = "root";
$password = "";
$banco = "deliverysorvete";

$link = mysqli_connect($localhost, $user, $password, $banco);

$sabor = $_POST['sabor'];
$quantidade = $_POST['quantidade'];



$valorUnidade = 10;
$idPedido = 0;

$idUsuario = $_SESSION["idUsuario"];

//Verifica se tem pedido aberto para o usuario logado, se sim, retorna o id do pedido, se não cria um novo
$consulta_pedido_aberto = "select * from pedido where usuario = '$idUsuario' and situacao = 'Aberto'";
$resultado_pedido_aberto = mysqli_query($link, $consulta_pedido_aberto);

if ($resultado_pedido_aberto->num_rows > 0) {
    while ($row = mysqli_fetch_array($resultado_pedido_aberto)) {
        $idPedido = $row["numPedido"];
    }
} else {
    $cria_novo_pedido = "insert into pedido (valorTotal, situacao, usuario) 
        values (0, 'Aberto', '$idUsuario')";
    $resultado_criacao_novo_pedido = mysqli_query($link, $cria_novo_pedido);

    //Verifica se tem pedido aberto para o usuario logado, se sim, retorna o id do pedido, se não cria um novo
    $consulta_pedido_aberto_criado = "select * from pedido where usuario = '$idUsuario' and situacao = 'Aberto'";
    $resultado_pedido_aberto_criado = mysqli_query($link, $consulta_pedido_aberto_criado);

    while ($row = mysqli_fetch_array($resultado_pedido_aberto_criado)) {
        $idPedido = $row["numPedido"];
    }
}

//Insere item do pedido
$valorTotalItem = $quantidade * $valorUnidade;
$insere = "INSERT INTO item (quantidade, valor, pedido, estoque) VALUES ('$quantidade', '$valorTotalItem', '$idPedido', '$sabor')";
$insere = mysqli_query($link, $insere);

//Consulta o valor total atual do pedido
$valorTotalPedido = 0;
$consulta_valor_total_atual_pedido = mysqli_query($link, "select * from pedido where numPedido = '$idPedido'");
while ($row = mysqli_fetch_array($consulta_valor_total_atual_pedido)) {
    $valorTotalPedido = $row["valorTotal"];
}

$valorTotalPedido = $valorTotalPedido + $valorTotalItem;

//Soma o valor do item com o valor total atual do pedido 
$update_valor_total_pedido = mysqli_query($link,"update pedido set valorTotal ='$valorTotalPedido' where numPedido = '$idPedido'");
             
header("location: pedido.php");
