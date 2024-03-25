<?php 
include 'conn.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Login</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- bootstarp icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- css -->
  <link rel="stylesheet" href="css/login.css">

</head>

<body>

  <?php include "navbar.php"; ?>

  <div class="container-fluid py-5 bg-dark text-white text-center">
    <h2 class="mb-3">ยินดีต้อนรับเข้าสู่ห้องเรียน CodeDee</h2>
    <h5>🐳ล็อกอินแล้วลุยกันเลย</h5>
  </div>


  <div class="container login-container pb-5" >
    <div class="switch d-flex row mx-auto mt-5 pb-3 text-center" style="max-width: 600px;">
      <a href="#" class="fs-1 col-6 text-decoration-none text-dark active" id="signIn">LOGIN</a>
      <a href="#" class="fs-1 col-6 text-decoration-none text-dark" id="signUp">REGISTER</a>
    </div>

    <!-- SignIn -->
    <form action="signin_db.php" method="post" style="max-width: 600px; margin: 20px auto; display:none;" class="signIn-active px-3 px-md-0" id="signInContainer">

      <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger" role="alert">
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>
      <?php endif ?>
      <?php if (isset($_SESSION['succsus'])) : ?>
        <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['succsus'];
          unset($_SESSION['succsus']);
          ?>
        </div>
      <?php endif ?>

      <div class="mb-3">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" class="form-control" name="user_username" aria-describedby="username">
      </div>


      <div class="mb-3">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" class="form-control" name="user_password">
      </div>

      <button type="submit" name="signin" class="btn btn-primary py-2 fs-5 mt-4 w-100">SignIn</button>
      
    </form>

    <!-- SignUp -->
    <form action="signup_db.php" method="post" style="max-width: 600px; margin: 20px auto; display: none;" class="px-3 px-md-0" id="signUpContainer">
      <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger" role="alert">
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>
      <?php endif ?>
      <?php if (isset($_SESSION['succsus'])) : ?>
        <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['succsus'];
          unset($_SESSION['succsus']);
          ?>
        </div>
      <?php endif ?>
      <?php if (isset($_SESSION['warning'])) : ?>
        <div class="alert alert-warning" role="alert">
          <?php
          echo $_SESSION['warning'];
          unset($_SESSION['warning']);
          ?>
        </div>
      <?php endif ?>
      <div class="mb-3">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" class="form-control" name="user_username" aria-describedby="username">
      </div>

      <div class="mb-3">
        <label for="user_fullname" class="form-label">Fullname</label>
        <input type="text" class="form-control" name="user_fullname" aria-describedby="fullname">
      </div>
      <div class="mb-3">
        <label for="user_email" class="form-label">Email</label>
        <input type="email" class="form-control" name="user_email" aria-describedby="email">
      </div>

      <div class="mb-3">
        <label for="user_address" class="form-label">Address</label>
        <input type="text" class="form-control" name="user_address" aria-describedby="addres">
      </div>

      <div class="mb-3">
        <label for="tel" class="form-label">Telephone</label>
        <input type="tel" class="form-control" name="tel" aria-describedby="tel">
      </div>

      <div class="mb-3">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" class="form-control" name="user_password">
      </div>



      <button type="submit" name="signup" class="btn btn-primary py-2 fs-5 mt-4 w-100">SignUp</button>
    </form>


  </div>

  <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const signUp = document.getElementById('signUpContainer');
    const signIn = document.getElementById('signInContainer');

    signUpButton.addEventListener('click', () => {
      signUp.classList.add("signUp-active");
      signIn.classList.remove("signIn-active");
      signUpButton.classList.add("active");
      signInButton.classList.remove("active");
    });

    signInButton.addEventListener('click', () => {
      signUp.classList.remove("signUp-active");
      signIn.classList.add("signIn-active");  
      signUpButton.classList.remove("active");
      signInButton.classList.add("active");
    });
  </script>

  <?php include 'footer.php' ?>
</body>

</html>