<?php
/**
 *
 * @package Bravisthemes
 */
get_header();
$digicove_sidebar_pos = digicove()->get_theme_opt( 'blog_sidebar_pos', 'right' );
$digicove_sidebar = digicove()->get_sidebar_args(['type' => 'blog', 'content_col'=> '12']); // type: blog, post, page, shop, product
?>
<div class="container">
    <div class="row <?php echo esc_attr($digicove_sidebar['wrap_class']) ?>">
        <section id="pxl-content-area" class="<?php echo esc_attr($digicove_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content-search' );
                    }
                    digicove()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </section>
    </div>
</div>
<?php get_footer();
