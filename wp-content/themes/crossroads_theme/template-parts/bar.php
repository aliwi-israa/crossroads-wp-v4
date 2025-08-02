<?php
$bar = get_field('bar');
$bar_color = get_field('bar_color');
$text_color = get_field('text_color');
if ($bar) : ?>
    <section class="bar p-2 p-md-3 text-center" style="background-color: <?php echo esc_attr($bar_color); ?>;">
        <div class="container position-relative">
            <div class="row">
                <div class="col-12">
                    <h1 class="h4 mb-0" style="color: <?php echo esc_attr($text_color); ?>;">
                        <?php echo esc_html($bar); ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
