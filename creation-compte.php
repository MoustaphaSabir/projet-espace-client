<?php
/* objectif : permettre à l'utilisateur de creer son compte  
   contenu de la page:
   Formulaire de création de compte
   Titre de la page " H1 Création de compte d'utilisateur"

   -Nom (nom) : input type text - obligatoire
    -e-mail (email) : input type text - obligatoire
    -mot de pass  (mot de passe) : input type password - obligatoire
    -Button "valider" : input type submit 
*/

// Action à la validation du formulaire :
//     -Detecter la valdation du formulaire 
//     _Récuperer les données du formulaire : nom, email
//     mot_de_passe
//     -Enregistrement des données dans la base : Insert sql
    // Connexion à la BDD
 
// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$nomBaseDeDonnees = "compte-utilisateur";
 
// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);
 
if (!$connexion) {
    die("Connexion échouée : " . mysqli_connect_error());
}

// Vérification de la validation du formulaire
if (isset($_POST['valider'])) {
     // Verification pour un compte existant
    // Faire une requette sql pout verifications des emails
 
    // Récupération des valeurs du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
        
    // Requête d'insertion dans la table compte
    $sql = "INSERT INTO `compte`(`nom`, `email`, `mot_de_passe`) VALUES ('$nom', '$email', '$mot_de_passe')";

    // Exécution de la requête SQL
    if (mysqli_query($connexion, $sql)) {
        echo "Données insérées avec succès.";
    } else {
        echo "Erreur lors de l'insertion des données : " . mysqli_error($connexion);
    }
    // 8) Redirection vers la page connexion
    header('Location: connexion-compte.php'); 

}

mysqli_close($connexion);
?>
    <!-- 1) Balises HTML -->
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
        <title>Création de compte</title>
    </head>
    <body>
        <main class="container-fluid">   
            <!-- //3)Titre de la page -->
            <h1>Création de compte d'utilisateur</h1>

            <!-- //4)Formulaire de création de compte-->
            <form action="" method="post">
                <label for="nom">Nom*</label>
                <input type="text" name="nom" id="nom" required>
                <!-- <br> -->
                <label for="email">E-mail*</label>
                <input type="email" name="email" id="email" required>
                <!-- <br> -->
                <label for="mot_de_passe">Mot de passe*</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" required>
                <!-- <br> -->
                <input type="submit" name="valider" value="valider">
            </form>
            <!-- //2)Fin des balises HTML  -->
        </main>
    </body>
    </html>

