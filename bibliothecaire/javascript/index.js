// AFFICHAGE USER INFO
const trForDisplay = document.querySelectorAll("tbody tr.main_user");

trForDisplay.forEach((tr) => {
  tr.addEventListener("click", () => {
    tr.nextElementSibling.classList.toggle("display_tr");
  });
});
