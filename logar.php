<?php


    //recebendo os dados de login com a condição de existir e se o campo estiver preenchido

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

        require 'conexao.php';
        require 'UsuarioClass.php';

        $u = new Usuario();

        

        $email = addslashes($_POST['email']); 
        $senha = addslashes($_POST['senha']);
        
       if( $u->login($email, $senha) == true){
            if(isset($_SESSION['idUser'])){
                header("Location: aluno.php");
            }
            else{
                header("Location: login.php");
            }
        }
    else{
        header("Location: login.php");
         }
    }
?>