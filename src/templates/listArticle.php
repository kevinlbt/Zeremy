
<h1>Listes des articles</h1>

<div>
    <ul>
        <?php $count = 0; foreach ($result as $article): ?> 
            <li class="flex list"> 
                <div>
                    <h2><?= $article->getTitle(); ?></h2>
                    <p><?= $article->getContent(); ?> </p>
                    <p><?= $article->getLink(); ?></p>
                </div>
                <div class="flex">
                    <div>
                        <button id="openmodal<?php echo $count; ?>" class="button openModal">supprimer</button>
                        <div id="modal<?php echo $count; ?>" class="modal" name="var" data-id="<?php echo $count; ?>">
                            <div class="modalContent flex collum">
                                <p>Est-tu sur de vouloir supprimer l'article : <?= $article->getTitle(); ?></p>
                                <a href="deleteArticle/<?= $article->getId(); ?>" class="no-underline">
                                    <button type="button" name="deleteArticle" class="button align" data-id="<?php echo $count; ?>">supprimer</button>
                                </a>
                                <button class="cancel" data-id="<?php echo $count; ?>">annuler</button>
                            </div>
                        </div>  
                    </div>
                    <div>
                        <a href="update-article/<?= $article->getId(); ?>" class="no-underline">
                            <button type="button" name="updateArticle" class="button">modifier</button>
                        </a>
                    </div>
                </div>
            </li>         
        <?php $count++;
         endforeach ?>
         <p id="nbrarticle">Nombre d'articles : <?= $count; ?></p>
    </ul>

</div>