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
    require "connexiong.php";
    $CodeJ=$_POST['CodeJ'];
    $nomj=$_POST['nomj'];
    $prenomj=$_POST['prenomj'];
    $PoidsJ=$_POST['PoidsJ'];
    $req="Insert Into jockeys values('$CodeJ','$nomj','$prenomj','$PoidsJ')";
    $idcon->exec($req);?>
    </body>
    
</body>
</html>