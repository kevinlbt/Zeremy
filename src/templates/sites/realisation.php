
<div class="flex sortVideo">
    <h1 class="title color realisation">Réalisations</h1>
    <form method="POST" class="flex formsort" id="categorySort">
        <select name="categorySort" class="form-select" id="select">
            <?php foreach($result[1] as $category) { ?>
              <option value=<?= $category->getId(); ?>><?= $category->getName(); ?></option>
            <?php } ?>
        </select>
    </form>
</div>


<section id="ajax">
    
   
    
</section>


