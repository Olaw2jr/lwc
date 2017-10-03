<section>
    <div class="block">
        <div class="col-md-12">
            <div class="about-us-page">
                <div class="chruch-mission">
                    <div class="chruch-mission-top">
                        <div class="title-1">
                            <h4><?php _e('Our Church Mission Is To Ignite', 'sage'); ?> <span><?php the_field( "church_mission" ); ?></span></h4>
                        </div>
                        <p><?php the_field( "short_description" ); ?></p>
                    </div><!-- end chruch-mission-top -->
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="col-md-12">

            <div class="title-2">
                <h4><?php _e('Meet Our Senior Pastors', 'sage'); ?>s</h4>
            </div><!-- end title-2 -->

            <!-- check if the repeater field has rows of data -->
            <?php if( have_rows('pastors_images') ): ?>
                <div class="meet-senior-area">
                    <div class="row">

                    <!-- loop through the rows of data -->
                    <?php while ( have_rows('pastors_images') ) : the_row(); ?>

                        <!-- display a sub field value -->
                        <?php $image = get_sub_field('pastor_image'); ?>
                        <div class="col-md-6">
                            <div class="meet-member">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid center-block">
                                <div class="meet-member-details">
                                    <h3><a href="#"><?php echo $image['caption']; ?></a></h3>
                                    <h5><?php echo $image['title']; ?></h5>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; 

                    else : ?>
                        <!-- no rows found -->
                        <?= 'No Pastors Found!'; ?>
                    </div>
                </div>                 
            <?php endif; ?>

        </div>
    </div>
</section>
