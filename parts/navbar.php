<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="<?php if (strpos($_SERVER["PHP_SELF"],"adminScred")) echo "." ?>./assets/images/logo.png" alt="Logo Webforce" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if (strpos($_SERVER["PHP_SELF"],"index")) echo "active" ?>" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (strpos($_SERVER["PHP_SELF"],"gallery")) echo "active" ?>" href="./gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin">Admin</a>
        </li>
      </ul> 
    </div>
  </div>
</nav>