<?php
/**
 * @package Bravisthemes
 */
get_header();
$digicove_sidebar = digicove()->get_sidebar_args(['type' => 'blog', 'content_col'=> '12']);
?>
<div class="container">
    <div class="row <?php echo esc_attr($digicove_sidebar['wrap_class']) ?>" >
        <div id="pxl-content-area" class="<?php echo esc_attr($digicove_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content' );
                    }
                    digicove()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
