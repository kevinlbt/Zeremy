<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion d'articles</title>
    <link rel="stylesheet" href="https://use.typekit.net/bjn2kly.css">
    <link href="http://localhost:8080/style/style.css" rel="stylesheet"/>
</head>
<body>
    
    <?php if(Authenticator::isLogged()) : 
        require './src/templates/cms/header.php';
    endif ; ?>
    
    <section class="container">

        <?php if (isset($templates) && $templates === "login") {require './src/templates/cms/login.php'; } ?>

        <?php if (isset($templates) && $templates === "articles") {require './src/templates/cms/listArticle.php'; } ?>

        <?php if (isset($templates) && $templates === "new-article") {require './src/templates/cms/formAddNewArticle.php'; } ?>

        <?php if (isset($templates) && $templates === "update-article") {require './src/templates/cms/formUpdateArticle.php'; } ?>

    </section>            
</body>

<script src="./script/DeleteModal.js"></script>
<script src="http://localhost:8080/script/scriptSelect.js"></script>
<script src="./script/publishedButton.js"></script>

</html>

