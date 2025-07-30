<?php
/**
 * Flexible Layout: content_block with layout toggle based on index
 */
$booking_link = get_field('booking_link', 'option') ?: '#';
$phone = get_field('phone_number', 'option') ?: '(123) 456-7890';
$media_type = get_sub_field('media_type');
$image        = get_sub_field('image');
$video_url = get_sub_field('video_url');
$heading      = get_sub_field('heading');
$subheading   = get_sub_field('subheading');
$description  = get_sub_field('description');
$image_direction = get_sub_field('image_direction');
$row_index = get_row_index(); // 1-based

// Determine layout direction
if (!$image_direction) {
    $image_direction = ($row_index % 2 == 0) ? 'isImgRight' : 'isImgLeft';
}
$section_class = ($row_index % 2 == 0) ? 'bg-color bg-color-op-1' : '';

$row_class = 'row g-4 gx-5 align-items-center';
$row_class .= ($image_direction === 'isImgRight') ? ' flex-row-reverse' : ' flex-row';
?>


<?php if ($heading || $subheading || $description || $image): ?>
<section class="<?php echo esc_attr($section_class); ?>">
  <div class="container">
    <div class="<?php echo esc_attr($row_class); ?>">

    <?php
      if ( $media_type === 'Image' && $image ) : ?>

          <div class="col-lg-6">
              <div class="rounded-1 overflow-hidden wow zoomIn image-container">
                  <picture>
                      <source srcset="<?php echo esc_url($image['sizes']['medium']); ?>" media="(max-width: 600px)">
                      <source srcset="<?php echo esc_url($image['sizes']['large']); ?>" media="(max-width: 992px)">
                      <img src="<?php echo esc_url($image['url']); ?>" class="w-100 wow scaleIn responsive-img" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                  </picture>
              </div>
          </div>

      <?php
      elseif ( $media_type === 'Video' && $video_url ) :
      ?>
          <div class="col-lg-6">
              <div class="rounded-1 overflow-hidden wow zoomIn image-container">
                <div class="educational-video single mb-4">
                  <div class="video-container">
                    <div class="video">
                      <?php echo $video_url; ?>
                    </div>
                  </div>
                </div>
            </div>
          </div>

      <?php endif; ?>

      <div class="col-lg-6">
        <div class="ms-lg-3">
          <?php if ($subheading): ?>
            <div class="subtitle s2 mb-3 wow fadeInUp"><?php echo esc_html($subheading); ?></div>
          <?php endif; ?>

          <?php if ($heading): ?>
            <h2 class="wow fadeInUp"><?php echo esc_html($heading); ?></h2>
          <?php endif; ?>

          <?php if ($description): ?>
            <p class="wow fadeInUp"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>
          
          <?php
            if ( get_sub_field('add_emergencies') ) :
              if ( have_rows('emergency') ) :
            ?>
          <div class="accordion s2 wow fadeInUp mb-5">
            <div class="accordion-section">
              <?php
              $emergency_count = 0;
              while ( have_rows('emergency') ) : the_row();
                  $emergency_count++;
                  $item_title = get_sub_field('title');
                  $item_description = get_sub_field('description');
                ?>
                  <div class="accordion-section-title" data-tab="#emergency-accordion-<?php echo $emergency_count; ?>">
                      <?php echo esc_html($item_title); ?>
                  </div>
                  <div class="accordion-section-content" id="emergency-accordion-<?php echo $emergency_count; ?>">
                      <?php echo wp_kses_post($item_description); ?>
                  </div>
              <?php endwhile; ?>
            </div>
          </div>
            <?php
              endif;
            endif;
          ?>
        <div class="cta-btns mt-auto">
            <a class="btn-main fx-slide" href="<?php echo esc_url($booking_link); ?>" target="_blank" rel="noopener">
                <span>Book Appointment</span>
            </a>
            <a class="btn-main fx-slide btn-outline-white" href="tel:<?php echo esc_attr($phone); ?>">
                <span>Call Us: <?php echo esc_html($phone); ?></span>
            </a>
        </div>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>
<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
