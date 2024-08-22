<?php 

    if(isset($_POST['submit'])){

        include_once ('conexao.php');

        $email = $_POST['email'];
        $nova_senha = $_POST['nova_senha'];
        $nova_senha_confirmacao = $_POST['confirmar_senha'];
      

        //consulta no banco de dados pegar o email
        $stmt = $pdo->prepare("SELECT COUNT(*) AS existe FROM informacao_pessoal WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $resultado = $stmt->fetch();

        // Verificar se o email existe no banco de dados
        if ($resultado['existe'] > 0) {

            // Verifica se a senha atual está correta para poder atualizar a senha no banco de dados

            if($nova_senha == $nova_senha_confirmacao){

                $nova_senha_md5 = md5($nova_senha);
        
                $stmt = $pdo->prepare("UPDATE informacao_pessoal SET senha = :nova_senha WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':nova_senha', $nova_senha_md5);
                $stmt->execute();
            
                 $mensagem_execute = "Senha atualizada com sucesso!";
            }
            else {
               $mensagem_erro_senha = "Senhas precisam ser iguais!";
            }
        }
        else {
            $mensagem_erro_email = "Email não encontrado!";
        }
        
        
        // header('Location: login.php');
        // exit;

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="icon" type="image/x-icon" href="img/x-icon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/solicitar_senha.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

   
    <div class="box_solicitar">

        <a href="index.php" class="logo">
            <i id="nav_logo" class="fa-solid fa-dumbbell"><span> UniFit</span></i>
        </a>

        <h1>Recuperar senha UniFit: Insira a nova senha</h1>

        <br><br>

        <form action="" method="post">

                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="password" name="nova_senha" id="nova_senha" class="inputUser" required>
                    <label for="nova_senha" class="labelInput">Senha</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="password" name="confirmar_senha" id="senha" class="inputUser" required>
                    <label for="confirmar_senha" class="labelInput">Confirmar senha</label>
                </div>

                <br><br>

                <input type="submit" name="submit" id="submit" value="Confirmar" class="btn-default">

                <?php if(isset($messegem_exectute)): ?>
                    <p style="color: green;">
                        <?php echo $messegem_exectute; ?>
                    </p>
                <?php elseif(isset($messegem_erro)): ?>
                    <p style="color: red;">
                        <?php echo $messegem_erro; ?>
                    </p>
                <?php endif; ?>


        </form>
    </div>

  
</body>
</html>
