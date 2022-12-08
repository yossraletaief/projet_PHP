<?php
require "connexiong.php";

$numch = isset($_GET['ch'])? $_GET['ch']:'';
$codeJokey = isset($_GET['j'])? $_GET['j']:'';
$codeParcours=isset($_GET['p'])? $_GET['p']:'';
$dateCourse=isset($_GET['dc'])? $_GET['dc']:'';
$dureeCourse=isset($_GET['d'])? $_GET['d']:'';

$req="SELECT * FROM `course` WHERE `NumCh`='$numch' AND `CodeJ`='$codeJokey' AND `CodeParc`='$codeParcours' ";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $stmt->fetch();

$valbtn = isset($_POST['action']) ? $_POST['action'] : '';


if ($valbtn == 'valider') {

    $NumCh=$_POST['NumCh'];
    $CodeJ=$_POST['CodeJ'];
    $CodeParc=$_POST['CodeParc'];
    $courseDate=$_POST['courseDate'];
    $courseDuree=$_POST['courseDuree'];

    $req2="UPDATE `course` SET `NumCh`='$NumCh',`CodeJ`='$CodeJ',`CodeParc`='$CodeParc',`DateCourse`='$courseDate',`durée`='$courseDuree' WHERE
    `NumCh`='$numch' AND `CodeJ`='$codeJokey'AND `CodeParc`='$codeParcours' ";
    $res=$idcon->exec($req2);
    if ($res) {
        header('Location:liste_Course.php');
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
                        <h1 class="h4 text-gray-900 mb-4">Modifier Course</h1>
                    </div>
                    <form class="user" action="modifierCourse.php" method="POST">
                    <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <select required name="CodeJ" class="form-control" id="CodeJ" >
                                    <option selected="true" disabled=""><?php echo $numch?></option>
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
                                    <option selected="true" disabled=""><?php echo $codeJokey ?></option>
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
                                <option selected="true" disabled=""><?php echo $codeParcours ?></option>
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
                                <input name="courseDate" type="date" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Date course" value="<?php echo $dateCourse; ?>">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="courseDuree" type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Durée course" value="<?php echo $dureeCourse; ?>">
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