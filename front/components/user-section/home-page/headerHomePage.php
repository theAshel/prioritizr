<header class="homepage-header">
    <img src="../../icon/prioritizr_logo.png" alt="logo">
    <div class="search-bar-section">
        <div class="search-bar-container">
            <input type="text" name="home-page-search-bar" id="header-home-page-search-bar"  placeholder="Recherchez un utilisateur, un projet...">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="search-bar-results-container" id="header-search-bar-results"></div>
    </div>
   <div class="toggle-button-container">
        <i class="fa-regular fa-sun"></i>
        <input type="checkbox" name="light-dark-mode-button"
        id="light-dark-mode-button" class="toggle-button">
        <label for="light-dark-mode-button" class="label-toggle-button"></label>
        <i class="fa-regular fa-moon"></i>
    </div>
    <div class="profile-section">
        <div class="profile-container" id="profile-container" onclick="displayProfileDialog()">
            <p id="profile-username"><?php echo $username ?></p>
<?php 
    
    require_once "../../database/databaseConnection.php";

    $user_id = $_SESSION["user_id"];

    $getAvatarQuery = $db_connexion->prepare("SELECT * FROM AVATAR WHERE id_user = :user_id");
    $getAvatarQuery->execute(["user_id" => $user_id]);
    $avatar = $getAvatarQuery->fetch(PDO::FETCH_ASSOC);

?>
            <div class="avatar" style="background-image: url('../../components/user-section/home-page/test_image.php?gender=<?php echo $avatar['gender']; ?>&hair=<?php echo $avatar['hair']; ?>&eyes=<?php echo $avatar['eyes']; ?>&mouth=<?php echo $avatar['mouth']; ?>&skin=<?php echo $avatar['skin']; ?>');" id="imageprofil"></div>

        </div>
        <div class="profile-dialog-box" id="profile-dialog-box">
            <div class="profile-dialog-box-div">
                <p class="profile-dialog-popup">Mon profil</p>
            </div>
            <div class="profile-dialog-box-div"><p class="avatar-dialog-popup">Avatar</p></div>
            <div class="profile-dialog-box-div"><p class="profile-dialog-box-text"><a href="../../scripts/logout/logout.php">Se déconnecter</a></p></div>
        </div>
    </div>
</header>

<script language="javascript">
    const displayProfileDialog = () => {
        const profileDialog = document.getElementById('profile-dialog-box')

        profileDialog.style.display = profileDialog.style.display === 'none' ? 'block' : 'none'
    }
</script>
<script src="../../scripts/user-section/header-search-bar/showSearchBarResults.js"></script>
<script src="../../scripts/user-section/header-search-bar/openProjectFromSearchBar.js"></script>