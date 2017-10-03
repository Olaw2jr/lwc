<?php
/**
 * Template Name: About
 */
?>





<?php get_template_part('templates/page', 'header'); ?>


<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'about'); ?>
<?php endwhile; ?>
