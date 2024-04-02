var rows = 3;
var columns = 3;

var currTile;
var otherTile; //blank tile

var turns = 0;
var captchaValidate = false;
var imgOrder = shuffleArray(["1", "2", "3", "4", "5", "6", "7", "8", "9"]);

window.onload = function () {
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < columns; c++) {

            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = "../../components/signup/puzzle/" + imgOrder.shift() + ".jpg";

            tile.addEventListener("dragstart", dragStart);
            tile.addEventListener("dragover", dragOver);
            tile.addEventListener("dragenter", dragEnter);
            tile.addEventListener("dragleave", dragLeave);
            tile.addEventListener("drop", dragDrop);
            tile.addEventListener("dragend", dragEnd);

            document.getElementById("board").append(tile);
        }
    }
}

function dragStart(e) {
    currTile = this;
    e.dataTransfer.setData("text/plain", this.id);
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
}

function dragLeave() {

}

function dragDrop(e) {
    otherTile = this;
    var currId = e.dataTransfer.getData("text/plain");
    var currImg = document.getElementById(currId).src;
    var otherImg = otherTile.src;

    currTile.src = otherImg;
    otherTile.src = currImg;

    // Vérification de l'ordre des tuiles
    var tileOrder = [];
    var correctOrder = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];
    var tiles = document.querySelectorAll("img");
    tiles.forEach(function (tile) {
        var tileSrc = tile.src.split("/").pop();
        var tileNumber = tileSrc.split(".")[0];
        if (correctOrder.includes(tileNumber)) {
            tileOrder.push(tileNumber);
        }
    });


    if (JSON.stringify(tileOrder) === JSON.stringify(correctOrder)) {
        // Ordre correct, captcha validé

        localStorage.setItem("isCaptchaValid", "true");
    }
}

function dragEnd() {

}

function shuffleArray(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (currentIndex !== 0) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}
