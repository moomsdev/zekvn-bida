<footer id="footer">
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
        <a href="https://m.me/<?php the_field('messenger','option') ?>" target="_blank" class="messenger" title="Chat Facebook">
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