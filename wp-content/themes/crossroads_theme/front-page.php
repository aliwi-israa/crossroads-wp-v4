<?php get_header(); ?>
<?php $home_id = get_option('page_on_front'); ?>
<div id="wrapper">
  <div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <?php if (have_rows('flexible_content_home')): ?>
      <?php while (have_rows('flexible_content_home')): the_row(); ?>

        <?php if (get_row_layout() === 'hp_hero'): ?>
          <?php get_template_part('template-parts/flexible/homepage/hero'); ?>
        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows('flexible_content_home')): ?>
      <?php while (have_rows('flexible_content_home')): the_row(); ?>

        <?php if (get_row_layout() === 'hp_info_block'): ?>
          <?php get_template_part('template-parts/flexible/homepage/info-block'); ?>
        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>
    <?php if (have_rows('flexible_content_home')): ?>
      <?php while (have_rows('flexible_content_home')): the_row(); ?>

        <?php if (get_row_layout() === 'content_block'): ?>
          <?php get_template_part('template-parts/flexible/homepage/content-block'); ?>
        <?php endif; ?>

        <?php if (get_row_layout() === 'services_block'): ?>
          <?php get_template_part('template-parts/flexible/homepage/services-block'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() === 'team_block'): ?>
          <?php get_template_part('template-parts/flexible/homepage/team-block'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() === 'faqs'): ?>
          <?php get_template_part('template-parts/flexible/homepage/faqs'); ?>
        <?php endif; ?>  
        <?php if (get_row_layout() === 'cta_banner'): ?>
          <?php get_template_part('template-parts/flexible/homepage/cta-banner'); ?>
        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('#homeSwiper', {
      loop: false,
      autoplay: { delay: 5000 },
      slidesPerView: 1,
      effect: 'slide',
      pagination: { el: '.swiper-pagination', clickable: true }
    });
  });
</script>

<?php get_footer(); ?>