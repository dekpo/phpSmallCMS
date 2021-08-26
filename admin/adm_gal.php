<?php
require("../inc/config.php");
require("../inc/library.php");
session_start();
// on vérifie si on a la clé auth dans $_SESSION
if (!isset($_SESSION["auth"])) header("Location:../");
// on travaille dans le dossier de gallery
$dossier = '../assets/gallery/';
// gestion des actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (empty($_FILES['image']['name'])) break;
            $check_img = getimagesize($_FILES["image"]["tmp_name"]);
            if (!is_array($check_img)) break;
            $img = clearInput(str_replace(" ", "-", $_FILES["image"]["name"]));
            $newImg = $dossier . $img;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $newImg)) {
                $ar_file = explode(".", $img);
                $name = $ar_file[0];
                $title = clearInput($_POST['title']);
                $parag = clearInput($_POST['parag']);
                $content = "<div class=\"card-body\"><h5 class=\"card-title\">$title</h5>\n";
                $content .= "<p class=\"card-text\">$parag</p></div>";
                writeAllTxt($dossier . $name . ".txt", $content);
            }
            break;
        case 'update':
            $name = $_GET['img'];
            $title = clearInput($_POST['title']);
            $parag = clearInput($_POST['parag']);
            $content = "<div class=\"card-body\"><h5 class=\"card-title\">$title</h5>\n";
            $content .= "<p class=\"card-text\">$parag</p></div>";
            writeAllTxt($dossier . $name . ".txt", $content);
            break;
        case 'delete':
            $img = $_GET['img'];
            if (!file_exists($dossier.$img )) break;
            $ar_file = explode(".", $img);
            $name = $ar_file[0];
            unlink($dossier . $img);
            unlink($dossier . $name . ".txt");
            break;
    }
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
                <h1><a href="./">Admin</a> &gt; Gallery</h1>
            </div>
        </div>
        <div class="row p-3">
            <h2>Add new image</h2>
            <div class="col-12 border">
                <form id="formAdd" action="?action=add" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">New Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="title">New Title</label>
                        <input id="title" class="form-control" name="title" maxlength="30" type="text" placeholder="Your Title">
                        <small id="titleHelp" class="form-text text-muted">There is a maximum length of 30 characters</small>
                    </div>
                    <div class="form-group">
                        <label for="parag">New Paragraphe</label>
                        <input id="parag" type="text" name="parag" class="form-control" placeholder="Your Paragraphe" maxlength="120">
                        <small id="paragHelp" class="form-text text-muted">There is a maximum length of 120 characters</small>
                    </div>
                    <p><button type="submit" class="btn btn-primary">Add new</button></p>
                </form>
            </div>
        </div>
        <div class="row p-3">
            <h2>List of images</h2>
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Parag</th>
                        <th scope="col">Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // récupération du contenu du dossier scandir() est une fonction qui scanne un dossier et qui retourne un tableau
                    $scan = scandir($dossier, SCANDIR_SORT_DESCENDING);
                    //print_r_pre($scan);
                    // utilisation d'une boucle foreach pour afficher les images attention à "." et ".." qui ne sont pas des images
                    $nb = 0;
                    foreach ($scan as $k => $v) {
                        if ($v != "." && $v != ".." && getimagesize($dossier . $v)) {
                            $nb++;
                            // on définit le nom du fichier à inclure
                            $ar_file = explode(".", $v);
                            $file_content = str_replace("." . $ar_file[1], ".txt", $v);
                            $path_content = file_exists($dossier . $file_content) ? $dossier . $file_content : $dossier . "lorem.txt";
                            $data = readTitleParag($path_content);
                    ?>
                            <form id="formUpdate" action="?action=update&img=<?= $ar_file[0] ?>#<?= $nb ?>img" method="POST">
                                <!-- Image Table Row -->
                                <tr>
                                    <th width="20" scope="row" id="<?= $nb ?>img"><?= $nb ?></th>
                                    <td width="120"><img src="<?php echo $dossier . $v; ?>" class="img-fluid" alt="<?= $ar_file[0] ?>"></td>
                                    <td width="150"><input type="text" name="title" class="form-control" value="<?= $data[0] ?>" maxlength="30"></td>
                                    <td><input type="text" name="parag" class="form-control" value="<?= $data[1] ?>" maxlength="120"></td>
                                    <td width="80">
                                        <button type="submit" class="btn btn-primary">Update</button><br>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#Modal<?=$nb?>" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Image Table Row -->
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="Modal<?=$nb?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete this file ???</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this image : <br> <b>`<?=$v?>`</b> and all it's infos ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">NO !</button>
                                            <button type="button" onclick="javascript:location.href='?action=delete&img=<?= $v ?>#<?= $nb ?>img'" class="btn btn-danger">Yes i do</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Footer -->
    <?php include("../parts/footer.php") ?>
    <!-- End Footer -->
</body>

</html>