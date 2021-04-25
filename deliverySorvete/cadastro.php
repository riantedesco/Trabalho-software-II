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
    <form action="cadastrar.php" method="POST">
        <div class="card">
            <div class="card-top">
                <img class="imagem" src="usuario.jpg" alt="">
                <h2 class="titulo">Delivery de Sorvete</h2>
                <h5 class="titulo2">Cadastre-se</h5>
            </div>
            <div class="card-group">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Digite seu Nome" required>
            </div>
            <div class="card-group">
                <label>Cpf</label>
                <input type="text" name="cpf" placeholder="Digite seu Cpf" required>
            </div>
            <div class="card-group">
                <label>Data de Nascimento</label>
                <input type="date" name="nascimento" placeholder="Digite sua data de nascimento" required>
            </div>
            <div class="card-group">
                <label>Telefone</label>
                <input type="text" name="telefone" placeholder="Digite seu numero para contato" required>
            </div>
            <div class="card-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="card-group">
                <button type="submit">Cadastrar</button>
            </div>
            <div class="card-group">
                <button type="reset">Limpar</button>
            </div>
        </div>
    </form>
</body>

</html>