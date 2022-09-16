
<div class="flex sortVideo">
    <h1 class="title color realisation">Réalisations</h1>
    <form method="POST" class="flex formsort" id="categorySort">
        <select name="categorySort" class="form-select" id="select">
            <option class="optionscate" value="all">Tous</option>
            <?php $count = 0; foreach($result[1] as $category) { ?>
              <option class="optionscate" value=<?= $category->getId(); ?>><?= $category->getName(); ?></option>
              <?php $count++; ?>
            <?php } ?>
        </select>
    </form>
</div>

<section id="ajax">
    
</section>


