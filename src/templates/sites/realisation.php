<h1 class="text white">Réalisations</h1>

<section class="grid container white text">
    
    <?php $count=0 ;foreach($result as $article) : ?>
    
        <div class="grid-item openModal">
            <div class="plyr__video-embed position" id="player">
                <iframe 
                    src="<?= $article->getLink(); ?>?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                    allowfullscreen
                    allowtransparency
                ></iframe>
            </div>
            <h2 class="title white overlap"><?= $article->getTitle(); ?></h2>
        </div>
        <div id="modal<?php echo $count; ?>" class="modal" name="var" data-id="<?php echo $count; ?>">
            <div class="modalContent flex collum">
                <p class="videotitle title white"><?= $article->getTitle(); ?></p>
                <div class="plyr__video-embed" id="playertwo">
                    <iframe  id="playerdemo"
                        src="<?= $article->getLink(); ?>?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>
                <p class="text white"><?= $article->getContent(); ?></p>
            </div>
        </div>  
    <?php $count++ ;endforeach; ?>
    
</section>


