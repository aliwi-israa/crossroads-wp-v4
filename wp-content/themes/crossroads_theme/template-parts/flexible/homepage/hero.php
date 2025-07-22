<section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden">
  <div class="relative">
    <div class="swiper" id="homeSwiper">
      <div class="swiper-wrapper">
        <?php $slide_count = 0;?>
        <?php if (have_rows('slides')) : while (have_rows('slides')) : the_row();
          $img = get_sub_field('image');
          $heading = get_sub_field('heading');
          $subheading = get_sub_field('sub_heading');
          $page_link = get_sub_field('page_link');
        ?>
          <?php if ($img) : 
            $slide_count++;
            ?>
            <div class="swiper-slide">
              <div class="swiper-inner">
              <?php
              $image_id = $img['id']; // assuming you have the attachment ID
              $image_srcset = wp_get_attachment_image_srcset( $image_id, 'full' );
              $image_sizes  = wp_get_attachment_image_sizes( $image_id, 'full' );
              ?>
              <img 
                src="<?php echo esc_url($img['url']); ?>"
                srcset="<?php echo esc_attr($image_srcset); ?>"
                sizes="<?php echo esc_attr($image_sizes); ?>"
                alt="<?php echo esc_html($subheading); ?>"
                fetchpriority="high"
                decoding="async"
                width="1280"
                height="853"
                loading="eager"
              />
                
                <div class="sw-overlay op-5"></div>
                <div class="gradient-edge-left z-2"></div>
                <div class="abs abs-centered w-100 z-2">
                  <div class="container">
                    <div class="row g-4 align-items-center justify-content-between">
                      <div class="col-lg-6">
                        <div class="spacer-single sm-hide"></div>
                        <?php if ($subheading) : ?>
                          <div class="subtitle intro"><?php echo esc_html($subheading); ?></div>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <?php
                            // Check if it's the first slide
                            if ($slide_count === 1) :
                            ?>
                                <h1 class="hero-heading"><?php echo esc_html($heading); ?></h1>
                            <?php else : ?>
                                <h2 class="hero-heading"><?php echo esc_html($heading); ?></h2>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($page_link) : ?>
                          <a class="btn-main fx-slide menu_side_area m-0" 
                            href="<?php echo esc_url($page_link['url']); ?>" 
                            <?php echo $page_link['target'] ? 'target="' . esc_attr($page_link['target']) . '" rel="noopener"' : ''; ?>>
                            <span><?php echo esc_html($page_link['title']); ?></span>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>
