<?php
    require_once 'polaczenie.php';
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno != 0) {
        echo 'Nie udalo sie polaczyc z bazą: '.$polaczenie->connect_errno;
    } else {
        $tytul = $_POST['tytul'];
        $kategorie = $_POST['kategorie'];
        $stan = $_POST['stan'];
        $opis = $_POST['opis'];
        $cena = $_POST['cena'];
        $sql = "INSERT INTO 'ogloszenia'('id_ogloszenia', 'id_uzytkownika', 'id_kategorii', 'nazwa_ogloszenia', 'tresc', 'cena', 'stan') VALUES ('','2','2','lol','xdd','21','nowy')";
        $polaczenie->query($sql);
    }
    $polaczenie->close();
