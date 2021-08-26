<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
      <img src="../assets/images/logo.png" alt="Logo Webforce" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../gallery.php">Gallery</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php if (strpos($_SERVER["PHP_SELF"],"admin")) echo "bg-primary text-white ps-2" ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" href="#">Admin</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./adm_home.php">Home</a></li>
            <li><a class="dropdown-item" href="./adm_gal.php">Gallery</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./?logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>