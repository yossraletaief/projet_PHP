<?php
require "connexiong.php";
$req = " SELECT * from course ";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);


if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $numch = $_GET['ch'];
    $codeJ = $_GET['j'];
    $codeParc = $_GET['p'];
    $res = $idcon->exec("DELETE FROM course where NumCh = '$numch' AND CodeJ = '$codeJ' AND CodeParc = '$codeParc' ");
    if ($res) {
        header('Location:liste_Course.php');
    }
}
?>

<?php include_once 'header.php'; ?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste Course</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Num jokey</th>
                        <th>Num cheval</th>
                        <th>Num parcours</th>
                        <th>Date course</th>
                        <th>Durée</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Num jokey</th>
                        <th>Num cheval</th>
                        <th>Num parcours</th>
                        <th>Date course</th>
                        <th>Durée</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while ($ligne = $stmt->fetch()) { ?>

                    <tr>
                        <td>
                            <?php echo $ligne["CodeJ"] ?>
                        </td>
                        <td>
                            <?php echo $ligne["NumCh"] ?>
                        </td>
                        <td>
                            <?php echo $ligne["CodeParc"] ?>
                        </td>
                        <td>
                            <?php echo $ligne["DateCourse"] ?>
                        </td>
                        <td>
                            <?php echo $ligne["durée"] ?>
                        </td>
                        <td>
                            <a href="modifierCourse.php?ch=<?php echo $ligne['NumCh'] ?>&j=<?php echo $ligne['CodeJ'] ?>&p=<?php echo $ligne['CodeParc'] ?>&dc=<?php echo $ligne['DateCourse'] ?>&d=<?php echo $ligne['durée'] ?>"
                                class="btn btn-info edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="liste_Course.php?ch=<?php echo $ligne['NumCh'] ?>&j=<?php echo $ligne['CodeJ'] ?>&p=<?php echo $ligne['CodeParc'] ?>&action=delete"
                                class="btn btn-danger remove" value="valider" type="submit" name="action">
                                <i class="fa fa-times"></i>
                                <a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>