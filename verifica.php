<?php

    require 'conexao.php';

    if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){

        require_once 'UsuarioClass.php';
        $u = new Usuario();

        $listlogged = $u->logged($_SESSION['idUser']);

        $nomeUser = $listlogged['nome'];
        $sobrenomeUser = $listlogged['sobrenome'];
        $cpfUser = $listlogged['cpf'];
        $datanascUser = $listlogged['data_nasc'];
        $generoUser = $listlogged['genero'];
        $telefoneUser = $listlogged['telefone'];
        $emailUser = $listlogged['email'];
        $senhaUser = $listlogged['senha'];

    }
    else{
        header('Location: login.php');
    }
?>