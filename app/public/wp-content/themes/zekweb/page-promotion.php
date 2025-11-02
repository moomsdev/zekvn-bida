<?php
/*
 Template Name: Khuyến mãi
 */
?>
<?php get_header(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body page-contact">
        <div class="container">
            <h1 class="page-title"><?php the_title();?></h1>
            <div class="page-content">
                <div class="promotion-list">
                    <?php 
                    $promotion = get_field('promotion');
                    if($promotion) :
                        foreach($promotion as $item) :
                        ?>
                            <div class="promotion-item">
                                <a href="<?php echo $item['url']; ?>" class="promotion-item-link">
                                    <figure class="promotion-item-image">
                                        <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                                    </figure>
                                    <h3 class="promotion-item-title"><?php echo $item['title']; ?></h3>
                                </a>
                            </div>
                        <?php
                        endforeach;
                    endif; ?>
                </div>

                <section class="promotion-form">
                    <div class="inner">
                        <h2 class="promotion-form-title">Nhận mã giảm giá</h2>
                        <div class="promotion-form-desc"><?php the_content(); ?></div>
                        <div class="time-countdown">
                            <div class="time-item">
                                <span class="time-value">00</span>
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
                        </div>

                        <?php echo do_shortcode('[contact-form-7 id="e87fd6b" title="Nhận thông tin khuyến mãi"]'); ?>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>