<?php
/**
 * @package Bravisthemes
 */
get_header();
$service_feature_image_on = digicove()->get_page_opt( 'service_feature_image_on', true );
$pxl_sidebar = digicove()->get_sidebar_args(['type' => 'service', 'content_col'=> '9']);
?>
<div class="container">
    <div class="row <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>">
        <div id="pxl-content-area" class="<?php echo esc_attr($pxl_sidebar['content_class']) ?>">
            <?php if($service_feature_image_on) { ?>
                <?php if (has_post_thumbnail()) {
                    echo '<div class="pxl-single--image">'; ?>
                    <?php the_post_thumbnail('digicove-lager'); ?>
                    <?php echo '</div>';
                } 
            } ?>
            <h2 class="pxl-single--title"><?php the_title(); ?></h2>            
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post(); ?>
                    <article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl-item--post'); ?>>
                        <?php the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links">',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) ); ?>
                    </article><!-- #post -->
                    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
        <?php if ($pxl_sidebar['sidebar_class']) : ?>        
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($pxl_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>                
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
