<?php

if (!isset($_SESSION["user_id"])) {
    header("Location: /login");
    exit();
}
?>

<main>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../static/img/profil.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <p>Vous êtes connecté.</p>
                                    <h4><?= htmlspecialchars($_SESSION['prenom']) . " " . htmlspecialchars($_SESSION['nom']) ?></h4>
                                    <p class="text-secondary mb-1">
                                        <?php
                                        if ($_SESSION['sexe'] == "H") {
                                            echo "Homme";
                                        } else if ($_SESSION['sexe'] == "F") {
                                            echo "Femme";
                                        } else {
                                            echo "Autre";
                                        }
                                        ?>
                                    </p>
                                    <a href='../controllers/logout.php'>Se déconnecter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom & Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= htmlspecialchars($_SESSION['prenom']) . " " . htmlspecialchars($_SESSION['nom']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= htmlspecialchars($_SESSION['email']) ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= htmlspecialchars($_SESSION['phone'] ?? 'None') ?>
                                    <button class="btn btn-link" onclick="document.getElementById('phone-form').style.display='block'">Modifier</button>
                                </div>
                            </div>
                            <form id="phone-form" method="post" action="../controllers/update_phone.php" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nouveau numéro de téléphone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone" class="form-control" placeholder="+330600000000" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= htmlspecialchars($_SESSION['address'] ?? 'None') ?>
                                    <button class="btn btn-link" onclick="document.getElementById('address-form').style.display='block'">Modifier</button>
                                </div>
                            </div>
                            <form id="address-form" method="post" action="../controllers/update_address.php" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nouvelle adresse</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" placeholder="Entrez votre adresse" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>