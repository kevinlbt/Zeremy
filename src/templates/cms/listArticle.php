
<h2 class="container">Articles</h2>

<div class="container">
    <ul class="no-padding">
        <?php $count = 0; foreach ($result as $article): ?> 
            <li class="flex list border gray-back"> 
                <div>
                    <h3 class="text"><?= $article->getTitle(); ?></h3>
                    <p class="text"><?= $article->getContent(); ?> </p>
                    <p class="text"><?= $article->getLink(); ?></p>
                </div>
                <div class="flex">
                    <div>
                        <a href="/Zeremy-website/update-article/<?= $article->getId(); ?>" class="no-underline">
                            <button type="button" name="updateArticle" class="button">modifier</button>
                        </a>
                    </div>
                    <div>
                        <button id="openmodal" class="btn-delete openModal">supprimer</button>
                        <div id="modal<?php echo $count; ?>" class="modal" name="var" data-id="<?php echo $count; ?>">
                            <div class="modalContent flex collum">
                                <p>Es-tu sur de vouloir supprimer l'article : <?= $article->getTitle(); ?> ?</p>
                                <a href="deleteArticle/<?= $article->getId(); ?>" class="no-underline">
                                    <button type="button" name="deleteArticle" class="btn-delete align" data-id="<?php echo $count; ?>">supprimer</button>
                                </a>
                                <button class="cancel" data-id="<?php echo $count; ?>">annuler</button>
                            </div>
                        </div>  
                    </div>
                    <div>
                        <?php if(ArticleController::publishedButton($article->getId())) : ?>
                            <a href="publishedArticle/<?= $article->getId(); ?>" class="no-underline">
                                <button type="button" name="deleteArticle" class="publi-button align">publier</button>
                            </a>
                        <?php endif ?>
                        <?php if(!ArticleController::publishedButton($article->getId())) : ?>
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