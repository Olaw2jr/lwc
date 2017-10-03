<section id="lwc_slider" class="mb-4" >  
    <div id="carouselLwc" class="carousel slide carousel-fade" data-ride="carousel">
    
    <?php 
    $images = get_field('front_page_gallery');
    $count = 0; ?>

    <ol class="carousel-indicators">
        <li data-target="#carouselLwc" data-slide-to="0" class="active"></li>
        <li data-target="#carouselLwc" data-slide-to="1"></li>
    </ol>

    <?php if( $images ): ?>
        <div class="carousel-inner carousel-zoom">
            <?php foreach( $images as $image ): ?>
                <div class="carousel-item <?php if($count==0) : echo ' active'; endif; ?>">
                    <img class="d-block w-100" src="<?php echo $image['sizes']['front-slider']; ?>" alt="<?php echo $image['alt']; ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h1  data-animation="animated zoomInLeft" class="cap-txt "><?php echo $image['title']; ?></h1>
                        <blockquote data-animation="animated zoomInLeft" class="blockquote">
                            <p><?php echo $image['description']; ?></p>
                            <footer class="blockquote-footer">
                                <cite title="<?= $image['caption']; ?>"><?= $image['caption']; ?></cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            <?php 
            $count++;
            endforeach; ?>
        </div>
    <?php endif; ?>
    

    <a class="carousel-control-prev" href="#carouselLwc" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselLwc" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</section>