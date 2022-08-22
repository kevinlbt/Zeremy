
<h1>Listes des articles</h1>

<div>
    <ul>
        <?php foreach ($result as $article) { ?> 
            <li class="flex list"> 
                <div>
                    <h2><?= $article->getTitle(); ?></h2>
                    <p><?= $article->getContent(); ?> </p>
                    <p><?= $article->getLink(); ?></p>
                </div>
                <div class="flex">
                    <div>
                        <a href="deleteArticle/<?= $article->getId(); ?>" class="no-underline">
                            <button type="button" name="deleteArticle" class="button">supprimer</button>
                        </a>
                    </div>
                    <div>
                        <a href="update-article/<?= $article->getId(); ?>" class="no-underline">
                            <button type="button" name="updateArticle" class="button">modifier</button>
                        </a>
                    </div>
                </div>
            </li>         
        <?php
        }
        ?>
    </ul>
</div>