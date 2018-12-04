<?php
session_start();
    $miejscowosc = $_POST['miejscowosc'];
    $nrtelefonu = $_POST['nrtelefonu'];
    require_once '../polaczenie.php';
    $polaczeniexddd = new mysqli($host, $db_user, $db_password, $db_name);
    $polaczeniexddd->query("UPDATE uzytkownicy SET miasto='$miejscowosc', nr_telefonu='$nrtelefonu' WHERE login='".$_SESSION['user']."'");
    header('Location: ../account-settings.php');
?>

