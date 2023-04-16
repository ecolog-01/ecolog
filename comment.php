<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form action="submit_comment.php" method="post">
  <label for="name">Nom:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="comment">Commentaire:</label>
  <textarea id="comment" name="comment"></textarea><br><br>
  <input type="submit" value="Soumettre">
</form>
<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_de_la_base_de_données");

// Vérification de la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Récupération des données du formulaire
$name = $_POST['name'];
$comment = $_POST['comment'];

// Validation des entrées de l'utilisateur
if (empty($name) || empty($comment)) {
  echo "Veuillez remplir tous les champs.";
} else {
  // Insertion des données dans la base de données
  $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
  if (mysqli_query($conn, $sql)) {
    echo "Votre commentaire a été soumis avec succès.";
  } else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>


</body>
</html>
<