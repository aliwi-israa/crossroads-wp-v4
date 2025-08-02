<?php
/**
 * Template Name: Landing Page
 * Description: A landing page template with a simplified header and minified footer.
 */

$booking_link = get_field('booking_link', 'option') ?: '#';
$phone = get_field('phone_number', 'option') ?: '(123) 456-7890';
$logo_main_url = get_field('logo_main_url', 'option') ?: get_template_directory_uri() . '/assets/images/crosroads-dental-clinic-logo-white.webp';
$logo_scroll_url = get_field('logo_scroll_url', 'option') ?: get_template_directory_uri() . '/assets/images/crosroads-dental-clinic-logo.webp';
$logo_mobile_url = get_field('logo_mobile_url', 'option') ?: get_template_directory_uri() . '/assets/images/crosroads-dental-clinic-logo-white.webp';

$bar = wp_strip_all_tags( get_the_content() );
if ( empty( $bar ) ) {
    $bar = 'We accept all major government dental programs—walk in or book today.'; // Fallback text
}

$bar_color = ''; 
$current_page_title = get_the_title(); 

if ( $current_page_title === 'Dental Emergencies' ) {
    $bar_color = 'bar-red';
    $text_color = 'white';
} else {
    $bar_color = 'bar-gray';
    $text_color = 'green';
}

$social_links = [
    ['name' => "Facebook", 'icon_class' => "fab fa-facebook-f", 'url' => get_field('facebook', 'option')],
    ['name' => "X (Twitter)", 'icon_class' => "fab fa-twitter", 'url' => get_field('x', 'option')],
    ['name' => "Instagram", 'icon_class' => "fab fa-instagram", 'url' => get_field('instagram', 'option')],
    ['name' => "YouTube", 'icon_class' => "fab fa-youtube", 'url' => get_field('youtube', 'option')],
    ['name' => "WhatsApp", 'icon_class' => "fab fa-whatsapp", 'url' => get_field('whatsapp', 'option')],
    ['name' => "TikTok", 'icon_class' => "fab fa-tiktok", 'url' => get_field('tiktok', 'option') ?: "#"],
    ['name' => "LinkedIn", 'icon_class' => "fab fa-linkedin-in", 'url' => get_field('linkedin', 'option')],
];

$address = get_field('address', 'option') ?: '123 Main Street, Anytown, CA';
$google_maps_url = 'https://www.google.com/maps/search/' . urlencode($address);

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KRGCBRB8');</script>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRGCBRB8"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <a id="back-to-top" aria-label="Back to Top">
            <span class="sr-only">Back to Top</span>
        </a>

        <div id="de-loader"></div>

        <header class="transparent scroll-light">
            <?php get_template_part('template-parts/bar'); ?>

            <div class="container p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10 wrapper">

                            <div class="de-flex-col">
                                <div id="logo">
                                    <a href="<?php echo home_url(); ?>">
                                        <img class="logo-main" src="<?php echo esc_url($logo_main_url); ?>" alt="Logo" width="265" height="76" fetchpriority="high" loading="eager">
                                        <img class="logo-scroll" src="<?php echo esc_url($logo_scroll_url); ?>" alt="Logo Scroll" width="265" height="76">
                                        <img class="logo-mobile" src="<?php echo esc_url($logo_mobile_url); ?>" alt="Logo Mobile" width="265" height="76">
                                    </a>
                                </div>
                            </div>

                            <div class="de-flex-col">
                                <div class="menu_side_area d-flex gap-3 align-items-center">
                                    <a href="<?php echo esc_url($booking_link); ?>" class="btn-main fx-slide">
                                        <span>Book Appointment</span>
                                    </a>
                                    <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-main fx-slide btn-outline-white">
                                        <span>Call: <?php echo esc_html($phone); ?></span>
                                    </a>
                                    <div class="d-flex d-md-none mobile-cta">
                                        <a href="<?php echo esc_url($booking_link); ?>" class="btn-cta-green" aria-label="Book Appointment">
                                            <i class="fs-30 id-color fa-solid fas fa-calendar-alt"></i>
                                        </a>
                                        <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-cta-blue" aria-label="Call Us">
                                            <i class="fs-30 id-color fa-solid fa-phone"></i>
                                        </a>
                                    </div>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="loader">
            <div class="spinner"></div>
        </div>

        <div id="page" class="font-inter antialiased text-gray-800" style="padding-top:100px;">
            <main>
                <?php the_content(); ?>
                <?php get_template_part('partials/faqs'); ?>

                <section class="m-0 p-0">
                    <?php
                    $address = get_field('address', 'option');

                    if ($address) :
                        $encoded_address = urlencode($address);
                        ?>
                        <iframe
                            src="https://www.google.com/maps?q=<?php echo $encoded_address; ?>&output=embed"
                            width="100%"
                            height="500"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    <?php endif; ?>
                </section>
            </main>

            <footer class="section-dark pt-5">
                <div class="container text-center">
                    <div class="social-icons mb-4">
                        <?php foreach ($social_links as $link): ?>
                            <?php if ($link['url']): ?>
                            <a href="<?php echo esc_url($link['url']); ?>" target="_blank" aria-label="<?php echo esc_attr($link['name']); ?>">
                                <i class="<?php echo esc_attr($link['icon_class']); ?>"></i>
                            </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="subfooter mt-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="de-flex d-md-flex justify-content-center">
                                    <div class="de-flex-col">
                                    <?php
                                    $name = get_field('name', 'option');
                                    echo 'Designed with a smile © ' . esc_html($name). '. All Rights Reserved';
                                    ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script>
            window.addEventListener('load', () => {
                const loader = document.getElementById('loader');
                if (loader) {
                    loader.style.display = 'none';
                }
            });
              document.querySelectorAll('.wp-block-button__link').forEach(btn => {
                btn.setAttribute('data-hover', btn.textContent.trim());
            });
        </script>
        <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>
