<?php
/*
Objectif : Permettre à l'utilisateur de se connecter à son compte
 
Contenu de la page : 
	Titre de la page : h1 "Connexion au compte utilisateur"
	Formulaire de création de compte : 
		- E-mail (email) : input type text - obligatoire
		- Mot de passe (mot_de_passe) : input type text - obligatoire
		- Bouton "Valider" (valider) : input type submit
 
Action à la validation du formulaire :
	- Détecter la validation formulaire
	- Récupérer les données du formulaire : email, mot_de_passe
	- Vérification de l'existance d'un utilisateur en base avec l'email et le mot de passe correspond
*/
 
 
// 5) Connexion à la base
// 6) Texter la validation formulaire
 
	// 7) Vérifier l'existance de cette utilisateur en base (email, mot de passe)
 
		// 8) Rediriger vers page accueil-compte.php
        
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
if (isset($_POST['connecter'])) {
     // Verification pour un compte existant
    // Faire une requette sql pout verifications des emails
 
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $mot_De_Passe = $_POST['mot_de_passe'];

// Requête SQL pour vérifier l'existence de l'utilisateur
   $sql = "SELECT * FROM compte WHERE email = '$email' AND mot_de_passe = '$mot_De_Passe'";
   $resultat = mysqli_query($connexion, $sql);
   // Vérifier si la requête a réussi
   if ($resultat) {
     echo "Compte existant";
   } else {
   echo "Erreur : " . mysqli_error($connexion);
   }
        session_start();
        $_SESSION['utilisateur'] = 'OK'.
      // 8) Redirection vers la page connexion
      header('Location: accueil-compte.php'); 
      // Fermer la connexion
     mysqli_close($connexion);
     }
 
    // mysqli_close($connexion);
?><!-- 1) Balises HTML -->
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
        <h1>Connexion au compte utilisateur</h1>

        <!-- //4)Formulaire de création de compte-->
        <form action="" method="post">
            <label for="email">E-mail*</label>
            <input type="email" name="email" id="email" required>
            <!-- <br> -->
            <label for="mot_de_passe">Mot de passe*</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
            <!-- <br> -->
            <input type="submit" name="connecter" value="connecter">
        </form>
        <!-- //2)Fin des balises HTML  -->
    </main>
</body>
</html>



