<?php



header('content-type: text/html; charset=utf-8');


$host = "localhost";
$user = "root";
$pass = "root";
$db= "dbs10369264";



  try {
    $bdd = new PDO("mysql:host=$host; dbname=$db;", $user, $pass);
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }
?>