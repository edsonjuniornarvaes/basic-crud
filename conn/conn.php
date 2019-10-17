<?php

    $server = "localhost";
    $dbname = "bd_social";
    $user = "root";
    $pwd = "";
    
    try {

        $conn = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8", $user, $pwd);
    
    } catch (PDOException $erro) {
        
        echo $erro->getMessage();
        exit;
    }