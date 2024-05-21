<?php
/**
 * @package Bravisthemes
 */
get_header(); ?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="pxl-error-inner">
                    <h2 class="pxl-error-title-top">
                        <?php echo esc_html__('404', 'digicove'); ?>
                    </h2>
                    <h3 class="pxl-error-title">
                        <?php echo esc_html__('Page Not Found', 'digicove'); ?>
                    </h3>
                    <div class="excerpt-404">
                        <?php echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'digicove'); ?>
                    </div>
                    <form role="search" method="get" class="search-form wow fadeInUp" action="<?php echo esc_url(home_url( '/' )); ?>">
                        <div class="searchform-wrap">
                            <input type="text" placeholder="Search Here......" name="s" class="search-field" />
                            <button type="submit" class="search-submit"></button>
                        </div>
                    </form>
                    <a class="btn btn-animate" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php echo esc_html__('Back to Home', 'digicove'); ?>                        
                    </a>
                </div>
            </main>
        </div>
    </div>
</div>
<div class="error-img-container">
    <img class="error-img error-img2" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/circle.png'); ?>" />
</div>
<?php get_footer();
