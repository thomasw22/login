<?php

session_start();

if(!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="nl-NL">
<head>
<title>Home</title>
<script src="https://kit.fontawesome.com/26580f72e2.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="styles/main.css" rel="stylesheet">
</head>
<body>
    <div id="home-nav"></div>
    <div id="home-center" class="center">
        <h1>Welkom terug <?=$_SESSION["name"]?>!</h1>
        <h2>Wat wil je doen?<h2>
        <a href="profile.php">Bekijk je profiel</a>
        <a href="#">(coming soon) Polls</a>
        <a href="chat/chat.php">(NIEUW) Chat</a>
        <a href="forum/forum.php">(NIEUW) Forum</a>
        <a href="contact/contact.php">(NIEUW) Contact</a>
        <a href="logout.php">Log uit</a>
    </div>
</body>
</html>