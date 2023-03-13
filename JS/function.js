//Recupere l'id du titre Ajouter un Equide

const ajoutEquide = document.getElementById('ajoutEquideH3');

// Ajoute un attribut display au formulaire pour l'afficher (voir CSS)

ajoutEquide.addEventListener("click",(event) => {

    const formEquides = document.getElementById('ajoutEquides');
    formEquides.classList.add('display');

});


// ****************************************************************************
// Funciton qui cache lee formulaire d'ajout d'équides

const removeajoutEquide = document.getElementById('suppEquideSpan');

// Ajoute un attribut display au formulaire pour l'afficher (voir CSS)

removeajoutEquide.addEventListener("click",(event) => {

    const formEquides = document.getElementById('ajoutEquides');
    formEquides.classList.remove('display');

});





