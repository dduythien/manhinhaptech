<?php
/**
 * @package Bravisthemes
 */
get_header();
$digicove_sidebar = digicove()->get_sidebar_args(['type' => 'post', 'content_col'=> '12']);
$post_feature_image_on = digicove()->get_page_opt( 'post_feature_image_on', true );
?>
<div class="container">
    <div class="row <?php echo esc_attr($digicove_sidebar['wrap_class']) ?>">
        <?php if($post_feature_image_on) { ?>
            <?php if (has_post_thumbnail()) {
                echo '<div class="col-12 pxl-item--image">'; ?>
                <?php the_post_thumbnail('digicove-lager'); ?>
                <?php echo '</div>';
            } 
        } ?>
        <div id="pxl-content-area" class="<?php echo esc_attr($digicove_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-single', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
