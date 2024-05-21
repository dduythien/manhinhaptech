( function( $ ) {
    //animation
    function digicove_animation_handler($scope){   
        elementorFrontend.waypoint($scope.find('.pxl-animate'), function () {
            var $animate_el = $(this),
            data = $animate_el.data('settings');  
            if(typeof data != 'undefined' && typeof data['animation'] != 'undefined'){
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated ' + data['animation']);
                }, data['animation_delay']);
            }else{
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated fadeInUp');
                }, 300);
            }
        });

        elementorFrontend.waypoint($scope.find('.pxl-divider.animated'), function () {
            $(this).addClass('pxl-animated');
        }); 

        elementorFrontend.waypoint($scope.find('.pxl-bd-anm'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-hd-bd-left'), function () {  
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-hd-bd-right'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-section-line-item'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.move-from-left'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.move-from-right'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.skew-in'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-wg-move-from-left>.elementor-widget-container'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-wg-move-from-right>.elementor-widget-container'), function () {
            $(this).addClass('pxl-animated');
        });
        $(document).ajaxComplete(function(event, xhr, settings){  
            "use strict";
            elementorFrontend.waypoint($scope.find('.pxl-bd-anm'), function () {
                $(this).addClass('pxl-animated');
            });
            elementorFrontend.waypoint($scope.find('.layout-portfolio-list-1 .grid-item .item-title'), function () {
                $(this).addClass('pxl-animated');
            });
        }); 
    }

    function digicove_gsap_scroll_trigger($scope){ 
        gsap.registerPlugin(ScrollTrigger);
        const images = gsap.utils.toArray('img');  
        const showDemo = () => {
            document.body.style.overflow = 'auto';
            gsap.utils.toArray($scope.find('.pxl-horizontal-scroll .scroll-trigger')).forEach((section, index) => {
                const w = section;
                var x = w.scrollWidth * -1;
                var xEnd = 0;
                if($(section).closest('.pxl-horizontal-scroll').hasClass('revesal')){   
                    x = '100%';
                    xEnd = (w.scrollWidth - section.offsetWidth) * -1;
                } 
                gsap.fromTo(w, { x }, {
                    x: xEnd,
                    scrollTrigger: { 
                        trigger: section, 
                        scrub: 0.5 
                    }
                });
            });
        }
        showDemo();
    }

    function digicove_achor() {
      $('.pxl-menu-primary2 li.menu-item-has-children').append('<span class="pxl-menu-toggle style2">+</span>');        
      $('.pxl-menu-primary2 li.menu-item-has-children .sub-menu').css('display','none');         
      $('.pxl-menu-toggle.style2').on('click', function () {
        if( $(this).hasClass('active')){
            $(this).text('+');
            $(this).closest('ul').find('.pxl-menu-toggle.style2.active').toggleClass('active');
            $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();  
            const toggleHeight = $(this).siblings('a').outerHeight();
            $(this).css('height', toggleHeight + 'px');
        }else{
            $(this).closest('ul').find('.pxl-menu-toggle.style2.active').toggleClass('active');
            $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
            $(this).toggleClass('active');
            $(this).parent().find('> .sub-menu').toggleClass('active');
            $(this).parent().find('> .sub-menu').slideToggle();
            $(this).text('-');            
            const toggleHeight = $(this).siblings('a').outerHeight();
            $(this).css('height', toggleHeight + 'px');
        }      
    });
  }

  function digicove_text_hover_image($scope){
    if($scope.find('.pxl-text-img-wrap').length <= 0) return;
    var mouseX = 0,
    mouseY = 0;

    $scope.find('.pxl-text-img-wrap .content-inner').mousemove(function(e){ 
        var offset = $(this).offset();  
        mouseX = (e.pageX - offset.left);
        mouseY = (e.pageY - offset.top);

    });


    $scope.find('.pxl-text-img-wrap ul>li').on("mouseenter", function() {  
        $(this).removeClass('deactive').addClass('active');   
        var target = $(this).attr('data-target');
        $(this).closest('.content-inner').find(target).removeClass('deactive').addClass('active');   
    }); 
    $scope.find('.pxl-text-img-wrap ul>li').on("mouseleave", function() {
        $(this).addClass('deactive').removeClass('active');  
        var target = $(this).attr('data-target');
        $(this).closest('.content-inner').find(target).addClass('deactive').removeClass('active');  
    });
    const s = {
        x: window.innerWidth / 2,
        y: window.innerHeight / 2
    },
    t = gsap.quickSetter($scope.find('.pxl-text-img-wrap .content-inner'), "css"),
    e = gsap.quickSetter($scope.find('.pxl-text-img-wrap .content-inner'), "css");

    gsap.ticker.add((() => {
        const o = .15,
        i = 1 - Math.pow(.85, gsap.ticker.deltaRatio());
        s.x += (mouseX - s.x) * i, 
        s.y += (mouseY - s.y) * i, 
        t({
            "--pxl-mouse-x": `${s.x}px`
        }), e({
            "--pxl-mouse-y": `${s.y}px`
        })
    }))
}

function digicove_progressbar_handler($scope){
    elementorFrontend.waypoint($scope.find('.pxl-progress-bar'), function () {
        $(this).progressbar();
    });
    elementorFrontend.waypoint($scope.find('.pxl-progressbar.circle'), function () {
        var $progressbarElem = $scope.find(".pxl-progressbar-container"),
        $progressbarElemInner = $scope.find(".pxl-progressbar-inner"),
        settings = $progressbarElem.data("settings"),
        length = settings.circle_percent,
        number = settings.circle_number,
        prefix = settings.prefix,
        suffix = settings.suffix,
        speed = settings.speed;
        if (length > 100)
            length = 100;

        $progressbarElem.prop({
            'percent': 0
        }).animate({
            percent: number
        }, {
            duration: speed,
            easing: 'linear',
            step: function (percent) {
                var rotate = (100 - percent);
                var rotate1 = (percent + 8);
                $progressbarElem.find(".js-progress-bar").css('stroke-dashoffset', rotate);
                $progressbarElem.find(".js-progress-bar1").css('stroke-dashoffset', rotate1);
            }
        });

        $progressbarElemInner.prop({
            'counter': 0,
        }).animate({
            counter: number,
        }, {
            duration: speed,
            easing: 'linear',
            step: function (counter) {
                $progressbarElem.find(".progress-percentage").text(prefix + Math.ceil(counter) + suffix);
            }
        });

    });
}

function digicove_split_text($scope){
    var st = $scope.find(".pxl-split-text");
    if(st.length == 0) return;
    gsap.registerPlugin(SplitText);
    st.each(function(index, el) {
        el.split = new SplitText(el, { 
            type: "lines,words,chars",
            linesClass: "split-line"
        });
        gsap.set(el, { perspective: 400 });

        if( $(el).hasClass('split-in-fade') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                ease: "Back.easeOut",
            });
        }
        if( $(el).hasClass('split-in-right') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                x: "50",
                ease: "Back.easeOut",
            });
        }
        if( $(el).hasClass('split-in-left') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                x: "-50",
                ease: "circ.out",
            });
        }
        if( $(el).hasClass('split-in-up') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                y: "80",
                ease: "circ.out",
            });
        }
        if( $(el).hasClass('split-in-down') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                y: "-80",
                ease: "circ.out",
            });
        }
        if( $(el).hasClass('split-in-rotate') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                rotateX: "50deg",
                ease: "circ.out",
            });
        }
        if( $(el).hasClass('split-in-scale') ){
            gsap.set(el.split.chars, {
                opacity: 0,
                scale: "0.5",
                ease: "circ.out",
            });
        }
        el.anim = gsap.to(el.split.chars, {
            scrollTrigger: {
                trigger: el,
                toggleActions: "restart pause resume reverse",
                start: "top 90%",
            },
            x: "0",
            y: "0",
            rotateX: "0",
            scale: 1,
            opacity: 1,
            duration: 0.8, 
            stagger: 0.02,
        });
    });
}

function digicove_background_color () {
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
}

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

function digicove_map_var_css(){ 
    var posX = 0,   
    posY = 0;
    var mouseX = 0,
    mouseY = 0;

    var offset_left = 0;
    var offset_right = 0;
    var offset_top = 0;
    var offset_bottom = 0;

    $(document).on("mousemove", function(e) {
        offset_left = e.clientX; 
        offset_right = $(window).width() - offset_left;

        offset_top = e.clientY;
        offset_bottom = $(window).height() - offset_top;
    });

    $('.cursor-map-target').mousemove(function(e){ 
        var offset = $(this).offset();  
        mouseX = (e.pageX - offset.left);
        mouseY = (e.pageY - offset.top);
    });

    var map_content_width = $('.pxl-map-wrap').width();
    var map_content_height = $('.pxl-map-wrap').height();

    TweenMax.to({}, 0.01, {
        repeat: -1,
        onRepeat: function() {
            posX += (mouseX - posX);
            posY += (mouseY - posY);
            if($('.pxl-map-wrap').length > 0){
                var base_left = posX - (map_content_width / 2) - map_content_width;
                if(offset_left < (base_left*-1) + mouseX ){
                    base_left = posX + (map_content_width / 2);
                } 

                var top_pos = posY - (map_content_width / 2);
                if($(window).innerWidth() <= 767){
                    base_left = (offset_left * -1) + mouseX + 15;
                    top_pos = (map_content_height * -1) + mouseY - 15;
                }
                TweenMax.set($('.pxl-map-wrap:not(.clicked)'), {
                    css: {
                        left: base_left,
                        top: top_pos
                    }
                });
            }
        }
    });
    $('.cursor-map-target').on("mouseenter", function() {
        $(this).find(".pxl-map-wrap").removeClass("deactive").addClass("active");   
    }); 
    $('.cursor-map-target').on("mouseleave", function() {
        $(this).find(".pxl-map-wrap").removeClass("active").addClass("deactive");   
    }); 

    $(document).on('mousedown','.cursor-map-target.show-popup',function(){
        $(this).find(".pxl-map-wrap").addClass("clicked");
        var p_left = 0;
        var p_top = 0;
        var zoom_w = ($(window).width() / 2);
        var zoom_h = ($(window).height() / 1.8);

        if( offset_right < (zoom_w/2) ){
            p_left = (zoom_w/-2) + mouseX + 15;

        }  
        if( offset_bottom < (zoom_h/2) ){
            p_top = (zoom_h/-2) + mouseY + 30;
        }  

        if( offset_left < (zoom_w/2) ){
            p_left = (zoom_w/2) - 15;
        } 

        if($(window).innerWidth() <= 767){
            p_left = (offset_left * -1) + mouseX + 30;
            zoom_w = ($(window).width() - 60);
            zoom_h = ($(window).height() - 200);
        }

        $(this).find(".pxl-map-wrap").css({
            left: p_left,
            top: p_top,
            width: zoom_w,
            height: zoom_h
        }); 
        $(".pxl-cursor-map").addClass('hide') ;
    });

    $(document).on('mouseout','.pxl-map-wrap',function(){
        $(this).removeClass("clicked"); 
        $(".pxl-cursor-map").removeClass('hide') ; 
        $(this).css({
            width: map_content_width,
            height: map_content_height
        });  
    });

}

$( window ).on( 'elementor/frontend/init', function() {

    elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
        digicove_animation_handler($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_horizontal_scroll.default', function( $scope ) {
        digicove_gsap_scroll_trigger($scope);
    } );

    if($(window).innerWidth() >= 1200){
        digicove_map_var_css();                    
    }

    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_text_image.default', function( $scope ) {
        digicove_text_hover_image($scope);
    } );

    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_progressbar.default', function( $scope ) {
        digicove_progressbar_handler($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_post_grid.default', function( $scope ) {
        digicove_webgl_effects($scope);
    } );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_heading.default', function( $scope ) {
        digicove_split_text($scope);
    } );

    digicove_achor();
    digicove_background_color();

} );

} )( jQuery );