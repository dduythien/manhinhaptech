<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'digicove_register_required_plugins' );
function digicove_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.bravisthemes.com/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';
    $plugins = array(
        array(
            'name'               => esc_html__('Redux Framework', 'digicove'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'digicove' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'digicove'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs.', 'digicove' ),
        ),

        array(
            'name'               => esc_html__('Bravis Addons', 'digicove'),
            'slug'               => 'bravis-addons',
            'source'             => 'bravis-addons.zip',
            'required'           => true,
            'logo'        => $images . '/bravis-logo.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Kinco WordPress Theme.', 'digicove' ),
        ),

        array(
            'name'               => esc_html__('Mailchimp for WordPress', 'digicove'),
            'slug'               => "mailchimp-for-wp",
            'required'           => true,
            'logo'        => $images . '/mailchimp-min.png',
            'description' => esc_html__( 'Allowing your visitors to subscribe to your newsletter should be easy. With this plugin, it finally is.', 'digicove' ),
        ),

        array(
            'name'               => esc_html__('AI Engine: Chatbots', 'digicove'),
            'slug'               => "ai-engine",
            'required'           => true,
            'logo'        => $images . '/ai.png',
            'description' => esc_html__( 'Create your own chatbot like ChatGPT, generate content or images, coordinate AI-related work using templates, enjoy swift title and excerpt recommendations, play with AI Copilot in the editor for faster work, track OpenAI usage, and more!', 'digicove' ),
        ),
        
        array(
            'name'               => esc_html__('Contact Form 7', 'digicove'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'digicove' ),
        ), 
        array(
            'name'               => esc_html__('WooCommerce', 'digicove'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'digicove' ),
        ),
        array(
            'name'               => esc_html__('WPC AJAX Add to Cart', 'digicove'),
            'slug'               => "wpc-ajax-add-to-cart",
            'required'           => true,
            'logo'        => $images . '/woo-ajax-add-to-cart.png',
            'description' => esc_html__( 'WPC AJAX Add to Cart for WooCommerce is a highly effective plugin for helping online stores cut down the site’s loading time.', 'digicove' ),
        ),

        array(
            'name'               => esc_html__('Compare for WooCommerce', 'digicove'),
            'slug'               => "woo-smart-compare",
            'required'           => false,
            'logo'        => $images . '/woo-smart-compare.png',
            'description' => esc_html__( 'WPC Smart Compare is an extension of WooCommerce plugin that allows your users to compare some products of your shop.', 'digicove' ),
        ),

        array(
            'name'               => esc_html__('Wishlist for WooCommerce', 'digicove'),
            'slug'               => "woo-smart-wishlist",
            'required'           => false,
            'logo'        => $images . '/woo-smart-wishlist.png',
            'description' => esc_html__( 'WPC Smart Wishlist is a simple but powerful tool that can help your customer save products for buying later.', 'digicove' ),
        ),
    );


$config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

tgmpa( $plugins, $config );

}