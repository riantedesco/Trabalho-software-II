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
    <form action="logar.php" method="POST">
        <div class="card">
            <div class="card-top">
                <img class="imagem" src="usuario.jpg" alt="">
                <h2 class="titulo">Delivery de Sorvete</h2>
                <h5 class="titulo2">Acesso</h5>
            </div>
            <div class="card-group">
                <label for="inputEmail">Email</label>
                <input type="email" name="email" id="inputEmail" placeholder="Digite seu email" required>
            </div>
            <div class="card-group">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" id="inputSenha" placeholder="Digite sua senha" required>
            </div>
            <div class="card-group">
                <button type="submit">Entrar</button>
            </div>
            <div class="es1">
                <a href="cadastro.php">Não possui conta? Clique aqui!</a>
            </div>
        </div>
    </form>
</body>

</html>