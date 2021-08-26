<?php
require("../inc/config.php");
require("../inc/library.php");
session_start();
// on vérifie si on a la clé auth dans $_SESSION
if (!isset($_SESSION["auth"])) header("Location:../");
// mise à jour du contenu
if (!empty($_POST)) {
    writeAllTxt("../assets/contact/content.txt", $_POST["parag"]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("../parts/head.php") ?>
    <title>Admin Scred Chut...</title>
</head>
<body>
    <!-- NavBar -->
    <?php include("../parts/adm_navbar.php") ?>
    <!-- End NavBar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1><a href="./">Admin</a> &gt; Contact</h1>
            </div>
        </div>
        <div class="row p-3">
        <h2>Here is your contact parag</h2>
            <div class="col-12 border">
                <form action="" method="POST">
                <div class="form-group">
                <label for="parag">Paragraphe</label>
                    <textarea class="form-control" id="parag" name="parag" rows="8" style="width:100%"><?= readAllTxt("../assets/contact/content.txt") ?></textarea>
                </div>
                <small id="paragHelp" class="form-text text-muted">By using new lines in this parag you will do breaks in the output.</small>
                  <p><button type="submit" class="btn btn-primary">Update</button></p>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                $scan = scandir("../assets/contact/forms", SCANDIR_SORT_DESCENDING);
                //print_r_pre($scan);
                foreach ($scan as $k=>$v){
                    if ($v != "." && $v != "..") {
                        ?>
                        <p>
                        <?php echo nl2br(readAllTxt("../assets/contact/forms/".$v)); ?>
                        </p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("../parts/footer.php") ?>
    <!-- End Footer -->
</body>
</html>