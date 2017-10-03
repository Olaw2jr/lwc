<section>
    <div class="block">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                        <?php the_post_thumbnail('', ['class' => 'img-fluid']); ?>
                        <div class="ed-head">
                            <h1><?php the_title(); ?></h1>
                            <span class="location"><i class="fa fa-map-marker"></i> <?php the_field('event_location'); ?></span>
                            <div class="ed-countdown">
                                <div class="ed-date">
                                    <?php
                                        // get raw date
                                        $date = get_field('date_of_the_event', false, false);

                                        // make date object
                                        $date = new DateTime($date);
                                    ?>
                                    <span>
                                        <i><?= $date->format('j'); ?></i> <?= $date->format('M'); ?> <span class="sep">/</span> <?= $date->format('y'); ?> 
                                    </span>
                                    <span>
                                        <i class="fa fa-user"></i> By <a href="#" title=""><?php the_field( "event_organizer" ); ?></a>
                                    </span>
                                </div>
                                <div id="count-down" class="is-countdown">
                                    <!-- Count Down Here... -->
                                </div>
                                <a class="btn btn-outline-primary" href="">BUY THE TICKET </a>
                            </div>
                        </div>

                        <div class="entry-content bs-body">
                            <?php the_excerpt(); ?>

                            <footer>
                                <?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
                            </footer>
                            <?php //comments_template('/templates/comments.php'); ?>
                        </div>

                    </article>
                <?php endwhile; ?> 
            </div>
        </div>
    </div>
</section>