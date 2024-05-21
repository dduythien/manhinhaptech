<?php
/**
 * @package Bravisthemes
 */
get_header();
$digicove_sidebar = digicove()->get_sidebar_args(['type' => 'page', 'content_col'=> '12']);
if ( class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor() && $digicove_sidebar['sidebar_class']==false) {
    $classes = 'elementor-container';
} else {
    $classes = 'container';
}
$digicove_grid_lines = digicove()->get_page_opt( 'digicove_grid_lines', 'false' );
?>
<?php if ($digicove_grid_lines == '1') :?>
    <div class="pxl-lines">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </div>
<?php endif; ?>
<div class="<?php echo esc_attr($classes); ?>">
    <div class="row <?php echo esc_attr($digicove_sidebar['wrap_class']) ?>">
        <div id="pxl-content-area" class="<?php echo esc_attr($digicove_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'page' );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
    </div>
</div>
<?php get_footer();