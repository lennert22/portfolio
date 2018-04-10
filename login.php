<?php
session_start();
//begin altijd de sessie aan het begin.
require ('conn.php');

//Vraagt de waarde van het wachtwoord en de username die in het formulier is ingegeven.//
$userinput1 = $_POST['password'];
$userinput2 = $_POST['username'];

//Vraagt de waarde van het wachtwoord dat verbonden is met de username die was ingegeven.//
$userFetch = $conn->prepare("SELECT * FROM users WHERE username = :username");
$userFetch->bindParam(":username",$userinput2);
$userFetch->execute();

//Dit is nu het account waarmee wordt vergeleken, in een array.//
$user = $userFetch->fetch(PDO::FETCH_ASSOC);

//Vergelijkt het gehashte wachtwoord met de ongehashte gebruikersinput. Als het gelijk is, krijgt de gebruiker toegang.//
if(password_verify($userinput1, $user["password"])){
    print("Welkom, " . $userinput2 . "!");
    $_SESSION['username'] = $user['username'];

}else{
    print("wrong you fool");

}


