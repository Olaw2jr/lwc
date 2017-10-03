<?php
/**
 * Template Name: Events
 */
?>

<?php get_template_part('templates/page', 'header'); ?>

<section>
    <div class="block">
        <div class="event-style col-md-10 ml-auto mr-auto">

          <?php $args = array('post_type' => 'event','posts_per_page'=>'6');
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php get_template_part('templates/content', 'events'); ?>
          <?php endwhile; ?>

        </div><!-- end event-style1-->

        <nav class="mt-5" aria-label="Page navigation">
          <?php pagination(); ?>
        </nav>
        
    </div>
</section>
