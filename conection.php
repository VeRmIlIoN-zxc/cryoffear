<?php
    try{
        $conn = new PDO("sqlite:db.sqlite");
        }catch (PDOException $e){
        echo "Connection failed: ". $e->getMessage();
    }
