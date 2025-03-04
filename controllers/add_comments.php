<?php
session_start();
require_once '../config/db.php';

function add_comment(PDO $pdo, int $user_id, int $artwork_id, string $comment): void
{
    if (!empty($comment)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO comments (user_id, artwork_id, comment)
                VALUES (:user_id, :artwork_id, :comment)");
            $stmt->execute([
                'user_id' => $user_id,
                'artwork_id' => $artwork_id,
                'comment' => $comment
            ]);
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur : " . $e->getMessage();
        }
    }
}

function handle_comments(PDO $pdo): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $artwork_id = $_POST['artwork_id'];
        $comment = $_POST['comment'];

        add_comment($pdo, $user_id, $artwork_id, $comment);

        header('Location: /galerie');
        exit;
    }
}

handle_comments($pdo);
?>