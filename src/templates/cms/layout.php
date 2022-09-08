<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion d'articles</title>
    <link href="https://kevinlebot.sites.3wa.io/Zeremy-website/style/style.css" rel="stylesheet"/>
</head>
<body>
    <?php if(Authenticator::isLogged()) : ?>
    <header class="head flex logout">

            <h1 class="head-color textcms">Bonjour <?= $_SESSION['logged_name']; ?></h1>
            
            <ul class="flex align">
                <?php if($templates !== 'articles') : ?>
                    <li class="no-liststyle navcms"><a href="/Zeremy-website/articles" class="no-underline link textcms">Articles</a></li>
                <?php endif ?>
                <?php if($templates !== 'new-article') : ?>
                    <li class="no-liststyle navcms"><a href="/Zeremy-website/new-article" class="no-underline link textcms">+ Ajouter un article</a></li>
                <?php endif ?>
            </ul>

            <button class="logout-button"><a href="./logout" class="no-underline link textcms">Me déconnecter</a></button>
        
    </header>  
    <?php endif ; ?>
    <section class="container">

        <?php if (isset($templates) && $templates === "login") {require './src/templates/cms/login.php'; } ?>

        <?php if (isset($templates) && $templates === "articles") {require './src/templates/cms/listArticle.php'; } ?>

        <?php if (isset($templates) && $templates === "new-article") {require './src/templates/cms/formAddNewArticle.php'; } ?>

        <?php if (isset($templates) && $templates === "update-article") {require './src/templates/cms/formUpdateArticle.php'; } ?>

    </section>            
</body>

<script src="./script/DeleteModal.js"></script>
<script src="https://kevinlebot.sites.3wa.io/Zeremy-website/script/scriptSelect.js"></script>
<script src="./script/publishedButton.js"></script>

</html>

