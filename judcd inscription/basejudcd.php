<?php
    require_once"db_connect.php";
    $errors="";
     # recupération des variables

     $nom = isset($_POST["nom"])?$_POST["nom"]:"";
     $prenom = isset($_POST["prenom"])?$_POST["prenom"]:"";
     $sexe = isset($_POST["sexe"])?$_POST["sexe"]:"";
     $date_naissance = isset($_POST["date_naissance"])?$_POST["date_naissance"]:"";
     $adresse = isset($_POST["adresse"])?$_POST["adresse"]:"";
     $email = isset($_POST["email"])?$_POST["email"]:"";
     $telephone = isset($_POST["telephone"])?$_POST["telephone"]:"";
     $profession = isset($_POST["profession"])?$_POST["profession"]:"";





     if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        // Récupérer les informations du fichier
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];  // Nom original du fichier

         // Obtenir l'extension du fichier
         $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Générer un nom unique (timestamp + identifiant unique)
         $newFileName = time() . $fileName ;
         // Déplacer le fichier avec le nouveau nom
         $destinationPath = "./images/$newFileName";
    }


    $verificationEmail = $connection->prepare("SELECT id FROM membre WHERE email = ?");
    $verificationEmail->execute(array($email));
    $trouverEmail = $verificationEmail->fetch();

    if ($trouverEmail) {
        $errors = urlencode("Cette adresse email est déjà utilisée");
        header("Location: newIndex.html?email=$email&error=$errors");
        exit();
    }

    // Si on arrive ici, c'est que l'email est unique

    move_uploaded_file($fileTmpPath, $destinationPath);


// Requête d'insertion des données
    $query1 = "INSERT INTO membre(nom, prenoms, sexe, date_naissance, adresse, email, telephone, profession, photo)VALUES('$nom', '$prenom', '$sexe', '$date_naissance', '$adresse', '$email', '$telephone', '$profession', '$fileName')";
    $connection->query($query1);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réussie...</title>
    <link rel="stylesheet" href="validateSign.css"> <!-- Lien vers le fichier CSS -->
</head>

<body>
<?php if (!empty($message)): ?>
    <p style="color:red"><?= $message ?></p>
<?php endif; ?>

<div class="container" id="confirmation-box">
    <h2>Merci Pour l'inscription</h2>

    <p>Voici le récapitulatif de vos informations :</p>
    
    <div class="recap">
            <p> <span id="nom"><img style="max-width: 200px; max-height: 200px;" class="image justify-content-center" src="images/<?=$newFileName?>" alt=""></span></p>


        <p><strong>Nom :</strong> <span id="nom"><?=$nom?></span></p>
        <p><strong>Prénom :</strong> <span id="prenom"><?=$prenom?></span></p>
        <p><strong>Sexe :</strong> <span id="sexe"><?=$sexe?></span></p>
        <p><strong>Profession :</strong> <span id="profession"><?=$profession?></span></p>
        <p><strong>Email :</strong> <span id="age"><?=$email?></span></p>
        <p><strong>Date de naissance :</strong> <span id="age"><?=$date_naissance?></span></p>
        <p><strong>Adresse:</strong> <span id="age"><?=$adresse?></span></p>
        <p><strong>Téléphone :</strong> <span id="age"><?=$telephone?></span></p>
    </div>

    <div class="success-message" id="success-message">Inscription réussie ! <i class="fa-solid fa-check"></i></div>
</div>




<script>
     // Afficher la boîte de confirmation avec une animation
     const confirmationBox = document.getElementById('confirmation-box');
        confirmationBox.style.opacity = '1';
        confirmationBox.style.transform = 'scale(1)';

        // Afficher le message de succès avec un délai
        setTimeout(() => {
            const successMessage = document.getElementById('success-message');
            successMessage.style.opacity = '1';
        }, 1000); // Délai de 1 seconde pour plus d'effet
        setTimeout(afficherConfirmation, 500); // 500ms de délai pour simuler la soumission
</script>
</body>
