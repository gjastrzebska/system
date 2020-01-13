<?php
    session_start();

    if(!isset($_SESSION['zalogowany'])){
        header ("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Zgłoś zadanie</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

    <a href="main.php"><button type="button" id="btn">Wróć do listy zadań</button></a>
		<div class="pole_formularza">
			
            <span class="naglowek">
                Zgłoś zadanie
            </span>
            
            <?php
            require_once("config.php");

            if(isset($_POST['zdarzenie']) && "" != trim($_POST['zdarzenie']) 
                && isset($_POST['opis']) && "" != trim($_POST['opis'])
                && isset($_POST['id_priorytetu']) && "" != trim($_POST['id_priorytetu'])
                && isset($_POST['wykonawca']) && "" != trim($_POST['wykonawca'])
                && isset($_POST['pokoj']) && "" != trim($_POST['pokoj'])) 
                {
                    require_once("config.php");

                    $polaczenie = @new mysqli($host, $user, $password, $name);
                    $polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
                    $polaczenie->query("SET CHARSET utf8");

                    $wykonawca = $_POST['wykonawca'];

                    $zdarzenie = $_POST['zdarzenie'];
                    $zdarzenie = mysqli_real_escape_string($polaczenie, $zdarzenie);

                    $opis = $_POST['opis'];
                    $opis = mysqli_real_escape_string($polaczenie, $opis);
            
                    $id_priorytetu = $_POST['id_priorytetu'];

                    $pokoj = $_POST['pokoj'];
                    $pokoj = mysqli_real_escape_string($polaczenie, $pokoj);

                    $polecenie = "INSERT INTO zdarzenia (idUzytkownika, idPriorytetu, idKategorii, zdarzenie, opis, nr_pokoju) VALUES 
                    ('".$wykonawca."', '".$id_priorytetu."', '1', '".$zdarzenie."','".$opis."', '".$pokoj."')";

                    if ($polaczenie->query($polecenie) === true) {
                        echo "<div class='info'>Twoje zadanie zostało dodane pomyślnie!</div>";
                    } else {
                        echo "<div class='info'>Uzupełnij wszystkie pola i spróbuj ponownie.</div>";
                    }
            } else echo "<div class='info'>Uzupełnij wszystkie pola i spróbuj ponownie.</div>";
            
            ?>
            
            <form class="formularz-form validate-form" method="post" action="task_action.php">
                <div class="butt-input100 validate-input bg1">
					<span class="label-input100">Temat zadania</span>
					<div class="create">
						<input class="input100" type="text" name="zdarzenie" placeholder="Wpisz temat zadania">
						<div class="no-wrap">Nr pokoju:
							<input class="input100-small" type="text" name="pokoj" placeholder="Wpisz numer pokoju">
						</div>
					</div>
				</div>
				
				<div class="butt-input100 validate-input">
					<span class="label-input100">Opis zadania</span>
					<textarea class="input100" name="opis"></textarea>
				</div>
				
				<div class="butt-input100 input100-select bg1">
					<span class="label-input100">Priorytet zadania</span>
					<div>
						<select class="lista" name="id_priorytetu">
							<option value="1">Normalne</option>
							<option value="2">Krytyczne</option>
							<option value="3">Ważne</option>
							<option value="4">Mało ważne</option>
						</select>
					</div>
				</div>

				<div class="butt-input100 validate-input">
					<span class="label-input100">Wykonawca zadania</span>
					<div>
						<select class="lista" name="wykonawca">
							<?php
							session_start();
							require_once("config.php");

							$polaczenie = @new mysqli($host, $user, $password, $name);
							$polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
							$polaczenie->query("SET CHARSET utf8");	
							$zapytanie = "SELECT idUzytkownika, imie, nazwisko FROM Uzytkownicy";
							$wynik = $polaczenie->query($zapytanie);

							while ($baza = $wynik->fetch_assoc()){ 
								echo"<option value='".$baza['idUzytkownika']."'>".$baza['idUzytkownika'].". ".$baza['imie']." ".$baza['nazwisko']."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<input type="submit" value="Utwórz zadanie" class="przycisk">
				
			</form>
				
		</div>
		
	

</body>
</html>
