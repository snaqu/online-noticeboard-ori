<?php
session_start();
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];
    if(strcmp($haslo,$haslo2) == 0){
        $hashHaslo = password_hash($haslo,PASSWORD_DEFAULT);
        require_once '../polaczenie.php';
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        $polaczenie->query("UPDATE uzytkownicy SET haslo='$hashHaslo' WHERE login='".$_SESSION['user']."'");
        header('Location: ../account-settings.php');
    } else {
        $_SESSION['inne-hasla'] = 'Hasła są inne';
        header('Location: ../account-settings.php');
    }
?>

