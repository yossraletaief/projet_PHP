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
    $NumCh=$_POST['NumCh'];
    $nomch=$_POST['nomch'];
    $SexeCh=$_POST['SexeCh'];
    $PoidsCh=$_POST['PoidsCh'];
    $DateNaissCh=$_POST['DateNaissCh'];
    $req="Insert Into cheval values('$NumCh','$nomch','$SexeCh','$PoidsCh','$DateNaissCh')";
    $idcon->exec($req);?>
    </body>
</html>