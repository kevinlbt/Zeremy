
<h2 class="container article">Mes vidéos </h2>

<div class="flex collum catelist">
    <form method="POST">
        <select name="categorySort[]" multiple class="select">
            <?php foreach($result[1] as $category) { ?>
              <option value=<?= $category->getId(); ?>><?= $category->getName(); ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="button default">Trier</button>
    </form>
</div>
    
<div class="container">
    <ul class="no-padding">
        <?php $count = 0; foreach ($result[0] as $article): ?> 
            <li class="flex list gray-back"> 
                <div>
                    <h3 class="articletitle"><?= $article->getTitle(); ?></h3>
                    <p class="textcms"><?= $article->getContent(); ?> </p>
                    <p class="textcms"><?= $article->getLink(); ?></p>
                </div>
                <div class="flex">
                    <div>
                        <a href="/Zeremy-website/update-article/<?= $article->getId(); ?>" class="no-underline">
                            <button type="button" name="updateArticle" class="button default textcms">modifier</button>
                        </a>
                    </div>
                    <div>
                        <button id="openmodal" class="button delete textcms openModalCms">supprimer</button>
                        <div id="modal<?php echo $count; ?>" class="modalCms" name="var" data-id="<?php echo $count; ?>">
                            <div class="modalContentCms flex collum">
                                <p>Es-tu sur de vouloir supprimer la vidéo : <?= $article->getTitle(); ?> ?</p>
                                <a href="/Zeremy-website/deleteArticle/<?= $article->getId(); ?>" class="no-underline">
                                    <button type="button" name="deleteArticle" class="button delete align textcms" data-id="<?php echo $count; ?>">supprimer</button>
                                </a>
                                <button class="cancelCms" data-id="<?php echo $count; ?>">annuler</button>
                            </div>
                        </div>  
                    </div>
                    <div>
                        <?php if(ArticleController::publishButton($article->getId())) : ?>
                            <a href="/Zeremy-website/publishedArticle/<?= $article->getId(); ?>" class="no-underline">
                                <button type="button" name="deleteArticle" class="button publish textcms align">publier</button>
                            </a>
                        <?php endif ?>
                        <?php if(!ArticleController::publishButton($article->getId())) : ?>
                            <a href="/Zeremy-website/unPublishedArticle/<?= $article->getId(); ?>" class="no-underline">
                                <button type="button" name="deleteArticle" class="button publish textcms align">dépublier</button>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </li>         
        <?php $count++;
         endforeach ?>
         <p id="nbrarticle">Nombre de vidéo : <?= $count; ?></p>
    </ul>

</div>