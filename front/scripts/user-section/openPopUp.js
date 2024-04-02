const cardPopupWindows = document.getElementsByClassName("card-popup-window")
const ellipsis = document.getElementsByClassName("fa-ellipsis")

var lastIndex = -1

for (let i = 0; i < cardPopupWindows.length; i++) {
    ellipsis[i].addEventListener('click', function() {
        for (let j = 0; j < cardPopupWindows.length; j++) {
            cardPopupWindows[j].style.display = "none"
        }

        if (lastIndex !== i) {
            // Ouvrir la popup associée au bouton actuel
            cardPopupWindows[i].style.display = "block"
            lastIndex = i
        }
        else {
            // Aucune popup n'est ouverte
            lastIndex = -1
        }
    })
}