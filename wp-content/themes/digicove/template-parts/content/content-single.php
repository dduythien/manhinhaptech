<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravisthemes
 */
$post_tag = digicove()->get_theme_opt( 'post_tag', true );
$post_navigation = digicove()->get_theme_opt( 'post_navigation', false );
$post_social_share = digicove()->get_theme_opt( 'post_social_share', false );
$post_author_box_info = digicove()->get_theme_opt( 'post_author_box_info', false );
$align_content_post = digicove()->get_page_opt( 'align_content_post', 'content-left' );
$post_title_on = digicove()->get_page_opt( 'post_title_on', true );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class( 'pxl-item-single-post'.' '.$align_content_post ); ?>>
    <?php digicove()->blog->get_post_metas(); ?>
    <?php if($post_title_on) { ?>
        <h2 class="pxl-item--title"><?php the_title(); ?></h2>
    <?php } ?>

    <div class="pxl-item--holder">
        <div class="pxl-item--content clearfix">
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
            ?>
        </div>
    </div>

    <?php if($post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_social_share) { digicove()->blog->get_socials_share(); } ?>            
        </div>
    <?php endif; ?>

    <?php if($post_author_box_info) : ?>
        <div class="pxl--author-info">
            <div class="entry-author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
            </div>
            <div class="entry-author-meta">
                <h3 class="author-name">
                    <?php the_author_posts_link(); ?>
                </h3>
                <div class="author-description">
                    <?php the_author_meta( 'description' ); ?>
                </div>
                <?php digicove_get_user_social(); ?>
            </div>
        </div>
    <?php endif; ?>
</article><!-- #post -->