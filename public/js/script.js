document.addEventListener('DOMContentLoaded', function () {
    console.log("Le fichier JS est bien chargé ✅");

    // ✅ ALERTE à la soumission d'un formulaire d'événement
    const createForm = document.querySelector('form');
    if (createForm && createForm.querySelector('input[type="submit"]')) {
        createForm.addEventListener('submit', function (e) {
            const titre = createForm.querySelector('input[name="titre"]');
            const date = createForm.querySelector('input[name="date_evenement"]');

            // Validation JS simple
            if (titre.value.trim() === '' || date.value.trim() === '') {
                e.preventDefault();
                alert("Tous les champs obligatoires doivent être remplis !");
                return false;
            }

            // Alerte de confirmation
            const confirmSubmit = confirm("Es-tu sûre de vouloir soumettre ce formulaire ?");
            if (!confirmSubmit) {
                e.preventDefault(); // Annule la soumission
            }
        });
    }

    // ✅ Animation d’apparition des titres
    const titles = document.querySelectorAll('h2');
    titles.forEach((title) => {
        title.style.opacity = 0;
        title.style.transition = 'opacity 1.5s ease-in-out';
        setTimeout(() => {
            title.style.opacity = 1;
        }, 300);
    });
});

