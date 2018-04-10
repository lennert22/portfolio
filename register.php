<?php
require('conn.php');

//if (isset($_POST)) {
    $gebruikersnaam = htmlspecialchars($_POST['username']);
    $wachtwoord = htmlspecialchars($_POST['password']);
    $wachtwoordhash = password_hash($wachtwoord, PASSWORD_BCRYPT);
//Versleutelt het wachtwoord.

    $selectUser = $conn->prepare("SELECT * FROM user");
    $selectUser->execute();
    $results = $selectUser->fetchAll(PDO::FETCH_OBJ);

    $userCheck = false;

    $admin = 0;

    foreach ($results as $result){
        if ($gebruikersnaam === $result->username){
            echo "Gebruiker bestaat al";
            $userCheck = true;
        }
    }

    if ($userCheck === false){
        //
//
//    if ($checkUser->rowCount() < 1){
//      $inserUser = $conn->prepare("insert into");
//    }else{
//      echo "foutmelding, user bestaat al!";
//    }
//

        $insertUser = $conn->prepare("INSERT INTO user (username, password, admin) VALUES (:username, :password, :admin)");
        $insertUser->bindParam(":username", $gebruikersnaam);
        $insertUser->bindParam(":password", $wachtwoordhash);
        $insertUser->bindParam(":admin", $admin);
        $insertUser->execute();

        print "account aangemaakt";

////Het versleutelde wachtwoord en de gebruikersnaam worden ingegeven. Het account is nu aangemaakt!
//
//
//} else {
//    echo "Sorry, er is iets fout gegaan. Probeer het opnieuw";
//}
    }