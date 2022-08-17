<form action="" method="POST" class="flex">
    <label for="title">Titre de l'article</label>
    <input type="text" name="title" class="field" value="<?= $article['title'] ?>">
    <label for="content">Contenue de l'article</label>
    <textarea type="text" name="content" rows="10" cols="70"><?= $article['content'] ?></textarea>
    <label for="link">Lien de la vidéo</label>
    <input type="text" name="link" class="field" value="<?= $article['link'] ?>">
    <input type="submit" value="modifier" class="button">
</form>

<div class="flex">
    <p class="valide-msg"><?= ArticleController::getvalideArticle(); ?></p>
</div>