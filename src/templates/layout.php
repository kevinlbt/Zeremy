<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
    <link href="http://localhost:8080/style/formArticlesStyle.css" rel="stylesheet">
</head>
<body>
    <header>
        <ul>
            <li class="no-liststyle"><a href="/articles" class="button no-underline">article</a></li>
            <li class="no-liststyle"><a href="/new-article" class="button no-underline">Ajouter un article</a></li>
        </ul>
    </header>
    
    <?php if ($templates === "articles") {require './src/templates/listArticle.php'; } ?>

    <?php if ($templates === "new-article") {require './src/templates/formAddNewArticle.php'; } ?>

    <?php if ($templates === "update-article") {require './src/templates/formUpdateArticle.php'; } ?>

</body>

<script src="http://localhost:8080/script/scriptSelect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</html>
