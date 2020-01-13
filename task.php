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

	
		<div class="pole_formularza">
			<form class="formularz-form validate-form">
				<span class="naglowek">
					Zgłoś zadanie
				</span>

				<div class="butt-input100 validate-input bg1">
					<span class="label-input100">Temat zadania</span>
					<input class="input100" type="text" name="subject" placeholder="Wpisz temat zadania">
				</div>
				
				<div class="butt-input100 validate-input">
					<span class="label-input100">Opis zadania</span>
					<textarea class="input100"></textarea>
				</div>
				
				<div class="butt-input100 input100-select bg1">
					<span class="label-input100">Priorytet zadania</span>
					<div>
						<select class="lista" >
							<option>Normalne</option>
							<option>Krytyczne</option>
							<option>Ważne</option>
							<option>Mało ważne</option>
						</select>
					</div>
				</div>

				<div class="butt-input100 validate-input">
					<span class="label-input100">Wykonawca zadania</span>
					<input class="input100" type="text" placeholder="Nazwa wykonawcy">
				</div>
				<button class="przycisk">
					Utwórz
				</button>
				
			</form>
				
		</div>
		
	

</body>
</html>
