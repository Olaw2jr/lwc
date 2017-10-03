<?php
/**
 * Template Name: Contact Page
 */
?>

<?php get_template_part('templates/page', 'header'); ?>

<?php while (have_posts()) : the_post(); ?>
    <section>
        <div class="block">
            <div class="row">
                <div class="col-md-7">
                    <?php 
                        $location = get_field('location_in_google_map');
                        if( !empty($location) ): ?>
                            <div id="lwc-map">
                                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                            </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-5">
                    <div class="contact-map-details">
                        <h4><?php _e('Get in Touch', 'sage'); ?></h4>
                        <?php the_field( "short_contact_info" ); ?>
                        <div class="contact-details-sec">
                            <div class="details">
                                <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <div class="right-area">
                                    <h5><?php _e('Phone Number', 'sage'); ?></h5>
                                    <!-- loop through the rows of data -->
                                    <?php while ( have_rows('phone_number') ) : the_row(); ?>
                                        <span class="number"><?php the_sub_field('first_phone_number'); ?></span>
                                    <?php endwhile; ?>
                                </div>
                            </div><!-- end details -->

                            <div class="details">
                                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <div class="right-area">
                                    <h5><?php _e('eMAIL aDDRESS', 'sage'); ?></h5>
                                    <span class="mail"><?php the_field( "email_address" ); ?></span>
                                </div>
                            </div><!-- end details -->

                            <div class="details">
                                <span><i class="fa fa-home" aria-hidden="true"></i></span>
                                <div class="right-area">
                                    <h5><?php _e('Location', 'sage'); ?></h5>
                                    <span class="loca"><?php the_field( "church_location" ); ?></span>
                                </div>
                            </div><!-- end details -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="title-2 mb-5">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/title-2.png" alt="">
                <h4 class"display-4"><?php _e('Have questions Contact Us', 'sage'); ?></h4>
            </div><!-- end title-2 -->

            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <?php the_field('the_contact_form'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>