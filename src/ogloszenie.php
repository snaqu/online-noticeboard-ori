<?php
    session_start();
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
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
    <nav class="navigation">
        <div class="wrapper wrapper--flex animated bounceInDown delay-2s">
            <div class="wrapper__element">
                <p><a href="index.php">pasar</a></p>
            </div>
            <div class="wrapper__element">
                <?php

                if((isset($_SESSION["zalogowany"]))&&($_SESSION["zalogowany"]==True)){
					echo '<i class="far fa-user fa-2x"></i>';
                    echo '<p>'.$_SESSION['user'].'</p>';
                    echo '<a href="wyloguj.php"><input type="button" value="Logout" class="subpage-input"></a>';
//                  echo "<span>".$_SESSION['user']."</span>";
                }
                else{
                      echo '<input type="button" id="btn-to-login" value="Log In" class="subpage-input">';
				}
            ?>

            </div>
        </div>
    </nav>
    <main>

        <div class="notice">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <img class="card-img-top" src="images/kot.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Kotek superancki</h5>
                                <p class="card-text">Mam na sprzedaż super kociaka, młody urodził sie nie dawno. Czeka na Ciebie!</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                    <div class="alert alert-dark" role="alert">
                                50 ZŁ
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block">+48 324 332 123</button>
                        <div class="card mt-3 mb-3">
                        
                            <img class="card-img-top" src="images/user.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Daria</h5>
                                <p class="card-text">Jaworzno</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/main.js">
        // import { changeDisplay } from 'js/main.js';
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>