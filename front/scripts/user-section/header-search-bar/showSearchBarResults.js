const searchBarResultsContainer = document.getElementById("header-search-bar-results")
var searchBarInput = document.getElementById("header-home-page-search-bar")

searchBarInput.addEventListener("input", function(event) {
  const searchText = event.target.value.trim();
  
  if (searchText !== '') {
    searchBarResultsContainer.style.display = "block";

    fetch("../../scripts/user-section/header-search-bar/searchResults.php?searchText=" + searchText)
      .then(function(response) {
        if (response.ok) {
          return response.text();
        }
        throw new Error('Erreur de réseau.')
      })
      .then(function(responseText) {
        searchBarResultsContainer.innerHTML = responseText
        // console.log(responseText);
      })
      .catch(function(error) {
        console.error('Une erreur s\'est produite :', error)
      })
  } else {
    searchBarResultsContainer.style.display = "none"
  }
})