<?php

    $user_id = $_SESSION["user_id"];

    $getAvatarQuery = $db_connexion->prepare("SELECT * FROM AVATAR WHERE id_user = :user_id");
    $getAvatarQuery->execute(["user_id" => $user_id]);
    $avatar = $getAvatarQuery->fetch(PDO::FETCH_ASSOC);

    //<?php echo "$avatar['gender']&hair=$avatar['hair']&eyes=$avatar['eyes']&mouth=$avatar['mouth']&skin=$avatar['skin']"; ?>
?>
<dialog id="avatar-dialog">
    <h1 class="avatar-title">Avatar</h1>
    <img src="../../components/user-section/home-page/test_image.php?gender=<?php echo $avatar['gender']; ?>&hair=<?php echo $avatar['hair']; ?>&eyes=<?php echo $avatar['eyes']; ?>&mouth=<?php echo $avatar['mouth']; ?>&skin=<?php echo $avatar['skin']; ?>" alt="Image fusionnée" id="avatarimage">

    <div class="select-container">
        <label for="gender">Gender:</label>
        <select class="avatar-select" name="gender" id="gender">
            <option value="man">Cheveux courts</option>
            <option value="woman">Cheveux longs</option>
            <option value="bald">Chauve</option>
        </select>
    </div>

    <div class="select-container">
        <label for="hair">Hair Color:</label>
        <select class="avatar-select" name="hair" id="hair">
            <option value="nocolor">Sans couleur</option>
            <option value="blond">Blond</option>
            <option value="brown">Brun</option>
            <option value="black">Noir</option>
        </select>
    </div>

    <div class="select-container">
        <label for="eyes">Eye Style:</label>
        <select class="avatar-select" name="eyes" id="eyes">
            <option value="eyes">Yeux noirs</option>
            <option value="triangle-glasses">Lunettes Triangles</option>
            <option value="rectangle-glasses">Lunettes Rectangles</option>
            <option value="round-glasses">Lunettes Rondes</option>
        </select>
    </div>

    <div class="select-container">
        <label for="skin">Skin Color:</label>
        <select class="avatar-select" name="skin" id="skin">
            <option value="nocolor">Sans couleur</option>
            <option value="beige">Beige</option>
            <option value="yellow">Jaune</option>
            <option value="brown">Marron</option>
            <option value="deepbrown">Marron foncé</option>
            <option value="alien">Alien</option>
        </select>
    </div>

    <div class="select-container">
        <label for="mouth">Mouth Style:</label>
        <select class="avatar-select" name="mouth" id="mouth">
            <option value="mouth1">Sourire</option>
            <option value="mouthflat">Plat</option>
            <option value="mouthsad">Triste</option>
            <option value="moutho">Etonné</option>
        </select>
    </div>

    <div class="buttons-container">
        <button id="avatar-save" onclick="saveAvatar()">Save</button>
        <button id="avatar-close">Close</button>
    </div>
</dialog>


<script>
    document.getElementById("gender").value = "<?php echo $avatar['gender']; ?>";
    document.getElementById("hair").value = "<?php echo $avatar['hair']; ?>";
    document.getElementById("eyes").value = "<?php echo $avatar['eyes']; ?>";
    document.getElementById("skin").value = "<?php echo $avatar['skin']; ?>";
    document.getElementById("mouth").value = "<?php echo $avatar['mouth']; ?>";
</script>

<script src="../../scripts/user-section/avatar.js"></script>
