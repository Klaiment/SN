const tweetInput = document.querySelector("textarea");
const addEmojiButton = document.getElementById("add-emoji-button");

addEmojiButton.addEventListener("click", () => {
    const emojiPicker = document.createElement("div");
    emojiPicker.innerHTML = `<div class="relative">
    <div class="absolute z-10 bg-white border border-gray-200 rounded-lg p-2 right-0 top-0" style="width: 300px;">
      <div class="grid grid-cols-5 gap-2">
        <button class="emoji-button" data-emoji="😀">😀</button>
        <button class="emoji-button" data-emoji="😂">😂</button>
        <button class="emoji-button" data-emoji="😍">😍</button>
        <button class="emoji-button" data-emoji="👍">👍</button>
        <button class="emoji-button" data-emoji="👎">👎</button>
      </div>
    </div>
  </div>`;
    const emojiButtons = emojiPicker.querySelectorAll(".emoji-button");
    emojiButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const currentCursorPosition = tweetInput.selectionStart;
            tweetInput.value = tweetInput.value.slice(0, currentCursorPosition) + button.dataset.emoji + tweetInput.value.slice(currentCursorPosition);
            emojiPicker.remove();
        });
    });
    addEmojiButton.parentNode.insertBefore(emojiPicker.firstChild, addEmojiButton.nextSibling);
});