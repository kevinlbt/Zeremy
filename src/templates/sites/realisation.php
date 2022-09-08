<h1 class="title color realisation">Réalisations</h1>

<section class="grid containerWeb color text">
    
    <?php $count=0 ;foreach($result as $article) : ?>
    
        <div class="grid-item openModal">
            <div class="filter">
                <div class="plyr__video-embed one">
                    <iframe
                        src="https://www.youtube.com/embed/<?= $article->getLink(); ?>?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                        allowfullscreen
                        allowtransparency
                    ></iframe>
                </div>
            </div>
            <h2 class="title white overlap"><?= $article->getTitle(); ?></h2>
        </div>
        <div id="modal<?php echo $count; ?>" class="modal" name="var" data-id="<?php echo $count; ?>">
            <div class="modalContent flex collum">
                <h2 class="videotitle title white"><?= $article->getTitle(); ?></h2>
                <div class="plyr__video-embed two" id="player<?php echo $count; ?>" >
                    <iframe 
                        src="https://www.youtube.com/embed/<?= $article->getLink(); ?>?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
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


