<?php
    $phone = get_field('ClinicPhoneNumber', 'option') ?: '(+1) 234-5678';
    $email = get_field('ClinicEmail', 'option') ?: 'info@crossroadsdental.ca';
    $info_label = get_sub_field('info_label');
?>
<section class="bg-dark text-light pt-50 pb-30 slider">
    <div class="container relative slider-contact">
        <div class="row g-4 grid-divider slider-contact">
            <div class="col-lg-4 col-md-6 mb-sm-30 wrapper">
                <div class="d-flex align-items-center icons">
                    <i class="id-color fa-solid fa-phone fs-1 fs-md-2 fs-lg-3"></i>
                    <div class="ms-3 text">
                        <h2 class="mb-0"><?php echo esc_html($info_label ?: 'Need Dental Assistance?'); ?></h2>
                        <p><a href="tel:<?php echo esc_attr($phone); ?>">Call:
                                <?php echo esc_html($phone); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-sm-30 wrapper office-hours-block">
                <div class="d-flex align-items-center icons">
                    <i class="id-color fa-solid fa-clock fs-1 fs-md-2 fs-lg-3"></i>
                    <div class="ms-3 text">
                        <h2 class="mb-0">Opening Hours</h2>
                            <?php
                                $office_hours = get_field('office_hours', 'option');
                                echo '<p>'.$office_hours.'</p>';
                            ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-sm-30 wrapper">
                <div class="d-flex align-items-center icons">
                    <i class="id-color fa fa-envelope fs-1 fs-md-2 fs-lg-3"></i>
                    <div class="ms-3 text">
                        <h2 class="mb-0">Email Us</h2>
                        <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>