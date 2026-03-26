<?php
    session_start();
    require __DIR__.'/vendor/autoload.php';


    if (empty($_POST['login']) or empty($_POST['password'])) 
        {
            // echo 'Вы не передали данные';
            $_SESSION['errors'] = 'Вы не передали данные';
            header("Location: index.php");
            exit();
        }
    else
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            require 'conection.php';

            $sql = "SELECT * FROM users WHERE login='$login';";

            try{
                $result = $conn->query($sql);

                if($result->fetch())
                    {
                        $_SESSION['errors'] = 'Такой логин занят';
                        header("Location: index.php");
                        exit();
                    }
            }catch(PDOException $e){
                echo "Connection failed: ". $e->getMessage();
            }

            try{
                $sql = "CREATE TABLE IF NOT EXISTS users (".
                            "id INTEGER PRIMARY KEY AUTOINCREMENT,".
                            "login VARACHAR(20) NOT NULL UNIQUE,".
                            "password VARCHAR(20) NOT NULL".
                        ");";
                $conn->exec($sql);
                $sql = "INSERT INTO users (login, password) VALUES ('$login', '$password');";
                $affectedRowsNumber = $conn->exec($sql);
                $sql = "SELECT * FROM users WHERE login='$login';";
                $result = $conn->query($sql);
                $row = $result->fetch();
            }catch (PDOException $e){
                echo "Connection failed: ". $e->getMessage();
            }
            
            $conn = null;
            $id = $row["id"];
            $login = $row["login"];
            $_SESSION['ok'] = "Пользователь успешно создан c id = $id login=$login";
            header("Location: index.php");
            exit();
        }


    
    
    
