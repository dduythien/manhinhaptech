<?php
/**
 * @package Bravisthemes
 */
get_header();
$case_content_top_on = digicove()->get_theme_opt( 'case_content_top_on', true );
$case_feature_image_on = digicove()->get_page_opt( 'case_feature_image_on', true );
$case_title = digicove()->get_page_opt( 'case_title', true );
$case_social_share = digicove()->get_page_opt( 'case_social_share', false );
$pxl_sidebar = digicove()->get_sidebar_args(['type' => 'case', 'content_col'=> '9']);
$case_navigation = digicove()->get_page_opt( 'case_navigation', false );
?>
<div class="container">
    <div class="row">
        <?php if($case_content_top_on) { ?>
            <?php if($case_feature_image_on || $pxl_sidebar['sidebar_class']) { ?>
                <div class="pxl-content-top <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>">
                    <?php if($case_feature_image_on) { ?>
                        <?php if (has_post_thumbnail()) {
                            echo '<div class="pxl-single--image">'; ?>
                            <?php the_post_thumbnail('digicove-lager'); ?>
                            <?php echo '</div>';
                        } 
                    } ?>
                    <?php if ($pxl_sidebar['sidebar_class']) : ?>  
                        <div id="pxl-sidebar-area">                    
                            <?php get_sidebar(); ?>                                    
                        </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
        <?php } ?>
        <div id="pxl-content-area" class="col-12">
            <?php if($case_title && $case_content_top_on) { ?>
                <h2 class="pxl-single--title"><?php the_title(); ?></h2> 
            <?php } ?>
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
        <?php if($case_social_share ) :  ?>
            <div class="pxl--post-footer">
                <?php if($case_social_share) { digicove()->blog->get_socials_share_case(); } ?>            
            </div>
        <?php endif; ?>
        <?php if($case_navigation) { digicove()->blog->get_post_case_nav(); } ?>
    </div>
</div>
<?php get_footer();
