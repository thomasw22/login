<?php
session_start();

include 'db.php';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$uname = $_POST["login_uname"];
$pass = hash("sha256", $_POST["login_passw"]);

$sql = "SELECT id, wachtwoord FROM users WHERE gebruikersnaam = '" . $uname . "'";
$result = mysqli_query($conn, $sql);

$id = 0;

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "gegeven: " . $pass . "  db: " . $row["wachtwoord"];
        if($pass == $row["wachtwoord"]) {
            //goed ingelogd
            // echo "correct";
            $id = $row["id"];
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $uname;
            echo "Welkom " . $_SESSION["name"] . "<script>
            document.location='home.php';</script>";
            // header("home.php");
            // die('Header werkt niet');
            exit;
        } else {
            // echo "fout";
            echo "fout" . "<script>
            document.location='home.php';</script>";
            // header("home.php");
            exit;
        }
    }
} else {
    // echo "0 results";
}

echo "fout" . "<script>document.location='home.php';</script>";

mysqli_close($conn);

// header("home.php");

?>