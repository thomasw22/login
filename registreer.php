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
        <!-- <div id="registreer" class="wrapper"> -->
            <h2>Registreer</h2>
            <hr>
            <form name="signupform" id="signupform" class="form" method="POST" action="signup.php">
                <label for="firstname">Voornaam: </label>
                <input type="text" name="firstname" id="firstname" />
                <br />
                <label for="lastname">Achternaam: </label>
                <input type="text" name="lastname" id="lastname" />
                <br />
                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" />
                <br />
                <label for="birthdate">Geboortedatum: </label>
                <input type="date" name="birthdate" id="birthdate" />
                <br />
                <label for="gender">Geslacht: </label>
                <input type="radio" id="gender_male" name="gender" value="1">
                <label for="gender_male">Man</label>
                 <input type="radio" id="gender_female" name="gender" value="0">
                <label for="gender_female">Vrouw</label>
                <input type="radio" id="gender_other" name="gender" value="2">
                <label for="gender_other">Overig</label>
                <br />
                <label for="username">Gebruikersnaam: </label>
                <input type="text" name="username" id="username" />
                <br />
                <label for="password">Wachtwoord: </label>
                <input type="password" name="password" id="password" />
                <br />
                <input type="submit" name="signup_button" value="Registreer" />
            </form>
            <p>Al een account? <a href="index.php">Log hier in</a></p>
        <!-- </div> -->
    </div>
    <script>
        for(i of document.getElementsByTagName("input")) {
            i.required = "true";
        }
    </script>
</body>
</html>