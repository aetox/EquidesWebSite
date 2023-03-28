<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire pour la table equide</title>
  </head>
  <body>
    <h1>Ajouter un cheval</h1>
    <form action="insert_equide.php" method="post">
      <label for="numSire">Numéro de sire :</label>
      <input type="text" name="numSire" required><br>

      <label for="numUELN">Numéro de UELN :</label>
      <input type="text" name="numUELN" required><br>

      <label for="nom_equide">Nom :</label>
      <input type="text" name="nom_equide" required><br>

      <label for="dateNaissance_equide">Date de naissance :</label>
      <input type="date" name="dateNaissance_equide" required><br>

      <label for="lieuNaissance_equide">Lieu de naissance :</label>
      <input type="text" name="lieuNaissance_equide" required><br>

      <label for="race_equide">Race :</label>
      <input type="text" name="race_equide" required><br>

      <label for="stud_equide">Stud :</label>
      <input type="text" name="stud_equide" required><br>

      <label for="lieuElevage_equide">Lieu d'élevage :</label>
      <input type="text" name="lieuElevage_equide" required><br>

      <label for="sexe_equide">Sexe :</label>
      <select name="sexe_equide" required>
        <option value="mâle">Mâle</option>
        <option value="femelle">Femelle</option>
      </select><br>

      <label for="robe_equide">Robe :</label>
      <input type="text" name="robe_equide" required><br>

      <label for="naisseurVeterinaire_equide">Naissance par :</label>
      <input type="text" name="naisseurVeterinaire_equide" required><br>

      <label for="pere_equide">Père :</label>
      <input type="text" name="pere_equide" required><br>

      <label for="mere_equide">Mère :</label>
      <input type="text" name="mere_equide" required><br>

      <input type="submit" value="Ajouter">
    </form>
  </body>
</html>
