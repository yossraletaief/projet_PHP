<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="modifiercheval1.php" method="POST">
<fieldset>

        <legend>modifier cheval</legend>
        <p>veuillez remplir les champs suivants:</p>
       <label> Numero de cheval</label><input type="number" name="NumCh"><br>
      <label>  Nom de cheval</label><input type="text" name="nomch"><br>
       <label> sexe de cheval</label><br>
       <label>female</label>
       <input type="radio" name="SexeCh" value="f">
       <label>male</label>
       <input type="radio"  name="SexeCh" value="m"><br>
       <label> Poids de cheval</label>
       <input type="text" name="PoidsCh"><br>
       <label>Date de naissance du cheval</label>
       <input type="date" name="DateNaissCh" ><br>
       <input type="reset" value="annuler">
       <input type="submit" value="Enregistrer">
        

</fieldset>
</form>
    
</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="ajoutercheval1.php" method="POST">
    <fieldset>
        <legend>ajouter cheval</legend>
        <p>veuillez remplir les champs suivants:</p>
       <label> Numero de cheval</label><input type="number" name="NumCh"><br>
      <label>  Nom de cheval</label><input type="text" name="nomch"><br>
       <label> sexe de cheval</label><br>
       <label>female</label>
       <input type="radio" name="SexeCh" value="f">
       <label>male</label>
       <input type="radio"  name="SexeCh" value="m"><br>
       <label> Poids de cheval</label>
       <input type="text" name="PoidsCh"><br>
       <label>Date de naissance du cheval</label>
       <input type="date" name="DateNaissCh" ><br>
       <input type="reset" value="annuler">
       <input type="submit" value="Enregistrer">
        

</fieldset>
</form>
    
</body>
</html> -->



<?php
require "connexiong.php";

$myID  = $_GET['id'];
$myID  = isset($_GET['id'])? $_GET['id']:'';

$req="SELECT * from cheval  where NumCh='$myID' ";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $stmt->fetch();

$valbtn = isset($_POST['action']) ? $_POST['action'] : '';


if ($valbtn == 'valider') {

    $NumCh=$_POST['NumCh'];
    $nomch=$_POST['nomch'];
    $SexeCh=$_POST['SexeCh'];
    $PoidsCh=$_POST['PoidsCh'];
    $DateNaissCh=$_POST['DateNaissCh'];
    $req="update cheval set NomCh='$nomch',SexeCh= '$SexeCh',PoidsCh='$PoidsCh',
    DateNaissCh='$DateNaissCh' where NumCh=$NumCh" ;
    $idcon->exec($req);
}

?>


<?php include_once 'header.php'; ?>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Modifier Cheval</h1>
                    </div>
                    <form class="user" action="modifiercheval.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="NumCh" type="number" class="form-control form-control-user"
                                    value="<?php echo $ligne['NumCh'] ?>" placeholder="numero cheval">
                            </div>
                            <div class="col-sm-6">
                                <input name="nomch" type="text" class="form-control form-control-user"
                                    value="<?php echo $ligne['NomCh'] ?>" placeholder="Nom de cheval">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>female</label>
                                <input type="radio" name="SexeCh" value="f" >
                                <label>male</label>
                                <input type="radio" name="SexeCh" value="m">
                            </div>

                            <div class="col-sm-6">
                                <input class="form-control form-control-user" type="date" name="DateNaissCh" value="<?php echo $ligne['DateNaissCh'] ?>" >
                            </div>

                        </div>
                        <div class="form-group row">
                            <input name="PoidsCh" type="text" class="form-control form-control-user"
                            value="<?php echo $ligne['PoidsCh'] ?>" placeholder=" Poids de cheval">
                        </div>
                        <button type="submit" name="action" value="valider" class="btn btn-primary btn-user btn-block">
                            Modifier cheval
                        </button>

                    </form>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include_once 'footer.php'; ?>