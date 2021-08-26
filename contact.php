<?php
require("./inc/library.php")
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("./parts/head.php") ?>
    <title>Contact - Hello PHP !</title>
</head>
<body>
    <!-- NavBar -->
    <?php include("./parts/navbar.php") ?>
    <!-- End NavBar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Contact Us !</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <?=nl2br(readAllTxt("./assets/contact/content.txt"));?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Please fill up the form</h2>
                
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./parts/footer.php") ?>
    <!-- End Footer -->
</body>
</html>