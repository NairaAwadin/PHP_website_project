<?php
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>

<h2>Connexion</h2>
<form method="POST" action="../controllers/loginControllers.php">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Se connecter</button>
</form>