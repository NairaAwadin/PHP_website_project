<?php
session_start();
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/models/galerie.php';

$artworks = get_artworks($pdo);
$comments = get_comments($pdo);
$exhibitions = get_exhibitions($pdo);
$favorites = isset($_SESSION['user_id']) ? get_user_favorites($pdo, $_SESSION['user_id']) : [];
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
                                    <?php if (isset($_SESSION['user_id'])): ?>
                                        <form method="post" action="../controllers/add_comments.php" class="mt-3">
                                            <input type="hidden" name="artwork_id" value="<?= $artwork['id'] ?>">
                                            <div class="form-group">
                                                <textarea name="comment" class="form-control" placeholder="Ajouter un commentaire..." required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn_effect" style="margin-top: 10px;">Poster</button>
                                        </form>
                                    <?php endif; ?>

                                    <?php
                                    $hasComments = false;
                                    foreach ($comments as $comment):
                                        if ($comment['artwork_id'] === $artwork['id']):
                                            $hasComments = true;
                                    ?>
                                            <li class="mt-2">
                                                <strong><?= htmlspecialchars($comment['prenom'] . ' ' . $comment['nom']) ?></strong> :
                                                <?= htmlspecialchars($comment['comment']) ?>
                                                <small class="text-muted">(Posté le <?= htmlspecialchars($comment['created_at']) ?>)</small>
                                            </li>
                                    <?php
                                        endif;
                                    endforeach;
                                    if (!$hasComments):
                                    ?>
                                        <li class="text-muted">Aucun commentaire</li>
                                    <?php endif; ?>
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
                                            <button type="submit" class="btn btn_effect">Ajouter aux favoris</button>
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