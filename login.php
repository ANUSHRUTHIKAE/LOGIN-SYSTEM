<?php
include 'partials/dbconnect.php';
$login = FALSE;
$showError = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST["email"];
  $password0 = $_POST["password"];
  $sql = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1 && $email <> "") {
    while ($row = mysqli_fetch_assoc($result)) {
      echo $row['password'];
      if (password_verify($password0, $row['password'])) {
        $login = TRUE;
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $email;
        header("location: welcome.php");
      } else {
        $showError = TRUE;
      }
    }
  } else {
    $showError = TRUE;
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 5vh;
    }

    #form {
      padding: 3%;
      border: 2px double black;
      margin-top: 3vh;
    }
  </style>
  <title>Login in</title>
</head>

<body>
  <?php require 'partials/nav.php' ?>
  <?php
  if ($login) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
        <strong>INVALID CREDENTIALS!!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }



  ?>
  <div class="container">
    <h3>login up to our website</h3>
    <form id="form" action="/LOGIN SYSTEM/login.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" maxlength="30" class="form-control" id="email" name="email" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" maxlength="30" class="form-control" id="password" name="password">
      </div>



      <button type="submit" class="btn btn-primary mb-3">Submit</button>
      <div class="alert alert-info mb-3" role="alert">
        Don't have an acount?<a href="/LOGIN SYSTEM/signup.php" class="alert-link">sign up</a> here...
      </div>
    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>