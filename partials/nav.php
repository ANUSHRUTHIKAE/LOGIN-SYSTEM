<?php
$loggedin = FALSE;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
  $loggedin = TRUE;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/LOGIN SYSTEM/login"> SHOP ON AIR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/LOGIN SYSTEM/welcome.php">Home</a>
        </li>';
if (!$loggedin) {
  echo '
        <li class="nav-item">
          <a class="nav-link" href="/LOGIN SYSTEM/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/LOGIN SYSTEM/signup.php">Signup</a>
        </li>';
}
if ($loggedin) {
  echo '
        <li class="nav-item">
          <a class="nav-link" href="/LOGIN SYSTEM/logout.php">Logout</a>
        </li>';
}

echo '</ul>
        
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
