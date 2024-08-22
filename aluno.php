<?php 

    require 'verifica.php';

    if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Aluno</title>
</head>
<body>

    <form action="editar.php" method="post">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $nomeUser?>" readonly>
        <br>
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" value="<?php echo $sobrenomeUser?>" readonly>
        <br>
        <label>CPF:</label>
        <input type="text" name="cpf" value="<?php echo $cpfUser?>" readonly>
        <br>
        <label>Data nascimento:</label>
        <input type="text" name="data_nasc" value="<?php echo $datanascUser?>" readonly>
        <br>
        <label>Genero:</label>
        <input type="text" name="genero" value="<?php echo $generoUser?>" readonly>
        <br>
        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $telefoneUser?>" readonly>
        <br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $emailUser?>" readonly>
        <br>
        <label>Senha:</label>
        <input type="text" name="senha" value="<?php echo $senhaUser?>" readonly>

        <button id="btn_plano" class="btn-default" >Editar</button>    

    </form> 

    <a href="logout.php">Sair</a>
    
</body>
</html>

<?php else: header("Location: login.php"); endif; ?>