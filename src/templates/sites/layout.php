<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="website of Zeremy from the youtube channel Zeremy"/>
    <meta name="keywords" content="youtube, channel, video, jeremy pettre, pettré, filmaker, vidéaste, youtubeur, monteur vidéo, tuto, music composer"/>
    <meta name="Kevin le bot" content="kevin le bot" />
    <meta name="copyright" content="Jeremy pettre" />
    <meta name="robots" content="index, follow"/>
    <meta http-equiv="expires" content="43200"/>

    <!-- HTML Meta Tags -->
    <title>Zeremy</title>

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://jeremypettre.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Zeremy">
    <meta property="og:description" content="website of Zeremy from the youtube channel Zeremy">
    <meta property="og:image" content="./assets/images/favicon-logo.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="kevinlebot.sites.3wa.io">
    <meta property="twitter:url" content="https://jeremypettre.com/">
    <meta name="twitter:title" content="Zeremy">
    <meta name="twitter:description" content="website of Zeremy from the youtube channel Zeremy">
    <meta name="twitter:image" content="./assets/images/favicon-logo.png">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->
        
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon-logo.png">
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
    
    <?php if (isset($templates) && $templates === "home") {require './src/templates/sites/home.php';} ?>
    
    <?php if (isset($templates) && $templates === "contact") {require './src/templates/sites/contact.php';} ?>

    <?php if (isset($templates) && $templates === "about") {require './src/templates/sites/about.php';} ?>

    <?php if (isset($templates) && $templates === "mentionslegales") {require './src/templates/sites/mentions.php';} ?>
    
    <?php require './src/templates/sites/footer.php'; ?>


<script src="https://kit.fontawesome.com/1012edd4b6.js" crossorigin="anonymous"></script>
<script src="./node_modules/plyr/dist/plyr.js"></script>
<script src="./script/simpleparallax.js"></script>
<script type="module" src="./script/videofade.js"></script>
<script type="module" src="./script/fetch.js"></script>
</body>
</html>
