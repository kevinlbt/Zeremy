

<header class="container">

    <nav class="flex nav-bar">
        <div class="logo">
            <img src="./assets/logo/logo-color.png" width="200" alt="logo du site">
        </div>
        <ul class="nav title">
            <li><a href="#">Home</a></li>
            <li><a href="#">A propos</a></li>
            <li><a <?php if($templates === "portfolio") {echo 'class="current"';} ?>href="#">Réalisations</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

</header>