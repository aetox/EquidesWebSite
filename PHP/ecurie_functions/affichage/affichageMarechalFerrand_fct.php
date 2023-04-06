<?php 
                $requete2 =
                "SELECT affectation_marechal.date_debut AS amdb, affectation_marechal.date_fin AS amdf,
                marechal.nom AS marechalNom, marechal.prenom AS marechalPrenom, marechal.id_marechal AS id_marechal
                FROM `registre_equide`
                JOIN `affectation_marechal`
                ON registre_equide.id_registre = affectation_marechal.id_registre
                JOIN `marechal`
                ON affectation_marechal.id_marechal = marechal.id_marechal
                WHERE registre_equide.id_detenteur='$idDetenteur'
                ORDER BY registre_equide.id_registre ASC";
                $result2 = mysqli_query($mysqli,$requete2) or die(mysqli_error($mysqli));
    
                if (mysqli_num_rows($result2) > 0) {
                    
                    while($rowDatasss = mysqli_fetch_array($result2)){
                
                    $amdb = $rowDatasss['amdb'];
                    $amdb1 = date("d/m/y", strtotime($amdb));
                    $amdf = $rowDatasss['amdf'];
                    $amdf1 = date("d/m/y", strtotime($amdf));
                    $marechalNom = $rowDatasss['marechalNom'];
                    $marechalPrenom = $rowDatasss['marechalPrenom'];
                    $idMarechal =$rowDatasss['id_marechal'];?>

                <li class="list-group-item"><?php echo $marechalNom;?> <?php echo $marechalPrenom;?> du <?php echo $amdb1;?> au <?php echo $amdf1;?>
                 | <a href="carte_marechal.php?idMarechal=<?=$idMarechal?>">Plus d'info</a>

            </li>
<?php }
}else { ?>
        <h4> Vous n'avez pas de marechal ferrand</h4>

<?php }
?>