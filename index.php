<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
    <p>Login:
    <input type="text" name="username" /></p>
    <p>Password:
    <input type="password" name="userage" /></p>
    <input type="submit" value="Добавить">
</form>
</body>
</html>







<?php
$login = "user1";
$password = "password1";

try{
    $conn = new PDO("sqlite:db.sqlite");
    echo "Database connection established";
    $sql = "CREATE TABLE users (".
    "id INTEGER PRIMARY KEY AUTOINCREMENT,".
    "login VARACHAR(20) NOT NULL UNIQUE".
    "password VARCHAR(20) NOT NULL".
")";
    $conn->exec($sql);
    echo "Database has been created";
    $sql = "INSERT INTO users (login, password) VALUES ('$login' ,'$password');";
    echo "User created";
    $conn->exec($sql);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

echo '<br>$login $password';
