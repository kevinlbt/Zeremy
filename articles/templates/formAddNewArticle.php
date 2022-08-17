<form action="" method="POST" class="flex">
    <label for="title">Titre de l'article</label>
    <input type="text" name="title" class="field">
    <label for="content">Contenue de l'article</label>
    <textarea type="text" name="content" rows="10" cols="70" class="field"></textarea>
    <label for="link">Lien de la vidéo</label>
    <input type="text" name="link" class="field">
    <input type="submit" value="valider" class="button">
</form>

<div class="flex">
    <p class="valide-msg"><?= ArticleController::getvalideArticle(); ?></p>
    <p class="not-valide-msg"><?= ArticleController::getnotValideArticle(); ?></p>
</div>