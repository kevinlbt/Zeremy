
<div class="flex collum login">
    <?php if (Authenticator::isLogged()): ?>
        <h2>Bonjour <?= $_SESSION['logged_name']; ?></h2>
        <button class="button"><a href="./logout" class="text no-underline">Me déconnecter</a></button>
    <?php else: ?>
        <h1 class="flex collum">Connexion gestion d'articles</h1>
        <form method="POST" action="/login" class="flex collum">
            <label for="username" class="text title">Identifiant</label>
            <input type="text" name="username" class="field input"/>
            <label for="password" class="text">Mot de passe</label>
            <input type="password" name="password" class="field input"/>
            <input type="submit" value="Me connecter" class="button"/>
        </form>
        <p class="not-valide-msg text"><?= AuthController::getValideUserLog(); ?></p>
    <?php endif; ?>
</div>
