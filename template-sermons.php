<?php
/**
 * Template Name: Sermons
 */
?>

<?php get_template_part('templates/page', 'header'); ?> 

<section>
  <div class="block">
    <div class="sermons-page">

      <?php 
        $args = array('post_type' => 'sermon','posts_per_page'=>'10');
        $loop = new WP_Query( $args );
        $left_num = 0; //Adding a left class to the sermons list
        while ( $loop->have_posts() ) : $loop->the_post();
        // Testing the stupid class
        if($left_num  % 2 == 0){
          $class = 'left';
        } else {
          $class = '';
        }
        get_template_part('templates/content', 'sermons');
        
        $left_num++; 
        endwhile; 
      ?>

      <nav class="mt-5" aria-label="Page navigation">
        <?php pagination(); ?>
      </nav>

    </div>
  </div>
</section>
