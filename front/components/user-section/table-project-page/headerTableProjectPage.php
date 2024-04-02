<header class="homepage-header">
    <img src="../../icon/prioritizr_logo.png" alt="logo">
    <div class="search-bar-container">
        <input type="text" name="table-page-search-bar" id="table-page-search-bar" placeholder="Recherchez un utilisateur, un projet...">
        <i class="fa-solid fa-magnifying-glass"></i>
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
            <p><?php echo $username ?></p>
            <div class="avatar"></div>
        </div>
         <div class="profile-dialog-box" id="profile-dialog-box">
            <div class="profile-dialog-box-div">
                <p class="profile-dialog-popup">Mon profil</p>
            </div>
            <div class="profile-dialog-box-div"><p class="profile-dialog-box-text">Confidentialité</p></div>
            <div class="profile-dialog-box-div"><p class="profile-dialog-box-text"><a href="../../scripts/logout/logout.php">Se déconnecter</a></p></div>
        </div>
    </div>
    </div>
</header>

<script language="javascript">
    const displayProfileDialog = () => {
        const profileDialog = document.getElementById('profile-dialog-box')

        profileDialog.style.display = profileDialog.style.display === 'none' ? 'block' : 'none'
    }
</script>