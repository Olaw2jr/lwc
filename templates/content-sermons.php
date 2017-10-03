<article  <?php post_class('sermon-item mt-5'); ?>>
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">

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
                <?php $file = get_field('sermon_pdf'); if( $file ): ?>
                    <a href="<?= $file['url']; ?>" title="<?= $file['filename']; ?>"><i class="fa fa-bars"></i> <span><?php _e('Read', 'sage'); ?></span></a>
                <?php endif; ?>
            </div>
            <div class="lightbox">
                <a href="#" data-toggle="modal" data-target="#youtube" style="outline: 0px;"><i class="fa fa-youtube-play"></i> <span><?php _e('Watch Video', 'sage'); ?></span></a>
            </div>
            <div class="lightbox">
                <a href="#" data-toggle="modal" data-target="#audio_url" style="outline: 0px;"><i class="fa fa-headphones"></i> <span><?php _e('Listen', 'sage'); ?></span></a>
            </div>
        </div>

        </div>
    </div>
</article><!-- end sermon-item -->


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