
<h1 class="flex collum text">Bienvenue</h1>

<div class="flex collum login gray-back">
    <?php if (Authenticator::isLogged()): ?>
        <h2>Bonjour <?= $_SESSION['logged_name']; ?></h2>
        <button class="button"><a href="/Zeremy-website/logout" class="text no-underline">Me déconnecter</a></button>
    <?php else: ?>
        <h1 class="flex collum text">Connexion gestion d'articles</h1>
        <form method="POST" action="" class="flex collum container">
            <label for="username" class="text title sizelog">Identifiant</label>
            <input type="text" name="username" class="field input"/>
            <label for="password" class="text sizelog">Mot de passe</label>
            <input type="password" name="password" class="field input"/>
            <input type="submit" value="Me connecter" class="button"/>
        </form>
        <p class="not-valide-msg text"><?= AuthController::getValideUserLog(); ?></p>
    <?php endif; ?>
</div>
