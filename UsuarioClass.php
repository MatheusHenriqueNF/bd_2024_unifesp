<?php

    class Usuario{

        public function login($email, $senha){
            global $pdo;

            $sql = "SELECT * FROM informacao_pessoal WHERE email = :email AND senha = :senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("email", $email);
            $sql->bindValue("senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){
                $dado = $sql->fetch();

                $_SESSION['idUser'] = $dado['id'];

                return true;
            }
            else{
                return false;
            }
        }

        public function logged($id){
            global $pdo;

            $array = array();

            $sql = "SELECT * FROM informacao_pessoal WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();


            if($sql->rowCount() > 0){
                $array = $sql->fetch(); //FETCHALL
            }

            return $array;
        }
    }


?>