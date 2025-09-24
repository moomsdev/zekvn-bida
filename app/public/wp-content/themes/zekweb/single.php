<?php get_header();wp_reset_query();  $format = get_post_format();?>
<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids"));$a=$post->ID; ?>
<?php while (have_posts()) : the_post(); setPostViews($post->ID);?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <?php if($format=='aside' ){ ?>
            
            <?php }elseif($format=='chat' ){ ?>

            <?php }else{ ?>
            <div class="row row-margin">
                <div class="col-12">
                    <h1 class="page-title"><?php the_title();?></h1>
                    <?php get_template_part('meta'); ?>
                    <div class="page-content">
                        <div class="content-post clearfix">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="single-tags">
                    <?php the_tags( 'Tags: ', ' '); ?>
                    </div>
                    <div class="page-content">
                        <?php comments_template(); ?>
                    </div>
                    <?php
                    $categories = get_the_category(get_the_ID());
                    if ($categories){
                    
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 6,
                    );
                    $my_query = new wp_query($args);
                    if( $my_query->have_posts() ): ?>
                    <div class="single-related news-list">
                        <div class="title">Bài viết liên quan</div>
                        <div class="row g-4">
                            <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
                            <div class="col-12 col-md-6 col-lg-4 item">
                                <div class="news-card">
                                    <div class="news-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?>
                                        </a>
                                    </div>
                                    <div class="news-content p-3">
                                        <h5 class="news-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo get_the_title(); ?>
                                            </a>
                                        </h5>
                                        <p class="news-date"><?php echo get_the_date('d/m/Y'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>  
                    </div>
                    <?php endif; wp_reset_query();} ?>
                </div>
                
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>