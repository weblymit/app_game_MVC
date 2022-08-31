<?php
//a) ecriture de la requette
$sql = "INSERT INTO jeux(name, price, genre, note, plateforms, description, PEGI,created_at) VALUES(:name, :price, :genre, :note,:plateforms,:description,:PEGI, NOW())";
//b) preparation de la requête
$query = $pdo->prepare($sql);
//c) Protection des injections SQL en associant chaque requette à sa valeur
$query->bindValue(':name', $nom, PDO::PARAM_STR);
$query->bindValue(':price', $prix, PDO::PARAM_STMT);
// genre est un tableau, on boucle pour bindValue chaque valuer
$query->bindParam(':genre', implode(" | ",$tableau_propre_de_genre), PDO::PARAM_STR);
$query->bindParam(':plateforms', implode(" | ", $tableau_propre_de_plateforms), PDO::PARAM_STR);
$query->bindValue(':note', $note, PDO::PARAM_INT);
$query->bindValue(':description', $description, PDO::PARAM_STR);
$query->bindValue(':PEGI', $pegi, PDO::PARAM_STR);
//d) execution de la requête preparé
$query->execute();
// redirection vers page accueil
$_SESSION["success"] = "Jeux ajouté avec succès";
header("Location: index.php");
die;
