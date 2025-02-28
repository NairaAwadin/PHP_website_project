<!--<main>
    <form method="post" action="../controllers/register.php">
        <h1>Inscription</h1>
        <div>
            <label for="civilite">Nom<span class="rouge">*</span></label>
            <input type="text" name="nom" id="nom" required placeholder="Delacour">
        </div>
        <div>
            <label for="civilite">Prénom<span class="rouge">*</span></label>
            <input type="text" name="prenom" id="prenom" required placeholder="Jean">
        </div>
        <div>
            <label for="sexe">Sexe<span class="rouge">*</span></label>
            <input type="radio" value="1" name="sexe" required> Homme
            <input type="radio" value="2" name="sexe" required> Femme
            <input type="radio" value="3" name="sexe" required> Autre
        </div>
        <div>
            <label for="email">E-mail<span class="rouge">*</span></label>
            <input type="email" name="email" id="email" required placeholder="exemple@test.com">
        </div>
        <div>
            <label for="password">Password<span class="rouge">*</span></label>
            <input type="password" name="password" id="password" required placeholder="Mot de passe">
        </div>

        <div>
            <input type="reset" value="Effacer">
            <input type="submit" value="S'inscrire" class="animate__animated animate__pulse animate__infinite animate__slow">
        </div>
    </form>

    <div>
        <a href="connexion.php">Connexion</a>
    </div>
</main>-->

<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center justify-content-center">
                <div class="px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5" style="width: 23rem;">
                    <form method="POST" action="../controllers/register.php">
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inscription</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="nom">Nom<span class="text-danger">*</span></label>
                            <input type="text" id="nom" name="nom" class="form-control form-control-lg" required placeholder="Delacour" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="prenom">Prénom<span class="text-danger">*</span></label>
                            <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" required placeholder="Jean" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Genre<span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="1" name="sexe" id="homme" required />
                                    <label class="form-check-label" for="homme">Homme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="2" name="sexe" id="femme" required />
                                    <label class="form-check-label" for="femme">Femme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="3" name="sexe" id="autre" required />
                                    <label class="form-check-label" for="autre">Autre</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">E-mail<span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" required placeholder="exemple@test.com" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Mot de passe<span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" required placeholder="Mot de passe" />
                        </div>

                        <div class="pt-1 mb-4">
                            <!--<button type="reset" class="btn btn-secondary btn-lg btn-block">Effacer</button>-->
                            <button type="submit" class="btn btn_effect">S'inscrire</button>
                        </div>

                        <p>Vous avez déjà un compte ? <a href="/login" class="link_register">Connectez-vous ici</a></p>
                    </form>
                </div>
            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="/static/img/two_poplars.jpg" alt="register img" class="register_img">
            </div>
        </div>
    </div>
</section>