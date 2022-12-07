<?php
require "connexiong.php";
$valbtn = isset($_POST['action']) ? $_POST['action'] : '';

if ($valbtn == 'valider') {

    $CodeP = $_POST['CodeP'];
    $villeP = $_POST['villeP'];
    $distanceP = $_POST['distanceP'];

    $req = "Insert Into parcours values('$CodeP','$villeP','$distanceP')";
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
                        <h1 class="h4 text-gray-900 mb-4">Ajouter Parcours</h1>
                    </div>
                    <form class="user" action="ajouterParcours.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="CodeP" type="number" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="numero Parcours">
                            </div>
                            <div class="col-sm-6">
                                <input name="villeP" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="ville du parcours">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="distanceP" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Distance du parcours">
                        </div>

                        <button type="submit" name="action" value="valider" class="btn btn-primary btn-user btn-block">
                            Ajouter Parcours
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