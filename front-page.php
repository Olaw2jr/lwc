<section id="theme_ya_mwaka" class="mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php $image = get_field('yearly_theme');
                if( !empty($image) ): ?>
                    <img class="card-img-top" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="sermons" >
    <div class="block">
        <div class="title-2">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/title-2.png" alt="">
            <h6 class="display-4"><?php _e('Our Church Sermons', 'sage'); ?></h6>
        </div><!-- end title-2 -->

        <div class="sermons-inner">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <?php 
                    $args = array('post_type' => 'sermon','posts_per_page'=>'1');
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sermon-thumbnails', ['class' => 'img-fluid']); ?></a>
                                </div>
                                <div class="col-md-6">
                                    <div class="sermons-post-details">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <div class="tags-date">
                                            <span class="cat"><i class="fa fa-calendar-o"></i> <?php echo get_the_term_list(get_the_ID(), 'Type', 'Category ', ', ', ''); ?></span></span>
                                            <span class="date"><i class="fa fa-calendar-o"></i> <span><?= get_the_date('M j, Y'); ?></span></span>
                                        </div>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="sermon-item-over">
                                <div class="bg-primary">
                                    <h4><?php the_field('sermon_speaker'); ?></h4>
                                    <span><?php _e('Sermon Speaker', 'sage'); ?></span>
                                </div>
                                <div>
                                    <a href="<?php the_permalink(); ?>" title=""><i class="fa fa-bars"></i> <span><?php _e('Read', 'sage'); ?></span></a>
                                </div>
                                <div class="lightbox">
                                    <a href="" data-toggle="modal" data-target="#youtube" ><i class="fa fa-youtube-play"></i> <span><?php _e('Watch Video', 'sage'); ?></span></a>
                                </div>
                                <div class="lightbox">
                                    <a href="" data-toggle="modal" data-target="#audio_url" ><i class="fa fa-headphones"></i> <span><?php _e('Listen', 'sage'); ?></span></a>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="modal fade" id="youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php the_field('youtube_video'); ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="audio_url" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php the_field('soundcloud_audio'); ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; 
                    // Restore original Post Data
                    wp_reset_postdata();  ?>
                </div>
            </div>

            <div class="text-center mt-5">
                <a class="btn btn-outline-primary" href="<?= esc_url(home_url('/sermon')); ?>"><?php _e('View All Sermons', 'sage'); ?></a>
            </div>
            <!-- end sermon-bottom-area -->
        </div><!-- end sermon-inner -->
    </div>
</section>

<section id="events" >
    <div class="block  col-md-10 ml-auto mr-auto">
        <div class="title-2 mb-5">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/title-2.png" alt="">
            <h6 class="display-4">Our Coming Events</h6>
        </div><!-- end title-2 -->
        <?php 
            $args = ['post_type' => 'event','posts_per_page'=>'1'];
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="conf-event-area">
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
                    <a href="<?= esc_url(home_url('/event')); ?>" class="btn btn-outline-primary"><?php _e('More Events', 'sage'); ?></a>
                </div>
            </div>
        <?php endwhile; 
        // Restore original Post Data
        wp_reset_postdata();  ?>
    </div>
</section>

<section id="books" >
    <div class="block">
        <div class="title-2">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/title-2.png" alt="">
                <h6 class="display-4"><?php _e('Daily Church Devotions', 'sage'); ?></h6>
        </div><!-- end title-2 -->

        <div class="chruch-devotions-inner">
            <div class="row">

                <?php $args = ['post_type' => 'book','posts_per_page'=>'4'];
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="col-md-3">
                        <div class="chruch-devotion">
                            <?php the_post_thumbnail('book-thumbnails', ['class' => 'img-fluid']); ?>
                            <div class="chruch-devotion-over">
                                <!-- <div class="price-sec">
                                    <ins class="d-price">$290.00</ins>
                                    <del class="o-price">$330.00</del>
                                </div> -->
                                <h4><?php the_title(); ?></h4>
                                <span>Limited Adition</span>
                                <!--<a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a> -->
                            </div>
                        </div><!-- end chruch-devotion -->
                    </div><!-- end col-md-4 -->

                <?php endwhile; 
                // Restore original Post Data
                wp_reset_postdata();  ?>

            </div>
        </div>
    </div>
</section>

<!-- <section id="quotes_sermons">
    <div class="row">
        <div class="col">
            <div class="card text-white">
                <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/71940.jpg" alt="Card image cap">
                <div class="card-img-overlay">
                    <blockquote class="blockquote mb-0 card-body">
                        <p class="card-text">Greater love has no one than this: to lay down one’s life for one’s friends.</p>
                        <footer class="blockquote-footer">
                            <small class="">
                                <cite title="Source Title">John 15:13</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white" >
                <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/71940.jpg" alt="Card image cap">
                <div class="card-img-overlay">
                    <blockquote class="blockquote mb-0 card-body">
                        <p class="card-text">A friend loves at all times, and a brother is born for a time of adversity.</p>
                        <footer class="blockquote-footer">
                            <small class="">
                                <cite title="Source Title">Proverbs 17:17</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <div class="card-img-top embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section id="blog" >
    <div class="block">
        <div class="title-2">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/title-2.png" alt="">
            <h6 class="display-4"><?php _e('Church Recent News', 'sage'); ?></h6>
        </div>
        <!-- end title-2 -->

        <div class="row blog-sec-area">

            <?php $args = [ 'posts_per_page' => 3 , 'ignore_sticky_posts' => 1 ]; $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
                <article  <?php post_class('col-md-4'); ?>>
                    <div class="blog-sec-area">
                        <div class="blog-sec-area-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnails', ['class' => 'img-fluid', 'alt' => get_the_title() ]); ?></a>
                            <div class="blog-sec-overlay">
                                <span><?= get_the_date('M j, Y'); ?></span>
                                <span><a href="<?php comments_link(); ?>"><?php comments_number('Leave Comment', '1 Comment', '2 comments'); ?></a></span>
                            </div><!-- end blog-sec-overlay -->
                        </div><!-- end blog-sec-img -->
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!-- end blog-sec-area -->
                </article>

            <?php endwhile; 
            // Restore original Post Data
            wp_reset_postdata(); ?>

        </div>

        <div class="text-center mt-5">
            <a href="<?= esc_url(home_url('/blog')); ?>" class="btn btn-outline-primary"><?php _e('view all posts', 'sage'); ?></h6></a>
        </div>
    </div>
</section>