
<html>
<link rel="Stylesheet" href="css/style3.css">
<body>
    <div class="flex-box">
        <div class="btn-box">
            <a href="main.php"><button type="button" class="btn">Wróć do listy zadań</button></a><br>
            <a href="date.php"><button type="button" class="btn">Wróć do tworzenia raportu</button></a><br>
        </div>
        <div class="butt-input100 bg1">
            Raport dla dnia: <i><?php echo $_POST["dzien"]; ?></i>
        </div>
        <div class="butt-input100 bg0">
            W miesiącu: <i><?php echo $_POST["miesiac"]; ?></i>
        </div>
        <div class="butt-input100 bg1">
            Rok: <i><?php echo $_POST["rok"];?></i>
        </div>

        <?php
        $dzien = $_POST['dzien'];
                $miesiac = $_POST['miesiac'];
                $rok= $_POST['rok'];

                $data=$rok."-".$miesiac."-".$dzien;
        ?>


        <?php
        require_once("config.php");

            $polaczenie = @new mysqli($host, $user, $password, $name);

            if($polaczenie->connect_errno!=0){
                echo "Error: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
            } 
            $sql = "SELECT * FROM Zdarzenia WHERE data LIKE '%$data%' and idKategorii=3";
            
            $result = $polaczenie->query($sql);
        if($result->num_rows >0){
            $zm=0;
            while($row = $result->fetch_assoc()){
                $zm++;
                echo "<div class='margin'>W tym dniu zostało wykonanych:  ". $zm ."  zadań.</div>";
            }
        } else {
            echo "<div class='margin'>Brak wyników lub w tym dniu nie wykonano żadnych zadań.</div>";
        }

            $polaczenie->close();
        ?>
    </div>
</body>
</html> 