<header class="head flex logout">

    <h1 class="head-title textcms">Bonjour <?= $_SESSION['logged_name']; ?></h1>
    
    <ul class="flex align">
        <?php if($templates !== 'articles') : ?>
            <li class="no-liststyle"><a href="/Zeremy-website/articles"><button class="button default align textcms">Vidéo</button></a></li>
        <?php endif ?>
        <?php if($templates !== 'new-article') : ?>
            <li class="no-liststyle"><a href="/Zeremy-website/new-article"><button class="button default align textcms">+ Ajouter une video</button></a></li>
        <?php endif ?>
    </ul>

    <a href="./logout" class="no-underline align"><button class="button default align textcms">Me déconnecter</button></a>

</header>