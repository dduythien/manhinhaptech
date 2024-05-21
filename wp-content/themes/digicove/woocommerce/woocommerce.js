;(function ($) {

    "use strict";

    $(document).ready(function () {

        $('.widget_product_search .search-field').find("input[type='text']").each(function (ev) {
            if (!$(this).val()) {
                $(this).attr("placeholder", "Search and Press Enter");
            }
        });

        $('.product-layout-list').parents('ul.products').addClass('products-list');
        $('.single_variation_wrap').addClass('clearfix');
        $('.woocommerce-variation-add-to-cart').addClass('clearfix');

        var  wooc_product_meta = $('.woocommerce .wooc-product-meta');
        var  wooc_product_form = $('.woocommerce form.cart');
        if (wooc_product_meta) {            
            wooc_product_meta.append(wooc_product_form);
        }

        var  wooc_checkout_meta = $('.woocommerce .woocommerce-form-coupon-toggle .woocommerce-info');
        var  wooc_checkout_form = $('.woocommerce .woocommerce-form-coupon');
        if (wooc_checkout_meta) {            
            wooc_checkout_meta.append(wooc_checkout_form);
            wooc_checkout_meta.find('.showcoupon').css('display','none');
            wooc_checkout_form.css('display','inline-flex');
        }

        $('.cart-total-wrap').on('click', function () {
            $('.widget-cart-sidebar').toggleClass('open');
            $(this).toggleClass('cart-open');
            $('.site-overlay').toggleClass('open');
        });

        $('.site-overlay').on('click', function () {
            $(this).removeClass('open');
            $(this).parents('#page').find('.widget-cart-sidebar').removeClass('open');
        });

        $('.woocommerce-tab-heading').on('click', function () {
            $(this).toggleClass('open');
            $(this).parent().find('.woocommerce-tab-content').slideToggle('');
        });

        $('.site-menu-right .h-btn-cart, .mobile-menu-cart .h-btn-cart').on('click', function (e) {
            e.preventDefault();
            $(this).parents('#pxl-header-wrap').find('.widget_shopping_cart').toggleClass('open');
            $('.pxl-hidden-sidebar').removeClass('open');
            $('.pxl-search-popup').removeClass('open');
        });

        $('.woocommerce-add-to-cart a.button:not(".no-animate")').append( '<i>+</i>' );

        $('.page #pxl-wapper #pxl-main #reviews').remove();

        $('.woocommerce-add-to-cart a.button').on('click', function () {
            $(this).parents('.woocommerce-product-inner').addClass('cart-added');
        });

        $('.woocommerce-archive-layout .layout-grid').on('click', function () {
            $(this).addClass('active');
            $(this).parent().find('.layout-list').removeClass('active');
            $(this).parents('.site-main').find('ul.products').addClass('pxl-products-grid').removeClass('pxl-products-list');
        });
        $('.woocommerce-archive-layout .layout-list').on('click', function () {
            $(this).addClass('active');
            $(this).parent().find('.layout-grid').removeClass('active');
            $(this).parents('.site-main').find('ul.products').addClass('pxl-products-list').removeClass('pxl-products-grid');
        });

        $('.woocommerce-archive-layout .layout-list.active').parents('.site-main').find('ul.products').addClass('pxl-products-list').removeClass('pxl-products-grid');

    });

})(jQuery);