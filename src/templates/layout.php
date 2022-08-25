<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
    <link href="http://localhost:8080/style/Style.css" rel="stylesheet"/>
    <link href="http://localhost:8080/style/modalStyle.css" rel="stylesheet"/>
    <link href="http://localhost:8080/style/multiSelectStyle.css" rel="stylesheet"/>
</head>
<body class="container">
    <?php if (Authenticator::isLogged()) : ?>
        <div class="flex logout">
            <h2>Bonjour <?= $_SESSION['logged_name']; ?></h2>
            <button class="button"><a href="./logout" class="text no-underline">Me déconnecter</a></button>
        </div>

        <header>
            <ul>
                <li class="no-liststyle"><a href="/articles" class="button no-underline">article</a></li>
                <?php if($templates !== 'new-article') : ?>
                    <li class="no-liststyle"><a href="/new-article" class="button no-underline">Ajouter un article</a></li>
                <?php endif ?>
            </ul>
        </header>
    <?php endif ?>

    <?php if ($templates === "login") { require './src/templates/login.php'; } ?>

    <?php if (Authenticator::isLogged()) : ?>
        <?php if ($templates === "articles") {require './src/templates/listArticle.php'; } ?>

        <?php if ($templates === "new-article") {require './src/templates/formAddNewArticle.php'; } ?>

        <?php if ($templates === "update-article") {require './src/templates/formUpdateArticle.php'; } ?>
    <?php endif ?>

</body>

<script src="http://localhost:8080/script/DeleteModal.js"></script>
<script src="http://localhost:8080/script/scriptSelect.js"></script>


</html>
