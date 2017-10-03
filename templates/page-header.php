<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <div class="card text-center text-white">
    <img class="card-img" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/blog-bg.jpg" alt="{!! App::title() !!}">
    <div class="card-img-overlay container">
      <div class="Page-title horizontal-title">
        <div>
            <h4><?= Titles\title(); ?></h4>
            <span>Get To Know About GOD</span>
        </div>
        <!-- <img src="<?//= get_stylesheet_directory_uri(); ?>/dist/images/title-2.png" alt=""> -->
        <p><?php //the_excerpt(); ?></p>
      </div>
      <?php breadcrumb(); ?>
    </div>
  </div>
</div>

