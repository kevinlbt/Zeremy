
<div class="flex collum">
    <p class="valide-msg text"><?= ArticleController::getvalideArticle(); ?></p>
    <p class="not-valide-msg text"><?= ArticleController::getnotValideArticle(); ?></p>
</div>

<form action="" method="POST" class="flex collum border gray-back">
    <label for="title" class="text">Titre </label>
    <input type="text" name="title" class="field input">
    <label for="content" class="text">Contenue - ( optionnel )</label>
    <textarea type="text" name="content" rows="10" cols="70" class="field"></textarea>
    <div class="flex collum">
      <label for="categorie" class="text">Catégorie</label>
      <select name="categorie[]" multiple class="select">
        <?php foreach($result as $categorie) { ?>
          <option value=<?= $categorie->getId(); ?>><?= $categorie->getName(); ?></option>
        <?php } ?>
      </select>
    </div>
    <label for="link" class="text">Lien de la vidéo</label>
    <input type="text" name="link" class="field input">
    <button type="submit" class="button">valider</button>
</form>

<form method="POST" action=""class="flex collum border gray-back">
    <label for="addCategorie" class="text">Ajouter une catégorie</label>
    <input type="text" name="addCategorie" class="field input">
    <button type="submit" class="button">valider</button>
</form>

