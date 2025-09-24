<?php
/*
 Template Name: Trang chủ
 */
?>
<?php get_header(); ?>
<main id="main">
    <!-- Banner -->
    <?php
    $banner = get_field('banner_bg','option');
    $banner_title = get_field('banner_title','option');
    $banner_desc = get_field('banner_desc','option');
    $banner_url = get_field('banner_url','option');

    ?>
    <section class="banner">
        <div class="banner-inner"
            style="background-image: url(<?php echo $banner; ?>);">
            <div class="banner-content">
                <?php
                if($banner_title) :
                    echo '<h2>'.$banner_title.'</h2>';
                endif;

                if ($banner_desc):
                    echo '<div class="banner-desc">' . apply_filters('the_content', $banner_desc) . '</div>';
                endif;

                if($banner_url) :
                    $url= $banner_url['url'] ? $banner_url['url'] : '#';
                    $title = $banner_url['title'] ? $banner_url['title'] : 'Vào cửa hàng';
                    $target = $banner_url['target'] ? $banner_url['target'] : '_self';

                    echo '<a href="'.$url.'" target="'.$target.'">'.$title.'</a>';
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- End Banner -->

    <!-- Service -->
    <?php
    $services = get_field('services','option');
    ?>
    <section class="blog">
        <div class="container">
            <div class="row g-4">
                <?php
                if($services) :
                    foreach($services as $service) :
                        $background = $service['background'];
                        $title = $service['title'];
                        $desc = $service['desc'];
                        $url = $service['url'];
                    ?>
                    <div class="col-md-4">
                        <div class="service-card"
                            style="background-image: url(<?php echo $background; ?>);">
                            <div class="cart-content">
                                <?php
                                if($title) :
                                    echo '<h2>'.$title.'</h2>';
                                endif; 
                                
                                if($desc) :
                                    echo apply_filters('the_content', $desc);
                                endif;

                                if($url) :
                                    $url_link = $url['url'] ? $url['url'] : '#';
                                    $title = $url['title'] ? $url['title'] : 'XEM NGAY';
                                    $target = $url['target'] ? $url['target'] : '_self';

                                    echo '<a href="'.$url_link.'" target="'.$target.'">'.$title.'</a>';
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- End Service -->

    <!-- Latest Product -->
    <?php
    $latest_prd_title = get_field('latest_prd_title','option');
    $latest_prd_subtitle = get_field('latest_prd_subtitle','option');
    $latest_prd_desc = get_field('latest_prd_desc','option');
    $latest_prd_list = get_field('latest_prd_list','option');
    ?>
    <section class="product">
        <div class="section-header text-center">
            <?php
            if($latest_prd_title) :
                echo '<h2 class="title">'.$latest_prd_title.'</h2>';
            endif;


            if($latest_prd_subtitle) :
                echo '<p>'.$latest_prd_subtitle.'</p>';
            endif;
            ?>
        </div>

        <div class="container">
        <?php
        if($latest_prd_list) :
            foreach($latest_prd_list as $prd) :
                $desc = $prd['desc'];
                $products = $prd['products'];
                ?>
                <div class="latest-prd-list">
                    <?php
                    if($desc) :
                        echo '<h3 class="subtitle">'.apply_filters('the_content', $desc).'</h3>';
                    endif;
                    ?>

                    <div class="swiper swiper-product-5 cart-products">
                        <div class="swiper-wrapper">
                        <?php
                        if($products) :
                            foreach($products as $item) :
                                $img = get_the_post_thumbnail_url($item);
                                $title = get_the_title($item);
                                // get price woocommerce product
                                $product = wc_get_product($item);
                                $price = $product ? $product->get_price_html() : '';
                            ?>
                                <div class="swiper-slide">
                                    <div class="product-card">
                                        <img src="<?php echo $img; ?>"
                                            alt="<?php echo $title; ?>" class="img-fluid" title="<?php echo $title; ?>" loading="lazy">
                                        <h4 class="product-title"><?php echo $title; ?></h4>
                                        <div class="price"><?php echo $price; ?></div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        endif;
                        ?>
                        </div>
                        <div class="banner-pagination"></div>
                    </div>
                </div>

                <?php
            endforeach;
        endif;
        ?>
        </div>
    </section>
    <!-- End Latest Product -->

    <!-- Contact -->
    <?php get_template_part('template_parts/section-contact'); ?>
    <!-- End Contact -->

    <!-- Trademark -->
    <?php
    $prd_section = get_field('prd_section','option');
    foreach($prd_section as $section) :
        $title = $section['prd_cat_title'];
        $subtitle = $section['prd_cat_subtitle'];
        $categories = $section['prd_categories'];
    ?>
    <section class="product">
        <div class="section-header text-center">
            <?php
            if($title) :
                echo '<h2 class="title">'.$title.'</h2>';
            endif;

            if($subtitle) :
                echo '<p>'.$subtitle.'</p>';
            endif;
            ?>
        </div>

        <?php
        if($categories) :
            foreach($categories as $category) :
                $qtt_slide = $category['qtt_slide'];
                $title = $category['title'];
                $desc = $category['desc'];
                $catId = $category['prd_cat'];
                
                if($qtt_slide == 'nam') :
                    $swiper_class = 'swiper-product-5';
                elseif($qtt_slide == 'ba') :
                    $swiper_class = 'swiper-product-3';
                else :
                    $swiper_class = 'swiper-product-4';
                endif;
                ?>
                    <div class="container">
                        <?php

                        if($title) :
                            echo '<h2>'.$title.'</h2>';
                        endif;

                        if($desc) :
                            echo '<h3 class="subtitle">'.$desc.'</h3>';
                        endif;
                        ?>
                        
                        <div class="swiper <?php echo $swiper_class; ?> cart-products">
                            <div class="swiper-wrapper">
                                <?php
                                if($catId): 
                                    $args = array(
                                        'post_type' => 'product', // Post type Album
                                        'posts_per_page' => 10,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'product_cat', // Taxonomy danh mục album
                                                'field'    => 'term_id',
                                                'terms'    => $catId,
                                            ),
                                        ),
                                    );
                                    
                                    $product_posts = new WP_Query($args);
                                    
                                    if($product_posts->have_posts()):
                                        while($product_posts->have_posts()): $product_posts->the_post();
                                            $product = wc_get_product(get_the_ID());
                                            $price = $product ? $product->get_price_html() : '';
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="product-card">
                                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                                                    <h4 class="product-title"><?php the_title(); ?></h4>
                                                    <div class="price"><?php echo $price; ?></div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                            </div>

                            <div class="banner-pagination"></div>
                        </div>
                    </div>
                <?php
                endif;
            endforeach;
        endif;
        ?>
    </section>
    <?php
    endforeach;
    ?>
    <!-- End Trademark -->

    <!-- Design -->
    <?php
    $design_title = get_field('design_title','option');
    $design_url = get_field('design_url','option');
    $design_gallery = get_field('design_gallery','option');
    ?>
    <section class="club-design">
        <div class="container text-center">
            <?php
            if($design_title) :
                echo '<h2 class="club-title">'.$design_title.'</h2>';
            endif;

            ?>

            <div class="swiper club-swiper">
                <div class="swiper-wrapper">
                    <?php
                    if($design_gallery) :
                        foreach($design_gallery as $gallery) :
                        ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($gallery['url']); ?>" alt="<?php echo $gallery['alt']; ?>" class="img-fluid rounded shadow-sm">
                        </div>
                    <?php
                    endforeach;
                    endif;
                    ?>
                </div>
            </div>

            <?php
            if($design_url) :
                $url_link = $design_url['url'] ? $design_url['url'] : '#';
                $title = $design_url['title'] ? $design_url['title'] : 'Xem chi tiết';
                $target = $design_url['target'] ? $design_url['target'] : '_self';

                echo '<a href="'.$url_link.'" class="btn" target="'.$target.'">'.$title.'</a>';
            endif;
            ?>
        </div>
    </section>
    <!-- End Design -->

    <!-- New Blog -->
    <?php
    $blog_title = get_field('blog_title','option');
    $blog_list = get_field('blog_object','option');
    ?>
    <section class="news-blog">
        <div class="container">
            <?php
            if($blog_title) :
                echo '<h2 class="news-title">'.$blog_title.'</h2>';
            endif;
            ?>

            <div class="swiper news-swiper">
                <div class="swiper-wrapper">
                    <?php
                    if($blog_list) :
                        foreach($blog_list as $blog) :
                            $img = get_the_post_thumbnail_url($blog);
                            $title = get_the_title($blog);
                            $date = get_the_date('d/m/Y', $blog);
                            $url = get_the_permalink($blog);
                        ?>
                        <div class="swiper-slide">
                            <div class="news-card">
                                <div class="news-thumb">
                                    <a href="<?php echo $url; ?>">
                                    <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" loading="lazy">
                                    </a>
                                </div>
                                <div class="news-content">
                                    <p class="news-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffb128" d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM160 304L160 336C160 344.8 167.2 352 176 352L208 352C216.8 352 224 344.8 224 336L224 304C224 295.2 216.8 288 208 288L176 288C167.2 288 160 295.2 160 304zM288 304L288 336C288 344.8 295.2 352 304 352L336 352C344.8 352 352 344.8 352 336L352 304C352 295.2 344.8 288 336 288L304 288C295.2 288 288 295.2 288 304zM432 288C423.2 288 416 295.2 416 304L416 336C416 344.8 423.2 352 432 352L464 352C472.8 352 480 344.8 480 336L480 304C480 295.2 472.8 288 464 288L432 288zM160 432L160 464C160 472.8 167.2 480 176 480L208 480C216.8 480 224 472.8 224 464L224 432C224 423.2 216.8 416 208 416L176 416C167.2 416 160 423.2 160 432zM304 416C295.2 416 288 423.2 288 432L288 464C288 472.8 295.2 480 304 480L336 480C344.8 480 352 472.8 352 464L352 432C352 423.2 344.8 416 336 416L304 416zM416 432L416 464C416 472.8 423.2 480 432 480L464 480C472.8 480 480 472.8 480 464L480 432C480 423.2 472.8 416 464 416L432 416C423.2 416 416 423.2 416 432z"/></svg>
                                        <?php echo 'Ngày '.$date; ?>
                                    </p>
                                    <h3 class="news-heading"><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End New Blog -->

    <!-- Reson -->
    <?php
    $reason_title = get_field('reason_title','option');
    $reasons = get_field('reasons','option');
    ?>
    <section class="reason py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h4 class="text-muted reason-subtitle">
                    <?php echo apply_filters('the_content', $reason_title); ?>
                </h4>
            </div>
            <div class="row">
                <?php
                if($reasons) :
                    foreach($reasons as $reason) :
                        $title = $reason['title'];
                        $desc = $reason['desc'];
                        $img = $reason['img'];
                        $url = $reason['url'];
                    ?>
                        <div class="col-md-6 reason-blog">
                            <div class="reason-card row">
                                <div class="col-md-6">
                                    <?php
                                    if($title) :
                                        echo '<h5 class="fw-bold">'.$title.'</h5>';
                                    endif;

                                    if($desc) :
                                        echo apply_filters('the_content', $desc);
                                    endif;

                                    if($url) :
                                        $url_link = $url['url'] ? $url['url'] : '#';
                                        $title = $url['title'] ? $url['title'] : 'Xem tất cả.';
                                        $target = $url['target'] ? $url['target'] : '_self';

                                        echo '<a href="'.$url_link.'" class="see-more" target="'.$target.'">'.$title.'</a>';
                                    endif;
                                    ?>
                                </div>

                                <div class="reason-img col-md-6">
                                    <?php
                                    if($img) :
                                        echo '<img src="'.$img.'" class="img-fluid rounded" alt="'.$title.'" title="'.$title.'" loading="lazy">';
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- End Reson -->

    <!-- register -->
    <?php get_template_part('template_parts/section-register'); ?>
    <!-- End register -->

    <!-- project -->
    <!-- <section class="posts-timeline">
        <div class="container">
            <div class="row g-0">
                <div class="col-12">
                    <div class="timeline-list">
                        <article class="timeline-item">
                            <div class="timeline-left">
                                <div class="date">29/08/2025</div>
                            </div>

                            <div class="timeline-right">
                                <div class="post-card">
                                    <div class="post-thumb">
                                        <img src="https://quanghuybilliards.com/wp-content/uploads/2025/08/Hoan-thanh-lap-dat-ban-giao-1-ban-bi-a-tai-Tochigi-Nhat-Ban.png"
                                            alt="">
                                    </div>
                                    <div class="post-body">
                                        <div class="categories-dropdown">
                                            <span class="categories-label">Categories ▾
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Dự án</a></li>
                                                    <li><a href="#">Tin tức</a></li>
                                                </ul>
                                            </span>
                                        </div>
                                        <h3 class="post-title">Hoàn thành giao hàng và lắp đặt 1 bàn bi a tại Tochigi
                                            Nhật Bản</h3>
                                        <div class="post-meta">
                                            <span class="comments">💬 0</span>
                                            <a class="readmore" href="#">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-left">
                                <div class="date">29/08/2025</div>
                            </div>

                            <div class="timeline-right">
                                <div class="post-card">
                                    <div class="post-thumb">
                                        <img src="https://quanghuybilliards.com/wp-content/uploads/2025/08/Hoan-thanh-lap-dat-ban-giao-1-ban-bi-a-tai-Tochigi-Nhat-Ban.png"
                                            alt="">
                                    </div>
                                    <div class="post-body">
                                        <div class="categories-dropdown">
                                            <span class="categories-label">Categories ▾
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Dự án</a></li>
                                                    <li><a href="#">Tin tức</a></li>
                                                </ul>
                                            </span>
                                        </div>
                                        <h3 class="post-title">Lắp đặt bàn bi-a cho homestay tại Hà Nội</h3>
                                        <div class="post-meta">
                                            <span class="comments">💬 0</span>
                                            <a class="readmore" href="#">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End project -->

</main>
<?php get_footer(); ?>