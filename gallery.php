<?php
require("./inc/library.php")
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("./parts/head.php") ?>
    <title>Gallery - Hello, PHP!</title>
</head>
<body>
    <!-- NavBar -->
    <?php include("./parts/navbar.php") ?>
    <!-- End NavBar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Gallery,</h1>
            </div>
        </div>
        <div class="row">
            <?php
            // récupération du contenu du dossier scandir() est une fonction qui scanne un dossier et qui retourne un tableau
            $dossier = './assets/gallery/';
            $scan = scandir($dossier,SCANDIR_SORT_DESCENDING);
            //print_r_pre($scan);
            // utilisation d'une boucle foreach pour afficher les images attention à "." et ".." qui ne sont pas des images
            foreach ($scan as $k => $v) {
                if ($v != "." && $v != ".." && getimagesize($dossier . $v)) {
            ?>
                    <!-- Col Bootstrap + Card -->
                    <div class="col-12 col-sm-6 col-md-4 my-1">
                        <div class="card">
                            <img src="<?php echo $dossier . $v; ?>" class="card-img-top" alt="Test Galerie">
                            <?php
                            // on définit le nom du fichier à inclure
                            $ar_file = explode(".",$v);
                            $file_content = str_replace(".".$ar_file[1], ".txt", $v);
                            $path_content = $dossier . $file_content;
                            // si le fichier existe on l'inclut
                            if (file_exists($path_content)) {
                                include($path_content);
                            } else {
                                include($dossier . "lorem.txt");
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Col Bootstrap + Card -->
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./parts/footer.php") ?>
    <!-- End Footer -->
</body>
</html>