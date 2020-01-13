<?php

    session_start();
    if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
        header("Location: index.php");
        exit();
    }
    require_once("config.php");

    $polaczenie = @new mysqli($host, $user, $password, $name);

    if($polaczenie->connect_errno!=0){
        echo "Błąd: ".$db->connect_errno." Opis: ".$db->connect_error;
    } else {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login,ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo,ENT_QUOTES, "UTF-8");

        $query = "SELECT * FROM Uzytkownicy WHERE login='$login' AND haslo='$haslo'";

        if ($wynik = @$polaczenie->query(sprintf("SELECT * FROM Uzytkownicy WHERE login='%s' AND haslo='%s'",
        mysqli_real_escape_string($polaczenie,$login),
        mysqli_real_escape_string($polaczenie,$haslo)))){
            $users = $wynik->num_rows;

            if ($users>0){
                $_SESSION['zalogowany'] = true;

                $wiersz = $wynik->fetch_assoc();
                $_SESSION['login'] = $wiersz['login'];

                unset($_SESSION['blad']);
                $wynik->free_result();
                header("Location: main.php");
            } else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header("Location: index.php");
            }
        }

        $polaczenie->close();
    }

?>