<?php
    session_start();
    error_reporting(1);
    if(isset($_POST['login_rej']))
    {
        $ok = True;
        $login = $_POST['login_rej'];
        $haslo = $_POST['haslo_rej'];
        $haslo2 = $_POST['haslo_rej2'];
        $email = $_POST['email_rej'];
        $nr_telefonu = $_POST['tel_rej'];
//        $data_rejestracji NOW();
         $today = date("Y-m-d H:i:s");
        //sprawdzanie loginu
        if((strlen($login)<3) || (strlen($login)>20))
        {
            $ok = False;
            $_SESSION['blad_login'] = "Login musi mieć od 3 do 20 znaków";
        }
        if(ctype_alnum($login)==False)
        {
            $ok=False;
            $_SESSION['blad_login'] = "Login nie może zawierać znaków specjalynch (tylko litery i cyfry)";
        }
        
        
    
        //czy login istnieje?
        require_once "polaczenie.php";

        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->connect_errno!=0)
        {
          echo '<p>jakis problem jest </p>';
        }
        else
        {
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE login='$login'");
        
           
            $ile_loginow = $rezultat->num_rows;
            if($ile_loginow>0)
            {
                $ok = False;
                $_SESSION['blad_login'] = "Taki login już istnieje";
            }

          $polaczenie->close();  
        }
   
     
        //sprawdzanie maila
        
//  
//        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
//        {
//            $ok=False;
//            $_SESSION['blad_email'] = "Podaj poprawny adres email"; 
//        }
//        
        //sprawdzanie haseł
        if((strlen($haslo)<5))
        {
            $ok = False;
            $_SESSION['blad_haslo'] = "Hasło musi składać się minimum z 5 znaków";
        }
        if($haslo!=$haslo2)
        {
            $ok=False;
            $_SESSION['blad_haslo2'] = "Hasła nie są takie same!";
        }
        
        
        

        
        if(!isset($_POST['check']))
        {
            $ok=False;
            $_SESSION['blad_regulamin'] = "Nie zaakceptowałeś regulaminu";
        }
            
        require_once "polaczenie.php";
        
        
        //zapamietywanie danych
        
        $_SESSION['zap_login'] = $login;
        $_SESSION['zap_haslo1'] = $haslo;
        $_SESSION['zap_haslo2'] = $haslo2;
        $_SESSION['zap_email'] = $email;
        $_SESSION['zap_tel'] = $nr_telefonu;
//        $_SESSION['zap_rej'] = $data_rejestracji;
    
        
        if($ok==True)
        {
            
            
            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
            if (mysqli_connect_errno() != 0){
                echo '<p>Wystąpił błąd połączenia: ' . mysqli_connect_error() . '</p>';
            }
            else 
            {
               $wynik = @$polaczenie -> query("INSERT INTO uzytkownicy (id_uzytkownika, login, haslo, email, nr_telefonu, data_rejestracji) VALUES ('', '$login','$haslo','$email','$nr_telefonu', '$today')");
                
//                $wynik2 = @$polaczenie -> query("INSERT INTO dateczka (id_data, data) VALUES ('','NOW()')");
            }



            if ($wynik == false)
            {
                echo '<p>Zapytanie nie zostało wykonane poprawnie!</p>';
                $polaczenie -> close();
            }
                else {
                    $_SESSION['okrejestracja'] = True;
                    
                    echo "<div style='color: black; margin-top: 25%; margin-left: auto; margin-right: auto; font-size: 20px;
          width: 600px; height: 70px; background-color: peru;text-align: center; line-height: 70px; border-radius: 10px;'>"."<p>Dziękujemy za rejestrację!</p>"."</div>";
                    sleep(2);
                    header('Refresh: 2; url=index.php');



                    $polaczenie -> close();
                }
                exit();
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/rejestracja.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
</head>
<body>
   <div></div>
    <div id="header">
        <ol>
<!--
            <li><a href="#">Strona główna</a>
                <ul>

                </ul>
            </li>
-->

            <li><a href="rejestracja.php">Rejestracja</a>
                <ul>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>

<!--
            <li><a href="logowanie.php">Logowanie</a>
                <ul>

                </ul>
            </li>
-->

        </ol>
    </div>

    <form method="post">
        <div id="container">
            <input type="text" name="login_rej" value="<?php
                         if(isset($_SESSION['zap_login'])) 
                         {
                             echo $_SESSION['zap_login'];
                             unset ($_SESSION['zap_login']);
                         }
                                                       
            ?>" placeholder="Login"> 
            <?php
                if(isset($_SESSION['blad_login']))
                {
                    echo "<div class='blad'>".$_SESSION['blad_login']."</div>";
                    unset($_SESSION['blad_login']);
                }
            ?>
            <input type="password" name="haslo_rej" value="<?php
                         if(isset($_SESSION['zap_haslo1'])) 
                         {
                             echo $_SESSION['zap_haslo1'];
                             unset ($_SESSION['zap_haslo1']);
                         }
                                                       
            ?>" placeholder="Hasło">
            <?php
                if(isset($_SESSION['blad_haslo']))
                    {
                        echo "<div class='blad'>".$_SESSION['blad_haslo']."</div>";
                    unset($_SESSION['blad_haslo']);
                    }
            ?>
            <input type="password" name="haslo_rej2" value="<?php
                         if(isset($_SESSION['zap_haslo2'])) 
                         {
                             echo $_SESSION['zap_haslo2'];
                             unset ($_SESSION['zap_haslo2']);
                         }
                                                       
            ?>" placeholder="Powtórz hasło">
            <?php
                if(isset($_SESSION['blad_haslo2']))
                    {
                        echo "<div class='blad'>".$_SESSION['blad_haslo2']."</div>";
                    unset($_SESSION['blad_haslo2']);
                    }
            ?>
            <input type="text" name="email_rej" value="<?php
                         if(isset($_SESSION['zap_email'])) 
                         {
                             echo $_SESSION['zap_email'];
                             unset ($_SESSION['zap_email']);
                         }
                                                       
            ?>" placeholder="Email">
            <?php
                if(isset($_SESSION['blad_email']))
                {
                    echo "<div class='blad'>".$_SESSION['blad_email']."</div>";
                    unset($_SESSION['blad_email']);
                }
            ?>
            <br/>
            <input type="text" name="tel_rej" value="<?php
                         if(isset($_SESSION['zap_tel'])) 
                         {
                             echo $_SESSION['zap_tel'];
                             unset ($_SESSION['zap_tel']);
                         }
                                                       
            ?>" placeholder="Wpisz numer telefonu">
            <br/>
            
            <input type="checkbox" name="check"> Akcpetuję regulamin 
            <?php
                if(isset($_SESSION['blad_regulamin']))
                {
                    echo "<div class='blad'>".$_SESSION['blad_regulamin']."</div>";
                    unset($_SESSION['blad_regulamin']);
                }
            ?>
            
            <br/>
            <input type="submit" name="submit" value="Zarejestruj!">
        </div>
    </form>
    
    
   
</body>
</html>

