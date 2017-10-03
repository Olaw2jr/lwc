<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
      <?php
          $sage_logo = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $sage_logo , 'full' );
      ?>
      <img src="<?= $image[0]; ?>" width="auto" height="70" class="d-inline-block align-top" alt="<?php bloginfo('name'); ?>">

      <div class="site-title" ><?= get_bloginfo('name', 'display' ); ?> </div>
      <small class="site-description"><?= get_bloginfo( 'description', 'display' ); ?></small>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#lwcNavbar" aria-controls="lwcNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php 
      if (has_nav_menu('primary_navigation'))
      wp_nav_menu([
          'theme_location'    => 'primary_navigation',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'lwcNavbar',
          'menu_class'        => 'navbar-nav ml-auto',
          'fallback_cb'       => 'Navwalker::fallback',
          'walker'            => new App\Navwalker()
      ])
    ?>
  </div>
</nav>
