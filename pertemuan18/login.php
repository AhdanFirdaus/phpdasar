<?php 
session_start();
require "functions.php";

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //  cek cookie dan username
  if($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if(isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

if(isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "
    SELECT * FROM user WHERE username = '$username'
  ");

  // cek username
  if(mysqli_num_rows($result) === 1) {
    // cek password 
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;

      // cek remember me
      if(isset($_POST["remember"])) {
        // buat cookie
        setcookie("id", $row['id'], time()+60);
        setcookie("key", hash('sha256', $row['username']), time()+ 60);
      }

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm p-4">
          <h2 class="text-center mb-4">Halaman Login</h2>
          <?php if(isset($error)) :?>
            <p class="text-danger text-center"><em>username / password salah</em></p>
          <?php endif;?>
          <form action="" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username:</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
              <label class="form-check-label" for="remember">Remember me</label>
              <input type="checkbox" name="remember" id="remember" class="form-check-input">
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>