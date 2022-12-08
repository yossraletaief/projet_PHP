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

    $req="UPDATE `parcours` SET `CodeParc`='$CodeP',`Ville`='$villeP',`Distance`='$distanceP' WHERE `CodeParc`='$CodeP'";
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
                        <h1 class="h4 text-gray-900 mb-4">Modifier Course</h1>
                    </div>
                    <form class="user" action="modifierCourse.php" method="POST">
                    <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <select required name="CodeJ" class="form-control" id="CodeJ">
                                    <option selected="" disabled="">Choisir jokey</option>
                                    <?php
                                    $req = " SELECT * from jockeys ";
                                    $stmt = $idcon->query($req);
                                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    while ($ligne = $stmt->fetch()) {
                                    ?>
                                    <option value="<?php echo $ligne['CodeJ']; ?>">
                                        <?php echo $ligne['NomJ']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select required name="NumCh" class="form-control" id="NumCh">
                                    <option selected="" disabled="">Choisir cheval</option>
                                    <?php
                                    $req = " SELECT * from cheval ";
                                    $stmt = $idcon->query($req);
                                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    while ($ligne = $stmt->fetch()) {
                                    ?>
                                    <option value="<?php echo $ligne['NumCh']; ?>">
                                        <?php echo $ligne['NomCh']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <select required name="CodeParc" class="form-control" id="CodeParc">
                                <option selected="" disabled="">Choisir parcours</option>
                                <?php
                                    $req = " SELECT * from parcours ";
                                    $stmt = $idcon->query($req);
                                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    while ($ligne = $stmt->fetch()) {
                                    ?>
                                <option value="<?php echo $ligne['CodeParc']; ?>">
                                    <?php echo $ligne['Ville']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="courseDate" type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Date course">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="courseDuree" type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Durée course">
                            </div>
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