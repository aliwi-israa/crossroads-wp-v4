<?php
/**
 * Template Name: Careers Page
 */
get_header();
?>
<main id="primary" class="site-main">

    <?php get_template_part('partials/hero-archive'); ?>
    <div class="section m-3" style="background-size: cover; background-repeat: no-repeat;">
        <div class="breadcrumbs-wrap" style="background-size: cover; background-repeat: no-repeat;">
            <div class="container" style="background-size: cover; background-repeat: no-repeat;">
            <div class="breadcrumbs" style="background-size: cover; background-repeat: no-repeat;">
                    <ul class="crumb wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li>Careers</li>
                    </ul>
            </div>
            </div>
        </div>
    </div>

        <div class="page-content">
            <div class="section page-content-first">
                <div class="container">
                    <?php get_template_part( 'template-parts/careers', 'page' ); ?>
                </div>
            </div>
        </div>

</main><!-- #main -->

<?php get_footer(); ?>