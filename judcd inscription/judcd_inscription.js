// Validation du formulaire avec JavaScript
document.getElementById('inscriptionForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Réinitialiser les messages d'erreur
    document.querySelectorAll('.error-message').forEach(function(msg) {
        msg.style.display = 'none';
    });

    // Validation du nom
    if (!document.getElementById('nom').value.trim()) {
        document.getElementById('nomError').style.display = 'block';
        isValid = false;
    }

    // Validation du prénom
    if (!document.getElementById('prenom').value.trim()) {
        document.getElementById('prenomError').style.display = 'block';
        isValid = false;
    }

    // Validation de la date de naissance
    if (!document.getElementById('date_naissance').value.trim()) {
        document.getElementById('dateNaissanceError').style.display = 'block';
        isValid = false;
    }

    // Validation de l'adresse
    if (!document.getElementById('adresse').value.trim()) {
        document.getElementById('adresseError').style.display = 'block';
        isValid = false;
    }

    // Validation de l'email
    if (!document.getElementById('email').value.trim() || !validateEmail(document.getElementById('email').value.trim())) {
        document.getElementById('emailError').style.display = 'block';
        isValid = false;
    }

    // Validation du téléphone
    const telephone = document.getElementById('telephone').value.trim();
    if (!telephone || !/^\d{8}$/.test(telephone)) {
        document.getElementById('telephoneError').style.display = 'block';
        isValid = false;
    }
     
    
    // Validation de la profession
    if (!document.getElementById('profession').value.trim()) {
        document.getElementById('professionError').style.display = 'block';
        isValid = false;
    }

    // Validation de la photo
    if (!document.getElementById('photo').value) {
        document.getElementById('photoError').style.display = 'block';
        isValid = false;
    }

    // Empêche la soumission si le formulaire n'est pas valide
    if (isValid!==true) {
        event.preventDefault();
    }
});

// Fonction de validation d'email
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
}
