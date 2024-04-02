<div class="chat-container">
    <div class="chat-header" onclick="toggleTab()">
        <p>Messagerie de projet</p>
        <i class="fa-solid fa-angle-up" id="chat-header-arrow"></i>
    </div>
    <div class="chat-content" id="chat-content">
        <?php foreach ($messages as $message):
        require "../../scripts/user-section/chat/getMessageInfo.php"; ?>
        <div class="message-container <?php echo $message["id_user"] == $_SESSION["user_id"] ? 'sender' : 'receiver'?>">
            <p class="message-info">Envoyé par <span class="message-sender"><?php echo $messageSender ?></span>, le <?php echo $formattedDate ?> à <?php echo $formattedTime ?></p>
            <p class="message-content"><?php echo $message["content"] ?></p>
        </div>
        <?php endforeach ?>
    </div>
    <div class="chat-input-container">
      <input type="text" id="message-input" placeholder="Saisissez votre message">
    </div>
</div>

<script src="../../scripts/user-section/chat/showChat.js"></script>
<script src="../../scripts/user-section/chat/sendMessage.js"></script>