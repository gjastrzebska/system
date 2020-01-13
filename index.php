<?php
	session_start();
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
		header("Location: main.php");
		exit();
	}
?>

<!DOCTYPE HTML>
<html>
    <head>
		<link rel="Stylesheet" href="css/style1.css">
        <meta charset="UTF-8" />
        <title>Logowanie</title>
    </head>
    <body>
		<div id="naglowek">System obsługi zadań</div>
		<div id="forms">
			<header>Zaloguj się do systemu obsługi zadań</header>
			<br /><br />
			<div class="alert" style="text-align:center">
			<?php
				if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
			?>
		</div>
			<form id="formularz" action="zaloguj.php" method="post">
				<label id="lbl">Login:</label>
				<input type="text" id="login" name="login" class="inpt"><br /><br />
				<label id="lbl">Hasło:</label>
				<input type="password" id="pass" name="haslo" class="inpt"><br /><br />
				<input type="submit" value="Zaloguj" name="zaloguj">
			</form>
		</div>	 
    </body>
</html>