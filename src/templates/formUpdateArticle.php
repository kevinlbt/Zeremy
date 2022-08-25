
<form action="" method="POST" class="flex collum">
    <label for="title" class="text">Titre de l'article</label>
    <input type="text" name="title" class="field" value="<?= $result->getTitle() ?>">
    <label for="content" class="text">Contenue de l'article</label>
    <textarea type="text" name="content" rows="10" cols="70"><?= $result->getContent() ?></textarea>
    <label for="link" class="text">Lien de la vidéo</label>
    <input type="text" name="link" class="field" value="<?= $result->getLink() ?>">
    <input type="submit" value="modifier" class="button">
</form>
