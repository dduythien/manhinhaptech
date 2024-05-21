<?php
/**
 * @package Bravisthemes
 */
get_header();
?>
<div class="container">
    <div class="row" >
        <div id="pxl-content-area" class="col-12">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content-service' );
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
