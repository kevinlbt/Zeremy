
<div class="flex collum align">
    <p class="valide-msg textcms"><?= ArticleController::getValidArticle(); ?></p>
    <?php foreach(ArticleController::getnotValidArticle() as $notvalid) : ?>
      <p class="not-valide-msg flex collum textcms"><?php  echo $notvalid; ?></p>
    <?php endforeach; ?>
</div>

<form action="" method="POST" class="flex collum align border gray-back">
    <label for="title" class="textcms size">Titre </label>
    <input type="text" name="title" class="field input" value="<?php if(isset($_POST['title'])) {echo $_POST['title'];} ?>">
    <label for="content" class="textcms size">Contenue - ( optionnel )</label>
    <textarea type="text" name="content" rows="10" cols="70" class="field"><?php if(isset($_POST['content'])) {echo $_POST['content'];} ?></textarea>
    <div class="flex align collum">
      <label for="category" class="textcms size">Catégorie</label>
      <select name="category[]" multiple class="select">
        <?php foreach($result as $category) { ?>
          <option value=<?= $category->getId(); ?>><?= $category->getName(); ?></option>
        <?php } ?>
      </select>
    </div>
    <label for="link" class="textcms size">Identifiant de la vidéo</label>
    <input type="text" name="link" class="field input" value="<?php if(isset($_POST['link'])) {echo $_POST['link'];} ?>">
    <button type="submit" class="button">valider</button>
</form>

<form method="POST" action=""class="flex collum align border gray-back">
    <label for="addCategory" class="textcms size">Ajouter une catégorie</label>
    <input type="text" name="addCategory" class="field input">
    <button type="submit" class="button">valider</button>
</form>

