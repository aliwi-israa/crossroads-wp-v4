<?php
get_header();

// Get the current term object
$term = get_queried_object();
$top_level_term = $term;

// Walk up to the top-level parent term
while ($top_level_term->parent != 0) {
    $top_level_term = get_term($top_level_term->parent, 'service-category');
}

// Pass the top-level term to the hero template
$passed_top_level_term = $top_level_term;
?>


<div id="wrapper">
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <?php get_template_part('partials/hero-archive'); ?>
        <section class="pb-0">
            <div class="container mb-4">
              <div class="row services-container">
                <?php get_template_part('partials/sidebar-services'); ?>

                <div class="col-md-9 main-content">
                    <?php
                    $term = get_queried_object();
                    if (have_rows('flexible_content_category', $term)) :
                        while (have_rows('flexible_content_category', $term)) : the_row();
                        $title       = get_sub_field('title');
                        $intro       = get_sub_field('intro');
                        $video_title = get_sub_field('video_title');
                        $video_url   = get_sub_field('video_url');
                        $layout      = get_row_layout();

                        // Render the content block WITHOUT wrapping .main-content a second time
                        if ($layout === 'category_content_block') {
                            include get_template_directory() . '/template-parts/flexible/category-content-block.php';
                        }

                        endwhile;
                    endif;?>
                    <?php
                    $faq_posts = get_field('services_faqs'); // Returns array of post objects (FAQ posts)
                    if (!empty($faq_posts)) :
                    ?>
                    <section class="bg-light faq-list" style="background-size: cover; background-repeat: no-repeat;">
                    <div class="container" style="background-size: cover; background-repeat: no-repeat;">
                        <div class="row g-4" style="background-size: cover; background-repeat: no-repeat;">
                        <div class="col-lg-5" style="background-size: cover; background-repeat: no-repeat;">
                            <div class="subtitle id-color wow fadeInUp animated" data-wow-delay=".0s" style="background-size: cover; background-repeat: no-repeat; visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                            Everything You Need to Know
                            </div>
                            <h2 class="wow fadeInUp animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            Frequently Asked Questions
                            </h2>
                        </div>
                        <div class="col-lg-7" style="background-size: cover; background-repeat: no-repeat;">
                            <div class="accordion s2 wow fadeInUp animated" style="background-size: cover; background-repeat: no-repeat; visibility: visible; animation-name: fadeInUp;">
                            <div class="accordion-section" style="background-size: cover; background-repeat: no-repeat;">
                                <?php
                                $i = 1;
                                foreach ($faq_posts as $faq) :
                                $faq_id = $faq->ID;
                                $faq_question = get_the_title($faq_id);
                                $faq_answer = get_the_content(null, false, $faq_id);
                                $accordion_id = 'accordion-f' . $i;
                                ?>
                                <div class="accordion-section-title" data-tab="#<?php echo esc_attr($accordion_id); ?>" style="background-size: cover; background-repeat: no-repeat;">
                                    <?php echo $i . '. ' . esc_html($faq_question); ?>
                                </div>
                                <div class="accordion-section-content" id="<?php echo esc_attr($accordion_id); ?>" style="background-size: cover; background-repeat: no-repeat;">
                                    <?php echo wp_kses_post($faq_answer); ?>
                                </div>
                                <?php
                                $i++;
                                endforeach;
                                ?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </section>
                    <?php endif; ?>
                </div>
              </div>
            </div>
        </section>
        <?php
        if (wp_is_mobile()) {
            get_template_part('partials/contact-form-mobile');
        }
        get_template_part('partials/banner-section'); 
      ?>
    </div>
</div>
<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
<?php get_footer(); ?>
