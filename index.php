<?php
    include_once('conexao.php');
    // Realizar consulta
    $sql = "SELECT id, nome, valor FROM plano";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

   
    // Recuperar resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fechar conexão
    $conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="img/x-icon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <title>UniFit</title>
</head>
<body>

    <header>
        
        <nav id="navbar">

            <a href="index.php" class="logo">
                <i id="nav_logo" class="fa-solid fa-dumbbell"><span> Uni</span>Fit</i>
            </a>

            <ul id="nav_list">
                <li class="nav-item active"><a href="#home">Início</a></li>
                <li class="nav-item"><a href="#sobre">Sobre</a></li>
                <li class="nav-item"><a href="#servico">Nossos Serviços</a></li>
                <li class="nav-item"><a href="#plano">Planos</a></li>
                <li class="nav-item"><a href="#treinador">Professores</a></li>
                <li class="nav-item"><a href="#blogs">Blogs</a></li>
            </ul>
            
            <button id="btn_area_aluno" class="btn-default" type="button" onclick="document.location='login.php'">Área do Aluno</button>
            <button id="btn_matricula" class="btn-default"type="button" onclick="document.location='cadastro.php'">Matricule-se</button>
            <button id="mobile_btn"><i class="fa-solid fa-bars"></i></button>

        </nav>

        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item"><a href="#home">Início</a></li>
                <li class="nav-item"><a href="#sobre">Sobre</a></li>
                <li class="nav-item"><a href="#servico">Nossos Serviços</a></li>
                <li class="nav-item"><a href="#plano">Planos</a></li>
                <li class="nav-item"><a href="#treinador">Professores</a></li>
                <li class="nav-item"><a href="#blogs">Blogs</a></li>
            </ul>
            
            <button id="btn_area_aluno" class="btn-default">Área do Aluno</button>
            <button id="btn_matricula" class="btn-default">Matricule-se</button>
        </div>

    </header>

    <main id="content">

        <section id="home">
            
            <div id="banner">
                <a id="img-banner" href="cadastro.php">
                    <img src="img/banner.png" alt="imagem sobre a acadêmia"> 
                </a>
            </div>
        </section>

        <section id="sobre">

            <div class="cont">
                <h3>Por que se <br>  <span>matricular?</span></h3>
                <p>Só a UniFit reúne tudo que você precisa para não ter mais desculpas para não ir treinar: academia aberta 24h, todos os dias da semana. Escolha como se movimentar.</p>
                <button id="btn_area_aluno" class="btn-default" type="button" onclick="document.location='cadastro.php'">Assine hoje</button>
            </div>

            <div id="img-sobre">
                <img src="img/sobre.png" alt="imagem de duas pessoas se cumprimentando">
            </div>

        </section>

        <section id="servico">

            <div id="conteudo-servico" class="cont">
                <h3>Confira nossos <br>  <span>Serviços</span></h3>
            </div>

            <div class="content-cards">
                <div  class="card">
                    <div class="img-box">
                        <img src="img/cardio.jpg" alt="servico 1">
                    </div>
                    <div class="content">
                        <h2>Foco e cardio</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <!--<a href="#" id="read-more" class="btn-default">Saiba mais</a> -->
                    </div>

                </div>

                <div  class="card">
                    <div class="img-box">
                        <img src="img/forca.jpg" alt="servico 1">
                    </div>
                    <div class="content">
                        <h2>Foco e força</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <!--<a href="#" id="read-more" class="btn-default">Saiba mais</a> -->
                    </div>

                </div>

                <div  class="card">
                    <div class="img-box">
                        <img src="img/movimento.jpg" alt="servico 1">
                    </div>
                    <div class="content">
                        <h2>Corrida e movimento</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                       <!--<a href="#" id="read-more" class="btn-default">Saiba mais</a> -->
                    </div>

                </div>
                
            </div>

        </section>


        <section id="preco">

            <div id="plano">
                <h3>Comece a treinar <br>  <span>hoje mesmo</span></h3>
            </div>
            
            <div id="content-plano">
                

            <?php
// ...

                // Listar resultados
                foreach ($results as $row) {
            ?>
                <div class="card-plano">
                    <h4>Plano <?= $row["nome"] ?></h4><span>R$<?= $row["valor"] ?></span>
                    <ul id="lista-plano">
                        <li class="lista-conteudo">10 aulas por semana</li>
                        <li class="lista-conteudo">Aulas de 30 minutos</li>
                        <li class="lista-conteudo">Reuniões semanais</li>
                        <li class="lista-conteudo">Material de apoio</li>
                        <li class="lista-conteudo">Acesso a treinadores</li>
                        <li class="lista-conteudo">Contato com treinadores</li>
                    </ul>
                    <button id="btn_plano" class="btn-default" data-id="<?= $row["id"] ?>" data-titulo="<?= $row["nome"] ?>" data-preco="<?= $row["valor"] ?>">Assine hoje</button>    

                </div>
            <?php
                }
            ?>


        </section>

        <section id="professor">

            <div id="conteudo-servico" class="cont">
                <h3>Confira nossos <br>  <span>Profissionais</span></h3>
            </div>

            <div class="content-cards">
                <div  class="card">
                    <div class="img-box">
                        <img src="img/cardio.jpg" alt="servico 1">
                    </div>
                    <div class="content">
                        <h2>Julio B.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <!--<a href="#" id="read-more" class="btn-default">Saiba mais</a> -->
                    </div>

                </div>

                <div  class="card">
                    <div class="img-box">
                        <img src="img/forca.jpg" alt="servico 1">
                    </div>
                    <div class="content">
                        <h2>Coach 2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <!--<a href="#" id="read-more" class="btn-default">Saiba mais</a> -->
                    </div>

                </div>

                <div  class="card">
                    <div class="img-box">
                        <img src="img/movimento.jpg" alt="servico 1">
                    </div>
                    <div class="content">
                        <h2>Coach 3</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <!--<a href="#" id="read-more" class="btn-default">Saiba mais</a> -->
                    </div>

                </div>
                
            </div>

        </section>
        
        <footer>
            <p>Todos os direitos reservados &copy; 2024 - UniFit</p>
        </footer>

    </main>

    <script src="js/javascript.js"></script>

    <script>
        const buttons = document.querySelectorAll('.card-plano button');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const titulo = button.dataset.titulo;
                const preco = button.dataset.preco;
                const caracteristicas = button.parentNode.querySelectorAll('li');
                const dadosPlano = {
                    id,
                    titulo,
                    preco,
                    caracteristicas: Array.from(caracteristicas).map(caracteristica => caracteristica.textContent)
                };
                window.location.href = `cadastro.php?plano=${JSON.stringify(dadosPlano)}`;
            });
        });
    </script>
</body>
</html>