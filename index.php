<?php get_template_part('templates/page', 'header'); ?>

<section>
    <div class="block">
        <div class="row">
          <?php if (!have_posts()) : ?>
            <div class="alert alert-warning">
              <?php _e('Sorry, no results were found.', 'sage'); ?>
            </div>
            <?php get_search_form(); ?>
          <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
            <?php endwhile; ?>
        </div>

        <nav class="mt-5" aria-label="Page navigation">
          <?php pagination(); ?>
        </nav>
    </div>
</section>
