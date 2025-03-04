<?php
require_once BASE_PATH . '/config/db.php';

function get_artworks($pdo)
{
    try {
        $stmt = $pdo->query("SELECT * FROM artworks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}

function get_comments($pdo)
{
    try {
        $stmt = $pdo->query("SELECT comments.*, users.nom, users.prenom
                            FROM comments
                            JOIN users ON comments.user_id = users.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}

function get_exhibitions($pdo)
{
    try {
        $stmt = $pdo->query("SELECT * FROM exhibitions");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}

function get_user_favorites($pdo, $user_id)
{
    try {
        $stmt = $pdo->prepare("SELECT artwork_id FROM favorites WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return [];
    }
}
?>