<?php
/*
 Template Name: Ký gửi bàn cũ
 */
?>
<?php get_header(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body page-contact">
        <div class="container">
            <h1 class="page-title"><?php the_title();?></h1>
            <div class="page-content">
                <div class="content-post clearfix">
                    <?php the_content(); ?>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="bed784f" title="Ký gửi bàn cũ"]'); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>