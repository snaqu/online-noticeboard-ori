<?php
session_start();
    $email = $_POST['email'];
    require_once '../polaczenie.php';
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie->query("UPDATE uzytkownicy SET email='$email' WHERE login='".$_SESSION['user']."'");
    header('Location: ../account-settings.php');
?>

