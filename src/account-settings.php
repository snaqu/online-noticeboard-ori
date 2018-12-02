<?php
    session_start();
    require_once 'polaczenie.php';
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

?>
    <!DOCTYPE html>


    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <title></title>

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                    <a href="rejestracja.php">
                        <input type="button" value="Create Account" name="submit">
                    </a>
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

                if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
                    echo '<div class="dropdown d-flex mr-4 ">
                    <button class="btn bg-transparent dropdown-toggle d-flex justify-center align-items-center text-white" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user fa-2x text-white"></i>
                        <p>'.$_SESSION['user'].'</p>
                    </button>
                    <div class="dropdown-menu text-white p-0" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button">
                        <a href="account-settings.php" class="dropdown-a">Ustawienia</a>
                    </button>
                    <button class="dropdown-item" type="button">
                        <a href="dodaj-ogloszenie.php" class="dropdown-a">Dodaj ogłoszenie</a>
                    </button>
                    </div>
                </div>';
                    // echo '<i class="far fa-user fa-2x"></i>';
                    // echo '<a href="account-settings.php"><p>'.$_SESSION['user'].'</p></a>';
                    echo '<a href="wyloguj.php"><input type="button" value="Logout" class="subpage-input"></a>';
                //                  echo "<span>".$_SESSION['user']."</span>";
                } else {
                    echo '<input type="button" id="btn-to-login" value="Log In" class="subpage-input">';
                }
                ?>

                </div>
            </div>
        </nav>
        <main>
            <div class="account-settings">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Ogłoszenia</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Ustawienia</a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="card" style="width: 100%;">
                                        <div class="card-header">
                                            Moje ogłoszenia
                                        </div>
                                        <ul class="list-group list-group-flush">
                                        <?php
                                            if($polaczenie->connect_errno!=0){
                                                echo '<p>jakis problem jest </p>';
                                            }else{
                                                $result = $polaczenie->query("SELECT * FROM ogloszenia WHERE id_uzytkownika='".$_SESSION['userID']."'");
                                                $allRows = $result->num_rows;
                                                for ($i=1; $i <=$allRows; $i++){
                                                    $row = $result->fetch_assoc();
                                                    $_SESSION{'nazwa'} = $row['nazwa_ogloszenia'];
                                                    // $_SESSION{'description' . $i} = $row['Description'];
                                                    // $_SESSION{'price' . $i} = $row['Price'];
                                                    // $connection->close();
                                                        echo '
                                                        <li class="list-group-item d-flex justify-content-between align-items-center"> '.$_SESSION["nazwa"].'
                                                            <button type="button" class="btn btn-outline-primary">Zobacz</button>
                                                        </li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Zmień hasło
                                        </button>
                                    </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <form action="zmiana-ustawien/zmiana-hasla.php" method="post">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Hasło</label>
                                                            <input type="password" name="haslo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Powtórz hasło</label>
                                                            <input type="password" name="haslo2" class="form-control" id="exampleInputPassword1" required>
                                                            <?php
                                                            if (isset($_SESSION['inne-hasla'])) {
                                                                echo $_SESSION['inne-hasla'];
                                                                unset($_SESSION['inne-hasla']);
                                                            }
                                                        ?>
                                                        </div>
                                                        <button name="submit" type="submit" class="btn btn-primary">Zapisz</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Zmień Email
                                        </button>
                                    </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <form action="zmiana-ustawien/zmiana-email.php" method="post">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Adress Email</label>
                                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <button type="submit" name="submit" class="btn btn-primary">Zapisz</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Zmień dane kontaktowe
                                        </button>
                                    </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <form action="zmiana-ustawien/zmiana-danych.php" method="post">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Miejscowość</label>
                                                            <input type="text" class="form-control" name="miejscowosc" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Numer telefonu</label>
                                                            <input type="phone" class="form-control" name="nrtelefonu" id="exampleInputPassword1" required>
                                                        </div>
                                                        <button name="submit" type="submit" class="btn btn-primary">Zapisz</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>




    </html>
