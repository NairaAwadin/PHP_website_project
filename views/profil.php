<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: /login");
    exit();
}

echo "<h2>Bienvenue, " . $_SESSION['email'] . "!</h2>";
echo "<p>Vous êtes connecté.</p>";
echo "<a href='../controllers/logout.php'>Se déconnecter</a>";
?>