<?php
$current_id     = get_the_ID();
$current_url    = trailingslashit($_SERVER['REQUEST_URI']);
$is_service     = is_singular('service');
$current_term   = get_queried_object();
$categories     = get_terms([
    'taxonomy'   => 'service-category',
    'hide_empty' => true,
]);

if (!empty($categories)) :
?>
<div class="col-md d-none d-md-block sidebar">
    <ul class="services-nav flex-column flex-nowrap d-none d-md-block">
        <?php foreach ($categories as $index => $term) :
            $slug       = $term->slug;
            $name       = $term->name;
            $submenu_id = 'submenu' . ($index + 1);

            $child_services = get_posts([
                'post_type'   => 'service',
                'numberposts' => -1,
                'orderby'     => 'menu_order',
                'order'       => 'ASC',
                'tax_query'   => [[
                    'taxonomy' => 'service-category',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ]],
            ]);

            $is_term_page        = is_tax('service-category', $term);
            $has_current_service = $is_service && has_term($term->term_id, 'service-category', $current_id);
            $parent_class = ($is_term_page || $has_current_service) ? 'active-parent' : '';
            $toggle_class = $has_current_service ? 'show' : '';
        ?>
        <li class="nav-item">
            <a class="nav-link parent-category <?php echo $parent_class; ?>"
               href="#<?php echo esc_attr($submenu_id); ?>"
               data-toggle="collapse"
               data-target="#<?php echo esc_attr($submenu_id); ?>"
               aria-expanded="<?php echo $has_current_service ? 'true' : 'false'; ?>">
                <span><?php echo esc_html($name); ?></span>
                <i class="fas fa-chevron-down rotate-icon"></i>
            </a>

            <?php if (!empty($child_services)) : ?>
            <div class="collapse <?php echo $toggle_class; ?>" id="<?php echo esc_attr($submenu_id); ?>">
                <ul class="flex-column nav">
                    <?php foreach ($child_services as $service) :
                        $link   = get_permalink($service);
                        $active = ($is_service && ($service->ID == $current_id || trailingslashit($link) === $current_url)) ? 'active' : '';
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo esc_attr($active); ?>" href="<?php echo esc_url($link); ?>">
                            <i class="fas fa-arrow-right"></i> <?php echo esc_html(get_the_title($service)); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>

        <?php
        // Hardcoded top-level services
        $solo_services = [
            'Invisalign'    => '/services/cosmetic-dentistry/clear-aligners/',
            'Dental Implants' => '/services/general-dentistry/dental-implants/',
            'Emergency Care'  => '/services/emergency-dentistry/',
        ];
        foreach ($solo_services as $label => $path) :
            $active = (trailingslashit($current_url) === trailingslashit($path)) ? 'active' : '';
        ?>
        <li class="nav-item">
            <a class="nav-link <?php echo esc_attr($active); ?>" href="<?php echo esc_url(home_url($path)); ?>">
                <?php echo esc_html($label); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

<?php
if (! wp_is_mobile()) {
    get_template_part('partials/contact-form-desktop');
}
?>

<?php get_template_part('partials/office-hours'); ?>

</div>
<?php endif; ?>
<script>
  // Ensure the script runs after the DOM is fully loaded and jQuery is available
  jQuery(document).ready(function($) {

      // 1. Handle click events for the parent category links to toggle submenus
      // Using event delegation on a static parent (.services-nav) for robustness.
      $('.services-nav').on('click', 'a.parent-category', function(e) {
          // IMPORTANT: Prevent the default anchor link behavior FIRST.
          // This stops the URL from changing to #submenuID and prevents page jumps.
          e.preventDefault();

          var $this = $(this); // Cache the clicked element
          var targetId = $this.data('target'); // Get the ID of the collapse target (e.g., '#submenu1')
          var $targetElement = $(targetId); // Get the actual collapse div

          // Toggle the Bootstrap collapse. This will add/remove the 'show' class and handle animation.
          $targetElement.collapse('toggle');

          // Toggle the icon rotation class directly based on the collapse state.
          // Bootstrap adds 'collapsing' during animation and 'show' when open.
          // We want to rotate when it's open or about to open.
          // We can listen to Bootstrap's events for more precise control.
      });

      // 2. Listen to Bootstrap's collapse events to manage the icon rotation and aria-expanded
      // This ensures the icon state is always in sync with the menu's open/closed state.

      // When a collapse element is shown (opened)
      $('.services-nav .collapse').on('show.bs.collapse', function() {
          var $thisCollapse = $(this);
          // Find the parent link that targets this collapse element
          var $parentLink = $('a[data-target="#' + $thisCollapse.attr('id') + '"]');
          // Add the active class to the parent link and rotate the icon
          $parentLink.addClass('active-parent'); // Ensure parent is active when its submenu is open
          $parentLink.find('.rotate-icon').addClass('fa-rotate-90');
          $parentLink.attr('aria-expanded', 'true'); // Update aria-expanded
      });

      // When a collapse element is hidden (closed)
      $('.services-nav .collapse').on('hide.bs.collapse', function() {
          var $thisCollapse = $(this);
          // Find the parent link that targets this collapse element
          var $parentLink = $('a[data-target="#' + $thisCollapse.attr('id') + '"]');
          // Remove the active class from the parent link and reset icon rotation
          // Only remove active-parent if it's not the currently active page/term
          if (!$parentLink.hasClass('active-parent-initial')) { // Check if it was initially active by PHP
              $parentLink.removeClass('active-parent');
          }
          $parentLink.find('.rotate-icon').removeClass('fa-rotate-90');
          $parentLink.attr('aria-expanded', 'false'); // Update aria-expanded
      });


      // 3. Handle initial state on page load (for menus that are already 'show' from PHP)
      // This ensures icons and aria-expanded are correct when the page first loads.
      $('.services-nav .collapse.show').each(function() {
          var $thisCollapse = $(this);
          var $parentLink = $('a[data-target="#' + $thisCollapse.attr('id') + '"]');

          // Add a temporary class to distinguish PHP-set active parents
          $parentLink.addClass('active-parent-initial');

          // Ensure the icon is rotated for initially open menus
          $parentLink.find('.rotate-icon').addClass('fa-rotate-90');
          // Ensure aria-expanded is true for initially open menus
          $parentLink.attr('aria-expanded', 'true');
      });

      // When a collapse is fully shown (after animation)
      $('.services-nav .collapse').on('shown.bs.collapse', function() {
          var $thisCollapse = $(this);
          var $parentLink = $('a[data-target="#' + $thisCollapse.attr('id') + '"]');
          $parentLink.attr('aria-expanded', 'true');
      });

      // When a collapse is fully hidden (after animation)
      $('.services-nav .collapse').on('hidden.bs.collapse', function() {
          var $thisCollapse = $(this);
          var $parentLink = $('a[data-target="#' + $thisCollapse.attr('id') + '"]');
          $parentLink.attr('aria-expanded', 'false');
      });

  });
</script>