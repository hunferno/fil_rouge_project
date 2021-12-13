//DEFINITION DES VARIABLES DU DOM
const trForDisplay = document.querySelectorAll("tbody tr.main_user");
const livres_plus_icone = document.querySelectorAll(".fa-plus-square");
const livres_moins_icone = document.querySelectorAll(".fa-minus-square");

//-------------------------------USER SECTION---------------------------------------
// AFFICHAGE USER INFO
trForDisplay.forEach((tr) => {
  tr.addEventListener("click", () => {
    tr.nextElementSibling.classList.toggle("display_tr");
  });
});

//-------------------------------LIVRE SECTION---------------------------------------
//LORS DU CLIC SUR UN DES BTN +
livres_plus_icone.forEach((icone) => {
  icone.addEventListener("click", (e) => {
    //AFFICHAGE DE L'AUTRE BTN
    e.path[0].nextElementSibling.style.display = "block";
    //DISSIMULATION DU BTN CLICKÉ
    e.path[0].style.display = "none";
    //AFFICHAGE DE LA DIV D'AJOUT
    e.path[1].nextElementSibling.style.display = "flex";
  });
});

//LORS DU CLIC SUR UN DES BTN -
livres_moins_icone.forEach((icone) => {
  icone.addEventListener("click", (e) => {
    // AFFICHAGE DE L'AUTRE BTN
    e.path[0].previousElementSibling.style.display = "block";
    //DISSIMULATION DU BTN CLICKÉ
    e.path[0].style.display = "none";
    //DISSIMULATION DE LA DIV D'AJOUT
    e.path[1].nextElementSibling.style.display = "none";
  });
});
