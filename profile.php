<?php

session_start();

if(!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}

include 'db.php';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$me;

if(isset($_GET["id"])) {
    $pid = $_GET["id"];

    $sql = "SELECT voornaam, achternaam, date, gebruikersnaam FROM users WHERE id='".$pid."'";
    $result = mysqli_query($conn, $sql);
    
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $userid = $pid;
            $uservoornaam =  $row["voornaam"];
            $userachternaamm = $row["achternaam"];
            $userachternaam = strtoupper(substr($userachternaamm, 0, 1));
            $usergebruikersnaam = $row["gebruikersnaam"];
            $date = $row["date"];
        }
    } else {
        header("location: home.php");
        exit;
    }
    $me = false;
} else {
    $sql = "SELECT * FROM users WHERE gebruikersnaam='".$_SESSION['name']."'";
    $result = mysqli_query($conn, $sql);
    
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $userid = $row["id"];
            $uservoornaam =  $row["voornaam"];
            $userachternaam = $row["achternaam"];
            $useremail = $row["email"];
            $usergeboortedatum = $row["geboortedatum"];
            $usergeslacht = match((int)$row["geslacht"]) {
                0 => "vrouw",
                1 => "man",
                2 => "overig",
                default => "",
            };
            $usergebruikersnaam = $row["gebruikersnaam"];
            $userwachtwoord = $row["wachtwoord"];
        }
    } else {
        header("location: home.php");
        exit;
    }
    $me = true;
}


?>

<!DOCTYPE html>
<html lang="nl-NL">
    <head>
        <title>Profiel</title>
        <script src="https://kit.fontawesome.com/26580f72e2.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="styles/main.css" rel="stylesheet">
    </head>
    <body>
        <div id="profile-nav"></div>
        <div id="profile-center" class="center">
            <h1>Profiel van <?=$usergebruikersnaam?></h1>
            <?php 
                if ($me) {
                    echo "
                    <table style='table-layout: fixed; width: 500px;'>
                        <tr>
                            <th>Naam</th>
                            <th>Waarde</th>
                        </tr>
                        <tr>
                            <th>id</th>
                            <td>".$userid."</td>
                        </tr>
                        <tr>
                            <th>Voornaam</th>
                            <td>".$uservoornaam."</td>
                        </tr>
                        <tr>
                            <th>Achternaam</th>
                            <td>".$userachternaam."</td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td>".$useremail."</td>
                        </tr>
                        <tr>
                            <th>Geboortedatum</th>
                            <td>".$usergeboortedatum."</td>
                        </tr>
                        <tr>
                            <th>Geslacht</th>
                            <td>".$usergeslacht."</td>
                        </tr>
                        <tr>
                            <th>Gebruikersnaam</th>
                            <td>".$usergebruikersnaam."</td>
                        </tr>
                        <tr>
                            <th>Opgeslagen wachtwoord (versleuteld)</th>
                            <td><div>".$userwachtwoord."</div></td>
                        </tr>
                </table>
                <a href='#'>Iets veranderen?</a>
                    ";
                } else {
                    echo "
                    <table style='table-layout: fixed; width: 500px;'>
                        <tr>
                            <th>Naam</th>
                            <th>Waarde</th>
                        </tr>
                        <tr>
                            <th>Voornaam</th>
                            <td>".$uservoornaam."</td>
                        </tr>
                        <tr>
                            <th>Achternaam</th>
                            <td>".$userachternaam."</td>
                        </tr>
                        <tr>
                            <th>Gebruikersnaam</th>
                            <td>".$usergebruikersnaam."</td>
                        </tr>
                        <tr>
                            <th>Lid sinds</th>
                            <td>".$date."</td>
                        </tr>
                    </table>
                    <a href='profile.php?'>Bekijk je eigen profiel</a>
                    ";
                }
            ?>
            <a href="home.php">Home</a>
            <a href="logout.php">Log uit</a>
        </div>
    </body>
</html>