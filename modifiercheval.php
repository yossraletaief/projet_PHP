<?php
require "connexiong.php";

if (isset($_GET['id'])) {
    $myID = $_GET['id'];
} else {
    $myID = '';
}

$req="SELECT * from cheval where NumCh='$myID' ";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $stmt->fetch();


if (isset($_POST['action'])) {
    $valbtn = $_POST['action'];
} else {
    $valbtn = '';
}


if ($valbtn == 'valider') {

    $NumCh=$_POST['NumCh'];
    $nomch=$_POST['nomch'];
    $SexeCh=$_POST['SexeCh'];
    $PoidsCh=$_POST['PoidsCh'];
    $DateNaissCh=$_POST['DateNaissCh'];
    $req2="update cheval set NomCh='$nomch',SexeCh= '$SexeCh',PoidsCh='$PoidsCh',
    DateNaissCh='$DateNaissCh' where NumCh='$NumCh'" ;
    $res=$idcon->exec($req2);
    if ($res) {
        header('Location:liste_chevaux.php');
    }
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
                                    value="<?php echo $ligne['NumCh']?>" placeholder="numero cheval">
                            </div>
                            <div class="col-sm-6">
                                <input name="nomch" type="text" class="form-control form-control-user"
                                    value="<?php echo $ligne['NomCh']?>" placeholder="Nom de cheval">
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