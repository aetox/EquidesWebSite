$(document).ready(function() {
    // Configuration de l'autocomplétion pour le champ de recherche par nom
    $('#nom').autocomplete({
        source: '../EquidesWebSite/PHP/equide_functions/recherche/rechercheEquideParNom.php',
        minLength: 2
    });

    // Événement de saisie dans le champ de recherche par sire
    $('#sire').on('input', function() {
        var sire = $(this).val();
        if (sire.length > 2) {
            // Requête AJAX pour récupérer le nom correspondant au sire
            $.ajax({
                url: '../EquidesWebSite/PHP/equide_functions/recherche/rechercheEquideParSIRE.php',
                type: 'POST',
                data: {sire: sire},
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
    });

    // Événement de clic sur la liste déroulante
    $('#result').on('click', 'li', function() {
        var nom = $(this).text();
        window.location.href = 'equide_description.php?nom=' + nom;
    });
});