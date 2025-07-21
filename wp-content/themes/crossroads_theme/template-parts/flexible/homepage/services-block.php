<?php 
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$description = get_sub_field('description');
$is_external_link = get_sub_field('is_external_link');
$page_link = get_sub_field('page_link');
$external_link = get_sub_field('external_link');
$button_label = get_sub_field('button_label');
?>

<section class="bg-color-op-1">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8 text-center">

                <?php if ($subtitle) : ?>
                    <div class="subtitle wow fadeInUp mb-3"><?php echo esc_html($subtitle); ?></div>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p class="col-lg-8 offset-lg-2 mb-0 wow fadeInUp"><?php echo esc_html($description); ?></p>
                <?php endif; ?>

                <div class="spacer-single"></div>
                <div class="spacer-half"></div>
            </div>
        </div>

        <div class="row g-4 align-items-stretch">
            <?php 
            $services = get_sub_field('services'); // Post Object field (multi-select)
            if ($services) :
                foreach ($services as $service) :
                    $service_title = get_the_title($service->ID);
                    $service_desc = get_the_excerpt($service->ID);
                    $service_icon = get_field('service_icon', $service->ID); // Assuming this is an image field
                    $service_link = get_permalink($service->ID);
            ?>
            <div class="col-lg-3 col-sm-6 mb-4"> <!-- Add bottom margin to prevent overlap -->
                <div class="hover h-100">
                    <div class="bg-white h-100 p-4 rounded-1 d-flex flex-column"> <!-- Use p-4 instead of custom p-40 -->

                        <?php if ($service_icon) : ?>
                            <img src="<?php echo esc_url($service_icon['url']); ?>"
                                class="mb-3 wow scaleIn"
                                loading="lazy"
                                alt="<?php echo esc_attr($service_title); ?>"
                                width="70" height="70" style="height: auto;">
                        <?php endif; ?>

                        <!-- Content block that grows -->
                        <div class="mt-2 wow fadeInUp flex-grow-1 d-flex flex-column">
                            <?php if ($service_title) : ?>
                                <h3 class="features-headers mb-2"><?php echo esc_html($service_title); ?></h3>
                            <?php endif; ?>

                            <?php if ($service_desc) : ?>
                                <p class="mb-4 text-break text-wrap"><?php echo esc_html($service_desc); ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Button pushed to bottom -->
                        <?php if ($service_link) : ?>
                            <a class="btn-plus text-blue mt-auto" href="<?php echo esc_url($service_link); ?>">
                                <i class="fa fa-plus"></i>
                                <span>Read More</span>
                                <span><?php echo esc_html($button_label); ?></span>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            endif;
            ?>

            <div class="col-lg-12 mt-5 text-center">
                <?php if ($is_external_link && $external_link) : ?>
                    <a class="btn-secondary fx-slide" href="<?php echo esc_url($external_link); ?>"
                        target="_blank" rel="noopener noreferrer">
                        <span><?php echo esc_html($button_label); ?></span>
                    </a>
                <?php elseif (!$is_external_link && $page_link) : ?>
                    <a class="btn-secondary fx-slide" href="<?php echo esc_url(get_permalink($page_link)); ?>">
                        <span><?php echo esc_html($button_label); ?></span>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
