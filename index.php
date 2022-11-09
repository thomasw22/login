<?php

session_start();

if(isset($_SESSION["data"])) {
    echo $_SESSION["data"];
}

?>
<!DOCTYPE html>
<html lang="nl-NL">
    <head>
        <title>Login</title>
        <script src="https://kit.fontawesome.com/26580f72e2.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="styles/main.css" rel="stylesheet">
</head>
<body>
    <div id="center" class="center">
        <!-- <h1>Welkom</h1> -->
        <!-- <div id="login" class="wrapper"> -->
            <h2>Inloggen</h2>
            <hr>
            <form name="loginform" id="loginform" class="form" method="POST" action="login.php">
                <label for="login_gebruikersnaam"><i class="fas fa-user"></i></label>
                <input type="text" name="login_uname" id="login_gebruikersnaam" placeholder="Gebruikersnaam" />
                <br />
                <label for="login_wachtwoord"><i class="fas fa-lock"></i></label>
                <input type="password" name="login_passw" id="login_wachtwoord" placeholder="Wachtwoord" />
                <br />
                <input type="submit" name="login_button" value="Inloggen" />
            </form>
            <a href="forgotpassword/forgotpassword.php">Wachtwoord vergeten?</a>
            <p>Nog geen account? <a href="registreer.php">Registreer hier</a></p>
        <!-- </div> -->
    </div>
    <script>
        for(i of document.getElementsByTagName("input")) {
            i.required = "true";
        }
    </script>
</body>
</html>