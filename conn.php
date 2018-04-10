<?php
$username = "root";
$password = 'root';

try {
    $conn = new PDO("mysql:host=localhost;dbname=test", $username, $password);
} catch (PDOException $error) {
    echo $error->getMessage();
}

//$checkUser = $conn->prepare("SELECT * FROM username = :gebruikersnaam");
//$checkUser->bindParam(":gebruikersnaam", $gebruikersnaam);
//$checkUser->execute();

//if ($checkUser->rowCount() < 1){
    //$inserUser = $conn->prepare("insert into");
//}else{
 //   echo "foutmelding, user bestaat al!";
//}

