<?php

function randomProprietaireIdentifiant() {
                            // Nous créons une chaîne contenant tous les caractères que nous voulons inclure dans la chaîne aléatoire.
                            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                            // Nous initialisons une variable pour stocker le résultat.
                            $result = '';
                            // Nous répétons le processus de sélection d'un caractère aléatoire 8 fois.
                            for ($i = 0; $i < 8; $i++) {
                              // Nous générons un index aléatoire dans la chaîne chars en utilisant rand() et strlen().
                              $randomIndex = rand(0, strlen($chars) - 1);
                              // Nous ajoutons le caractère correspondant à l'index aléatoire à la variable result.
                              $result .= $chars[$randomIndex];
                            }
                            // Nous renvoyons la chaîne contenant les 8 caractères aléatoires générés.
                            return $result;
                          }

?>