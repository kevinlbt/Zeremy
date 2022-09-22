<header class="head flex logout">

    <h1 class="head-title textcms">Bonjour <?= $_SESSION['logged_name']; ?></h1>
    
    <ul class="flex align">
        <?php if($templates !== 'articles') : ?>
            <li class="no-liststyle"><a href="/articles"><button class="button default align textcms">Articles</button></a></li>
        <?php endif ?>
        <?php if($templates !== 'new-article') : ?>
            <li class="no-liststyle"><a href="/new-article"><button class="button default align textcms">+ Ajouter un article</button></a></li>
        <?php endif ?>
    </ul>

    <a href="./logout" class="no-underline align"><button class="button default align textcms">Me déconnecter</button></a>

</header>