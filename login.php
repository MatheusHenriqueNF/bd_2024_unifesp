
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="icon" type="image/x-icon" href="img/x-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container">

        <a href="index.php" class="logo">
            <i id="nav_logo" class="fa-solid fa-dumbbell"><span> UniFit</span></i>
        </a>

        <h2>Entrar</h2>
        <form class="form_login" action="logar.php" method="post">

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email">

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">

            <button type="submit">Entrar</button>
            <a href="recuperar_senha.php">Esqueci a senha</a>
        </form>
    </div>
</body>
</html>

