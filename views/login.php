<!--<h2>Connexion</h2>
<form method="POST" action="../controllers/login.php">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Se connecter</button>
</form>-->

<section class="vh-100">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-6 d-flex align-items-center justify-content-center">
                <div class="px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5" style="width: 23rem;">
                    <form method="POST" action="../controllers/login.php">
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connexion</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn_login btn-lg btn-block" type="submit">Se connecter</button>
                        </div>

                        <p>Vous n'avez pas de compte ? <a href="/register" class="link_register">Inscrivez-vous ici</a></p>
                    </form>
                </div>
            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="/static/img/avenue_of_poplars.jpg" alt="login img"
                    class="w-100 vh-100" style="object-fit: cover; object-position: center;">
            </div>
        </div>
    </div>
</section>