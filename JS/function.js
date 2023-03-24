//**************************** */
//Modification du formaulraire en fonction du type de profil


var click = document.getElementById('radio_type_profil').addEventListener('click',function test() {

    const radios = document.getElementsByName('type_profil');

    for (var i = 0; i <  radios.length; i++) {
    if (radios[i].checked) {

            switch(radios[i].value){
                case "detenteur":
                    var formDetenteur = document.getElementById('id_inscription_detenteur');
                    formDetenteur.classList.add("display");
                    var formProprietaire = document.getElementById('id_inscription_propietaire');
                    formProprietaire.classList.remove("display")
                    console.log("c'est un detenteur");
                    break;
                case "proprietaire":
                    var formProprietaire = document.getElementById('id_inscription_propietaire');
                    formProprietaire.classList.add("display");
                    var formProprietaire = document.getElementById('id_inscription_detenteur');
                    formProprietaire.classList.remove("display");
                    console.log("c'est un proprio");
                    break;
                default:
                    console.log("Rien");
            }

        }
    }
    
})

