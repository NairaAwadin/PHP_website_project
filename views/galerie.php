<?php
require_once BASE_PATH . '/config/db.php';

// Récupérer les œuvres d'art
try {
    $stmt = $pdo->query("SELECT * FROM artworks");
    $artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    $artworks = [];
}

// Récupérer les commentaires pour chaque œuvre d'art
$comments = [];
try {
    $stmt = $pdo->query("SELECT * FROM comments");
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Récupérer les expositions pour chaque œuvre d'art
$exhibitions = [];
try {
    $stmt = $pdo->query("SELECT * FROM exhibitions");
    $exhibitions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Récupérer les favoris pour chaque utilisateur
$favorites = [];
if (isset($_SESSION['user_id'])) {
    try {
        $stmt = $pdo->prepare("SELECT artwork_id FROM favorites WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $_SESSION['user_id']]);
        $favorites = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<main>
    <section class="container my-5">
        <h2 class="mb-4">Galerie d'Art</h2>
        <div class="row">
            <?php if ($artworks): ?>
                <?php foreach ($artworks as $artwork): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($artwork['image_url']) ?>" class="card-img-top img-fixed-size" alt="<?= htmlspecialchars($artwork['title']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($artwork['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($artwork['description']) ?></p>
                                <p class="card-text"><small class="text-muted">Créé le <?= htmlspecialchars($artwork['creation_date']) ?></small></p>
                                <p class="card-text"><strong>Expositions :</strong></p>
                                <ul>
                                    <?php
                                    $hasExhibitions = false;
                                    foreach ($exhibitions as $exhibition):
                                        if (isset($exhibition['artwork_id']) && $exhibition['artwork_id'] == $artwork['id']):
                                            $hasExhibitions = true;
                                    ?>
                                            <li><?= htmlspecialchars($exhibition['name']) ?> - <?= htmlspecialchars($exhibition['location']) ?> (du <?= htmlspecialchars($exhibition['start_date']) ?> au <?= htmlspecialchars($exhibition['end_date']) ?>)</li>
                                    <?php
                                        endif;
                                    endforeach;
                                    if (!$hasExhibitions) {
                                        echo "<li>None</li>";
                                    }
                                    ?>
                                </ul>
                                <p class="card-text"><strong>Commentaires :</strong></p>
                                <ul>
                                    <?php
                                    $hasComments = false;
                                    foreach ($comments as $comment):
                                        if ($comment['artwork_id'] == $artwork['id']):
                                            $hasComments = true;
                                    ?>
                                            <li><?= htmlspecialchars($comment['comment']) ?> (Posté le <?= htmlspecialchars($comment['created_at']) ?>)</li>
                                    <?php
                                        endif;
                                    endforeach;
                                    if (!$hasComments) {
                                        echo "<li>None</li>";
                                    }
                                    ?>
                                </ul>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <?php if (in_array($artwork['id'], $favorites)): ?>
                                        <form method="post" action="../controllers/remove_favorite.php">
                                            <input type="hidden" name="artwork_id" value="<?= $artwork['id'] ?>">
                                            <button type="submit" class="btn btn-danger">Retirer des favoris</button>
                                        </form>
                                    <?php else: ?>
                                        <form method="post" action="../controllers/add_favorite.php">
                                            <input type="hidden" name="artwork_id" value="<?= $artwork['id'] ?>">
                                            <button type="submit" class="btn btn-primary">Ajouter aux favoris</button>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune œuvre d'art trouvée.</p>
            <?php endif; ?>
        </div>
    </section>
</main>