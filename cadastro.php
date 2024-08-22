<?php 


if(isset($_FILES['imagem']) && !empty($_FILES['imagem'])){

    move_uploaded_file($_FILES['imagem']['tmp_name'], './img/'.$_FILES['imagem']['name']);
    echo 'uptade realizado com sucesso';

}
    if(isset($_POST['submit'])){

        //print_r('Nome: ' . $_POST['nome']);
        //print_r('<br>');
        //print_r('Sobrenome: ' . $_POST['sobrenome']);
        //print_r('<br>');
        //print_r('CPF: ' . $_POST['cpf']);
        //print_r('<br>');
        //print_r('Sexo: ' . $_POST['genero']);
        //print_r('<br>');
        //print_r('Data: ' . $_POST['data']);
        //print_r('<br>');
        //print_r('Telefone: ' . $_POST['telefone']);
        //print_r('<br>');
        //print_r('Email: ' . $_POST['email']);
        //print_r('<br>');
        //print_r('Senha: ' . $_POST['senha']);


        include_once ('conexao.php');


        // salva os dados do usuario em uma variavel
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $genero = $_POST['genero'];
        $data_nasc = $_POST['data'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_md5 = md5($senha);

        //salva o endereço do usuario em uma variavel
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $cep = $_POST['cep'];
        $complemento = $_POST['complemento'];

        $oculto = 1;

        $stmt = $pdo->prepare("INSERT INTO informacao_pessoal (nome, sobrenome, cpf, data_nasc, genero, telefone, email, senha, oculto) VALUES (:nome, :sobrenome, :cpf, :data_nasc, :genero , :telefone, :email, :senha, :oculto)");
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha',$senha_md5);
        $stmt->bindParam(':oculto', $oculto);
        $stmt->execute();


        // Recuperar o ID do cliente recém-criado
        $id_informacao_pessoal = $pdo->lastInsertId();

        $stmt2 = $pdo->prepare("INSERT INTO endereco (bairro, rua, cep, numero, complemento, cidade, id_informacao_pessoal) VALUES (:bairro, :rua, :cep, :numero, :complemento, :cidade, :id_informacao_pessoal)");
        
        $stmt2->bindParam(':bairro',$bairro);
        $stmt2->bindParam(':rua',$rua);
        $stmt2->bindParam(':cep',$cep);
        $stmt2->bindParam(':numero',$numero);
        $stmt2->bindParam(':complemento',$complemento);
        $stmt2->bindParam(':cidade',$cidade);
        $stmt2->bindParam(':id_informacao_pessoal', $id_informacao_pessoal);
        $stmt2->execute();


        /*
        // Salvar assinatura do cliente
        $stmt3 = $pdo->prepare("INSERT INTO assinatura (id_cliente, id_plano, data_assinatura) VALUES (:id_cliente, :id_plano)");//, NOW()
        $stmt3->bindParam(':id_cliente', $id_informacao_pessoal);
        $stmt3->bindParam(':id_plano', $id_plano); // id_plano que será escolhido pelo cliente // $stmt3->bindParam(':data_assinatura', NOW()); // Adicionar a data de assinatura automaticamente // $stmt3->bindParam(':data_assinatura', date('Y-m-d')); // Adicionar a data de assinatura manualmente // $stmt3->bind
        $stmt3->execute();
        */

      
// ...


        $id_plano = $_GET['plano'];
        // Salvar assinatura do cliente
        $stmt3 = $pdo->prepare("INSERT INTO assinatura (id_cliente, id_plano, data_assinatura) VALUES (:id_cliente, :id_plano, NOW())");
        $stmt3->bindParam(':id_cliente', $id_informacao_pessoal);
        $stmt3->bindParam(':id_plano', $id_plano);
        $stmt3->execute();

        header('Location: index.php');
        exit;

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

        <form action="cadastro.php" method="post">


                <br><br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="sobrenome" id="sobrenome" class="inputUser" required>
                    <label for="sobrenome" class="labelInput">Sobrenome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="number" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <br><br>

                    <label for="data">Data de nascimento</label>
                    <input type="date" name="data" id="data" required>

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
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <br><br>

                <h1>Endereço:</h1>


                <br><br>

                <div class="inputBox">
                    <input type="number" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="labelInput">CEP</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="rua" id="rua" class="inputUser" required>
                    <label for="rua" class="labelInput">Rua</label>
                </div>
                
                <br><br>

                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="numero" id="numero" class="inputUser" required>
                    <label for="numero" class="labelInput">Número</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" required>
                    <label for="complemento" class="labelInput">Complemento</label>
                </div>
                
                <br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>

                <br><br>

                <input type="submit" name="submit" id="submit" class="btn-default">

        </form>
    </div>

    <div class="plano-escolhido">
       <?php
            // Verifique se os dados do plano foram enviados via URL
            if (isset($_GET['plano'])) {
            // Decodifique os dados do plano
            $dadosPlano = json_decode($_GET['plano'], true);
            $id_plano = $dadosPlano['id'];
        ?>
            <p> Plano <?php echo $dadosPlano['titulo'] ?></p>
            <p>Mensalidade: R$<?php echo $dadosPlano['preco'] ?></p>
            <h3>Características:</h3>
            <ul>
            <?php  // Itere sobre as características do plano e exiba-as no HTML
            foreach ($dadosPlano['caracteristicas'] as $caracteristica) {?>
                    <li> <?php echo $caracteristica ?></li>
            <?php
            }
            ?>
            </ul>
            <?php
    }
    // Verifique se os dados do plano foram enviados via URL
        if (isset($_GET['plano'])) {
            $dadosPlano = json_decode($_GET['plano'], true);


        }

       ?>
    </div>
</body>
</html>

<!-- nome -->
<!-- sobrenome -->
<!-- cpf -->
<!-- nascimento -->
<!-- sexo -->
<!-- telefone -->
<!-- imagem -->
<!-- status -->
<!-- email -->
<!-- senha  -->



<!-- id integer [primary key]
bairro text
rua text
cep integer
número integer
complemento integer
cidade text
id_informação_pessoal  integer -->