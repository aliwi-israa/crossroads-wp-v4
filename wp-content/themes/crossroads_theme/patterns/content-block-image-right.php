<?php
return [
  'title'       => __('Content Block (Image on Right)', 'crossroads_theme'),
  'slug'        => 'crossroads_theme/content-block-image-right',
  'categories'  => ['custom'],
  'keywords'    => ['content', 'image right', 'text', 'cta'],
  'description' => __('A two-column section with content on the left and image on the right.', 'crossroads_theme'),
  'content'     =>
    '<!-- wp:group {"tagName":"section","className":"welcome-section bg-color bg-color-op-1","layout":{"type":"constrained"}} -->
    <section class="wp-block-group welcome-section bg-color bg-color-op-1">
    
      <!-- wp:group {"className":"container"} -->
      <div class="wp-block-group container">
        <!-- wp:columns {"className":"reverse-on-mobile"} -->
        <div class="wp-block-columns reverse-on-mobile">
        
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
            <div class="wp-block-buttons">
              <!-- wp:button {"className":"is-style-fill"} -->
              <div class="wp-block-button is-style-fill">
                <a class="wp-block-button__link" href="https://akitu.io/hPu3g" target="_blank" rel="noopener">Book Appointment</a>
              </div>
              <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
          </div>
          <!-- /wp:column -->

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

        </div>
        <!-- /wp:columns -->
      </div>
      <!-- /wp:group -->
      
    </section>
    <!-- /wp:group -->',
];
