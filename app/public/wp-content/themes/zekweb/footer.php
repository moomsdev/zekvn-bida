<footer class="footer g-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-3 item">
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
            <div class="col-12 col-md-4 col-lg-3 item">
                <h3 class="footer-title">CHÍNH SÁCH</h3>
                <?php wp_nav_menu( array( 'container' => '','theme_location' => 'footer_policy','menu_class' => 'list-unstyled' ) ); ?>
            </div>
            <div class="col-12 col-md-4 col-lg-3 item">
                <h3 class="footer-title">THÔNG TIN</h3>
                <?php wp_nav_menu( array( 'container' => '','theme_location' => 'footer_usefull','menu_class' => 'list-unstyled' ) ); ?>
            </div>
            <div class="col-12 col-md-4 col-lg-3 item">
                <h3 class="footer-title">KẾT NỐI VỚI CHÚNG TÔI</h3>
                <ul class="list-unstyled">
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
            <p>
                <?php echo get_field('copyright','option'); ?>
            </p>
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
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/select2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/custom.js?v=<?php echo time();?>"></script>
<?php $value = get_field( 'code_footer','option' ); echo $value?>
<?php wp_footer(); ?>
</div>
</body>

</html>
