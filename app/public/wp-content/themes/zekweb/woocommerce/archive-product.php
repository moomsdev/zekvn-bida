<?php $term = get_queried_object(); ?>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>
<main id="main">
	<?php get_template_part('breadcrums'); ?>
	<div class="page-body">
		<div class="container">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
			<?php endif; ?>
			
			
			<?php
			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
			?>
			
			<?php
			if ( woocommerce_product_loop() ) {
			?>
				<div class="products-wrapper">
					<div class="row">
						<div class="col-12 col-lg-3 sidebar-product d-none d-lg-block">
							<?php get_template_part('sidebar'); ?>
						</div>
						
						<div class="col-12 col-lg-9 product">
							<?php
							/**
							* Hook: woocommerce_before_shop_loop.
							*
							* @hooked woocommerce_output_all_notices - 10
							* @hooked woocommerce_result_count - 20
							* @hooked woocommerce_catalog_ordering - 30
							*/
							echo '<div class="sort-filter">';
								?>
								<button type="button" class="filter-mb d-block d-lg-none" data-bs-toggle="modal" data-bs-target="#filter-mobile">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128C83.1 128 71.4 135.8 66.4 147.8C61.4 159.8 64.2 173.5 73.4 182.6L256 365.3L256 480C256 488.5 259.4 496.6 265.4 502.6L329.4 566.6C338.6 575.8 352.3 578.5 364.3 573.5C376.3 568.5 384 556.9 384 544L384 365.3L566.6 182.7C575.8 173.5 578.5 159.8 573.5 147.8C568.5 135.8 556.9 128 544 128L96 128z"/></svg>
								</button>
								<?php
								do_action('woocommerce_before_shop_loop');
							echo '</div>';

							woocommerce_product_loop_start();
							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();
									/**
									* Hook: woocommerce_shop_loop.
									*/
									do_action( 'woocommerce_shop_loop' );
									wc_get_template_part( 'content', 'product' );
								}
							}
							woocommerce_product_loop_end();
							/**
							* Hook: woocommerce_after_shop_loop.
							*
							* @hooked woocommerce_pagination - 10
							*/
							do_action( 'woocommerce_after_shop_loop' );
							?>
						</div>
					</div>
				</div>

				<?php get_template_part('template_parts/section', 'register'); ?>
				<?php
			} else {
				/**
				* Hook: woocommerce_no_products_found.
				*
				* @hooked wc_no_products_found - 10
				*/
				do_action( 'woocommerce_no_products_found' );
			}
			?>
		</div>
	</div>
</main>
<?php get_footer( 'shop' );?>
