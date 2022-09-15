<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeremy</title>
    <link rel="stylesheet" href="https://use.typekit.net/bjn2kly.css">
    <link href="./style/style.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./node_modules/plyr/dist/plyr.css" />
    
</head>
<body class="lighthouse">

    <?php require './src/templates/sites/header.php'; ?>

    <?php if (isset($templates) && $templates === "portfolio") {require './src/templates/sites/realisation.php';} ?>
    
    <?php require './src/templates/sites/footer.php'; ?>


<script src="https://kit.fontawesome.com/1012edd4b6.js" crossorigin="anonymous"></script>
<script src="./node_modules/plyr/dist/plyr.js"></script>
<script src="./script/player.js"></script>
<script src="./script/videoModal.js"></script>
</body>
<script type="module" src="./script/fetch.js"></script>

</html>
