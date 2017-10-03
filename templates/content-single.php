<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Blog">
    <?php the_post_thumbnail( 'post-thumbnails', ['class' => 'img-fluid', 'alt' => get_the_title() ]); ?>
    <div class="bs-head">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/title-2.png" alt="" class="img-fluid ">
        <span><i>By </i> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?= get_the_author(); ?>"><?= get_the_author(); ?></a></span>
        <h1 itemprop="headline"><?php the_title(); ?></h1>
        <div class="bs-head-inner">
            <span class="date"><?= get_the_date('M d, Y'); ?></span>
            <span><a href="<?php comments_link(); ?>" title="<?php comments_number('Leave Comment', '1 Comment', '2 Comments'); ?>"><?php comments_number('Leave Comment', '1 Comment', '2 Comments'); ?></a></span>
            <span><i>250</i> views</span>
        </div>
    </div>
    <div class="bs-body">
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </footer>
      <?php comments_template('/templates/comments.php'); ?>
    </div><!-- end bs-body -->
  </article>
<?php endwhile; ?>
