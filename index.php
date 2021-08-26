<?php
require("./inc/library.php")
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("./parts/head.php") ?>
    <title>Home - Hello PHP !</title>
</head>
<body>
    <!-- NavBar -->
    <?php include("./parts/navbar.php") ?>
    <!-- End NavBar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Home, Hello PHP !</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="./assets/images/home<?=rand(1, 3)?>.jpeg" alt="Random Image" class="img-fluid" width="100%">
            </div>
            <div class="col-12 col-md-6">
                <p>
                    <?=nl2br(readAllTxt("./assets/home/content.txt"));?>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./parts/footer.php") ?>
    <!-- End Footer -->
</body>
</html>