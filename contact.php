<?php
require("./inc/library.php");
if (!empty($_POST)) {
    $contact = "";
    foreach ($_POST as $k => $v) {
        $contact .= $k . ": " . clearInput($v) . "\n";
    }
    //print_r_pre($contact);
    writeAllTxt("./assets/contact/forms/" . date("Y-m-d_H-i-s") . ".txt", $contact);
}
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
                    <?= nl2br(readAllTxt("./assets/contact/content.txt")); ?>
                </p>
            </div>
        </div>
        <div class="row p-3">
            <h3>Please feel free to fill out the form ...</h3>
            <!-- FORM -->
            <form class="row g-3 border" action="" method="POST">
                <div class="col-md-6">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6">
                    <label for="zip" class="form-label">Zip</label>
                    <input onkeyup="loadTown(this.value)" type="text" class="form-control" id="zip" name="zip" required>
                </div>
                <div class="col-md-6">
                    <label for="town" class="form-label">Town</label>
                    <select type="text" class="form-control" id="town" name="town" required>
                        <option value="">Please insert your zip code</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Message</label>
                    <textarea id="message" name="message" rwo="5" class="form-control" style="width:100%" required></textarea>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="accept" name="accept" required>
                        <label class="form-check-label" for="accept">
                            I accept the terms...
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <p><button type="submit" class="btn btn-primary">Send</button></p>
                </div>
            </form>
            <!-- END FORM -->
        </div>
    </div>
    <!-- Footer -->
    <?php include("./parts/footer.php") ?>
    <!-- End Footer -->
    <script>
        const townSelect = document.getElementById('town');
        function loadTown(str) {
            let townOptions = "";
            if (str.length<3) return;
            fetch('./ajax/zipToTown.php?search='+str)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    console.log(data);
                    let townOptions = "<option value=''>Please select your town</option>\n";
                    for(let item of data){
                        townOptions+="<option>"+item['ville_nom']+"</option>\n";
                    }
                    townSelect.innerHTML = townOptions;
                });
        }
    </script>
</body>

</html>