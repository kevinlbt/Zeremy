
<h1 class="flex collum align textcms welcome">Bienvenue</h1>

<div class="flex collum align login gray-back">
    <?php if (Authenticator::isLogged()): ?>
        <h2>Bonjour <?= $_SESSION['logged_name']; ?></h2>
        <button class="button"><a href="/Zeremy-website/logout" class="textcms no-underline">Me déconnecter</a></button>
    <?php else: ?>
        <h1 class="flex collum align textcms">Connexion gestion d'articles</h1>
        <form method="POST" action="" class="flex collum align container">
            <label for="username" class="text titlecms sizelog">Identifiant</label>
            <input type="text" name="username" class="field input"/>
            <label for="password" class="text sizelog">Mot de passe</label>
            <input type="password" name="password" class="field input"/>
            <input type="submit" value="Me connecter" class="button default"/>
        </form>
        <?php foreach(AuthController::getValidUserLog() as $notvalid) : ?>
          <p class="not-valide-msg textcms"><?php  echo $notvalid; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
