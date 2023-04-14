<?php

header('Content-type: application/json');
include_once 'Database.php';

$json = json_decode(file_get_contents('php://input'), true);


if (isset($json['mail']) and isset($json['password'])){

    $email = htmlspecialchars($json['mail']);
    $password = htmlspecialchars($json['password']);

    $password_hash = hash('sha256', $password); // hash le mdp entré avec le meme algo de hash que dans la bdd
    
    $getUser = $bdd->prepare("SELECT * FROM `login` WHERE `email` = ?");
    $getUser->execute(array($email));

    if ($getUser->rowCount() > 0 ) {
        $user = $getUser->fetch();

        if($password_hash == $user['mot_de_passe']){
            
            try {
                $getIdDetenteur = $bdd->prepare("SELECT id_detenteur FROM `login` JOIN `detenteur` ON login.id_login=detenteur.id_login WHERE detenteur.id_login = ?");
                $getIdDetenteur->execute(array($user['id_login']));
            
                if ($getIdDetenteur->rowCount() > 0 ) {
                    $detenteur = $getIdDetenteur->fetch();
            
                    $result['success'] = true;
                    $result['id_detenteur'] = $detenteur['id_detenteur'];
                } 
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }else{
            $result['success'] = false;
            $result['error'] = "Mot de passe incorrect";
        }
    }else{
        $result['success'] = false;
        $result['error'] = "Ce mail n'existe pas";
    }   
 }else{
     $result['success'] = false;
     $result['error'] = "Le mot de passe et/ou l'adresse mail est vide";
 }

echo json_encode($result);
