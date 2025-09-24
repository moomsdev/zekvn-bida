<!-- <footer id="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="footer-logo">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                        <img src="<?php the_field('logo','option') ?>" alt="<?php bloginfo('name');?>">
                    </a>
                </div>

                <div class="info">
                    <p><strong>Địa chỉ:</strong> <?php the_field('address','option') ?></p>
                    <p><strong>Hotline:</strong> <?php the_field('hotline','option') ?></p>
                    <p><strong>Email:</strong> <?php the_field('email','option') ?></p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <h3 class="menu-title">Menu</h3>
                <div class="footer-menu">
                    <?php wp_nav_menu( array( 'container' => '','theme_location' => 'footer','menu_class' => 'menu' ) ); ?>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <h3 class="menu-title">Useful</h3>
                <div class="footer-menu">
                    <?php wp_nav_menu( array( 'container' => '','theme_location' => 'footer_usefull','menu_class' => 'menu' ) ); ?>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>Copyright © 2025 <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer> -->
<footer class="footer bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 item">
                <div class="footer-title">
                    <h6 class="fw-bold mb-3">
                        QUANG HUY BILLIARDS – Nhà sản xuất, phân phối, lắp đặt setup vận hành CLB Bida chuyên nghiệp.
                    </h6>
                    <p><strong>Văn phòng 1:</strong> P1 Pavilion, Vinhomes Ocean Park, Gia Lâm, Hà Nội.</p>
                    <p><strong>Văn phòng 2:</strong> Như Quỳnh, Văn Lâm, Hưng Yên.</p>
                    <p><strong>Văn phòng 3:</strong> Tam Sơn, Tân Định, Lạng Giang, Bắc Giang.</p>
                    <p><strong>Xưởng sản xuất, kho & Showroom:</strong> Thôn Mụ, Lạc Đạo, Văn Lâm, Hưng Yên.</p>
                    <p><strong>Văn phòng & kho hàng phía Nam:</strong> 18 Phan Văn Trị, P.10, Q.Gò Vấp, TP.HCM.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 item">
                <h6 class="fw-bold mb-3">CHÍNH SÁCH</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Chính sách vận chuyển</a></li>
                    <li><a href="#">Chính sách bảo hành</a></li>
                    <li><a href="#">Chính sách mua hàng</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 col-lg-3 item">
                <h6 class="fw-bold mb-3">THÔNG TIN</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Khuyến mãi</a></li>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Tin tức sự kiện</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 col-lg-3 item">
                <h6 class="fw-bold mb-3">KẾT NỐI VỚI CHÚNG TÔI</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Youtube</a></li>
                    <li><a href="#">TikTok</a></li>
                    <li><a href="#">Zalo</a></li>
                </ul>
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
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/select2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/custom.js?v=<?php echo time();?>"></script>
<?php $value = get_field( 'code_footer','option' ); echo $value?>
<?php wp_footer(); ?>
</div>
</body>

</html>
