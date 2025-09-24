<?php
$bg = get_field('contact_bg','option');
$desc = get_field('contact_desc','option');
?>
<section class="quote-section">
    <div class="container">
        <div class="quote-container">
            <div class="quote-image">
                <img src="<?php echo $bg; ?>" alt="" loading="lazy">
            </div>

            <div class="quote-content">
                <?php
            if($desc) :
                echo apply_filters('the_content', $desc);
            endif;
            ?>

                <div class="quote-form">
                    <?php echo do_shortcode('[contact-form-7 id="d4e589b" title="Liên hệ"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
