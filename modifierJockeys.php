<?php
require "connexiong.php";

$myID  = $_GET['id'];
$myID  = isset($_GET['id'])? $_GET['id']:'';

$req="SELECT * from jockeys where CodeJ='$myID' ";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $stmt->fetch();

$valbtn = isset($_POST['action']) ? $_POST['action'] : '';


if ($valbtn == 'valider') {

    $CodeJ=$_POST['CodeJ'];
    $NomJ=$_POST['NomJ'];
    $PrenomJ=$_POST['PrénomJ'];
    $PoidsJ=$_POST['PoidsJ'];
    $req="update jockeys set NomJ= '$NomJ',PrénomJ='$PrenomJ',
    PoidsJ='$PoidsJ' where CodeJ=$CodeJ" ;
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
                    <form class="user" action="modifierJokeys.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="CodeJ" type="number" class="form-control form-control-user"
                                    value="<?php echo $ligne['CodeJ'] ?>" placeholder="code jokeys">
                            </div>
                            <div class="col-sm-6">
                                <input name="NomJ" type="text" class="form-control form-control-user"
                                    value="<?php echo $ligne['NomJ'] ?>" placeholder="Nom de jokeys">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input name="Prenom" type="text" class="form-control form-control-user"
                            value="<?php echo $ligne['PrénomJ'] ?>" placeholder=" PrénomJ de Jokeys">
                        </div>
                        <div class="form-group row">
                            <input name="PoidsJ" type="text" class="form-control form-control-user"
                            value="<?php echo $ligne['PoidsJ'] ?>" placeholder=" Poids de Jokeys">
                        </div>
                        <button type="submit" name="action" value="valider" class="btn btn-primary btn-user btn-block">
                            Modifier jokeys
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