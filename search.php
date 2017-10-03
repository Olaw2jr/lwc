<?php get_template_part('templates/page', 'header'); ?>

<section>
    <div class="block">
        <div class="row">
            <div class="col-md-12">

              <?php if (!have_posts()) : ?>
                <div class="search-found-inner">
                    <h4><?php _e('Nothing Found', 'sage'); ?></h4>
                    <span><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'sage'); ?></span>
                    
                    <?php get_search_form(); ?>
                </div>
              <?php endif; ?>

              <div class="search-found-inner">
                  <h4><?php _e('Nothing Found', 'sage'); ?>Your Search Result <span>'Mori'</span></h4>
                  <span><?php _e('Nothing Found', 'sage'); ?>Vivam pulput vehic Mauris porttitor erovel sapien Sed ut persp voluptatem accusanti ore.</span>
                  
                  <?php get_search_form(); ?>
              </div>

              <div class="blog-page-sec blog-sec">
                  <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                      <?php get_template_part('templates/content', 'search'); ?>
                    <?php endwhile; ?>
                  </div>
              </div>

              <?php //the_posts_navigation(); ?>

            </div>
        </div>
    </div>
</section>