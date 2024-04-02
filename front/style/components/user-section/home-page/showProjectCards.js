const tables = document.getElementsByClassName("card-table")
const showMoreCardsButton = document.getElementsByClassName("show-more-project-cards")
const showLessCardsButton = document.getElementsByClassName("show-less-project-cards")

const cardsToShow = 6

for (let i = 0; i < tables.length; i++) {                // agit sur toutes les tables
    const numberOfCards = tables[i].children.length

    for (let j = cardsToShow; j < numberOfCards; j++)       // masque tous les éléments en trop, ici ceux dont l'index dépasse cardsToShow
        tables[i].children[j].style.display = "none"

    if (numberOfCards > cardsToShow)                // affiche le bouton "voir plus" si la liste contient plus d'éléments que cardsToShow
        showMoreCardsButton[i].style.display = "block"

    showMoreCardsButton[i].addEventListener('click', function() {    // instructions quand le i-ème bouton "voir plus" est cliqué
        for (let j = cardsToShow; j < numberOfCards; j++)
            tables[i].children[j].style.display = "block"     // affiche tous les éléments masqués précédemment de la liste[i]
        
        showMoreCardsButton[i].style.display = "none"        // masque le bouton "voir plus" pour laisser place au bouton "voir moins"
        showLessCardsButton[i].style.display = "block"
    })

    showLessCardsButton[i].addEventListener('click', function() {    // instructions quand le i-ème bouton "voir moins" est cliqué
        for (let j = cardsToShow; j < numberOfCards; j++)
            tables[i].children[j].style.display = "none"     // masque tous les éléments affichés précédemment de la liste[i]
        
        showLessCardsButton[i].style.display = "none"        // masque le bouton "voir moins" pour laisser place au bouton "voir plus"
        showMoreCardsButton[i].style.display = "block"
    })
}