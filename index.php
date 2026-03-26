<?php
    session_start();
    if(empty($_SESSION['errors']))
    {

    }else{
        echo $_SESSION["errors"];
        unset($_SESSION["errors"]);
    }

    if(empty($_SESSION['ok']))
    {

    }else{
        echo $_SESSION["ok"];
        unset($_SESSION["ok"]);
    }
    
?>

<form action="create_user.php" method="POST">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="password" placeholder="password">
    <button type="submit">Create User</button>
</form>
