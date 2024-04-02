

function deleteInDB(id_delete, database, username) {
    if (confirm("Confirmer la suppression de " + username + " ?")) {
        fetch("./script_php/deleteInDB.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: "id_delete=" + id_delete + "&database=" + database
        })
        .then(response => {
            if (response.ok) {
                console.log(response.text());
                location.reload();
            } else {
                console.log('Il y a eu un problème avec la requête.');
            }
        })
        .catch(error => {
            console.log(error);
        });
    }
}

function modifyUser(id_user) {

    document.getElementById("modify").showModal();
    var table = document.getElementById("tr_" + id_user);

    document.getElementById("id_user").value = table.getElementsByTagName("td")[0].textContent;
    document.getElementById("username").value = table.getElementsByTagName("td")[1].textContent;
    document.getElementById("firstname").value = table.getElementsByTagName("td")[2].textContent;
    document.getElementById("lastname").value = table.getElementsByTagName("td")[3].textContent;
    document.getElementById("mail").value = table.getElementsByTagName("td")[4].textContent;
    document.getElementById("newsletter").value = table.getElementsByTagName("td")[5].textContent;
    document.getElementById("admin").value = table.getElementsByTagName("td")[6].textContent;

}

function closeModification() {
    document.getElementById("modify").close();
}

function showGroupMembers(id_group) {
    document.getElementById(`table_${id_group}`).removeAttribute("hidden");
    var memberlist = document.getElementById(`group_${id_group}`);
    while (memberlist.firstChild) {
        memberlist.removeChild(memberlist.firstChild);
    }
    fetch(`./script_php/showGroupMembers.php?id_group=${id_group}`)
    .then(response => response.json())
    .then(data => {
        var memberlist = document.getElementById("group_" + id_group);
        for (var i = 0; i < data.length; i++) {
            var groupmember = document.createElement("tr");

            var idCell = document.createElement("td");
            idCell.textContent =data[i].id_user;
            groupmember.appendChild(idCell);

            var usernameCell = document.createElement("td");
            usernameCell.textContent =data[i].username;
            groupmember.appendChild(usernameCell);

            console.log(groupmember);
            memberlist.appendChild(groupmember);
        }
        var boutton = document.getElementById(`show_group_${id_group}`);
        boutton.textContent = "cacher";
        boutton.removeAttribute("onclick");
        boutton.setAttribute("onclick", `hide_members(${id_group})`);


    })
    .catch(error => {
        console.log(error);
    });
}

function hide_members(id_group) {
    var memberlist = document.getElementById(`group_${id_group}`);
    while (memberlist.firstChild) {
        memberlist.removeChild(memberlist.firstChild);
    }
    var boutton = document.getElementById(`show_group_${id_group}`);
        boutton.textContent = "Afficher";
        boutton.removeAttribute("onclick");
        boutton.setAttribute("onclick", `showGroupMembers(${id_group})`);
    document.getElementById(`table_${id_group}`).setAttribute("hidden","True");
}

function show_image(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    
    reader.onload = function(e) {
      var image = document.createElement('img');
      image.setAttribute("style", "height:5em;width:auto")
      image.src = e.target.result;

    
      
      var container = document.getElementById('imageContainer');
      container.appendChild(image);
    
    };
      
    reader.readAsDataURL(file);
    var deleteimage = document.createElement('p');
      deleteimage.setAttribute("onclick", "remove_image()");
      deleteimage.textContent = "Supprimer l'image";
      var container = document.getElementById('imageContainer');
      container.appendChild(deleteimage);
}

function remove_image() {
    var image = document.getElementById(`imageContainer`);
    while (image.firstChild) {
        image.removeChild(image.firstChild);
    }
    document.getElementById("newsletter_image").value="";
}