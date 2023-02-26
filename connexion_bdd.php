<?php
           $servername = 'phpmyadmin.cluster030.hosting.ovh.net:20184';
           $username = 'tqbjsdmportfolio';
           $password = '1hGs2iBMiODynq0yr0RkvO0bUzk7NN';
           

           //On essaie de se connecter
           try{
               $conn = new PDO("mysql:host=$servername;dbname=tqbjsdmportfolio", $username, $password);
               //On définit le mode d'erreur de PDO sur Exception
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // echo 'Connexion réussie';
           }
           
           /*On capture les exceptions si une exception est lancée et on affiche
            *les informations relatives à celle-ci*/
           catch(PDOException $e){
             echo "Erreur : " . $e->getMessage();
           }
           
          //  $host = "phpmyadmin.cluster030.hosting.ovh.net";
          //  $user = "tqbjsdmportfolio";
          //  $password = "1hGs2iBMiODynq0yr0RkvO0bUzk7NN";
          //  $dbname = "tqbjsdmportfolio";
          //  $port = "20184";
          //  $options = array(
          //    PDO::MYSQL_ATTR_SSL_CA => '/<path to>/ca.pem',
          //    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true
          //  );
           
          //  try {
          //    $conn = new PDO("mysql:host=$host; port=$port; dbname=$dbname", $user, $password, $options);
          //    var_dump($conn->query("SHOW STATUS LIKE 'Ssl_cipher';")->fetchAll());
          //    $conn = null;
          //  }
          //  catch (Throwable $e) {
          //    echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
          //  }
        ?> 