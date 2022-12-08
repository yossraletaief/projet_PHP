<?php
require "connexiong.php";

$myID  = isset($_GET['id'])? $_GET['id']:'';

$req="SELECT * from parcours where CodeParc='$myID' ";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $stmt->fetch();

$valbtn = isset($_POST['action']) ? $_POST['action'] : '';


if ($valbtn == 'valider') {

    $CodeP=$_POST['CodeP'];
    $villeP=$_POST['villeP'];
    $distanceP=$_POST['distanceP'];

    $req2="UPDATE `parcours` SET `CodeParc`='$CodeP',`Ville`='$villeP',`Distance`='$distanceP' WHERE `CodeParc`='$CodeP'";
    $idcon->exec($req2);
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
                        <h1 class="h4 text-gray-900 mb-4">Modifier Parcours</h1>
                    </div>
                    <form class="user" action="modifierParcours.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="CodeP" type="number" class="form-control form-control-user"
                                    value="<?php echo $ligne['CodeParc'] ?>" placeholder="code parcours">
                            </div>
                            <div class="col-sm-6">
                                <input name="villeP" type="text" class="form-control form-control-user"
                                    value="<?php echo $ligne['Ville'] ?>" placeholder="ville du parcours">
                            </div>
                        </div>

                        <div class="form-group row">
                            <input name="distanceP" type="number" class="form-control form-control-user"
                            value="<?php echo $ligne['Distance'] ?>" placeholder=" Distance du parcours">
                        </div>
                        <button type="submit" name="action" value="valider" class="btn btn-primary btn-user btn-block">
                            Modifier parcours
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