<?php
return [
  'title'       => __('Content Block (Image Left + Dual CTA Buttons)', 'crossroads_theme'),
  'slug'        => 'crossroads_theme/content-block-image-left-dual-cta',
  'categories'  => ['custom'],
  'keywords'    => ['content', 'image left', 'text', 'cta', 'dual buttons'],
  'description' => __('A two-column section with image and text, plus two CTA buttons side by side.', 'crossroads_theme'),
  'content'     =>
    '<!-- wp:group {"tagName":"section","className":"container"} -->
    <section class="wp-block-group container">
      <!-- wp:group {"tagName":"section","layout":{"type":"constrained"}} -->
      <div class="wp-block-group">
        <!-- wp:columns -->
        <div class="wp-block-columns">

          <!-- wp:column -->
          <div class="wp-block-column">
            <!-- wp:group {"className":"rounded-1 overflow-hidden wow zoomIn image-container animated"} -->
            <div class="wp-block-group rounded-1 overflow-hidden wow zoomIn image-container animated">
                <!-- wp:image {"sizeSlug":"large","className":"w-100 wow scaleIn responsive-img"} -->
                <figure class="wp-block-image size-large w-100 wow scaleIn responsive-img">
                    <img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder.webp" alt="Why Choose Crossroads Dental Clinic" />
                </figure>
                <!-- /wp:image -->
                  </div>
              <!-- /wp:group -->

              </div>
              <!-- /wp:column -->



          <!-- wp:column -->
          <div class="wp-block-column">

            <!-- wp:paragraph {"className":"subtitle s2"} -->
            <p class="subtitle s2 mb-3 wow fadeInUp animated">About Crossroads Dental</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading -->
            <h2 class="wow fadeInUp animated">Your trusted dental care partner in the heart of Toronto.</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p class="wow fadeInUp animated">Located at the crossroads of Dundas Street West and Bloor Street West, Crossroads Dental is where clarity, comfort, and clinical excellence meet. We believe every smile tells a story, and we’re here to help yours shine. Proudly serving the diverse and vibrant Toronto community...</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons cta-btns mt-auto">
              <!-- wp:button {"className":"is-style-fill"} -->
              <div class="wp-block-button is-style-fill">
                <a class="wp-block-button__link" href="https://akitu.io/hPu3g" target="_blank" rel="noopener"><span>Book Appointment</span></a>
              </div>
              <!-- /wp:button -->
              <!-- wp:button {"className":"is-style-fill"} -->
              <div class="wp-block-button secondary is-style-fill">
                <a class="wp-block-button__link" href="tel:(416) 623-8443" target="_blank" rel="noopener"><span>Call Us</span></a>
              </div>
              <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

          </div>
          <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
      </div>
      <!-- /wp:group -->
    </section>
    <!-- /wp:group -->',
];
