;(function ($) {
    "use strict";
    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = '';
    var pxl_last_scroll_top = 0;
    $(window).on('load', function () {    
        pxl_window_width = $(window).width();
        digicove_loader();
        digicove_col_offset();
        digicove_header_sticky();
        digicove_scroll_to_top();
        digicove_footer_fixed();        
        digicove_quantity_icon();        
        backtotopIndicator();        
        digicove_panel_anchor_toggle();
        digicove_webgl_effects();
        digicove_document_click();
    });

    $(window).on('scroll', function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = 'up';
        } else {
            pxl_scroll_status = 'down';
        }
        pxl_last_scroll_top = pxl_scroll_top;
        digicove_header_sticky();
        digicove_scroll_to_top();
        digicove_footer_fixed();
    });
    $(document).ready(function () {        
        $('.pxl-circle-svg svg').each(function() {
            var linearGradient = $(this).find('.linear-dot1');
            if (linearGradient.length > 0) {
                var linearGradientId = linearGradient.attr('id');
            }
            var linearGradient1 = $(this).find('.linear-dot2');
            if (linearGradient1.length > 0) {
              var linearGradientId1 = linearGradient1.attr('id');
          }
          digicove_circle_svg(this,linearGradientId,linearGradientId1);
      });

        // Start SEO Score?         
        const websiteUrlInput = $('#website-url');
        const userEmailInput = $('#user-email');
        const submitButton = $('#submit-button');
        const resultContainer = $('#result-container');
        if (websiteUrlInput.length && userEmailInput.length && submitButton.length && resultContainer.length) {
            updateSubmitButtonState();

            websiteUrlInput.on('input', updateSubmitButtonState);
            userEmailInput.on('input', updateSubmitButtonState);

            submitButton.on('click', function() {
                const websiteUrl = websiteUrlInput.val().trim();
                const userEmail = userEmailInput.val().trim();

                if (websiteUrl && userEmail) {
                    resultContainer.css('display', 'block');
                    resultContainer.html('Loading...');

                    $.ajax({
                        url: `https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${websiteUrl}`,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            const performanceScore = data.lighthouseResult.categories.performance.score * 100;
                            const firstContentfulPaint = data.lighthouseResult.audits['first-contentful-paint'].displayValue;
                            const largestContentfulPaint = data.lighthouseResult.audits['largest-contentful-paint'].displayValue;
                            const totalBlockingTime = data.lighthouseResult.audits['total-blocking-time'].displayValue;
                            resultContainer.html(`
                                SEO Score for ${websiteUrl}: ${performanceScore}<br>
                                First Contentful Paint: ${firstContentfulPaint}<br>
                                Largest Contentful Paint: ${largestContentfulPaint}<br>
                                Total Blocking Time: ${totalBlockingTime}
                                `);
                        },
                        error: function(error) {
                            resultContainer.html('Error loading data. Please try again later.');
                            console.error('Error calling the SEO score API:', error);
                        }
                    });
                } 
            });
        }

        function updateSubmitButtonState() {
            const websiteUrl = websiteUrlInput.val().trim();
            const userEmail = userEmailInput.val().trim();
            if (websiteUrl && userEmail) {
                submitButton.prop('disabled', false);
            } else {
                submitButton.prop('disabled', true);
            }
        }
        // End SEO Score? 

        /* Menu Responsive Dropdown */
        var $digicove_menu = $('.pxl-header-elementor-main');
        $digicove_menu.find('.pxl-menu-primary li').each(function () {
            var $digicove_submenu = $(this).find('> ul.sub-menu');
            if ($digicove_submenu.length == 1) {
                $(this).hover(function () {
                    if ($digicove_submenu.offset().left + $digicove_submenu.width() > $(window).width()) {
                        $digicove_submenu.addClass('pxl-sub-reverse');
                    } else if ($digicove_submenu.offset().left < 0) {
                        $digicove_submenu.addClass('pxl-sub-reverse');
                    }
                }, function () {
                    $digicove_submenu.removeClass('pxl-sub-reverse');
                });
            }
        });

        var parallaxImg = $('.pxl-img-text .pxl-img');
        if (pxl_window_width < 1200) {
          parallaxImg.removeAttr('data-parallax');
      }

        /* Start Menu Mobile */
      $('.pxl-header-menu li.menu-item-has-children, .pxl-nav-hidden li.menu-item-has-children, .pxl-menu-primary li.menu-item-has-children').append('<span class="pxl-menu-toggle"></span>');
      $('.pxl-menu-toggle').on('click', function () {
        if( $(this).hasClass('active')){
            $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
            $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();    
        }else{
            $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
            $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
            $(this).toggleClass('active');
            $(this).parent().find('> .sub-menu').toggleClass('active');
            $(this).parent().find('> .sub-menu').slideToggle();
        }      
    });
      $("#pxl-nav-mobile").on('click', function () {
        $(this).toggleClass('active');
        $('.pxl-header-menu').toggleClass('active');
    });
        /* End Menu Mobile */

      $(".pxl-menu-close, .pxl-header-menu-backdrop").on('click', function () {
        $(this).parents('.pxl-header-main').find('.pxl-header-menu').removeClass('active');
        $('#pxl-nav-mobile').removeClass('active');
    });

        /* Nice Select */
      $('.pxl-nice-select, .woocommerce .woocommerce-ordering .orderby, #wp-block-archives-1, #wp-block-categories-1').each(function () {
        $(this).niceSelect();
    });
      $('.woocommerce div.product form.cart .variations select').each(function () {
        $(this).niceSelect();
    });

        // Custom width nice select shop archive
      var woo_nice_select = document.querySelectorAll('.woocommerce .nice-select');
      woo_nice_select.forEach(function(){
        var default_width = $('.woocommerce .woocommerce-product-inner').width();
        $('.woocommerce .nice-select').css("min-width", default_width);
        $(window).resize(function() {
            var default_width = $('.woocommerce .woocommerce-product-inner').width();
            $('.woocommerce .nice-select').css("min-width", default_width);
        });
    });

        /* text image */

        /* Elementor Header */
      $('.pxl-type-header-clip > .elementor-container').append('<div class="pxl-header-shape"><span></span></div>');

        /* Scroll To Top */
      $('.pxl-scroll-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

        /* Animate Time Delay */
      $('.pxl-grid-masonry').each(function () {
        var eltime = 100;
        var elt_inner = $(this).children().length;
        var _elt = elt_inner - 1;
        $(this).find('> .pxl-grid-item > .wow').each(function (index, obj) {
            $(this).css('animation-delay', eltime + 'ms');
            if (_elt === index) {
                eltime = 100;
                _elt = _elt + elt_inner;
            } else {
                eltime = eltime + 60;
            }
        });
    });

      var video_laptop = $('.pxl-video-player2');
      if (video_laptop) {
        $(this).find('iframe').addClass('parallax-inner');
    }

        /* convert background color */
    $(document).ready(function() {
        const elements = document.querySelectorAll('.pxl-mask-bg-parallax');
        elements.forEach(element => {
            const dataColor = element.getAttribute('data-color');
            if (dataColor) {
                const { x, y, z } = JSON.parse(dataColor);
                const gradient = `linear-gradient(${z}deg, ${x}, ${y})`;
                element.style.background = gradient;
            }
        });
    });


        /* Lightbox Popup */
    $('.btn-video, .pxl-video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

        /* Comment Reply */
    $('.comment-reply a').append( '<i class="common icon-arrow-forward-ne1"></i>' );

        /* Parallax */
    if($('.pxl-page-title-default-bg').hasClass('pxl--parallax')) {
        $(this).stellar();
    }

        /* Showcase */
    $('.btn-hover').each(function () {
        $(this).hover(function () {
            $(this).parents('.item-feature').find('.btn-hover').removeClass('active');
            $(this).addClass('active');
        });
    });

        /* Hover Active Item */
    $('.pxl--widget-hover').each(function () {
        $(this).hover(function () {
            $(this).parents('.elementor-row').find('.pxl--widget-hover').removeClass('pxl--item-active');
            $(this).parents('.elementor-container').find('.pxl--widget-hover').removeClass('pxl--item-active');
            $(this).addClass('pxl--item-active');
        });
    });

        /* Hover Button */
    $('.btn-plus-text').hover(function () {
        $(this).find('span').toggle(300);
    });

        /* Nav Logo */
    $(".pxl-nav-button").on('click', function () {
        $(this).toggleClass('active');
        $(this).parent().find('.pxl-nav-wrap').toggle(400);
    });

        /* Start Icon Bounce */
    var boxEls = $('.el-bounce, .pxl-image-effect1');
    $.each(boxEls, function(boxIndex, boxEl) {
        loopToggleClass(boxEl, 'bounce-active');
    });

    function loopToggleClass(el, toggleClass) {
        el = $(el);
        let counter = 0;
        if (el.hasClass(toggleClass)) {
            waitFor(function () {
                counter++;
                return counter == 2;
            }, function () {
                counter = 0;
                el.removeClass(toggleClass);
                loopToggleClass(el, toggleClass);
            }, 'Deactivate', 1000);
        } else {
            waitFor(function () {
                counter++;
                return counter == 3;
            }, function () {
                counter = 0;
                el.addClass(toggleClass);
                loopToggleClass(el, toggleClass);
            }, 'Activate', 1000);
        }
    }

    function waitFor(condition, callback, message, time) {
        if (message == null || message == '' || typeof message == 'undefined') {
            message = 'Timeout';
        }
        if (time == null || time == '' || typeof time == 'undefined') {
            time = 100;
        }
        var cond = condition();
        if (cond) {
            callback();
        } else {
            setTimeout(function() {
                console.log(message);
                waitFor(condition, callback, message, time);
            }, time);
        }
    }
        /* End Icon Bounce */

    var btn_comment = $('#comments .form-submit');
    if (btn_comment) {
        btn_comment.append('<span class="button-arrow-hover"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M20.2202 0.845311L7.31632 0.646853C6.97468 0.647537 6.6511 0.782449 6.41528 1.02253C6.17946 1.26262 6.05027 1.58866 6.05552 1.93045C6.06078 2.27223 6.20007 2.60241 6.44339 2.84986C6.6867 3.09731 7.01458 3.24224 7.35641 3.25344L17.1136 3.4035L1.15375 19.3633C0.913059 19.604 0.780827 19.9335 0.786144 20.2792C0.79146 20.6249 0.933891 20.9585 1.1821 21.2068C1.43031 21.455 1.76397 21.5974 2.10968 21.6027C2.45539 21.608 2.78482 21.4758 3.02552 21.2351L18.9854 5.27527L19.1354 15.0325C19.1351 15.2055 19.1692 15.3779 19.2358 15.5396C19.3024 15.7014 19.4002 15.8492 19.5234 15.9745C19.6467 16.0998 19.7929 16.2001 19.9535 16.2695C20.1141 16.3389 20.286 16.376 20.4591 16.3786C20.6322 16.3813 20.803 16.3495 20.9616 16.285C21.1202 16.2205 21.2634 16.1247 21.3828 16.0031C21.5022 15.8815 21.5955 15.7366 21.6572 15.5769C21.7188 15.4171 21.7477 15.2456 21.742 15.0725L21.5436 2.16865C21.5382 1.82301 21.3958 1.48943 21.1476 1.24127C20.8994 0.993105 20.5659 0.850679 20.2202 0.845311Z" fill="#FDFDFD"/></svg><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M20.2202 0.845311L7.31632 0.646853C6.97468 0.647537 6.6511 0.782449 6.41528 1.02253C6.17946 1.26262 6.05027 1.58866 6.05552 1.93045C6.06078 2.27223 6.20007 2.60241 6.44339 2.84986C6.6867 3.09731 7.01458 3.24224 7.35641 3.25344L17.1136 3.4035L1.15375 19.3633C0.913059 19.604 0.780827 19.9335 0.786144 20.2792C0.79146 20.6249 0.933891 20.9585 1.1821 21.2068C1.43031 21.455 1.76397 21.5974 2.10968 21.6027C2.45539 21.608 2.78482 21.4758 3.02552 21.2351L18.9854 5.27527L19.1354 15.0325C19.1351 15.2055 19.1692 15.3779 19.2358 15.5396C19.3024 15.7014 19.4002 15.8492 19.5234 15.9745C19.6467 16.0998 19.7929 16.2001 19.9535 16.2695C20.1141 16.3389 20.286 16.376 20.4591 16.3786C20.6322 16.3813 20.803 16.3495 20.9616 16.285C21.1202 16.2205 21.2634 16.1247 21.3828 16.0031C21.5022 15.8815 21.5955 15.7366 21.6572 15.5769C21.7188 15.4171 21.7477 15.2456 21.742 15.0725L21.5436 2.16865C21.5382 1.82301 21.3958 1.48943 21.1476 1.24127C20.8994 0.993105 20.5659 0.850679 20.2202 0.845311Z" fill="#FDFDFD"/></svg></span>');
    }

            /* Image Effect */
    if($('.pxl-image-tilt').length){
        $('.pxl-image-tilt').parents('.elementor-top-section').addClass('pxl-image-tilt-active');
        $('.pxl-image-tilt').each(function () {
            var pxl_maxtilt = $(this).data('maxtilt'),
            pxl_speedtilt = $(this).data('speedtilt'),
            pxl_perspectivetilt = $(this).data('perspectivetilt');
            VanillaTilt.init(this, {
                max: pxl_maxtilt,
                speed: pxl_speedtilt,
                perspective: pxl_perspectivetilt
            });
        });
    }

        /* Select Theme Style */
    $('.wpcf7-select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('pxl-select-hidden'); 
        $this.wrap('<div class="pxl-select"></div>');
        $this.after('<div class="pxl-select-higthlight"></div>');

        var $styledSelect = $this.next('div.pxl-select-higthlight');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'pxl-select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.pxl-select-higthlight.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
            });
            $(this).toggleClass('active');
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
        });

    });       

    $('#pxl-sidebar-area select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('pxl-select-hidden'); 
        $this.wrap('<div class="pxl-select"></div>');
        $this.after('<div class="pxl-select-higthlight"></div>');

        var $styledSelect = $this.next('div.pxl-select-higthlight');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'pxl-select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.pxl-select-higthlight.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
            });
            $(this).toggleClass('active');
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
        });

    });

    $(document).ready(function() {
      var element = $('#preloader');
      var qodefClipValue = 0;
      var loadTime = performance.now();
      var step = 100 / (loadTime / 1000);

      var interval = setInterval(function() {
        qodefClipValue += step;
        element.css('--pxl-clip', qodefClipValue);

        if (qodefClipValue >= 100) {
          clearInterval(interval);
      }
  }, 30);
  });


                /* Typewriter */
    if($('.pxl-title--typewriter').length) {
        function typewriterOut(elements, callback)
        {
            if (elements.length){
                elements.eq(0).addClass('is-active');
                elements.eq(0).delay( 3000 );
                elements.eq(0).removeClass('is-active');
                typewriterOut(elements.slice(1), callback);
            }
            else {
                callback();
            }
        }

        function typewriterIn(elements, callback)
        {
            if (elements.length){
                elements.eq(0).addClass('is-active');
                elements.eq(0).delay( 3000 ).slideDown(3000, function(){
                    elements.eq(0).removeClass('is-active');
                    typewriterIn(elements.slice(1), callback);
                });
            }
            else {
                callback();
            }
        }

        function typewriterInfinite(){
            typewriterOut($('.pxl-title--typewriter .pxl-item--text'), function(){ 
                typewriterIn($('.pxl-title--typewriter .pxl-item--text'), function(){
                    typewriterInfinite();
                });
            });
        }
        $(function(){
            typewriterInfinite();
        });
    }
        /* End Typewriter */
        /* Row Divider */
    $('.pxl-row-divider-angle-top').append('<svg class="pxl-row-angle" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>');

        /* Slider - Group align center */
    setTimeout(function(){
        $('.md-align-center').parents('.rs-parallax-wrap').addClass('pxl-group-center');
    }, 300);
});

function digicove_circle_svg(element, linearGradientId, linearGradientId1) {
  var activeWidth = window.innerWidth || document.documentElement.clientWidth;
  if (activeWidth <= 1200) {
    return;
}

var svgEl = Snap(element);
if (!svgEl) {
    return;
}

var size = 13;
var filter = svgEl.filter(Snap.filter.shadow(0, 4, 30, 'rgba(0, 255, 255, 0.6)')).addClass('filter1');
var filter1 = svgEl.filter(Snap.filter.shadow(0, 4, 30, 'rgba(0, 255, 255, 0.1)')).addClass('filter2');
var circle1 = svgEl.circle(0, 0, size * 1);
var linearGradient = svgEl.select('.pxl-circle-svg svg .' + linearGradientId);

circle1.attr({ id: 'circle1', class: 'dot', fill: 'url(#' + linearGradientId + ')' });
circle1.attr({ filter: filter });

var circle2 = svgEl.circle(0, 0, size * 1);
circle2.attr({ id: 'circle2', class: 'dot', fill: 'url(#' + linearGradientId1 + ')' });
circle2.attr({ filter: filter1 });

var dotEl1 = svgEl.select('#circle1');
var dotEl2 = svgEl.select('#circle2');

var motionPath1 = svgEl.select('path').getTotalLength();
var motionPath2 = svgEl.select('path').getTotalLength();

var motionPath1Partial = motionPath1 * 0.7;
var motionPath2Partial = motionPath2 * 0.7;

dotEl1.transform('t0,0');
dotEl2.transform('t0,0');

var carouselInnerEl = $(".pxl-carousel-inner,.pxl-swiper-arrow");
var animation1, animation2;
var isHovered = false;

function animateDot1(forward) {
    var fromVal, toVal;
    if (forward) {
      fromVal = 0;
      toVal = motionPath1;
  } else {
      fromVal = motionPath2;
      toVal = 0;
  }

  animation1 = Snap.animate(fromVal, toVal, function (val) {
      var point = svgEl.select("path").getPointAtLength(val);
      dotEl1.attr({ cx: point.x, cy: point.y });
  }, 15000, function () {
      if (!isHovered) {
        dotEl1.transform('t0,0');
        animateDot1(true);
    }
});
}

function animateDot2(forward) {
    var fromVal, toVal;
    if (forward) {
      fromVal = motionPath1;
      toVal = 0;
  } else {
      fromVal = 0;
      toVal = motionPath2;
  }

  animation2 = Snap.animate(fromVal, toVal, function (val) {
      var point = svgEl.select("path").getPointAtLength(motionPath2 - val);
      dotEl2.attr({ cx: point.x, cy: point.y });
  }, 15000, function () {
      if (!isHovered) {
        dotEl2.transform('t0,0');
        animateDot2(false);
    }
});
}

carouselInnerEl.on("mouseenter", function () {
    isHovered = true;
    if (animation1) {
      animation1.pause();
  }
  if (animation2) {
      animation2.pause();
  }
});

carouselInnerEl.on("mouseleave", function () {
    isHovered = false;
    if (animation1) {
      animation1.stop();
  }
  if (animation2) {
      animation2.stop();
  }
  dotEl1.transform('t0,0');
  dotEl2.transform('t0,0');
  animateDot1(true);
  animateDot2(false);
});

animateDot1(true);
animateDot2(false);
}


function digicove_panel_anchor_toggle(){
    'use strict';
    $(document).on('click','.pxl-anchor.side-panel',function(e){
        e.preventDefault();
        e.stopPropagation();
        var target = $(this).attr('data-target');
        $(this).toggleClass('cliked');
        $(target).toggleClass('open');
        $('body').toggleClass('side-panel-open');
        $('.pxl-overlay-drop').toggleClass('panel-open');
        setTimeout(function(){
            $(document).find('.pxl-search-form input[name="s"]').focus();
            $(document).find('.search-form input[name="s"]').focus();
        },1000);
    });
    $(document).on('click','.custom-link.anchor',function(e){
        e.preventDefault();
        e.stopPropagation();
        var target = $(this).attr('data-target');
        $(this).toggleClass('cliked');
        $(target).toggleClass('anchor-target-open');
        $('.pxl-anchor-bg').toggleClass('anchor-bg-open');
    });

        //* Menu Dropdown
    $('.pxl-menu-primary li').each(function () {
        var $submenu = $(this).find('> ul.sub-menu');
        if ($submenu.length == 1) {
            $(this).hover(function () {
                if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                    $submenu.addClass('back');
                } else if ($submenu.offset().left < 0) {
                    $submenu.addClass('back');
                }
            }, function () {
                $submenu.removeClass('back');
            });
        }
    });
}

    /* Custom Loader */
function digicove_loader() {
    if( $('#pxl-loadding').hasClass('style-text')) {
        $('#pxl-loadding').addClass('hide');
        $(".loading-text").addClass("fadeout");
    } else {
        $(".pxl-loader").fadeOut("slow");
    }
}

function digicove_document_click(){
    $(document).on('click',function (e) {
        var target = $(e.target);
        var check = '.btn-nav-mobile';

        if (!(target.is(check)) && target.closest('.pxl-hidden-template').length <= 0 && $('body').hasClass('side-panel-open')) { 
            $('.btn-nav-mobile').removeClass('cliked');

            $('.pxl-hidden-template').removeClass('open');
            $('body').removeClass('side-panel-open');
        }
    });
    $(document).on('click','.pxl-close',function(e){
        e.preventDefault();
        e.stopPropagation();
        $(this).closest('.pxl-hidden-template').toggleClass('open');
        $('.btn-nav-mobile').removeClass('cliked');

        $('body').toggleClass('side-panel-open');
    });
    $('.pxl-widget-cart-overlay').click(function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('open');
        $(this).parents('body').removeClass('ov-hidden');
    });

}

/* Arrow Custom */
$('.pxl-swiper-arrow-custom').parents('.pxl-swiper-sliders').addClass('pxl--hide-arrow');
$('.pxl-navigation-carousel').parents('.elementor-section').addClass('pxl--hide-arrow');
setTimeout(function() {
    $('.pxl-swiper-arrow-custom.pxl-swiper-arrow-next').on('click', function () {
        $(this).parents('.pxl-swiper-sliders').find('.pxl-swiper-arrow-main.pxl-swiper-arrow-next').trigger('click');
    });
    $('.pxl-swiper-arrow-custom.pxl-swiper-arrow-prev').on('click', function () {
        $(this).parents('.pxl-swiper-sliders').find('.pxl-swiper-arrow-main.pxl-swiper-arrow-prev').trigger('click');
    });
}, 300);

setTimeout(function() {
    $('.pxl-navigation-carousel .pxl-navigation-arrow-prev').on('click', function () {
        $(this).parents('.elementor-section').find('.pxl-swiper-arrow.pxl-swiper-arrow-prev').trigger('click');
    });
    $('.pxl-navigation-carousel .pxl-navigation-arrow-next').on('click', function () {
        $(this).parents('.elementor-section').find('.pxl-swiper-arrow.pxl-swiper-arrow-next').trigger('click');
    });
}, 300);

    /* Header Sticky */
function digicove_header_sticky() {
    if($('#pxl-header-elementor').hasClass('is-sticky')) {
        if (pxl_scroll_top > 100) {
            $('.pxl-header-elementor-sticky.pxl-sticky-stb').addClass('pxl-header-fixed');
        } else {
            $('.pxl-header-elementor-sticky.pxl-sticky-stb').removeClass('pxl-header-fixed');   
        }

        if (pxl_scroll_status == 'up' && pxl_scroll_top > 100) {
            $('.pxl-header-elementor-sticky.pxl-sticky-stt').addClass('pxl-header-fixed');
        } else {
            $('.pxl-header-elementor-sticky.pxl-sticky-stt').removeClass('pxl-header-fixed');
        }
    }

    $('.pxl-header-elementor-sticky').parents('body').addClass('pxl-header-sticky');
}

    /* =================
     Column Offset
     =================== */
function digicove_col_offset() {
    var w_vc_row_lg = ($('#pxl-main').width() - 1620) / 2;
    var w_vc_row_min = ($('#pxl-main').width() - 1300) / 2;
    if (pxl_window_width > 1200) {
        $('body:not(.rtl) .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
        $('body:not(.rtl) .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');

        $('body:not(.rtl) .col-offset-left-1300px.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_min + 'px');
        $('body:not(.rtl) .col-offset-right-1300px.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_min + 'px');

        $('.rtl .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');
        $('.rtl .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');

        $('.rtl .col-offset-left-1300px.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_min + 'px');
        $('.rtl .col-offset-right-1300px.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_min + 'px');
    }
}

    /* Scroll To Top */
function digicove_scroll_to_top() {
    if (pxl_scroll_top < pxl_window_height) {
        $('.pxl-scroll-top').addClass('pxl-off').removeClass('pxl-on');
    }
    if (pxl_scroll_top > pxl_window_height) {
        $('.pxl-scroll-top').addClass('pxl-on').removeClass('pxl-off');
    }
}

function digicove_quantity_icon() {
    $('#pxl-main .quantity').append('<span class="quantity-icon"><i class="quantity-down">-</i><i class="quantity-up">+</i></span>');
    $('.quantity-up').on('click', function () {
        $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
        $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
    });
    $('.quantity-down').on('click', function () {
        $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
        $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
    });
    $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
}

    /* Custom WebGL Effects */
function digicove_webgl_effects() {
    class WebglHover {
        constructor(set) {
            this.canvas = set.canvas
            this.webGLCurtain = new Curtains({
                container: this.canvas,
                watchScroll: false,
                pixelRatio: Math.min(1.5, window.devicePixelRatio)
            })
            this.planeElement = set.planeElement
            this.mouse = {
                x: 0,
                y: 0
            }
            this.params = {
                vertexShader: document.getElementById("vs").textContent,
                fragmentShader: document.getElementById("fs").textContent,
                widthSegments: 40,
                heightSegments: 40,
                uniforms: {
                    time: {
                        name: "uTime",
                        type: "1f",
                        value: 0
                    },
                    mousepos: {
                        name: "uMouse",
                        type: "2f",
                        value: [0, 0]
                    },
                    resolution: {
                        name: "uReso",
                        type: "2f",
                        value: [innerWidth, innerHeight]
                    },
                    progress: {
                        name: "uProgress",
                        type: "1f",
                        value: 0
                    }
                }
            }
            this.initPlane()
        }

        initPlane() {
            this.plane = new Plane(this.webGLCurtain, this.planeElement, this.params)

            if (this.plane) {
                this.plane.onReady(() => {
                    this.update()
                    this.initEvent()
                })
            }
        }

        update() {
            this.plane.onRender(() => {
                this.plane.uniforms.time.value += 0.01

                this.plane.uniforms.resolution.value = [innerWidth, innerHeight]
            })
        }

        initEvent() {
            this.planeElement.addEventListener("mouseenter", () => {
                gsap.to(this.plane.uniforms.progress, .8, {
                    value: 1
                })
            })

            this.planeElement.addEventListener("mouseout", () => {
                gsap.to(this.plane.uniforms.progress, .8, {
                    value: 0
                })
            })
        }
    }
    $('.pxl-case-grid.layout3 .pxl-grid-item').each(function() {
        const $this = $(this);
        const item_image_height = $this.find('.image-front').height();
        $this.find('.canvas canvas').css('height', item_image_height + 'px');

        const initialized = $this.data('initialized');
        if (!initialized) {
            $this.data('initialized', true);
            const canvas = $this.find('.canvas')[0];
            const planeElement = $this.find('.item--image')[0];
            new WebglHover({
                canvas: canvas,
                planeElement: planeElement
            });
        }
    });

}

setTimeout(() => {
    var wobbleElements = document.querySelectorAll('.pxl-wobble');

    wobbleElements.forEach(function(el){

        el.addEventListener('mouseover', function(){

            if(!el.classList.contains('animating') && !el.classList.contains('mouseover')){

                el.classList.add('animating','mouseover');

                var letters = el.innerText.split('');

                setTimeout(function(){ el.classList.remove('animating'); }, (letters.length + 1) * 50);

                var animationName = el.dataset.animation;
                if(!animationName){ animationName = "pxl-jump"; }

                el.innerText = '';

                letters.forEach(function(letter){
                    if(letter == " "){
                        letter = "&nbsp;";
                    }
                    el.innerHTML += '<span class="letter">'+letter+'</span>';
                });

                var letterElements = el.querySelectorAll('.letter');
                letterElements.forEach(function(letter, i){
                    setTimeout(function(){
                        letter.classList.add(animationName);
                    }, 50 * i);
                });

            }

        });

        el.addEventListener('mouseout', function(){
            el.classList.remove('mouseover');
        });
    });
}, 100);
// -------------------------- //
    /* Back To Top With Progress Indicator */
function backtotopIndicator() {
    var $isHome = $('body .pxl-scroll-top');
    if ($isHome.length) {
        var progressPath = document.querySelector('.pxl-progress-circle path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
        var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);
    }
}

    /* Footer Fixed */
function digicove_footer_fixed() {
    setTimeout(function(){
        var h_footer = $('.pxl-footer-fixed #pxl-footer-elementor').outerHeight() - 1;
        $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
    }, 600);
}

$( document ).ajaxComplete(function() {
    digicove_webgl_effects();
});
})(jQuery);
