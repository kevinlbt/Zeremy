
<form action="" method="POST" class="flex collum border gray-back">
    <label for="title" class="text">Titre</label>
    <input type="text" name="title" class="field input" value="<?= $result[0]->getTitle() ?>">
    <label for="content" class="text">Contenue ( optionnel )</label>
    <textarea type="text" name="content" rows="10" cols="70"><?= $result[0]->getContent() ?></textarea>
    <div class="flex collum">
      <label for="categorie" class="text">Catégorie</label>
      <select id="sel1" name="categorie[]" multiple class="select">
        <?php foreach($result[2] as $categorie) { ?>
          <option selected value=<?= $categorie->getId(); ?>><?= $categorie->getName(); ?></option>
        <?php } ?>
        <?php foreach($result[1] as $categorie) { ?>
          <option value=<?= $categorie->getId(); ?>><?= $categorie->getName(); ?></option>
        <?php } ?>
      </select>
    </div>
    <label for="link" class="text">Lien de la vidéo</label>
    <input type="text" name="link" class="field input" value="<?= $result[0]->getLink() ?>">
    <button type="submit" class="button">modifier</button>
</form>
