( function( $ ) {

  function digicove_section_start_render(){
    var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
    _elementor.hooks.addFilter( 'pxl_section_start_render', function( html, settings, el ) {
        if(typeof settings.pxl_mask_bg_img != 'undefined' && settings.pxl_mask_bg_img.url != ''){
            html += '<div class="pxl-mask-bg-parallax"></div>';            
        }

        return html;
    } );
} 
function digicove_section_before_render(){
    var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
    _elementor.hooks.addFilter( 'pxl-custom-section/before-render', function( html, settings, el ) {
        return html;
    } );
} 

    // add custom section class
function digicove_custom_section_classes(){
    var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
    _elementor.hooks.addFilter( 'pxl-custom-section-classes', function( settings ) {
        let custom_classes = [];
        if(typeof settings.custom_style != 'undefined' && settings.custom_style != ''){
            custom_classes.push('style-' + settings.custom_style);
        }
        return custom_classes;
    } );
}
function digicove_column_before_render(){
    var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
    _elementor.hooks.addFilter( 'pxl-custom-column/before-render', function( html, settings, el ) {
        if(typeof settings.pxl_parallax_col_bg_img != 'undefined' && settings.pxl_parallax_col_bg_img.url != ''){
            html += '<div class="pxl-column-bg-parallax"></div>';
        }
        return html;
    } );
}
    // add custom columns class
function digicove_custom_column_classes(){
    var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
    _elementor.hooks.addFilter( 'pxl-custom-column-classes', function( settings ) {
        let custom_classes = [];
        if(typeof settings.custom_style != 'undefined' && settings.custom_style != ''){
            custom_classes.push('style-' + settings.custom_style);
        }
        return custom_classes;
    } );

}


$( window ).on( 'elementor/frontend/init', function() {

    digicove_section_start_render();
    digicove_section_before_render();
    digicove_custom_section_classes();
    digicove_column_before_render();
    digicove_custom_column_classes();

} );

} )( jQuery );


