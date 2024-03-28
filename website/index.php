<?php

session_start();

 if (isset($_SESSION['name'])) {
header('location: ./home.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Camvision</title>

  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <div class="container">
    <div class="box">
      <h1 class="box__title">CamVision</h1>
      <p class="box__subtitle">Attend Today! Achieve tomorrow!</p>
      <?php 
      if (isset($_SESSION['login_failed'])) : ?>
        <div class="alert">
          Incorrect username or password!
        </div>
      <?php
      unset($_SESSION['login_failed']);
      endif;
      ?>
      <form action="./auth1.php" method="post" class="form">
        <input type="text" class="form__input" placeholder="Username" name="username" required />
        <input type="date" class="form__input" placeholder="Password" name="password" required />
        <button class="form__button" type="submit" name="submit">LOGIN</button>
      </form>
    </div>
  </div>
</body>

</html>