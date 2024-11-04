document.getElementById('contact-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Empêche le rechargement de la page
    const form = this;
    const resultDiv = document.getElementById('message-result');
    const formData = new FormData(form); // Récupère les données du formulaire

    // Envoie de la requête au serveur
    fetch('send_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Affiche la réponse du serveur
        resultDiv.textContent = data;
        resultDiv.style.color = "green";
        form.reset(); // Réinitialise le formulaire après l'envoi
    })
    .catch(error => {
        // Affiche un message d'erreur si la requête échoue
        console.error('Erreur:', error);
        resultDiv.textContent = "Erreur lors de l'envoi du message. Veuillez réessayer.";
        resultDiv.style.color = "red";
    });
});
