
<form action="" method="POST" class="flex collum">
    <label for="title" class="text">Titre de l'article</label>
    <input type="text" name="title" class="field input">
    <label for="content" class="text">Contenue de l'article</label>
    <textarea type="text" name="content" rows="10" cols="70" class="field"></textarea>
    <div class="flex collum">
    <label for="categorie" class="text">Catégorie</label>
      <select id="sel1" name="categorie[]" multiple class="field input" onchange="console.log(Array.from(this.selectedOptions).map(x=>x.value??x.text))">
        <?php foreach($result as $categorie) { ?>
          <option value="<?= $categorie->getId(); ?>"><?= $categorie->getName(); ?></option>
        <?php } ?>
      </select>
    </div>
    <label for="link" class="text">Lien de la vidéo</label>
    <input type="text" name="link" class="field input">
    <input type="submit" value="valider" class="button">
</form>

<div class="flex collum">
    <p class="valide-msg text"><?= ArticleController::getvalideArticle(); ?></p>
    <p class="not-valide-msg text"><?= ArticleController::getnotValideArticle(); ?></p>
</div>

<form method="POST" action=""class="flex collum">
    <label for="addCategorie" class="text">Ajouter une catégorie</label>
    <input type="text" name="addCategorie" class="field input">
    <input type="submit" value="valider" class="button">
</form>

