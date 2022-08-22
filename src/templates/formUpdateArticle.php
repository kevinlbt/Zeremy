
<form action="" method="POST" class="flex collum">
    <label for="title" class="text">Titre de l'article</label>
    <input type="text" name="title" class="field" value="<?= $result['title'] ?>">
    <label for="content" class="text">Contenue de l'article</label>
    <textarea type="text" name="content" rows="10" cols="70"><?= $result['content'] ?></textarea>
    <label for="link" class="text">Lien de la vidéo</label>
    <input type="text" name="link" class="field" value="<?= $result['link'] ?>">
    <input type="submit" value="modifier" class="button">
</form>
