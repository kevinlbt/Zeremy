
<h1>Listes des articles</h1>

<div>
    <ul>
        <?php foreach ($articles as $article) { ?> 
            <li class="flex list"> 
                <div>
                    <h2> <?= $article->title; ?></h2>
                    <p><?= $article->content; ?> </p>
                    <p><?= $article->link; ?></p>
                </div>
                <div class="flex">
                    <div>
                        <a href="/articles?p=deleteArticle&id=<?= $article->id; ?>" class="no-underline">
                            <button type="button" name="deleteArticle" class="button">supprimer</button>
                        </a>
                    </div>
                    <div>
                        <a href="/articles?p=updateArticle&id=<?= $article->id; ?>" class="no-underline">
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