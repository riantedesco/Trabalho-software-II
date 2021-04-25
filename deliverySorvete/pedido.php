<?php
session_start();

include("protect.php");
protect();

$localhost = "localhost";
$user = "root";
$password = "";
$banco = "deliverysorvete";

$link = mysqli_connect($localhost, $user, $password, $banco);

$sql  = mysqli_query($link, "SELECT codigo, descricao, quantidade FROM estoque ORDER BY codigo ASC");

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
    <div class="card">
        <div class="card-top">
            <img class="imagem" src="sorvete.png" alt="">
            <h2 class="titulo">Delivery de Sorvete</h2>
            <h5 class="titulo2">Olá! Faça seu pedido.</h5>
        </div>
        <div class="borda">
            <table class="tabela">
                <thead style="text-align: center;">
                    <tr>
                        <th>Sabor</th>
                        <th>Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($linha = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td style="text-align: justify;"><?php echo $linha['descricao']; ?></td>
                            <td style="text-align: center;"><?php echo $linha['quantidade']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div><br>

        <div class="borda">
            <h5>1 unidade equivale a 500g</h5>
            <h5>Valor: R$ 10,00 reais a unidade</h5>
        </div><br>

        <div class="borda ">
            <form action="sabor.php" method="POST">
                <select class="form-control " name="sabor">
                    <option value="">Escolha o sabor</option>
                    <?php
                    $resultSabor = "SELECT codigo, descricao FROM estoque ORDER BY codigo ASC";
                    $resultadoSabor = mysqli_query($link, $resultSabor);
                    while ($descricao = mysqli_fetch_assoc($resultadoSabor)) {
                        echo '<option value="' . $descricao['codigo'] . '">' . $descricao['descricao'] . '</option>';
                    }
                    ?>
                </select><br>

                <td style="text-align: center;"><input class="form-control " name="quantidade" type="number" placeholder="Quantidade"></td>
                <br><br>
                <div class="card-group">
                    <button type="submit" name="adicionar" value="adicionar">Adicionar</button>
                </div>
            </form>
        </div><br>
        <form action="">
            <div class="card-group">
                <button type="submit" name="finalizar" formaction="finalizado.php">Finalizar</button>
            </div>
            <div class="card-group">
                <button type="submit" formaction="home.php">Cancelar</button>
            </div>
        </form>
    </div>
</body>

</html>