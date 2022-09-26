
<p class="valide-msg textcms message-err"><?php if (isset($result)) {echo $result ;}  ?></p>
<h1 class="title color title-contact">Contact</h1>

<div class="containerWeb contact">
    
    <img src="./assets/images/contactjeremy.jpg" alt="Jeremy with camera on stairs in city" class="contactimg"/>
    
    <div class="formcontact">
        <form method="POST" class="flex collum">
            <label for="name" class="textcms">Nom</label>
            <div class="flex name-contact">
                <input type="text" name="name" id="name" placeholder=" nom" class="fieldfill side">
                <input type="text" name="firstname" placeholder=" prénom" class="fieldfill side">
            </div>
            <label for="email" class="textcms">Email</label>
            <input type="email" name="email" id="email" class="fieldfill">
            <label for="subject" class="textcms">Sujet</label>
            <input type="text" name="subject" id="subject" class="fieldfill">
            <label for="textarea" class="textcms">Message</label>
            <textarea name="message" id="textarea" cols="70" class="textfill"></textarea>
            <button type="submit" class="contact-button">Envoyer</button>
        </form>
        <div class="flex collum align">
            <?php foreach(WebsiteController::getErrors() as $error) : ?>
              <p class="not-valide-msg flex collum textcms message-err"><?php  echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>

