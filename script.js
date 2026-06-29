function validateAndSendMessage() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;

    // Réinitialiser les bordures d'erreur
    document.getElementById('email').classList.remove('error-border');
    document.getElementById('phone').classList.remove('error-border');
    document.getElementById('message').classList.remove('error-border');

    // Validation 1: Vérifier que le message n'est pas vide
    if (!message) {
        alert("Le champ 'Message' est obligatoire.");
        document.getElementById('message').classList.add('error-border');
        document.getElementById('message').focus();
        return;
    }

    // Validation 2: Vérifier qu'au moins un des champs (email ou phone) est rempli
    if (!email && !phone) {
        alert("Veuillez fournir soit un email, soit un numéro de téléphone.");
        document.getElementById('email').classList.add('error-border');
        document.getElementById('phone').classList.add('error-border');
        return;
    }

    // Si les validations passent, envoyer le message
    const data = {
        name: name,
        email: email,
        phone: phone,
        message: message
    };

    fetch('submit.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(result => {
        console.log(result);
        alert('Message envoyé avec succès !');

        // Réinitialiser les champs du formulaire
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('message').value = '';
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Échec de l\'envoi du message.');
    });
}