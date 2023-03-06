const addImageButton = document.getElementById("add-image-button");
const imagePreviewContainer = document.getElementById("image-preview-container");

addImageButton.addEventListener("click", () => {
    const fileInput = document.createElement("input");
    fileInput.type = "file";
    fileInput.accept = "image/*";
    fileInput.multiple = true;
    fileInput.addEventListener("change", () => {
        const files = Array.from(fileInput.files);
        files.forEach((file) => {
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                const imageContainer = document.createElement("div");
                imageContainer.classList.add("flex", "items-center", "mb-4");
                const imagePreview = document.createElement("img");
                imagePreview.src = reader.result;
                imagePreview.classList.add("w-20", "h-20", "mr-4", "rounded");
                imageContainer.appendChild(imagePreview);
                const deleteButton = document.createElement("button");
                deleteButton.innerHTML = "❌";
                deleteButton.classList.add("text-gray-500", "cursor-pointer");
                deleteButton.addEventListener("click", () => {
                    imagePreviewContainer.removeChild(imageContainer);
                });
                imageContainer.appendChild(deleteButton);
                imagePreviewContainer.appendChild(imageContainer);
            });
            reader.readAsDataURL(file);
        });
    });
    fileInput.click();
});

imagePreviewContainer.addEventListener("dragover", (e) => {
    e.preventDefault();
});

imagePreviewContainer.addEventListener("drop", (e) => {
    e.preventDefault();
    const files = Array.from(e.dataTransfer.files);
    files.forEach((file) => {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const imageContainer = document.createElement("div");
            imageContainer.classList.add("flex", "items-center", "mb-4");
            const imagePreview = document.createElement("img");
            imagePreview.src = reader.result;
            imagePreview.classList.add("w-20", "h-20", "mr-4", "rounded");
            imageContainer.appendChild(imagePreview);
            const deleteButton = document.createElement("button");
            deleteButton.innerHTML = "❌";
            deleteButton.classList.add("text-gray-500", "cursor-pointer");
            deleteButton.addEventListener("click", () => {
                imagePreviewContainer.removeChild(imageContainer);
            });
            imageContainer.appendChild(deleteButton);
            imagePreviewContainer.appendChild(imageContainer);
        });
        reader.readAsDataURL(file);
    });
});