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
  <?php
    // Team Member Archive Page
    if (is_post_type_archive('team_member')) {
      ?>
      <title>Our Dental Team | Crossroads Dental Toronto</title>
      <meta name="description" content="Meet the friendly and experienced dental team at Crossroads Dental in Toronto. Providing expert, patient-focused care for smiles of all ages.">
      <!-- Open Graph (Facebook) -->
      <meta property="og:title" content="Our Dental Team | Crossroads Dental Toronto">
      <meta property="og:description" content="Meet the friendly and experienced dental team at Crossroads Dental in Toronto. Providing expert, patient-focused care for smiles of all ages.">
      <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-og.webp">
      <meta property="og:type" content="website">
      <meta property="og:url" content="<?php echo get_post_type_archive_link('team_member'); ?>">
      <!-- Twitter -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Our Dental Team | Crossroads Dental Toronto">
      <meta name="twitter:description" content="Meet the friendly and experienced dental team at Crossroads Dental in Toronto. Providing expert, patient-focused care for smiles of all ages.">
      <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-og.webp">
      <?php
    }

    // FAQ Archive Page
    if (is_post_type_archive('faq')) {
      ?>
      <title>Dental FAQ | Crossroads Dental Toronto</title>
      <meta name="description" content="Have questions? Find answers to the most common dental and clinic questions at Crossroads Dental in Toronto. New patients welcome.">
      <!-- Open Graph (Facebook) -->
      <meta property="og:title" content="Dental FAQ | Crossroads Dental Toronto">
      <meta property="og:description" content="Have questions? Find answers to the most common dental and clinic questions at Crossroads Dental in Toronto. New patients welcome.">
      <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-og.webp">
      <meta property="og:type" content="website">
      <meta property="og:url" content="<?php echo get_post_type_archive_link('faq'); ?>">
      <!-- Twitter -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Dental FAQ | Crossroads Dental Toronto">
      <meta name="twitter:description" content="Have questions? Find answers to the most common dental and clinic questions at Crossroads Dental in Toronto. New patients welcome.">
      <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-og.webp">
      <?php
    }

    // Services Archive Page
    if (is_post_type_archive('service') && !is_tax('service-category')) {
        ?>
      <title>Dental Services | Crossroads Dental Toronto</title>
      <meta name="description" content="Explore expert dental services at Crossroads Dental in Toronto—from preventative care to cosmetic treatments. Your healthier smile starts here.">
      <!-- Open Graph (Facebook) -->
      <meta property="og:title" content="Dental Services | Crossroads Dental Toronto">
      <meta property="og:description" content="Explore expert dental services at Crossroads Dental in Toronto—from preventative care to cosmetic treatments. Your healthier smile starts here.">
      <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-og.webp">
      <meta property="og:type" content="website">
      <meta property="og:url" content="<?php echo get_post_type_archive_link('services'); ?>">
      <!-- Twitter -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Dental Services | Crossroads Dental Toronto">
      <meta name="twitter:description" content="Explore expert dental services at Crossroads Dental in Toronto—from preventative care to cosmetic treatments. Your healthier smile starts here.">
      <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-og.webp">
      <?php
    }
    ?>

</head>
<body <?php body_class(); ?>>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRGCBRB8"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <a href="#" id="back-to-top" aria-label="Back to Top">
      <span class="sr-only">Back to Top</span>
  </a>

  <div id="de-loader"></div>

  <header class="transparent scroll-light">
    <div class="container p-0">
      <div class="row">
        <div class="col-md-12">
          <div class="de-flex sm-pt10 wrapper">

            <div class="de-flex-col">
              <div id="logo">
                <a href="<?php echo home_url(); ?>">
                  <img class="logo-main" src="<?php echo get_template_directory_uri(); ?>/assets/images/crosroads-dental-clinic-logo-white.webp" alt="Logo" width="265" height="76">
                  <img class="logo-scroll" src="<?php echo get_template_directory_uri(); ?>/assets/images/crosroads-dental-clinic-logo.webp" alt="Logo Scroll" width="265" height="76">
                  <img class="logo-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/crosroads-dental-clinic-logo-white.webp" alt="Logo Mobile" width="265" height="76">
                </a>
              </div>
            </div>

            <div class="de-flex-col header-col-mid">
              <?php
              wp_nav_menu([
                'theme_location' => 'main_menu',
                'menu_id'        => 'mainmenu',
                'container'      => false,
                'walker'         => new Custom_Mobile_Menu_Walker(), // Add this line
              ]);
              $phone = get_field('phone_number', 'option');
              $booking_link = get_field('booking_link', 'option');
              ?>
            </div>

            <div class="de-flex-col">
              <div class="menu_side_area d-flex gap-3 align-items-center">
                <a href="<?php echo esc_url($booking_link); ?>" class="btn-main fx-slide">
                  <span>Book Appointment</span>
                </a>
                <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-main fx-slide btn-outline-white">
                  <span>Call: <?php echo esc_attr($phone); ?></span>
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
  <script>
    window.addEventListener('load', () => {
      document.getElementById('loader').style.display = 'none';
    });
  </script>
  <?php wp_footer(); ?>
</body>
</html>