<?php
/**
 * Template Name: Single FAQ Template
 * Template Post Type: faq
 * Description: Displays a single FAQ entry, including the question and answer, with site-wide booking and call options.
 */

get_header(); // Loads the header.php file from your theme.

// Retrieve site-wide ACF fields (assuming these are global options)
$clinic_name  = get_field('ClinicName', 'option');
$booking_link = get_field('ClinicBookingLink', 'option');
$phone        = get_field('ClinicPhoneNumber', 'option');

// Start the WordPress Loop to get the current FAQ post's data
if (have_posts()) :
    while (have_posts()) : the_post();
        // Get the FAQ question (post title)
        $faq_question = get_the_title();
        // Get the FAQ answer (post content)
        $faq_answer   = get_the_content();
?>

<div id="wrapper">
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <?php
        // Include a hero section partial. Adjust 'partials/hero-archive' if you have a specific hero for single posts.
        get_template_part('partials/hero-archive');
        ?>

        <section class="faq-single-section">
            <div class="container mt-6">
                <div class="row justify-content-center wow fadeInUp animated">
                    <div class="col-12 col-lg-8">
                        <div class="faq-content-block mb-4">
                
                            <div class="faq-answer-text wow fadeInUp" data-wow-delay=".4s">
                                <?php
                                echo wp_kses_post($faq_answer);
                                ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center flex-wrap gap-3 mt-5 wow fadeInUp animated" data-wow-delay=".6s">
                            <div class="cta-book">
                                <a href="/faq/" class="btn-main fx-slide btn-outline-white ">
                                    <span>&larr; Back to All FAQs</span>
                                </a>
                            </div>
                            <div class="cta-book">
                                <a class="btn-main fx-slide" href="<?php echo esc_url(home_url()); ?>">
                                    <span>Back to Homepage</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- /#content -->
</div><!-- /#wrapper -->

<?php
    endwhile;
else :
    ?>
    <section>
        <div class="container mt-6 text-center">
            <p>Sorry, no FAQ entry found.</p>
            <p><a href="/faq/" class="btn-secondary fx-slide"><span>&larr; Back to All FAQs</span></a></p>
        </div>
    </section>
<?php
endif; // End of the WordPress Loop

get_footer(); // Loads the footer.php file from your theme.
?>
