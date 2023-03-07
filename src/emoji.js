const emojiButton = document.getElementById("emoji-button");
const emojiDropdown = document.getElementById("emoji-dropdown");
const emojiList = emojiDropdown.querySelectorAll(".emoji");
const messageInput = document.getElementById("message");

// Afficher/masquer la liste déroulante d'emojis
emojiButton.addEventListener("click", () => {
    emojiDropdown.classList.toggle("hidden");
});

// Ajouter un emoji dans le champ de message
emojiList.forEach((emoji) => {
    emoji.addEventListener("click", () => {
        const value = emoji.value;
        messageInput.value += value;
    });
});
