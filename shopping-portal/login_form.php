<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login page</title>
  <link rel="stylesheet" href="./build/css/login.css">
  <link rel="icon" type="image/png" href="img/Orgamidecal-hop.png" />
   <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
  <div class="overlay"></div>
  <div class="login-container">
	

    <div class="logo">
	<?php
				
				if(isset($_SESSION['error'])){
					echo "
						<div class='alert alert-danger text-center'>
							<i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
						</div>
					";
 
					//unset error
					unset($_SESSION['error']);
				}
 
				if(isset($_SESSION['success'])){
					echo "
						<div class='alert alert-success text-center'>
							<i class='fas fa-check-circle'></i> ".$_SESSION['success']."
						</div>
					";
 
					//unset success
					unset($_SESSION['success']);
					header( 'Location:index.php' );
				}
			?>
      <img src="img/Orgamidecal-hop.png" width="350px">

    </div>

    <form action="login.php" method="POST" class="form login">
      <div class="form__field form__field--email">
        <label class="label label--icon" for="login__email">
          <svg class="icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
          </svg>
          <span class="hidden">Email</span>
        </label>
        <div class="form__input-wrapper">
          <input id="email" type="text" name="email" class="form__input" placeholder="Email" title="must be characters@characters.domain" required>

          <div class="underline-wrapper">
            <span class="underline"></span>
          </div>
        </div>
      </div>

      <div class="form__field form__field--password">
        <label class="label label--icon" for="login__password">
          <svg class="icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
          </svg>
          <span class="hidden">Password</span>
        </label>
        <div class="form__input-wrapper">
          <input id="password" type="password" name="password" class="form__input" placeholder="Password" title="Eight or more characters" required>

          <div class="underline-wrapper">
            <span class="underline"></span>
          </div>
        </div>
      </div>

      <div class="login-actions-container">
        <div class="form__field form__field--remember-me">
            <span class="checkmark"></span>
            <a href=register.php><span class="remember-me-text">Register New User</span></a>
        </div>



        <div class="form__field form__field--submit">

          <button type="submit" class="primary-btn" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>

        </div>
      </div>
    </form>

    <svg width="0" height="0" xmlns="http://www.w3.org/2000/svg" class="icons">
      <symbol id="lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"
        />
      </symbol>
      <symbol id="user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"
        />
      </symbol>
    </svg>
  </div>


</body>

</html>
