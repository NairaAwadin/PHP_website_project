<main>
    <form method="post" action="profil.php">
        <h1>Connexion</h1>
        <div>
            <label for="mail">E-mail<span class="rouge">*</span></label>
            <input type="email" name="mail" id="mail" required placeholder="exemple@messagerie.com">
        </div>
        <div>
            <label for="password">Password<span class="rouge">*</span></label>
            <input type="password" name="password" id="password" required placeholder="Mot de passe">
        </div>
        <div>
            <input type="reset" value="Effacer">
            <input type="submit" value="Se connecter" class="animate__animated animate__pulse animate__infinite animate__slow">
        </div>
    </form>

    <div>
        <a href="inscription.php">Inscription</a>
        <a href="oubli.php">Mot de passe oublié</a>
    </div>
</main>