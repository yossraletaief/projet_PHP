<?php
require "connexiong.php";
$valbtn = isset($_POST['action']) ? $_POST['action'] : '';

if ($valbtn == 'valider') {

    $CodeJ = $_POST['CodeJ'];
    $nomj = $_POST['nomj'];
    $prenomj = $_POST['prenomj'];
    $PoidsJ = $_POST['PoidsJ'];
    $req = "Insert Into jockeys values('$CodeJ','$nomj','$prenomj','$PoidsJ')";
    $res=$idcon->exec($req);
    if ($res) {
        header('Location:liste_Jokey.php');
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
                        <h1 class="h4 text-gray-900 mb-4">Ajouter jokey</h1>
                    </div>
                    <form class="user" action="ajouterJockeys.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="CodeJ" type="number" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="numero jokey">
                            </div>
                            <div class="col-sm-6">
                                <input name="nomj" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Nom de jockeys">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="prenomj" type="text" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Prenom de jockeys">
                        </div>
                        <div class="form-group row">
                            <input name="PoidsJ" type="text" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder=" Poids de jockey">
                        </div>
                        <button type="submit" name="action" value="valider" class="btn btn-primary btn-user btn-block">
                            Ajouter jokey
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