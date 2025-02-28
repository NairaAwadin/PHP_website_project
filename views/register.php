<main>
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
            <input type="email" name="email" id="email" required placeholder="exemple@messagerie.com">
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
</main>