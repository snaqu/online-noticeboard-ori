<?php
    session_start();
?>
<!DOCTYPE html>


<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>KUTAS DO BUZI555555555555555555</title>

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	 crossorigin="anonymous">
</head>

<body>
	<div class="login-form">
		<div class="login__block">
			<form action="logowanie.php" id="login__form" method="post">

				<i class="fas fa-times" id="login__cross"></i>
				<label for="nick">Nick</label>
				<input type="text" required name="login">
				<label for="password">Password</label>
				<input type="password" required name="haslo">
				<input type="submit" value="Log In" name="submit">
				<a href="rejestracja.php"><input type="button" value="Create Account" name="submit"></a>
			</form>
		</div>
	</div>
	<nav>
		<div class="wrapper wrapper--flex animated bounceInDown delay-2s">
			<div class="wrapper__element">
				<p><a href="#">pasar</a></p>
			</div>
			<div class="wrapper__element">
				<?php
								
                if((isset($_SESSION["zalogowany"]))&&($_SESSION["zalogowany"]==True))        
                {
												echo '<i class="far fa-user fa-2x"></i>';
												echo '<p>'.$_SESSION['user'].'</p>';
												echo '<a href="wyloguj.php"><input type="button" value="Logout"></a>';
			             
//                    echo "<span>".$_SESSION['user']."</span>";
                }
                else{
                      echo '<input type="button" id="btn-to-login" value="Log In">';
										}
										

        ?>

			</div>
		</div>
	</nav>
	<main class="main-frontpage">
		<div class="wrapper animated bounceInDown delay-2s">
			<div class="container">
				<div class="search">
					<div class="search__title">
						<h1>
							Search for your new stuff
						</h1>
					</div>
					<div class="search__line"></div>
					<div class="search__subtitle">
						<p>

							You can find there some new great items</p>
					</div>
					<div class="search__input">
						<form action="" id="form-search">
							<input type="text" placeholder="...">
							<input type="submit" value="SEARCH">
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="js/main.js">
		// import { changeDisplay } from 'js/main.js';
	</script>
</body>

</html>