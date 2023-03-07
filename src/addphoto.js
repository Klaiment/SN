// Récupération des éléments du DOM
const imageButton = document.getElementById('image-button');
const imageInput = document.getElementById('image-input');
const imagePreviewContainer = document.getElementById('image-preview-container');

// Tableau pour stocker les images sélectionnées
const selectedImages = [];

// Fonction pour afficher l'image sélectionnée
function previewImage(file) {
    // Vérification du type de fichier
    if (!file.type.startsWith('image/')) {
        console.error('Le fichier sélectionné n\'est pas une image');
        return;
    }

    // Création d'un élément HTML pour afficher l'image
    const imgContainer = document.createElement('div');
    imgContainer.classList.add('relative', 'mr-2', 'mb-2');

    const img = document.createElement('img');
    img.classList.add('w-20', 'h-20', 'object-cover');

    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '❌';
    deleteButton.classList.add('absolute', 'top-0', 'right-0', 'w-6', 'h-6', 'rounded-full', 'flex', 'items-center', 'justify-center');

    // Lecture du fichier
    const reader = new FileReader();
    reader.addEventListener('load', () => {
        // Attribution de l'URL de l'image au src de l'élément img
        img.src = reader.result;
    });
    reader.readAsDataURL(file);

    // Ajout de l'élément img et du bouton de suppression au conteneur de prévisualisation
    imgContainer.appendChild(img);
    imgContainer.appendChild(deleteButton);
    imagePreviewContainer.appendChild(imgContainer);

    // Stockage de l'image sélectionnée dans le tableau
    selectedImages.push(file);
}

// Écouteur d'événement pour la sélection de fichiers
imageInput.addEventListener('change', () => {
    // Récupération des fichiers sélectionnés
    const files = imageInput.files;

    // Parcours des fichiers et affichage de leur prévisualisation
    for (const file of files) {
        previewImage(file);
    }
});

// Écouteur d'événement pour le clic sur le bouton "Ajouter une image"
imageButton.addEventListener('click', () => {
    // Ouverture de la boîte de dialogue pour la sélection de fichiers
    imageInput.click();
});

// Écouteur d'événement pour le clic sur le bouton de suppression d'une image
imagePreviewContainer.addEventListener('click', (event) => {
    const target = event.target;
    // Vérification que le clic est bien sur le bouton de suppression
    if (target.tagName === 'BUTTON' && target.innerText === '❌') {
        // Suppression de l'élément parent (le conteneur de l'image et du bouton de suppression)
        target.parentNode.remove();

        // Suppression de l'image sélectionnée dans le tableau
        const fileIndex = selectedImages.findIndex((file) => file === target.parentNode);
        if (fileIndex !== -1) {
            selectedImages.splice(fileIndex, 1);
        }
    }
});
