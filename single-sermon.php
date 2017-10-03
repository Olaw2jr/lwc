<?php
    // get raw date
    $date = get_field('start_time', false, false);

    // make date object
    $date = new DateTime($date);
?>


<section>
    <div class="block">

        <div class="col-md-10 ml-auto mr-auto">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('blog-single'); ?>>
                    <div class="sd-img">
                        <?php the_post_thumbnail('sermon-thumbnail', ['class' => 'img-fluid']); ?>
                        <div class="sd-overlay">
                            <span class="date"><?php _e('Date:', 'sage'); ?>  <time datetime="<?= $date->format('Y-m-d'); ?>"><?= $date->format('M j, Y'); ?></time></span>
                            <span class="event-timing">
                                <?php _e('Time:', 'sage'); ?>  
                                <time datetime="11:00"><?= $date->format('g : i a'); ?></time>
                            </span>
                            <span class="event-loc"><?php _e('Location:', 'sage'); ?>  <?php the_field('sermon_location'); ?></span>
                        </div>
                    </div>
                    <div class="sd-head">
                        <h1><?php the_title(); ?></h1>
                        <div class="sd-head-inner">
                            <div>
                                <i class="fa fa-user-circle-o fa-4" aria-hidden="true"></i>
                                <div class="sd-writer">
                                    <h2><?php the_field('sermon_speaker'); ?></h2>
                                    <span><?php _e('Sermon Speaker', 'sage'); ?></span>
                                </div>
                            </div>
                            <div>
                                <?php $file = get_field('sermon_pdf'); if( $file ): ?>
                                    <a href="<?= $file['url']; ?>"><i class="fa fa-cloud-download"></i><?php _e(' Download', 'sage'); ?></a>
                                <?php endif; ?>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#youtube" ><i class="fa fa-youtube-play"></i><?php _e(' Watch Video', 'sage'); ?></a>
                            </div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#audio_url" ><i class="fa fa-headphones"></i><?php _e(' Listen', 'sage'); ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="entry-content">
                        <?php the_content(); ?>

                        <footer>
                            <?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
                        </footer>
                        <?php //comments_template('/templates/comments.php'); ?>
                    </div>

                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php while (have_posts()) : the_post(); ?>
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
<?php endwhile; ?>

