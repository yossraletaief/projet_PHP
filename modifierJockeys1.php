<?php
require "connexiong.php";
    $CodeJ=$_POST['CodeJ'];
    $nomj=$_POST['nomj'];
    $prenomj=$_POST['prenomj'];
    $PoidsJ=$_POST['PoidsJ'];
    $req="update jockeys set NomJ='$nomj',PrénomJ='$prenomj',
    PoidsJ='$PoidsJ' where CodeJ=$CodeJ";
    $idcon->exec($req);?>