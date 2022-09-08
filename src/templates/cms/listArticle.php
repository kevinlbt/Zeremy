
<h2 class="container article">Articles</h2>

<div class="container">
    <ul class="no-padding">
        <?php $count = 0; foreach ($result as $article): ?> 
            <li class="flex list border gray-back"> 
                <div>
                    <h3 class="textcms articletitle"><?= $article->getTitle(); ?></h3>
                    <p class="textcms"><?= $article->getContent(); ?> </p>
                    <p class="textcms"><?= $article->getLink(); ?></p>
                </div>
                <div class="flex">
                    <div>
                        <a href="/Zeremy-website/update-article/<?= $article->getId(); ?>" class="no-underline">
                            <button type="button" name="updateArticle" class="button">modifier</button>
                        </a>
                    </div>
                    <div>
                        <button id="openmodal" class="btn-delete openModalCms">supprimer</button>
                        <div id="modal<?php echo $count; ?>" class="modalCms" name="var" data-id="<?php echo $count; ?>">
                            <div class="modalContentCms flex collum">
                                <p>Es-tu sur de vouloir supprimer l'article : <?= $article->getTitle(); ?> ?</p>
                                <a href="deleteArticle/<?= $article->getId(); ?>" class="no-underline">
                                    <button type="button" name="deleteArticle" class="btn-delete align" data-id="<?php echo $count; ?>">supprimer</button>
                                </a>
                                <button class="cancelCms" data-id="<?php echo $count; ?>">annuler</button>
                            </div>
                        </div>  
                    </div>
                    <div>
                        <?php if(ArticleController::publishButton($article->getId())) : ?>
                            <a href="publishedArticle/<?= $article->getId(); ?>" class="no-underline">
                                <button type="button" name="deleteArticle" class="publi-button align">publier</button>
                            </a>
                        <?php endif ?>
                        <?php if(!ArticleController::publishButton($article->getId())) : ?>
                            <a href="unPublishedArticle/<?= $article->getId(); ?>" class="no-underline">
                                <button type="button" name="deleteArticle" class="publi-button align">dépublier</button>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </li>         
        <?php $count++;
         endforeach ?>
         <p id="nbrarticle">Nombre d'articles : <?= $count; ?></p>
    </ul>

</div>