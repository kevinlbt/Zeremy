<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
    <link href="../style/formAddNewArticlesStyle.css" rel="stylesheet">
</head>
<body>
    <header>
        <ul>
            <li class="no-liststyle"><a href="/articles?p=articles" class="button no-underline">article</a></li>
            <li class="no-liststyle"><a href="/articles?p=addArticle" class="button no-underline">Ajouter un article</a></li>
        </ul>
    </header>
    
    <?php if ($templates === "articles") {require './templates/listArticle.php'; } ?>

    <?php if ($templates === "new-article") {require './templates/formAddNewArticle.php'; } ?>

    <?php if ($templates === "update-article") {require './templates/formUpdateArticle.php'; } ?>

</body>
</html>