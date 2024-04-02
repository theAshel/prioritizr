const userSearchBarResultsContainer = document.getElementById("user-search-bar-results-container")

if (document.getElementById("user-search-bar"))
{
	var userSearchBarInput = document.getElementById("user-search-bar")

	userSearchBarInput.addEventListener("input", function(event) {
	const usersToSearch = event.target.value.trim()
	
		if (usersToSearch !== '') {
			const usersToAddList = document.querySelectorAll(".user-to-add")
			const projectUsers = document.querySelectorAll(".project-user")
			const usersToNotSearch = []

			if (usersToAddList) {
				usersToAddList.forEach(userToAddElement => {
					const userToAddId = parseInt(userToAddElement.getAttribute("id").replace(/\D/g, ''), 10)
					usersToNotSearch.push(userToAddId)
				})
			}
			
			if (projectUsers) {
				projectUsers.forEach(projectUserElement => {
					const projectUserId = parseInt(projectUserElement.getAttribute("id").replace(/\D/g, ''), 10)
					usersToNotSearch.push(projectUserId)
				})
			}

			const rightUsersToSearch = new URLSearchParams()
			rightUsersToSearch.append('usersToSearch', usersToSearch)
			if (usersToNotSearch.length > 0) {
				rightUsersToSearch.append('usersToNotSearch', usersToNotSearch.join(','))
			}

			const url = `../../scripts/user-section/user-search-bar/searchUsers.php?${rightUsersToSearch}`
			const get = { method: 'GET'}

			fetch(url, get)
				.then(function(response) {
				if (response.ok) {
					return response.text();
				}
				throw new Error('Erreur de réseau.')
				})
				.then(function(responseText) {
				userSearchBarResultsContainer.innerHTML = responseText
				// console.log(responseText);
				})
				.catch(function(error) {
				console.error('Une erreur s\'est produite :', error)
				})
			} 
		else {
			userSearchBarResultsContainer.innerHTML = ""
		}
	})
}