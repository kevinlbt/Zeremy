

<header class="back-white">

    <nav class="container web flex nav-bar">
        <div class="logo">
            <a href="./"><img src="./assets/logo/logo-final.png" alt="logo du site"></a>
        </div>
        <ul class="nav title">
            <li><a <?php if($templates === "home") {echo 'class="current"';} ?>href="./">Home</a></li>
            <li><a <?php if($templates === "about") {echo 'class="current"';} ?>href="./apropos">A propos</a></li>
            <li><a <?php if($templates === "portfolio") {echo 'class="current"';} ?>href="./portfolio">Réalisations</a></li>
            <li><a <?php if($templates === "contact") {echo 'class="current"';} ?>href="./contact">Contact</a></li>
        </ul>
    </nav>

</header>