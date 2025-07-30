<!-- FAQ Section -->
<?php
$faqs = get_field('faqs'); 
$booking_link = get_field('booking_link', 'option') ?: '#';
$phone = get_field('phone_number', 'option') ?: '(123) 456-7890';
if ($faqs) :
?>
    <section>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5 d-flex flex-column">
                    <div>
                        <div class="subtitle id-color wow fadeInUp" data-wow-delay=".0s">Everything You Need to Know</div>
                            <h2 class="wow fadeInUp text-wrap-normal" data-wow-delay=".2s">Frequently Asked Questions</h2>
                        </div>
                        <div class="mt-auto d-lg-block d-none">
                            <a class="btn-main fx-slide" href="<?php echo esc_url($booking_link); ?>" target="_blank" rel="noopener">
                                <span>Book Appointment</span>
                            </a>
                            <a class="btn-main fx-slide btn-outline-white" href="tel:<?php echo esc_attr($phone); ?>">
                                <span>Call Us: <?php echo esc_html($phone); ?></span>
                            </a>
                        </div>
                    </div>
                <div class="col-lg-7">
                    <div class="accordion s2 wow fadeInUp">
                        <div class="accordion-section">

                            <?php 
                            $count = 0;
                            global $post;
                            $original_post = $post; 
                            foreach ($faqs as $faq_post_object) :
                                if ($count >= 5) break;
                                $count++;
                                $post = $faq_post_object;
                                setup_postdata($post);
                            ?>
                                <div class="accordion-section-title" data-tab="#accordion-<?php echo $count; ?>">
                                    <?php 
                                    the_title(); 
                                    ?>
                                </div>
                                <div class="accordion-section-content" id="accordion-<?php echo $count; ?>">
                                    <?php 
                                    the_content(); 
                                    ?>
                                </div>
                            <?php endforeach; ?>
                            
                            <?php 
                            $post = $original_post;
                            wp_reset_postdata(); 
                            ?>
                        </div>
                    </div>
                    <?php if (count($faqs) > 5) : ?>
                        <div class="mt-4">
                            <a href="<?php echo get_post_type_archive_link('faq'); ?>" class="btn-main fx-slide">
                                <span>View More FAQs</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>