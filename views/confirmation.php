<?php

$mail = $_POST["mail"]; //se recup obligatoirement avec le name dans le html
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$mdp = $_POST["password"];
$repmdp = $_POST["password2"];

if ($mdp == $repmdp)
{
    echo("le mot de passe est le meme");
}
else
{
    echo("le mot de passe n'est pas le meme");
}

?>

<main>
    <h1>Merci <?php echo($prenom. " ". $nom)?> pour votre inscription !</h1>
    <h2>Vous allez recevoir un mail de confirmation sur l'adresse <?php echo($mail)?>.</h2>
</main>