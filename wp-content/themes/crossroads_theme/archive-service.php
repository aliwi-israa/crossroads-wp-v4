<?php get_header(); ?>
<?php
$services_title = get_field('services_title', 'option');
$services_description = get_field('services_description', 'option');
?>

<div id="wrapper">
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <?php get_template_part('partials/hero-archive'); ?>
        <?php get_template_part('partials/breadcrumb');?>

        <?php if ($services_title || $services_description): ?>
            <section class="pb-0 intro-section">
                <div class="container">
                    <div class="text-center">
                    <?php if ($services_title): ?>
                        <h2><?php echo esc_html($services_title); ?></h2>
                    <?php endif; ?>

                    <div class="h-decor"></div>

                    <?php if ($services_description): ?>
                        <div class="text-center mt-4">
                        <p><?php echo nl2br(esc_html($services_description)); ?></p>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="jobs-section">
        <div class="container">
            <div class="row justify-content-center prices-carousel js-prices-carousel mt-2" style="row-gap:35px;">

            <?php
            $parent_terms = get_terms([
                'taxonomy'   => 'service-category',
                'parent'     => 0,
                'hide_empty' => false,
                'orderby'    => 'menu_order',
                'order'      => 'ASC',
            ]);

            if (!empty($parent_terms) && !is_wp_error($parent_terms)) :
                foreach ($parent_terms as $term) :
                $term_link = get_term_link($term);
                $term_icon = get_field('service_icon', 'service-category_' . $term->term_id); // ACF image field
                $term_desc = term_description($term->term_id, 'service-category');
                $term_desc = wp_strip_all_tags($term_desc); // Remove <p> tags and others
            ?>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-4">
                <div class="mt-2 border-gray bg-white h-100 p-4 rounded-1 d-flex flex-column"> <!-- Use Bootstrap padding -->

                    <?php if ($term_icon) : ?>
                        <div class="mb-4">
                            <a href="<?php echo esc_url($term_link); ?>">
                                <img class="box-icon" src="<?php echo esc_url($term_icon['url']); ?>"
                                    alt="<?php echo esc_attr($term->name); ?>" width="70" height="79">
                            </a>
                        </div>
                    <?php endif; ?>

                    <h4 class="wow fadeInUp mb-2" data-wow-delay=".2s">
                        <a class="text-blue" href="<?php echo esc_url($term_link); ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    </h4>

                    <!-- Content block that grows to push button down -->
                    <div class="flex-grow-1 d-flex flex-column text-break text-wrap">
                        <?php if (!empty($term_desc)) : ?>
                            <div class="mb-3"><?php echo esc_html($term_desc); ?></div>
                        <?php endif; ?>

                        <?php
                        $child_terms = get_terms([
                            'taxonomy'   => 'service-category',
                            'parent'     => $term->term_id,
                            'hide_empty' => false,
                        ]);

                        if (!empty($child_terms)) :
                        ?>
                            <ul class="ul-check fw-500 mt-2 wow fadeInUp">
                                <?php foreach ($child_terms as $child) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_term_link($child)); ?>">
                                            <?php echo esc_html($child->name); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Button pushed to the bottom -->
                    <a class="btn-plus mt-auto text-blue" href="<?php echo esc_url($term_link); ?>">
                        <i class="fa fa-plus"></i>
                        <span>Read more</span>
                    </a>
                </div>
            </div>

            <?php
                endforeach;
            else :
                echo '<p>No service categories found.</p>';
            endif;
            ?>

            </div>
        </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
