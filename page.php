<?php get_template_part('templates/page', 'header'); ?>

<div class="mb-5">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', 'page'); ?>
    <?php endwhile; ?>
</div>
