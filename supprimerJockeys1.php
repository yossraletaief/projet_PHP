<?php
    require "connexiong.php";
    $CodeJ=$_POST['CodeJ'];
    $idcon->exec("DELETE FROM jockeys where CodeJ=$CodeJ");
    ?>