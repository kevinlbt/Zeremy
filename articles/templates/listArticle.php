
<h1>Listes des articles</h1>

<div>
    <ul>
        <?php foreach ($articles as $article) { ?> 
            <li> 
                <h2> <?php echo $article->title; ?></h2>
                <p><?php echo $article->content; ?> </p>
                <a href="/articles?p=deleteArticle&id=<?= $article->id; ?>" class="no-underline"><button type="button" name="deleteArticle" class="button">supprimer</button></a>
            </li>         
        <?php
        }
        ?>
    </ul>
</div>