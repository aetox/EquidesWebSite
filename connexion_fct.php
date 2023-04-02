<?php

$info_error = array();
$info_success = array();

if (isset($_POST['mail'], $_POST['password'])) {
    $mail = ($_POST['mail']);
    $mail = stripslashes($_REQUEST['mail']);
    $mail = mysqli_real_escape_string($mysqli, $mail);

    $password = ($_POST['password']);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($mysqli, $password);

    // on check si la case est cochée
    $remember_me = isset($_POST['remember_me']) && $_POST['remember_me'] === 'on';

    if (empty($mail)) {
        array_push($info_error, "Le champ mail est vide");
    } elseif (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `login` WHERE email='" . $mail . "'")) == 0) {
        array_push($info_error, "Aucun compte avec cette adresse mail");
    } elseif (empty($password)) {
        array_push($info_error, "Le champ Mot de passe est vide");
    } else {
        $query = "SELECT * FROM `login` WHERE email='$mail' and mot_de_passe='" . hash('sha256', $password) . "'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        var_dump($result);
        $_SESSION['logged_in'] = true;
        
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                $id_login = $rows['id_login'];
            }

            $_SESSION['user_id'] = $id_login;

            $login_info = [
                'id_login' => $id_login,
                //'type_profil' => $type_profil
            ];
            if ($remember_me) {
                $cookie_name = 'user_id_login';
                $cookie_value = base64_encode(serialize($login_info));([
                    'id_login' => $id_login,
                    //'type_profil' => $type_profil
                ]);
                $cookie_expiration = time() + (86400 * 30); // 30 jours
                setcookie($cookie_name, $cookie_value, $cookie_expiration, '/');
            }

            $queryDetenteur = "SELECT * FROM `detenteur` WHERE id_login=$id_login";
            $resultDetenteur = mysqli_query($mysqli, $queryDetenteur) or die(mysqli_error($mysqli));

            if (mysqli_num_rows($resultDetenteur) > 0) {
                while ($rowData = mysqli_fetch_array($resultDetenteur)) {
                    $_SESSION['type_profil'] = "detenteur";
                    $_SESSION['id_login'] = $rowData['id_login'];
                    $_SESSION['id_detenteur'] = $rowData['id_detenteur'];
                    $_SESSION['prenom'] = $rowData['prenom']; 
                    $_SESSION['logged_user'] = true;
                    header('Location: accueil.php');
                    // Deuxieme cookie psk sa marche pas
                    $session_data = serialize(array(
                    'profil_type' => $_SESSION['type_profil'],
                    'id_login' => $_SESSION['id_login']
                ));
    
                    // On met les deux sessions dans le cookie
                    setcookie('my_session_data', $session_data, time()+3600, '/');
                }
            } else {
                $queryProprietaire = "SELECT * FROM `proprietaire` WHERE id_login=$id_login";
                $resultProprietaire = mysqli_query($mysqli, $queryProprietaire) or die(mysqli_error($mysqli));

                if (mysqli_num_rows($resultProprietaire) > 0) {
                    while ($rowData = mysqli_fetch_array($resultProprietaire)) {
                        $_SESSION['type_profil'] = "proprietaire";
                        $_SESSION['id_login'] = $rowData['id_login'];
                        $_SESSION['id_proprietaire'] = $rowData['id_proprietaire'];
                        $_SESSION['prenom'] = $rowData['prenom'];  
                        $_SESSION['logged_user'] = true;
                        header('Location: accueil.php');
                        // Deuxieme cookie psk sa marche pas
                         $session_data = serialize(array(
                         'profil_type' => $_SESSION['type_profil'],
                         'id_login' => $_SESSION['id_login']
                         ));
    
                          // On met les deux sessions dans le cookie
                         setcookie('my_session_data', $session_data, time()+3600, '/');
                    }
                }
            }
            

        } else {
            array_push($info_error, "L'email ou le mot de passe est incorrect");
        }
    }
}

?> 
