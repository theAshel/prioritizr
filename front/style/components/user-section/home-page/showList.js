const lists = document.getElementsByClassName("list")
const showMoreButton = document.getElementsByClassName("show-more")
const showLessButton = document.getElementsByClassName("show-less")

const itemsToShow = 4

for (let i = 0; i < lists.length; i++) {                // agit sur toutes les listes
    const numberOfItems = lists[i].children.length

    for (let j = itemsToShow; j < numberOfItems; j++)       // masque tous les éléments en trop, ici ceux dont l'index dépasse itemsToShow
        lists[i].children[j].style.display = "none"

    if (numberOfItems > itemsToShow)                // affiche le bouton "voir plus" si la liste contient plus d'éléments que itemsToShow
        showMoreButton[i].style.display = "block"

    showMoreButton[i].addEventListener('click', function() {    // instructions quand le i-ème bouton "voir plus" est cliqué
        for (let j = itemsToShow; j < numberOfItems; j++)
            lists[i].children[j].style.display = "flex"     // affiche tous les éléments masqués précédemment de la liste[i]
        
        showMoreButton[i].style.display = "none"        // masque le bouton "voir plus" pour laisser place au bouton "voir moins"
        showLessButton[i].style.display = "block"
    })

    showLessButton[i].addEventListener('click', function() {    // instructions quand le i-ème bouton "voir moins" est cliqué
        for (let j = itemsToShow; j < numberOfItems; j++)
            lists[i].children[j].style.display = "none"     // masque tous les éléments affichés précédemment de la liste[i]
        
        showLessButton[i].style.display = "none"        // masque le bouton "voir moins" pour laisser place au bouton "voir plus"
        showMoreButton[i].style.display = "block"
    })
}
