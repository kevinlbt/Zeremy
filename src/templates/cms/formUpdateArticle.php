
<form action="" method="POST" class="flex collum align border gray-back">
    <label for="title" class="textcms size">Titre</label>
    <input type="text" name="title" class="field input" value="<?= $result[0]->getTitle() ?>">
    <label for="content" class="textcms size">Contenue ( optionnel )</label>
    <textarea type="text" name="content" rows="10" cols="70"><?= $result[0]->getContent() ?></textarea>
    <div class="flex collum">
      <label for="category" class="textcms size">Catégorie</label>
      <select id="sel1" name="category[]" multiple class="select">
        <?php foreach($result[2] as $category) { ?>
          <option selected value=<?= $category->getId(); ?>><?= $category->getName(); ?></option>
        <?php } ?>
        <?php foreach($result[1] as $category) { ?>
          <option value=<?= $category->getId(); ?>><?= $category->getName(); ?></option>
        <?php } ?>
      </select>
    </div>
    <label for="link" class="textcms size">Identifiant de la vidéo</label>
    <input type="text" name="link" class="field input" value="<?= $result[0]->getLink() ?>">
    <button type="submit" class="button">modifier</button>
</form>
