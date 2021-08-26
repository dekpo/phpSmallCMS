<?php
require("../inc/config.php");
require("../inc/library.php");
session_start();
$validated = (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] === ADMIN_USER && md5($_SERVER['PHP_AUTH_PW']) === ADMIN_PWD);
if (!$validated) {
    header('WWW-Authenticate: Basic realm="My Super Admin PHP"');
    logOut();
}
// on est bien authentifié
$_SESSION["auth"] = true;
if (isset($_GET['logout'])) {
    session_unset();
    logOut();
}
if (!isset($_SESSION["auth"])) header("Location:../");
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("../parts/head.php") ?>
    <title>Admin Scred ...</title>
</head>
<body>
    <!-- NavBar -->
    <?php include("../parts/adm_navbar.php") ?>
    <!-- End NavBar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Admin ...</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    <li><a href="./adm_home.php">Handle Home</a></li>
                    <li><a href="./adm_gal.php">Handle Gallery</a></li>
                    <li><a href="./adm_about.php">Handle About</a></li>
                    <li><a href="./?logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("../parts/footer.php") ?>
    <!-- End Footer -->
</body>
</html>