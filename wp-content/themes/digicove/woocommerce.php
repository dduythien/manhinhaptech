<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();

$shop_full_width = digicove()->get_theme_opt('shop_full_width', '0');
$shop_full_width = isset($_GET['fullwidth']) ? sanitize_text_field($_GET['fullwidth']) : $shop_full_width;
$product_full_width = digicove()->get_theme_opt('product_full_width', '0');
$product_full_width = isset($_GET['fullwidth']) ? sanitize_text_field($_GET['fullwidth']) : $product_full_width;

if(is_singular('product')){
    $container_cls = $product_full_width == '1' ? 'container-fluid' : 'container' ;
    $pxl_sidebar = digicove()->get_sidebar_args(['type' => 'product', 'content_col'=> '9']); // type: blog, post, page, shop, product
}else{
    $container_cls = $shop_full_width == '1' ? 'container-fluid' : 'container' ;
    $pxl_sidebar = digicove()->get_sidebar_args(['type' => 'shop', 'content_col'=> '9']); // type: blog, post, page, shop, product
}

?>
<div class="container content-container">
    <div class="row content-row <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>">
        <div id="primary" class="<?php echo esc_attr($pxl_sidebar['content_class']) ?>">
            <main id="main" class="site-main" role="main">
                <?php woocommerce_content(); ?>
            </main><!-- #main -->
        </div><!-- #primary -->

        <?php if ( $pxl_sidebar['sidebar_class']): ?>
            <aside id="secondary" class="<?php echo esc_attr($pxl_sidebar['sidebar_class']) ?>">
                <div class="sidebar-sticky">
                    <?php dynamic_sidebar( 'sidebar-shop' ); ?>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();