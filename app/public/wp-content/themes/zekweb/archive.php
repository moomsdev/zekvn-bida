<?php get_header(); $a=get_query_var('cat' );?>
<?php $term = get_queried_object(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body news-list">
        <div class="container">
            <?php if(get_field( 'loai', 'category_'.$a)==3){ ?>
            <?php }elseif(get_field( 'loai', 'category_'.$a)==2){ ?>
            
            <?php }else{ ?>
            <h1 class="page-title"><?php echo single_cat_title();?></h1>
            <div class="row row-margin">
                <div class="col-12">
                    <div class="list-news">
                        <div class="row row-margin">
                            <?php if(have_posts()){ while(have_posts()):the_post();$format=get_post_format();setPostViews($post->ID); ?>
                                <div class="col-md-4">
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
                            <?php endwhile;wp_reset_postdata(); ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php get_template_part( 'pagination' ); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>