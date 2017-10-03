<article  <?php post_class('col-md-4'); ?>>
  <div class="blog-sec-area">
      <div class="blog-sec-area-img">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title() ]); ?></a>
          <div class="blog-sec-overlay">
              <span><?= get_the_date('M j, Y'); ?></span>
              <span><a href="<?php comments_link(); ?>"><?php comments_number('Leave Comment', '1 Comment', '2 comments'); ?></a></span>
          </div><!-- end blog-sec-overlay -->
      </div><!-- end blog-sec-img -->
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </div><!-- end blog-sec-area -->
</article>
