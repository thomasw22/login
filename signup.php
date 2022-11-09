<?php

session_start();


include 'db.php';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn) {
    die("Connecion failes: " . mysqli_connect_error());
}


if(isset($_POST["code_entered"])) {
    $in = $_POST["code"];
    if($in == $_SESSION["code"]) {
        
        $sql = "INSERT INTO users (id, voornaam, achternaam, geboortedatum, geslacht, gebruikersnaam, wachtwoord, email, date)
                VALUES (default, '" . $_SESSION['firstname'] . "', '" . $_SESSION['lastname'] . "', '" . $_SESSION['birthdate'] . "', '" . $_SESSION['gender'] . "', '" . $_SESSION['username'] . "', '" . $_SESSION['password'] . "', '" . $_SESSION['mail'] . "', '" . $_SESSION['date'] . "')";
        
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            $_SESSION["data"] = "succesvol geregistreerd";
            header("location: index.php");
            exit;
        } else {
            $_SESSION["data"] = "niet geregistreerd";
            echo mysqli_error($conn);
        }
    } else {
        echo "foute code";
    }
} else {
    $_SESSION["mail"] = $_POST["email"];
$_SESSION["username"] = $_POST["username"];
    $_SESSION["firstname"] = $_POST["firstname"];
    $_SESSION["lastname"] = $_POST["lastname"];
    $_SESSION["birthdate"] = $_POST["birthdate"];
    $_SESSION["gender"] = $_POST["gender"];
    $_SESSION["date"] = date('Y/m/d H:i:s');
    $_SESSION["password"] = hash("sha256", $_POST["password"]);
    $_SESSION["code"] = random_int(100000, 999999);
    //mail the code
    // echo $_SESSION["code"];

    //email checking code thing
    $s = "SELECT gebruikersnaam, email FROM users";
    $res = mysqli_query($conn, $s);

    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            if($_SESSION["username"] == $row["gebruikersnaam"]) {
                $_SESSION["data"] = "gebruikersnaam bestaat al";
                header("location: index.php");
                exit;
            }
            else if($_SESSION["mail"] == $row["email"]) {
                $_SESSION["data"] = "mail bestaat all";
                header("location: index.php");
                exit;
            }
        }
    }


    $to = $_SESSION["mail"];
    $subject = "Uw bevestigingscode voor westerdijk.eu";
    $txt = "Dit is uw code: " . $_SESSION["code"];
    $headers = "From: noreply@westerdijk.eu";

    mail($to,$subject,$txt,$headers);
}


mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="nl-NL">
<head>
<title>Code</title>
<script src="https://kit.fontawesome.com/26580f72e2.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="styles/main.css" rel="stylesheet">
</head>
<body>
<div id="signup-nav"></div>
<div id="signup-center" class="center">
<h1>Registratie bevestiging</h1>
<p>Er is een 6-cijferige code gesturud naar <?=$_SESSION["mail"]?>. vul de code heironder in om uw registratie te bevestigen</p>
<form action="signup.php" method="POST">
    <input type="text" placeholder="code" name="code" minlength=6 maxlength=6>
    <input type="submit" name="code_entered">
</form>
</div>
</body>
</html>
