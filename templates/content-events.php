<article <?php post_class('conf-event-area mb-5'); ?>>
    <div class="conf-img">
        <?php the_post_thumbnail('event-thumbnails', ['class' => 'img-fluid']); ?>
    </div>
    <div class="conf-date-host">
        <?php
            // get raw date
            $date = get_field('date_of_the_event', false, false);

            // make date object
            $date = new DateTime($date);
        ?>
        <span class="conf-date"><i><?= $date->format('j'); ?></i> <?= $date->format('M Y'); ?></span>
        <span class="conf-host"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php the_field( "event_organizer" ); ?></span>
    </div>
    <div class="conf-title">
        <h3><a href="<?php the_permalink(); ?>" titile=""><?php the_title(); ?></a></h3>
        <span><i class="fa fa-map-marker"></i> <?php the_field('event_location'); ?><span>
    </div>
    <div class="conf-link">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary"><?php _e('More Details', 'sage'); ?></a>
    </div>
</article>