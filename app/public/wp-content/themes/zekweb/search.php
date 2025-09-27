<?php get_header(); ?>

<main id="main">
  <?php get_template_part('breadcrums'); ?>
  <div class="zek_page_body">
    <div class="container">
      <div class="zek_page_title">Tìm kiếm:
        "<?php echo get_search_query(); ?>"</div>

      <?php
      
      function vn_str_filter($str) {
        $str = mb_strtolower($str, 'UTF-8');
        $unicode = array(
          'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
          'd'=>'đ',
          'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
          'i'=>'í|ì|ỉ|ĩ|ị',
          'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
          'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
          'y'=>'ý|ỳ|ỷ|ỹ|ỵ'
        );
        foreach($unicode as $nonAccent=>$accent){
          $str = preg_replace("/($accent)/u", $nonAccent, $str);
        }
        return $str;
      }

      global $wpdb;
      $search_raw = get_search_query();
      $search_str = vn_str_filter($search_raw); 

      // ===== BÀI VIẾT =====
      $post_ids = $wpdb->get_col("
        SELECT ID FROM {$wpdb->posts}
        WHERE post_type = 'post'
          AND post_status = 'publish'
      ");

      $filtered_posts = array_filter($post_ids, function($id) use ($search_str) {
        $title = get_the_title($id);
        $normalized = vn_str_filter($title);
        return strpos($normalized, $search_str) !== false;
      });
      ?>

      <h2 class="zek_page_title text-center mb-3 mb-lg-5"> KẾT QUẢ CỦA BÀI VIẾT</h2>
      <div class="zek_list_news row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 align-items-stretch blog-list">
        <?php
        if (!empty($filtered_posts)):
          foreach ($filtered_posts as $post_id):
            $post = get_post($post_id);
            setup_postdata($post);
        ?>
          <div class="col-6 mb-lg-4 mb-3">
            <div class="box-news">
              <div class="item-img">
                <a href="<?php the_permalink()?>"><?php the_post_thumbnail('large', ['class' => 'img-news']); ?></a>
              </div>
              <div class="content">
                <h3 class="name"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                <p class="desc"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
              </div>
            </div>
          </div>
        <?php
          endforeach;
          wp_reset_postdata();
        else:
          echo '<p>Không tìm thấy bài viết nào.</p>';
        endif;
        ?>
      </div>

      <!-- ===== SẢN PHẨM ===== -->
      <?php
      $product_ids = $wpdb->get_col("
        SELECT ID FROM {$wpdb->posts}
        WHERE post_type = 'product'
          AND post_status = 'publish'
      ");

      $filtered_products = array_filter($product_ids, function($id) use ($search_str) {
        $title = get_the_title($id);
        $normalized = vn_str_filter($title);
        return strpos($normalized, $search_str) !== false;
      });
      ?>

      <h2 class="zek_page_title text-center mb-3 mb-lg-5" style="margin-top: 30px;">KẾT QUẢ CỦA SẢN PHẨM</h2>
      <div class="products zek_list_product row products-list">
        <?php
        if (!empty($filtered_products)):
          foreach ($filtered_products as $product_id):
            $post = get_post($product_id);
            setup_postdata($post);
            $product = wc_get_product($product_id);
        ?>
            <div class="col-12 col-md-4 cart-products">
                <div class="inner product-card">
                    <a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
                        <div class="sale-percent">
                            <!-- get sale percent woocommerce -->
                            <?php echo devvn_woocommerce_sale_flash('', $post, $product); ?>
                        </div>
                        <?php the_post_thumbnail('large', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?>
                        <h4 class="product-title"><?php the_title(); ?></h4>
                    </a>
                    <?php wc_get_template( 'loop/price.php' ); ?>
                </div>
            </div>
        <?php
          endforeach;
          wp_reset_postdata();
        else:
          echo '<p>Không tìm thấy sản phẩm nào.</p>';
        endif;
        ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>