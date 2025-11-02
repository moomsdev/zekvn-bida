<footer class="footer g-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_field('logo','option'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                </div>
            </div>

            <div class="col-12 col-lg-4 item">
                <h3 class="footer-title">Về chúng tôi</h3>
                <div class="info-company">
                    <h3 class="company">
                        <?php echo get_field('company','option'); ?>
                    </h3>
                    <div class="branch">
                        <?php $branchs = get_field('branch','option');
                        
                        foreach($branchs as $branch) :
                            echo '<p><strong>'.$branch['title'].'</strong> '.$branch['address'].'</p>';
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 item">
                <div class="info">
                    <h3 class="footer-title">THÔNG TIN</h3>
                    <?php wp_nav_menu( array( 'container' => '','theme_location' => 'footer_usefull','menu_class' => 'list-unstyled' ) ); ?>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 item">
                <div class="info">
                    <h3 class="footer-title">CHÍNH SÁCH</h3>
                    <?php wp_nav_menu( array( 'container' => '','theme_location' => 'footer_policy','menu_class' => 'list-unstyled' ) ); ?>
                </div>

                <h3 class="footer-title">KẾT NỐI VỚI CHÚNG TÔI</h3>
                <ul class="list-unstyled socials">
                    <?php $socials = get_field('socials','option');
                    if($socials) :
                        foreach($socials as $social) :
                            echo '<li><a href="'.$social['url'].'">'.$social['title'].'</a></li>';
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>

        <div class="copyright">
            <div class="content">
                <?php echo get_field('copyright','option'); ?>
            </div>

            <div class="payments">
                <img src="<?php bloginfo('template_url' ); ?>/images/payments.png" alt="payments">
            </div>
        </div>
    </div>
</footer>

<div class="supports">
    <div class="item">
        <a href="tel:<?php the_field('hotline','option'); ?>" class="hotline" title="Gọi ngay">
            <img src="<?php bloginfo('template_url' ); ?>/images/support-hotline.png" alt="icon">
        </a>
    </div>
    <div class="item">
        <a href="http://zalo.me/<?php the_field('zalo','option')?>" target="_blank" class="zalo" title="Chat Zalo">
            <img src="<?php bloginfo('template_url' ); ?>/images/support-zalo.png" alt="icon">
        </a>
    </div>
    <div class="item">
        <a href="https://m.me/<?php the_field('messenger','option') ?>" target="_blank" class="messenger"
            title="Chat Facebook">
            <img decoding="async" src="<?php bloginfo('template_url' ); ?>/images/support-messenger.png" alt="icon">
        </a>
    </div>
</div>
<div class="backtop">
    <a href="#top" id="back-top" title="Back To Top">
        <img src="<?php bloginfo('template_url' ); ?>/images/backtop.png" alt="icon">
    </a>
</div>

<!-- Modal social proof -->
<div id="social-proof-popup" class="custom-popup">
    <img id="popup-avatar" src="" alt="Avatar">
    <div class="popup-content">
        <p class="popup-name" id="popup-name"></p>
        <p class="popup-action" id="popup-action"></p>
        <p class="popup-time" id="popup-time"></p>
    </div>
</div>

<!-- Modal filter mobile -->
<div class="modal fade" id="filter-mobile" tabindex="-1" aria-labelledby="filter-mobile-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php get_template_part('sidebar'); ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal popup homepage -->
<?php
$popup_homepage_img = get_field('popup_homepage_img','option');
$popup_homepage_title = get_field('popup_homepage_title','option');
$popup_homepage_desc = get_field('popup_homepage_desc','option');
?>
<div class="modal fade modal-popup" id="popup-homepage" tabindex="-1" aria-labelledby="popup-homepage-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="body-inner">
                <?php
                if ($popup_homepage_img) :
                    echo '<div class="media">
                        <figure>
                            <img src="' . $popup_homepage_img . '" alt="' . $popup_homepage_title . '" loading="lazy">
                        </figure>
                    </div>';
                endif;
                ?>

                <div class="popup-content">
                    <?php if ($popup_homepage_title) :
                        echo '<h2 class="title">' . $popup_homepage_title . '</h2>';
                    endif;

                    if ($popup_homepage_desc) :
                        echo '<div class="desc">' . $popup_homepage_desc . '</div>';
                    endif;

                    echo do_shortcode('[contact-form-7 id="d4e589b" title="Liên hệ"]');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal product sale -->
<?php
$popup_product_img = get_field('popup_product_img','option');
$popup_product_title = get_field('popup_product_title','option');
$popup_product_desc = get_field('popup_product_desc','option');
$popup_product_time = get_field('popup_product_time','option');
?>
<div class="modal fade modal-popup" id="popup-product-sale" tabindex="-1" aria-labelledby="popup-product-sale-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="body-inner">
                <div class="popup-content">
                    <?php if ($popup_product_title) :
                    echo '<h2 class="title">' . $popup_product_title . '</h2>';
                    endif;
                    
                    if ($popup_product_desc) :
                        echo '<div class="desc">' . apply_filters('the_content', $popup_product_desc) . '</div>';
                    endif;

                    if ($popup_product_time) :
                        echo '<div class="time-countdown">
                                <div class="time-item">
                                    <span class="time-value">' . $popup_product_time . '</span>
                                    <span class="time-label">Ngày</span>
                                </div>

                                <div class="time-item">
                                    <span class="time-value">00</span>
                                    <span class="time-label">Giờ</span>
                                </div>

                                <div class="time-item">
                                    <span class="time-value">00</span>
                                    <span class="time-label">Phút</span>
                                </div>

                                <div class="time-item">
                                    <span class="time-value">00</span>
                                    <span class="time-label">Giây</span>
                                </div>
                            </div>';
                    endif;
                    
                    echo do_shortcode('[contact-form-7 id="e87fd6b" title="Nhận thông tin khuyến mãi"]');
                    ?>
                </div>

                <?php
                if ($popup_product_img) :
                    echo '<div class="media">
                        <figure>
                            <img src="' . $popup_product_img . '" alt="' . $popup_product_title . '" loading="lazy">
                        </figure>
                    </div>';
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal popup register -->
<?php
// $popup_reg_title = get_field('popup_reg_title','option');
// $popup_reg_desc = get_field('popup_reg_desc','option');
// $popup_reg_note = get_field('popup_reg_note','option');
?>
<!-- <div class="modal fade modal-popup" id="popup-register" tabindex="-1" aria-labelledby="popup-register-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="body-inner">
                <div class="popup-content">
                    <?php
                    // if ($popup_reg_title) :
                    // echo '<h2 class="title">' . $popup_product_title . '</h2>';
                    // endif;

                    // if ($popup_reg_desc) :
                    //     echo '<div class="desc">' . apply_filters('the_content', $popup_reg_desc) . '</div>';
                    // endif;

                    // echo do_shortcode('[contact-form-7 id="251e1bd" title="Đăng kí tư vấn"]');

                    // if ($popup_reg_note) :
                    //     echo '<div class="note">' . $popup_reg_note . '</div>';
                    // endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/select2.min.js"></script>
<?php $value = get_field( 'code_footer','option' ); echo $value?>
<?php wp_footer(); ?>
</div>
</body>

</html>
