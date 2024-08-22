<?php 
/*
    if(!empty($_GET['id'])){


        include_once ('conexao.php');

        $id = $_GET['id'];

        $sqlSelect = 'SELECT * FROM informacao_pessoal WHERE id=$id';

        $result = $db->query($sqlSelect);

        print_r($result);

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $genero = $_POST['genero'];
        $data_nasc = $_POST['data'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_md5 = md5($senha);

    }
*/

require 'conexao.php';

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    $id = $_SESSION['idUser'];

    $stmt = $pdo->prepare("SELECT * FROM informacao_pessoal WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    $stmt2 = $pdo->prepare("SELECT * FROM endereco WHERE id = :id");
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();

    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $nome = $user_data['nome'];
    $sobrenome = $user_data['sobrenome'];
    $cpf = $user_data['cpf'];
    $genero = $user_data['genero'];
    $data_nasc = $user_data['data_nasc'];
    $telefone = $user_data['telefone'];
    $email = $user_data['email'];
    $senha = $user_data['senha'];

    $endereco_data = $stmt2->fetch(PDO::FETCH_ASSOC);
    $rua = $endereco_data['rua'];
    $numero = $endereco_data['numero'];
    $bairro = $endereco_data['bairro'];
    $cidade = $endereco_data['cidade'];
    $cep = $endereco_data['cep'];
    $complemento = $endereco_data['complemento'];


} else {
    header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_confirm = $_POST['senha_confirm'];

    if(isset($senha_confirm) && $senha != $senha_confirm){
        $erro = "As senhas não coincidem!";
    } else {
        $senha_md5 = md5($senha);

        $stmt = $pdo->prepare("UPDATE informacao_pessoal SET nome = :nome, sobrenome = :sobrenome, cpf = :cpf, genero = :genero, data_nasc = :data_nasc, telefone = :telefone, email = :email, senha = :senha WHERE id = :id");

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_md5);
        $stmt->bindParam(':id', $_SESSION['idUser']);

        $stmt->execute();

        
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="icon" type="image/x-icon" href="img/x-icon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

   
    <div class="box">

        <a href="index.php" class="logo">
            <i id="nav_logo" class="fa-solid fa-dumbbell"><span> UniFit</span></i>
        </a>

        <h1>Agora, vamos criar seu cadastro na UniFit:</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


                <br><br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="sobrenome" id="sobrenome" class="inputUser" value="<?php echo $sobrenome ?>" required>
                    <label for="sobrenome" class="labelInput">Sobrenome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="number" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf ?>"required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <br><br>

                    <label for="data">Data de nascimento</label>
                    <input type="date" name="data" id="data" value="<?php echo $data_nasc ?>"required>

                <br>

                <p>Sexo:</p>
                <br>
                <input type="radio" name="genero" id="feminino" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" name="genero" id="masculino" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="outro" value="outro" required>
                <label for="outro">Outro</label>

                <br><br>

                <p>Coloque uma foto sua:</p>
                <input type="file" name="imagem" accept="image/*" id="btn-upload" class="btn-default" required>

                <br><br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>"required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>

                <br><br>


                Mudar Senha

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" >
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <div class="inputBox">
                    <input type="password" name="senha_confirm" id="senha_confirm" class="inputUser" >
                    <label for="senha_confirm" class="labelInput">Confirmar Senha</label>
                </div>

                <br><br>

                <input type="submit" name="submit" id="submit" class="btn-default">

        </form>
    </div>

</body>
</html>
