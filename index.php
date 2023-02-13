<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique
// ou autre qu'on a créé ensemble.
try {
    $server = "localhost";
    $db = 'exo_194';
    $user = 'root';
    $password = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);










}
catch(PDOException $e){
    echo $e->getMessage();
}
/* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
// TODO votre code ici.
$stmt = $bdd->prepare("SELECT * FROM user WHERE nom IN ('Conor')");

$state = $stmt->execute();
echo 'exo 1<br><br>' ;
if($state) {
    foreach ($stmt->fetchAll() as $user) {
        echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
    }
}
/* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
// TODO Votre code ici.
echo '<br>';
echo 'exo 2<br><br>';
$stmt2 = $bdd->prepare("SELECT * FROM user WHERE prenom NOT IN ('John')");
$state2 = $stmt2->execute();
foreach ($stmt2->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.
echo '<br>';
echo 'exo 3<br><br>';

$stmt3 = $bdd->prepare("SELECT * FROM user WHERE id BETWEEN 0 AND 2");
$state3 = $stmt3->execute();
foreach ($stmt3->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.
echo '<br>';
echo 'exo 4<br><br>';

$stmt4 = $bdd->prepare("SELECT * FROM user WHERE id");
$state4 = $stmt4->execute();
foreach ($stmt4->fetchAll() as $user) {
    if($user['id'] > 2 ) {
        echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
    }
}
/* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.
echo '<br>';
echo 'exo 5<br><br>';

$stmt5 = $bdd->prepare("SELECT * FROM user WHERE id = 1");
$state5 = $stmt5->execute();
foreach ($stmt5->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.
echo '<br>';
echo 'exo 6<br><br>';

$stmt6 = $bdd->prepare("SELECT * FROM user WHERE id >1 AND nom ='Doe'");
$state6 = $stmt6->execute();
foreach ($stmt6->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}

/* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.
echo '<br>';
echo 'exo 7<br><br>';

$stmt7 = $bdd->prepare("SELECT * FROM user WHERE nom ='Doe' AND prenom='John'");
$state7 = $stmt7->execute();
foreach ($stmt7->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.
echo '<br>';
echo 'exo 8<br><br>';

$stmt8 = $bdd->prepare("SELECT * FROM user WHERE nom ='Conor' OR prenom='Jane'");
$state8 = $stmt8->execute();
foreach ($stmt8->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.
echo '<br>';
echo 'exo 9<br><br>';

$stmt9 = $bdd->prepare("SELECT * FROM user ORDER BY id DESC LIMIT 2");
$state9 = $stmt9->execute();
foreach ($stmt9->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
// TODO Votre code ici.
echo '<br>';
echo 'exo 10<br><br>';

$stmt10 = $bdd->prepare("SELECT * FROM user ORDER BY id ASC LIMIT 1");
$state10 = $stmt10->execute();
foreach ($stmt10->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères
( voir LIKE )*/
// TODO Votre code ici.
echo '<br>';
echo 'exo 11<br><br>';

$stmt11 = $bdd->prepare("SELECT * FROM user WHERE nom LIKE 'C___r'");
$state11 = $stmt11->execute();
foreach ($stmt11->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.
echo '<br>';
echo 'exo 12<br><br>';

$stmt12 = $bdd->prepare("SELECT * FROM user WHERE nom LIKE '%e%'");
$state12 = $stmt12->execute();
foreach ($stmt12->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.
echo '<br>';
echo 'exo 13<br><br>';

$stmt13 = $bdd->prepare("SELECT * FROM user WHERE prenom IN ('Sarah', 'John')");
$state13 = $stmt13->execute();
foreach ($stmt13->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}
/* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.
echo '<br>';
echo 'exo 14<br><br>';

$stmt14 = $bdd->prepare("SELECT * FROM user WHERE id BETWEEN 2 AND 4");
$state14 = $stmt14->execute();
foreach ($stmt14->fetchAll() as $user) {
    echo "User: id -> " . $user['id'] . ' ' . "nom = " . $user['nom'] . ' ' . "prenom =" . $user['prenom'] . '<br>';
}