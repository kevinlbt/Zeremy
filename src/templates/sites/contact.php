
<h1 class="title color title-contact">Contact</h1>
<section class="containerWeb contact">
    
    <img src="./assets/images/contactjeremy.jpg" class="contactimg"/>
    
    <div class="formcontact">
        <form method="POST" class="flex collum">
            <label for="name" class="textcms">Nom</label>
            <div class="flex name-contact">
                <input type="text" name="name" placeholder=" nom" class="fieldfill side">
                <input type="text" name="firstname" placeholder=" prénom" class="fieldfill side">
            </div>
            <label for="email" class="textcms">Email</label>
            <input type="email" name="email" class="fieldfill">
            <label for="subject" class="textcms">Sujet</label>
            <input type="text" name="subject" class="fieldfill">
            <label for="name" class="textcms">Message</label>
            <textarea type="text" name="message" cols="70" class="textfill"></textarea>
            <button type="submit" class="contact-button">Envoyer</button>
        </form>
        <div class="flex collum align">
            <?php foreach(WebsiteController::getErrors() as $error) : ?>
              <p class="not-valide-msg flex collum textcms"><?php  echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <p><?= $result ?></p>
    </div>
</section>
