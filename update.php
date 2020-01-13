<?php
    session_start();

    echo $_SESSION['id']."<br>";
    echo $_SESSION['imie']."<br>";
    echo $_SESSION['nazwisko'];
?>