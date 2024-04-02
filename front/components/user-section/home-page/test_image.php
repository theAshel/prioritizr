<?php

if(isset($_GET["gender"]) && isset($_GET["hair"]) && isset($_GET["eyes"]) && isset($_GET["mouth"]) && isset($_GET["skin"])){

    $skin = imagecreatefrompng("../../images/skin/" . $_GET["skin"] . "-" . $_GET["gender"] . ".png");
    if ($_GET["gender"] == "bald"){
        $hair = imagecreatefrompng("../../images/hair/nocolor-" . $_GET["gender"] . ".png");
    }else {
        $hair = imagecreatefrompng("../../images/hair/" . $_GET["hair"] . "-" . $_GET["gender"] . ".png");
    }
    $eyes = imagecreatefrompng("../../images/eyes/" . $_GET["eyes"] . ".png");
    $mouth = imagecreatefrompng("../../images/mouth/" . $_GET["mouth"] . ".png");
    $destinationWidth = 128;
    $destinationHeight = 128;

    $destinationImage = imagecreatetruecolor($destinationWidth, $destinationHeight);

    imagecopy($destinationImage, $skin, 0, 0, 0, 0, imagesx($skin), imagesy($skin));
    imagecopy($destinationImage, $eyes, 32, 40, 0, 0, imagesx($eyes), imagesy($eyes));
    imagecopy($destinationImage, $hair, 0, 0, 0, 0, imagesx($hair), imagesy($hair));

    imagecopy($destinationImage, $mouth, 54, 90, 0, 0, imagesx($mouth), imagesy($mouth));

    header('Content-Type: image/png');
    imagepng($destinationImage);
} else {
    echo "Erreur lors du chargement de l'avatar";
    die();
}


?>
