<?php if (get_row_layout() === 'team_block') : ?>
    <?php
    $heading = get_sub_field('heading');
    $subheading = get_sub_field('subheading');
    $description = get_sub_field('description');
    ?>

    <section class="bg-color-op-1 team-block" >
        <div class="container" >
            <div class="row" >
                <div class="col-lg-6 offset-lg-3 text-center" >
                    <?php if ($subheading) : ?>
                        <div class="subtitle wow fadeInUp mb-3"><?php echo esc_html($subheading); ?></div>
                    <?php else : ?>
                        <div class="subtitle wow fadeInUp mb-3">Meet Our Dental Team</div>
                    <?php endif; ?>

                    <?php if ($heading) : ?>
                        <h2 class="wow fadeInUp" data-wow-delay=".2s"><?php echo esc_html($heading); ?></h2>
                    <?php else : ?>
                        <h2 class="wow fadeInUp" data-wow-delay=".2s">Committed to Your Smile</h2>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <p class="wow fadeInUp"><?php echo esc_html($description); ?></p>
                    <?php else : ?>
                        <p class="wow fadeInUp">Our experienced dental team is here to make every visit positive and personalized. With gentle hands and caring hearts.</p>
                    <?php endif; ?>

                    <div class="spacer-single"></div>
                </div>
            </div>

            <div class="row g-4" >
                <?php
                $team_query = new WP_Query(array(
                    'post_type'      => 'team_member',
                    'posts_per_page' => 4, // Adjust as needed
                    'orderby'        => 'menu_order', // Use 'menu_order' for manual sorting, 'title' or 'date' otherwise
                    'order'          => 'ASC',
                    'post_status'    => 'publish', // Ensure only published posts are retrieved
                    'no_found_rows'  => true, // More efficient if not using pagination
                ));

                if ($team_query->have_posts()) :
                    while ($team_query->have_posts()) : $team_query->the_post();

                        $dentist_details_group = get_field('dentist_details');

                        $job_title = '';
                        if (is_array($dentist_details_group) && isset($dentist_details_group['job_title'])) {
                            $job_title = $dentist_details_group['job_title'];
                        }
                        $job_title    = get_field('job_title');

                        $permalink = get_permalink();
                        $team_member_title = get_the_title(); // Get the post title (dentist's name)

                        $feat_image_url_small = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // Typically 300px width
                        $feat_image_url_medium = get_the_post_thumbnail_url(get_the_ID(), 'large');  // Typically 1024px width
                        $feat_image_url_large = get_the_post_thumbnail_url(get_the_ID(), 'full');   // Original uploaded size

                        ?>
                        <div class="col-lg-3 col-md-6" >
                            <a href="<?php echo esc_url($permalink); ?>" class="d-block text-decoration-none text-dark" aria-label="<?php echo esc_html($team_member_title); ?>">
                                <div class="relative rounded-1 overflow-hidden h-100" >
                                    <div class="rounded-1 overflow-hidden wow fadeIn zoomIn doctors-imgs" >
                                        <?php if (has_post_thumbnail()) : // Check if a featured image is set ?>
                                            <picture>
                                                <source srcset="<?php echo esc_url($feat_image_url_small); ?>" media="(max-width: 600px)">
                                                <source srcset="<?php echo esc_url($feat_image_url_medium); ?>" media="(max-width: 992px)">
                                                <img src="<?php echo esc_url($feat_image_url_large); ?>" class="w-100 wow scaleIn" loading="lazy" alt="<?php echo esc_attr($team_member_title); ?>" width="1280" height="auto" style="width: 100%; height: auto;">
                                            </picture>
                                        <?php endif; ?>
                                    </div>

                                    <div class="abs w-100 start-0 bottom-0 z-3" >
                                        <div class="p-2 rounded-10 m-3 text-center bg-white wow fadeInDown" >
                                            <h4 class="mb-0"><?php echo esc_html($team_member_title); ?></h4>
                                            <?php if ($job_title) : ?>
                                                <p class="mb-2"><?php echo esc_html($job_title); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Restore original post data
                endif;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>