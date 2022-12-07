<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="gestion course";
    $DSN="mysql:host=$host;dbname=$db";
    try
    {
        $idcon=new PDO($DSN,$user,$password);
        $idcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo("ERREUR CONNEXION:".$e->getMessage());
        exit();
    }
    ?>
</body>
</html>