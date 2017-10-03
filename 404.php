<?php get_template_part('templates/page', 'header'); ?>

<section>
    <div class="block">
        <div class="row">
            <div class="col-md-12">
                <div class="error-page paddlr100">
                    <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/404-bg.jpg" alt="">
                    <div class="error-page-inner">
                        <h4>4<span>0</span>4</h4>
                        <strong><?php _e('Ooops, This Page Not Found!', 'sage'); ?></strong>
                        <span><?php _e('The Link Might Be Corrupted', 'sage'); ?></span>
                        <i><?php _e('or the page may Have been Removed.', 'sage'); ?></i>
                        <a href="<?= esc_url(home_url('/')); ?>" class="btn btn-outline-primary"><?php _e('Go Back Home', 'sage'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
