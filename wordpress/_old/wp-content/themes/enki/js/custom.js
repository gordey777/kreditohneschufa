/**
 * http://kopatheme.com
 * Copyright (c) 2015 Kopatheme
 *
 * Licensed under the GPL license:
 *  http://www.gnu.org/licenses/gpl.html
 **/

/**
 *  1.  Header
 *  2.  Slider
 *  3.  Counter Up
 *  4.  Portfolio
 *  5.  Team
 *  6.  Match Height
 *  7.  Back To Top
 *  8.  Blog
 *  9.  Fit Video
 *  10. Client
 *  11. GMap
 **/

"use strict";

jQuery(document).ready(function() {
    //
    if(jQuery('#bottom-sidebar-1').length){
        jQuery('#bottom-sidebar-1 >.container >.row').children().matchHeight();
    }
    if(jQuery('#bottom-sidebar-2').length){
        jQuery('#bottom-sidebar-2 >.container >.row').children().matchHeight();
    }
    if(jQuery('#before-footer').length){
        jQuery('#before-footer >.container >.row').children().matchHeight();
    }
     //add class
    if( jQuery( '.breadcrumb-icon' ).length && !jQuery( '.kopa-area-text' ).length ) {

			var $breadcrumb = jQuery('.breadcrumb-icon').first();
			var $wrap       = $breadcrumb.closest( '.widget_revslider' );

			if( $wrap.length ){
				var $section = $wrap.closest( 'section.enki-section' );
				jQuery( "<div id='kopa-area-text' class='enki-index-for-scroll'></div>" ).insertAfter( $section );
			}

    }
    
    if(jQuery('.woocommerce .products').length){
        jQuery('.woocommerce .products').children().matchHeight();
    }
    // Typo.
    var enki_4_typo = jQuery('.enki-module-typo');
    if(enki_4_typo.length) {
        enki_4_typo.imagesLoaded( function() {
            var masonry = jQuery('.enki-module-typo ul').masonry({        
                itemSelector: 'li',
                columnWidth: 1,
            });
        });
    }

    jQuery('.scrollup').click(function(){
        jQuery("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    }); 

    // Smooth scrolling.
    if( jQuery('.breadcrumb-icon').length ) {

      jQuery('.breadcrumb-icon').on( 'click', '.breadcrumb-arrow', function( event ) {        	
      	
      	event.preventDefault();
      	var $target = jQuery( jQuery( this ).attr( 'href' ) );
        jQuery('html,body').animate( {scrollTop: $target.offset().top }, 400 );        

      });

    }       

    if( jQuery('.enki-scroll-down').length ) {
      jQuery('.enki-scroll-down').on( 'click', function( event ) {

        event.preventDefault();
      	var $target = jQuery( jQuery( this ).attr( 'href' ) );
        jQuery( 'html,body' ).animate( {scrollTop: $target.offset().top }, 400 );

      });

    }

		var mmenu_ul = jQuery('.main-nav').find('.main-menu'),
		mmenu_li     = mmenu_ul.find('> li'),
		sfmmenu_ul   = jQuery('.main-nav').find('.sf-menu');

    if(sfmmenu_ul.length){
      sfmmenu_ul.superfish({
        speed: 'fast',
        delay: '300'
      });
    }

    mmenu_li.each(function() {
      var item_index = jQuery(this).index() + 1,
        order_content = "0" + item_index;
      jQuery(this).find('.order-menu-number').html(order_content);
    });

    // Expand search box.
    var s_search        = jQuery('.kopa-header-search'),
        s_search_btn    = s_search.find('.search-show'),
        s_search_hide   = s_search.find('.search-hide'),
        s_search_close  = s_search_hide.find('.search-close');
    if(s_search.length) {
        s_search_btn.on('click',function() {
            s_search.addClass('expand');
            s_search_hide.find('.search-text').focus();
        });
        s_search_close.on('click',function() {
            s_search.removeClass('expand');
        });
        jQuery("html").mouseup(function (e){
            if (!s_search.is(e.target) && s_search.has(e.target).length === 0){
                s_search_close.click();
            }
        });
    }

    // Search-box-1.
    var s_search_1 = jQuery( '.kopa-search-box-1' );
    if( s_search_1.length ) {
        var s_search_1_label = jQuery( this ).find( '.search-label' );
        s_search_1_label.on( 'click', function() {
            s_search_1.find( '.search-text' ).focus();
        });
    }

    /* smooth scrolling  */

    if(jQuery('.scroll-down-btn').length){
        jQuery('.scroll-down-btn').on('click',function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top
                    }, 800);
                    return false;
                }
            }
        });
    }

 
    /* Slide Area */  

    //scroll-bar
    var h_window = jQuery(window).height();
    if(jQuery('.slide-area').length) {
      jQuery('.slide-area').find('.slide-container').height(h_window).mCustomScrollbar();
    }

    var hb_menu = jQuery('.humburger-menu'),
        hb_area = jQuery('.slide-area'),
        hb_overlay = jQuery('.body-overlay'),
        hb_main_ct = jQuery('.main-container'),
        hb_close = hb_area.find('.close-btn');

    if(hb_menu.length) {
      hb_menu.on('click',function(event) {
        event.preventDefault();
        hb_area.toggleClass('active');
        hb_overlay.toggleClass('active');
        hb_main_ct.toggleClass('scale-down');
      });
    }
    hb_close.on('click',function(event) {
      event.preventDefault();
      hb_area.removeClass('active');
      hb_overlay.removeClass('active');
      hb_main_ct.removeClass('scale-down');
    });
    hb_overlay.on('click',function(event) {
      hb_close.click();
    });

 
    /* Slide Menu */   
    
    if(jQuery('.slide-menu').length) {
      jQuery('.slide-menu').navgoco({
        accordion: true
      });
      jQuery('.caret').removeClass('caret');
    }
 
    /* Mobile Menu */   
    
    if(jQuery('.mobile-menu').length) {
      jQuery('.mobile-menu').navgoco({
        accordion: true
      });
    }

    /* slider */
    
    /* slider 1 */
    var enki_4_slider = jQuery('.enki-module-slider.style-01');
    if(enki_4_slider.length) {
        var carousel = jQuery(".owl-carousel.enki-carousel-01");
  
        carousel.owlCarousel({
            autoPlay: true,
            responsive: true,
            items: 1,
            itemsDesktopSmall : [1160, 1],
            itemsTablet : [1023,1],
            itemsMobile : [639,1],
            stopOnHover:true,
            addClassActive: true,
            pagination: false,
            navigationText: false,
            navigation: true,
            afterInit: function() {
                var enki_after = jQuery(".enki-item-after");
                var enki_before = jQuery(".enki-item-before");

                var enki_active = jQuery(".owl-item.active");

                var carousel_next = enki_after.find('.enki-hover-img');
                
                var next_slider = enki_4_slider.find('.owl-next');

                next_slider.append(carousel_next);

                var carousel_prev = enki_before.find('.enki-hover-img');
                
                var prev_slider = enki_4_slider.find('.owl-prev');
            },
            afterAction: function() {
                var enki_after = jQuery(".enki-item-after");
                var enki_before = jQuery(".enki-item-before");

                var enki_active = jQuery(".owl-item.active");

                enki_after.removeClass('enki-item-after');
                enki_before.removeClass('enki-item-before');

                jQuery('.enki-module-slider .owl-next .enki-hover-img').remove('.enki-hover-img');
                jQuery('.enki-module-slider .owl-prev .enki-hover-img').remove('.enki-hover-img');

                enki_active.next().addClass('enki-item-after');
                enki_active.prev().addClass('enki-item-before');

                var carousel_next = enki_after.find('.enki-hover-img');
                
                var next_slider = enki_4_slider.find('.owl-next');

                next_slider.append(carousel_next);

                var carousel_prev = enki_before.find('.enki-hover-img');
                
                var prev_slider = enki_4_slider.find('.owl-prev');

                prev_slider.append(carousel_prev);
                
            }
           
        });
        
    }

    /* slider 2 */
    var enki_4_slider_2 = jQuery('.enki-module-slider.style-02');
    if(enki_4_slider_2.length) {
        jQuery('.owl-carousel.enki-carousel-02').owlCarousel({
            autoplay: true,
            items: 1,
            itemsDesktopSmall : [1160, 1],
            itemsTablet : [1023,1],
            itemsMobile : [639,1],
            pagination: false,
            slideSpeed: 800,
            navigationText: false,
            navigation: true
        });
    }

    /* slider 3 */
    var enki_4_slider_3 = jQuery('.enki-module-slider.style-03');
    
    if(enki_4_slider_3.length) {
        var sp1 = jQuery('.slider-pro-1');
         sp1.sliderPro({
            width: 1366,
            height: 700,
            forceSize: 'fullWidth',
            arrows: false,
            buttons: true,
            waitForLayers: false,
            autoplay: true,
            fadeOutPreviousSlide: true,
            autoScaleLayers: true,
            slideDistance: 0,
            autoplayDelay: 5000,
            init: function(){
               jQuery(".enki-module-slider.style-03 .loading").hide();   
               jQuery(".enki-module-slider.style-03 .slider-pro").show();   
            }
        });
    }

    /* slider 4 */
    var enki_4_slider_4 = jQuery('.enki-module-slider.style-04');
    if(enki_4_slider_4.length) {
        var sp1 = jQuery('.slider-pro-1');
        sp1.sliderPro({
            width: 1366,
            height: 685,
            forceSize: 'fullWidth',
            arrows: false,
            buttons: true,
            waitForLayers: false,
            autoplay: true,
            fadeOutPreviousSlide: true,
            autoScaleLayers: true,
            slideDistance: 0,
            autoplayDelay: 5000,
            init: function(){
               jQuery(".enki-module-slider.style-04 .loading").hide();   
               jQuery(".enki-module-slider.style-04 .slider-pro").show();   
            }
        });
    }

    /* slider 5 */
    var enki_4_slider_5 = jQuery('.enki-module-slider.style-05');
    if(enki_4_slider_5.length) {
        var sp1 = jQuery('.slider-pro-1');
         sp1.sliderPro({
            width: 1366,
            height: 630,
            forceSize: 'fullWidth',
            arrows: false,
            buttons: true,
            waitForLayers: false,
            autoplay: true,
            fadeOutPreviousSlide: true,
            autoScaleLayers: true,
            slideDistance: 0,
            autoplayDelay: 5000,
            init: function(){
               jQuery(".enki-module-slider.style-05 .loading").hide();   
               jQuery(".enki-module-slider.style-05 .slider-pro").show();   
            }
        });
    }

    /* slider 6 */
    var enki_4_slider_6 = jQuery('.enki-module-slider.style-06');
    
    if(enki_4_slider_6.length) {
        var sp1 = jQuery('.slider-pro-1');
         sp1.sliderPro({
            width: 1366,
            height: 709,
            forceSize: 'fullWidth',
            arrows: true,
            buttons: false,
            waitForLayers: false,
            autoplay: true,
            fadeOutPreviousSlide: true,
            autoScaleLayers: true,
            slideDistance: 0,
            autoplayDelay: 5000,
            init: function(){
               jQuery(".enki-module-slider.style-06 .loading").hide();   
               jQuery(".enki-module-slider.style-06 .slider-pro").show();   
            }
        });
    }

    /* slider 7 */
    var enki_4_slider_7 = jQuery('.enki-module-slider.style-07');
    
    if(enki_4_slider_7.length) {
        var sp1 = jQuery('.slider-pro-1');
         sp1.sliderPro({
            width: 1366,
            height: 709,
            forceSize: 'fullWidth',
            arrows: true,
            buttons: true,
            waitForLayers: false,
            autoplay: true,
            fadeOutPreviousSlide: true,
            autoScaleLayers: true,
            slideDistance: 0,
            autoplayDelay: 5000,
            init: function(){
               jQuery(".enki-module-slider.style-07 .loading").hide();   
               jQuery(".enki-module-slider.style-07 .slider-pro").show();   
            }
        });
    }

    /* match height */   
    var enki_matchHeight_service_6 = jQuery('.enki-module-service.style-06');
    if ( enki_matchHeight_service_6.length ) {
        jQuery('.enki-module-service.style-06 .entry-item').matchHeight();
    }
    if(jQuery('.ul-mh').length){
        jQuery('.ul-mh').children().matchHeight();
    }
    var enki_matchHeight_service_6 = jQuery('.enki-module-service.style-06');
    if ( enki_matchHeight_service_6.length ) {
        jQuery('.enki-module-service.style-06 .entry-item').matchHeight();
    }
    var enki_matchHeight_service_7 = jQuery('.enki-module-portfolio.style-07');
    if ( enki_matchHeight_service_7.length ) {
        jQuery('.widget-header-match-height').matchHeight();
    }
    var enki_matchHeight_portfolio_4 = jQuery('.enki-module-portfolio.style-04');
    if ( enki_matchHeight_portfolio_4.length ) {
        jQuery('.enki-module-portfolio.style-04 li.col-xs-12').matchHeight();
    }
    var enki_matchHeight_portfolio_8 = jQuery('.enki-module-portfolio.style-08');
    if ( enki_matchHeight_portfolio_8.length ) {
        jQuery('.portfolio-matchHeight-8').matchHeight();
    }
    
    var enki_4_client_06 = jQuery('.enki-module-client-06');
    if( enki_4_client_06.length ) {      
        enki_4_client_06.imagesLoaded( function() {
            var masonry = jQuery('.enki-module-client-06 ul').masonry({        
                itemSelector: 'li',
                columnWidth: 1,
            });
        });
    }
    var enki_masonry_portfolio_5 = jQuery('.enki-module-portfolio.style-05');
    if ( enki_masonry_portfolio_5.length ) {
        var _clone        = jQuery('.enki-module-portfolio.style-05 ul').find('li.col-xs-12').first().clone();
        var _firstInsert  = jQuery('.enki-module-portfolio.style-05 ul').find('li.col-xs-12').first();
        var _secondInsert = jQuery('.enki-module-portfolio.style-05 ul').find('li.col-xs-12').eq(1);

        _secondInsert.after(_clone);
        _firstInsert.remove();

        jQuery('.enki-module-portfolio.style-05 ul').imagesLoaded(function() {
            jQuery('.enki-module-portfolio.style-05 ul').masonry({
                columnWidth: 1,
                itemSelector : '.col-xs-12'
            });
        });
    }
    var enki_4_client_03 = jQuery('.enki-module-client-03');
    if(enki_4_client_03.length) {
        enki_4_client_03.imagesLoaded( function() {
            var masonry = jQuery('.enki-module-client-03 ul').masonry({        
                itemSelector: 'li',
                columnWidth: 1,
            });
        });
    }
    
    /* testimonial */
    var enki_4_testimonial = jQuery('.enki-module-testimonial.style-01');
    if(enki_4_testimonial.length) {
        jQuery('.owl-carousel').owlCarousel({
            items: 1,
            itemsDesktopSmall : [1160, 1],
            itemsTablet : [1023,1],
            itemsMobile : [639,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: ["<i class='ti-angle-left'>","<i class='ti-angle-right'>"],
            navigation: true
        });
    }

    var enki_4_testimonial_carousel = jQuery('.enki-module-testimonial.style-03');
    if(enki_4_testimonial_carousel.length) {

        sync1.owlCarousel({
            items: 1,
            singleItem : true,
            slideSpeed : 1000,
            pagination:false,
            afterAction : syncPosition,
            responsiveRefreshRate : 200,
            navigation: true,
            navigationText: ["<i class='ti-angle-left'>","<i class='ti-angle-right'>"],
        });

        sync2.owlCarousel({
            items : 1,
            itemsDesktop      : [1199,1],
            itemsDesktopSmall     : [979,1],
            itemsTablet       : [768,1],
            itemsMobile       : [479,1],
            pagination:false,
            navigation: false,
            responsiveRefreshRate : 600,
            afterInit : function(el){
              el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = jQuery(this).data("owlItem");
            sync1.trigger("owl.goTo",number);
        });

        sync2.find(".owl-controls").addClass("style1");     

        jQuery(sync2).on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = jQuery(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });
        
    }
    
    /* countup */
    var enki_4_counterup_01 = jQuery('.enki-module-countup');
    if(enki_4_counterup_01.length) {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 3000
        });
        jQuery('.ul-mh').children().matchHeight();
    }

    /* Match Height Pricing Table 1 */
    var enki_matchHeight_pricingTable_1 = jQuery('.free-trial-match-height');
    if ( enki_matchHeight_pricingTable_1.length ) {
        jQuery('.free-trial-match-height').matchHeight();
    }
    var enki_matchHeight_portfolio_8 = jQuery('.enki-module-portfolio.style-08');
    if ( enki_matchHeight_portfolio_8.length ) {
        enki_matchHeight_portfolio_8.find('.entry-item.style-01 .entry-content').matchHeight({
            target: enki_matchHeight_portfolio_8.find('.row-custom.color-02')
        });
    } 
    
    /* Responsive tab */
    var enki_responsiveTab = jQuery('.enki-tab');
    if ( enki_responsiveTab.length ) {
        jQuery('.responsive-tabs').responsiveTabs({
            accordionOn: ['xs']
        });
        jQuery('.accordion-link').on('click',function(){
            jQuery('.accordion-link').removeClass('nav-active');
            jQuery(this).addClass('nav-active');  
        });
    }

    if ( jQuery('.enki-accordion').length ) {
        jQuery('.enki-accordion').each(function() {
            var $is_toggle = true;
            if( jQuery(this).hasClass( 'enki-toggle' ) ){
                $is_toggle = false;
            }

            jQuery(this).accordion({
                toggle: $is_toggle
            });

        });
    }
    
    /* Social Twitter */
    var enki_1_owl = jQuery('.enki-module-twitter').find('.owl-carousel');
    if(enki_1_owl.length){
        enki_1_owl.owlCarousel({
            singleItem: true,
            slideSpeed: 1000,
            autoPlay: true,
            navigation: true,
            pagination: false,
            navigationText: false
        });
    }
    
    /* Team */
    var enki_4_team_carousel = jQuery('.enki-module-team.style-04');
    if(enki_4_team_carousel.length) {
    		
    		if( jQuery('.owl-carousel.style-02').hasClass( 'owl-carousel--is_single' ) ) {
					var $args = {
	          singleItem: true,	         
	          pagination: true,
	          slideSpeed: 600,
	          navigationText: false,
	          navigation: false
	    		};
    		} 
    		else {
					var $args = {
	          items: 2,
	          itemsDesktopSmall : [1160, 2],
	          itemsTablet : [979,1],
	          itemsMobile : [639,1],
	          pagination: true,
	          slideSpeed: 600,
	          navigationText: false,
	          navigation: false
	    		};
    		}
    	
        jQuery('.owl-carousel.style-02').owlCarousel( $args );
    }
    
    /* client */    
    var enki_4_client = jQuery('.enki-module-client');
    if(enki_4_client.length) {
        jQuery('.owl-carousel.enki-carousel-05').owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 3],
            itemsTablet : [1023,3],
            itemsMobile : [767,2],
            pagination: true,
            slideSpeed: 600,
            navigationText: false,
            navigation: true
        });
    }

    var enki_4_testimonial = jQuery('.enki-module-testimonial.style-01');
    if(enki_4_testimonial.length) {
        jQuery('.owl-carousel.enki-carousel-06').owlCarousel({
            items: 1,
            itemsDesktopSmall : [1160, 1],
            itemsTablet : [1023,1],
            itemsMobile : [639,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: ["<i class='ti-angle-left'>","<i class='ti-angle-right'>"],
            navigation: true
        });
    }    

    var enki_4_client = jQuery('.enki-module-client.style-02');
    if(enki_4_client.length) {
        jQuery('.owl-carousel.enki-carousel-06').owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 3],
            itemsTablet : [1023,3],
            itemsMobile : [767,2],
            pagination: true,
            slideSpeed: 600,
            navigationText: false,
            navigation: true
        });
    }

    var enki_4_client_04 = jQuery('.enki-module-client-04');
    if(enki_4_client_04.length) {
        jQuery('.owl-carousel.enki-carousel-07').owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 4],
            itemsTablet : [1023,3],
            itemsMobile : [639,1],
            pagination: true,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        });
    }
    
    /* Owl Carousel */
    var enki_owl_01 = jQuery('.enki-owl-carousel.style-01');
    if ( enki_owl_01.length ) {
        jQuery('.enki-owl-carousel.style-01').each(function() {
            // Control slider
            var $this              = jQuery(this),
                option             = $this.find('.owl-content'),
                _item              = option.data('slider-item'),
                _itemsDesktop      = option.data('item-desktop'),
                _itemsDesktopSmall = option.data('item-desktop-small'),
                _itemTablet        = option.data('item-tablet'),
                _itemsMobile       = option.data('item-mobile'),
                auto               = option.data('slider-auto'),
                navigation         = option.data('slider-navigation'),
                pagination         = option.data('slider-pagination'),
                owl                = option;

            if ( 1 == _itemTablet ) {
                _itemTablet = 1;
            } else {
                _itemTablet = 2;
            }

            owl.owlCarousel({
                items: _item,
                itemsDesktop: [1119, _itemsDesktop],
                itemsDesktopSmall: [992, _itemsDesktopSmall],
                itemsTablet: [768, _itemTablet],
                itemsMobile: [479, _itemsMobile],
                slideSpeed: 500,
                autoPlay: auto,
                navigation: navigation,
                pagination: pagination,
                stopOnHover: true,
                navigationText: false,
                addClassActive: true
            });

            // Custom Navigation Events
            $this.find(".next").on('click', function() {
                owl.trigger('owl.next');
            });

            $this.find(".prev").on('click', function() {
                owl.trigger('owl.prev');
            });

        });
    }

    var enki_4_carousel_2 = jQuery( '.enki-module-carousel.style-02' );
    if(enki_4_carousel_2.length) {
        var owl = jQuery('.owl-carousel.enki-carousel-04');
        
        if( owl.hasClass( 'owl-carousel--is_single' ) ){
        	var owl_args = {
						items: 1,
						singleItem: true,            
            pagination: false,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        	};
        }else{
        	var owl_args = {
						items: 3,
            itemsDesktopSmall : [1160, 3],
            itemsTablet : [1023,2],
            itemsMobile : [639,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        	};
        }

        owl.owlCarousel( owl_args );

        jQuery(".enki-owl-prev").on('click',function(){
            owl.trigger('owl.prev');
        });
        jQuery( '.enki-owl-next' ).on('click',function(){
            owl.trigger('owl.next');
        });
    }
    
    /* Share Blog */
    var enki_share_blog = jQuery( '.entry-share' );
    if ( enki_share_blog.length ) {
        jQuery( '.entry-share' ).each( function() {
            var share_btn_1 = jQuery(this).find( '.share-btn-1' );
            share_btn_1.on( 'click', function(){
                jQuery(this).closest( '.entry-share' ).toggleClass( 'active' );
            });
        });
    }
    
    /* Owl Sync Carousel */
    var enki_sync_owl_01 = jQuery('.owl-sync-widget');
    if ( enki_sync_owl_01.length ) {
        jQuery('.owl-sync-widget').each(function() {

            var SyncThis   = jQuery(this),
                sync1      = SyncThis.find('.sync1'),
                sync2      = SyncThis.find('.sync2'),
                speed      = sync1.data('slider-speed'),
                auto       = sync1.data('slider-auto'),
                navigation = sync1.data('slider-navigation'),
                pagination = sync1.data('slider-pagination'),
                item       = sync1.data('slider-item');

            if (1 == auto) {
                auto = true;
            } else {
                auto = false;
            }

            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: speed,
                autoPlay: auto,
                navigation: navigation,
                pagination: pagination,
                stopOnHover: true,
                navigationText: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200
            });

            sync2.owlCarousel({
                items: 6,
                itemsDesktop: [1199, 6],
                itemsDesktopSmall: [979, 6],
                itemsTablet: [767, 6],
                itemsMobile: [639, 6],
                navigation: false,
                stopOnHover: true,
                pagination: false,
                navigationText: false,
                responsiveRefreshRate: 100,
                afterInit: function(el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                }
            });


            function syncPosition(el) {
                var current = this.currentItem;
                sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced");
                if (sync2.data("owlCarousel") !== undefined) {
                    center(current);
                }
            }
            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = jQuery(this).data("owlItem");
                sync1.trigger("owl.goTo", number);
            });

            function center(number) {
                var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                var num = number;
                var found = false;
                for (var i in sync2visible) {
                    if (num === sync2visible[i]) {
                        var found = true;
                    }
                }

                if (found === false) {
                    if (num > sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                    } else {
                        if (num - 1 === -1) {
                            num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                    }
                } else if (num === sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", sync2visible[1])
                } else if (num === sync2visible[0]) {
                    sync2.trigger("owl.goTo", num - 1)
                }

            }
        });
    }
    
    /* google maps */
    if ( jQuery( '.enki-module-google-maps' ).length > 0 ) {

        var id_map = jQuery('.enki-map').attr( 'id' );
        var lat    = {};
        var lng    = {};
        var place  = {};
        var img    = {};

        
        var enki_location = jQuery('.enki-map-location');

        jQuery.each( enki_location, function(index, item) {
            lat[index]   = jQuery(this).attr('data-latitude');
            lng[index]   = jQuery(this).attr('data-longitude');
            place[index] = jQuery(this).attr('data-place');
            img[index]   = jQuery(this).attr('data-images');
        } );


        var map = new GMaps({
          el: '#'+id_map,
          lat: lat[0],
          lng: lng[0],
          zoomControl : true,
          zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
          },
          panControl : false,
          streetViewControl : false,
          mapTypeControl: false,
          overviewMapControl: false,
          scrollwheel: false,
          styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
        });

        jQuery.each(enki_location, function(index, item) {
          map.addMarker({
            lat: lat[index],
            lng: lng[index],
            title: place[index],
            icon: img[index]
          });
        });
    }

    /* shop list */
    
    var enki_4_shop_list = jQuery('.enki-module-shop-list.style-01');
    if(enki_4_shop_list.length) {
        var owl = jQuery('.owl-carousel.enki-carousel-10');
        owl.owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 4],
            itemsTablet : [1023,3],
            itemsMobile : [767,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        });
        var prev_controll = enki_4_shop_list.find('.enki-owl-prev');
        var next_controll = enki_4_shop_list.find('.enki-owl-next');
        prev_controll.on('click',function(){
            owl.trigger('owl.prev');
        });
        next_controll.on('click',function(){
            owl.trigger('owl.next');
        });
    }

    var enki_4_shop_list_2 = jQuery('.enki-module-shop-list.style-02');
    if(enki_4_shop_list_2.length) {
        var owl2 = jQuery('.owl-carousel.enki-carousel-11');
        owl2.owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 4],
            itemsTablet : [1023,3],
            itemsMobile : [767,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        });
        var prev_controll = enki_4_shop_list_2.find('.enki-owl-prev');
        var next_controll = enki_4_shop_list_2.find('.enki-owl-next');
        prev_controll.on('click',function(){
            owl2.trigger('owl.prev');
        });
        next_controll.on('click',function(){
            owl2.trigger('owl.next');
        });
    }

    var enki_4_shop_list_3 = jQuery('.enki-module-shop-list.style-03');
    if(enki_4_shop_list_3.length) {
        var owl3 = jQuery('.owl-carousel.enki-carousel-12');
        owl3.owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 4],
            itemsTablet : [1023,3],
            itemsMobile : [767,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        });
        var prev_controll = enki_4_shop_list_3.find('.enki-owl-prev');
        var next_controll = enki_4_shop_list_3.find('.enki-owl-next');
        prev_controll.on('click',function(){
            owl3.trigger('owl.prev');
        });
        next_controll.on('click',function(){
            owl3.trigger('owl.next');
        });
    }

    var enki_4_shop_list_4 = jQuery('.enki-module-shop-list.style-04');
    if(enki_4_shop_list_4.length) {
        var owl4 = jQuery('.owl-carousel.enki-carousel-13');
        owl4.owlCarousel({
            items: 4,
            itemsDesktopSmall : [1160, 4],
            itemsTablet : [1023,3],
            itemsMobile : [767,1],
            pagination: false,
            slideSpeed: 600,
            navigationText: false,
            navigation: false
        });
        var prev_controll = enki_4_shop_list_4.find('.enki-owl-prev');
        var next_controll = enki_4_shop_list_4.find('.enki-owl-next');
        prev_controll.on('click',function(){
            owl4.trigger('owl.prev');
        });
        next_controll.on('click',function(){
            owl4.trigger('owl.next');
        });
    }
});

var sync1 = jQuery(".sync1");
var sync2 = jQuery(".sync2");

function syncPosition(el){
    var current = this.currentItem;
    sync2
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if(sync2.data("owlCarousel") !== undefined){
      center(current)
    }
}

function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }

    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if( num - 1 === -1 ) {
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
}


// Collapse.
(function($) {
  jQuery.fn.accordion = function(options) {
    var defaults = {
        open: false,
        toggle: false
    }
    var settings = jQuery.extend({}, defaults, options);

    return this.each(function() {
        var accTitle = jQuery(this).children('.acc-title');

        accTitle.each(reset);

            jQuery(this).children('.acc-title').each(function() {
                if (jQuery(this).hasClass('active')) {
                    jQuery(this).next().show();
                }      
            });

            if(settings.toggle) {
                accTitle.on('click',onClickTog);
            } else {
                accTitle.on('click',onClickAcc);         
            }
        });

    function onClickAcc() {
        jQuery(this).siblings('.acc-title').removeClass('active');
        jQuery(this).addClass('active');

        jQuery(this).siblings('.acc-title').each(hide);
        jQuery(this).next().slideDown(400);
        return false;
    }

    function onClickTog() {   
        jQuery(this).toggleClass('active');

        if(jQuery(this).hasClass('active')) {
            jQuery(this).next().slideDown(400);
        } else {
            jQuery(this).next().slideUp(400);
        }
        return false;
    }

    function hide() {
        jQuery(this).next().slideUp(400);
    }

    function reset() {
        jQuery(this).next().hide();
    }
  }
})(jQuery);



//Enki portfolio archive default.
var $enki_portfolio_archive         = '';
var $enki_portfolio_archive_masonry = '';
var $enki_portfolio_archive_filter  = '';
var $enki_portfolio_more_button     = '';

// Ready.
jQuery( document ).ready( function($) {
  Enki_Share.init();
  Enki_Archive.init();
  Enki_Mail.init();
  Enki_Single.init();
  Enki_Effect.init();
  Enki_Styling.grab();
});

// Loaded.
jQuery( window ).on( 'load', function( $ ) {
    Enki_Portflio_Archive_Default.init();
    Enki_Portflio_Archive_Second.init();
});

// Objects.
var Enki_Effect = {
    init: function(){
        var $blocks = jQuery( '.enki-effect' );
        if( $blocks.length && !Enki_Effect.is_mobile() ){
            new WOW().init();            
        }       
    },
    is_mobile: function(){
        var $is_mobile = false;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $is_mobile = true;
        }
        return $is_mobile;
    }
};

var Enki_Share = {
    init: function() {
        jQuery('.social-share-list, .kopa-social-links').on( 'click', 'a', function(event) {
            if( !jQuery(this).hasClass( 'enki-author-sc-link' ) ){
              event.preventDefault();
              window.open(jQuery(this).attr('href'), '', 'width=320, height=320');
            }
        });
    }     
};

var Enki_Single = {
    init: function(){
        Enki_Single.create_gallery();        
    },
    create_gallery: function(){
        var galleries = jQuery( '.enki-single-gallery.enki-style-01 .owl-carousel' );
        if( galleries.length ){
            jQuery.each( galleries, function() {
                jQuery(this).owlCarousel( {
                    autoPlay: true,
                    responsive: true,
                    items: 1,
                    singleItem : true,
                    navigation: true,
                    pagination : false,
                    navigationText: [ '', '' ]
                } );
            } );
        }
    }
};

var Enki_Archive = {
    init: function(){
        jQuery('#enki_button_more').on( 'click', '.enki-loadmore.style-01', function(event) {
            event.preventDefault();

            var $container = jQuery( '.enki-blog-list-wrapper' );
            var $button    = jQuery( this );
            var $icon      = $button.find( '.fa-refresh' );
            var $link      = $button.find( 'a' );

            if( !$button.hasClass( 'enki-loading' ) ){
                
                $button.addClass( 'enki-loading' );             
                $icon.addClass( 'fa-spin' );

                jQuery.ajax( { 
                    url: $link.attr( 'href' ),
                    dataType: 'html',
                    type: 'POST',
                    async: true
                } ).done( function( data ) {

                    var $posts     = jQuery( data ).find( '.enki-blog-list-wrapper .enki-item' );
                    var $next_link = jQuery( data ).find( '#enki_button_more a' );                                   

                    if( $posts.length ){                                        

                        imagesLoaded( $posts, function() {
                            jQuery.each( $posts, function() {                         
                                $container.append( jQuery(this) );
                            });
                        });
                        
                        if( $next_link.length ){
                            $link.attr( 'href', $next_link.attr( 'href' ) );
                        }else{
                            $button.remove();
                        }

                        $icon.removeClass( 'fa-spin' );
                        $button.removeClass( 'enki-loading' );

                    } else {
                        $button.remove();
                    }
                    
                });

            }

        });
    }
};

var Enki_Button_Like = {
    click: function( event, $button ){

        event.preventDefault();             

        if( !$button.hasClass( 'enki-loading' ) ){
            
            var $icon    = $button.find( '.enki-icon' );
            var $text    = $button.find( 'span' );
            var $post_id = $button.attr( 'data-enki-id' );

            jQuery.ajax( {
                beforeSend: function( jqXHR ) {
                    $button.addClass( 'enki-loading' );
                    $icon.removeClass( 'ti-heart' ).addClass( 'ti-reload' ).addClass( 'fa-spin' );
                },
                success: function( data, textStatus, jqXHR ) {
                    $text.text( data );
                },
                complete: function(){
                    $button.removeClass( 'enki-loading' );
                    $icon.removeClass( 'ti-reload' ).removeClass( 'fa-spin' ).addClass( 'ti-heart' );
                },
                url: enki.ajax.url,
                dataType: 'html',
                type: 'POST',
                async: true,
                data: {
                    action: 'enki_click_like_button',
                    security: jQuery('#enki_nonce_for_like_button').val(),
                    post_id: $post_id
                }
            } );
        }

    }
};

var Enki_Mail = {
    init: function(){

        var $contact_form = jQuery( '.contact-form' );

        if($contact_form.length) {

            if( !$contact_form.hasClass( 'contact-form--sending' ) ) {

            		$contact_form.addClass( 'contact-form--sending' );

                jQuery('.contact-form').validate( {
                    rules: {
                        name: {
                            required: true,
                            minlength: 5
                        },
                        email: {
                            required: true,
                            email: true
                        },                        
                        message: {
                            required: true,
                            minlength: 15
                        },                       
                        subject: {
                            required: true,
                            minlength: 3
                        }
                    },            
                    messages: {
                        name: {
                            required:  enki.translate.validate.name.required,
                            minlength: jQuery.format( enki.translate.validate.global.minlength )
                        },
                        subject: {
                            required: enki.translate.validate.subject.required,
                            minlength: jQuery.format( enki.translate.validate.global.minlength )
                        },
                        email: {
                            required: enki.translate.validate.email.required,
                            email: enki.translate.validate.email.email
                        },
                        message: {
                            required: enki.translate.validate.message.required,
                            minlength: jQuery.format( enki.translate.validate.global.minlength )
                        }
                    },
                    submitHandler: function( form ) {
                        
                        jQuery(form).ajaxSubmit({
                            clearForm: true,
                            resetForm: true,
                            beforeSend: function(){                            	
                            	$contact_form.find( '#submit-contact' ).text( enki.translate.sending );
                            },
                            success: function(responseText, statusText, xhr, jQueryform) {    
                          		$contact_form.removeClass( 'contact-form--sending' );                    
                              alert( responseText );                              
                              $contact_form.find( '#submit-contact' ).text( enki.translate.sent );
                            }
                        });
                    }
                });

            }
            
        }

    }
};

var Enki_Portflio_Archive = {
    build_layout: function(){       
        if( $enki_portfolio_archive.length ) {              

            $enki_portfolio_archive_masonry.imagesLoaded(function(){
                $enki_portfolio_archive_masonry = $enki_portfolio_archive_masonry.masonry({
                    columnWidth : 1,
                    itemSelector : '.enki-item'
                });
            });
        }
    },
    active_filter: function(){
        if( $enki_portfolio_archive.length ) {
            $enki_portfolio_archive_filter.on('click', 'li', function( event ) {
                event.preventDefault();
                
                var $_data = jQuery( this ).data( 'filter' );

                jQuery(this).parent().find( 'li' ).removeClass( 'active' );
                jQuery(this).addClass( 'active' );

                $enki_portfolio_archive_masonry.find('.enki-item').each( function(){

                    var $_link = jQuery(this).data('filter').toString().split(',').indexOf( $_data.toString() ) > -1;

                    if ( '*' == $_data ) {
                        jQuery(this).removeClass( 'hide' );
                        jQuery(this).addClass( 'show' );
                    } else {
                        if ( $_link ) {
                            jQuery(this).removeClass( 'hide' );
                            jQuery(this).addClass( 'show' );  
                        } else {
                            jQuery(this).removeClass( 'show' );
                            jQuery(this).addClass( 'hide' );
                        }
                    }

                });

                $enki_portfolio_archive_masonry.masonry('layout');
            });     
        }
    },
    active_loadmore: function(){
        if( $enki_portfolio_more_button.length ) {
            $enki_portfolio_more_button.on( 'click', '.enki-loadmore', function() {
                
                var $icon  = $enki_portfolio_more_button.find( '.fa-refresh' );
                var $link  = $enki_portfolio_more_button.find( 'a' );       
                var $index = parseInt( $enki_portfolio_archive.find( '.enki-item' ).last().attr( 'data-index' ), 10 );

                if( !$enki_portfolio_more_button.hasClass( 'enki-loading' ) ){

                    $enki_portfolio_more_button.addClass( 'enki-loading' );             
                    $icon.addClass( 'fa-spin' );

                    jQuery.ajax( { 
                        url: $link.attr( 'href' ),
                        method: 'post',
                        data:{
                            enki_index: $index
                        }
                    } ).done( function( data ) {                        

                        var $projects        = jQuery(data).find( '.enki-module-portfolio .enki-item' );                                                    
                        var $next_link       = jQuery(data).find( '.enki-loadmore a' );
                        
                        var $current_filters = $enki_portfolio_archive_filter.find('li.enki_index' );
                        var $new_filters     = jQuery(data).find( '.enki-module-portfolio .filters-options li.enki_index' );

                        if( $projects.length ){

                            // Append new project.
                            imagesLoaded( $projects, function() {
                                jQuery.each( $projects, function(){
                                    $enki_portfolio_archive_masonry.append( jQuery( this ) ).masonry( 'appended', jQuery( this ) );
                                });
                            });
                            
                            if( $next_link.length ){
                                $link.attr( 'href', $next_link.attr( 'href' ) );
                            }else{
                                $enki_portfolio_more_button.remove();
                            }

                            // Append new filter index.
                            jQuery.each( $new_filters, function(){
                                var $_index = parseInt( jQuery(this).attr('data-filter'), 10 );
                                var $_text  = jQuery(this).text();
                                
                                if( !$enki_portfolio_archive_filter.find( 'li.enki_index[data-filter='+$_index+']' ).length ){
                                    var $_html = jQuery( '<li class="enki_index" data-filter="'+$_index+'">'+$_text+'</li>' );
                                    $enki_portfolio_archive_filter.append( $_html );
                                }
                            });

                            // Change loadmore icon & text.
                            $icon.removeClass( 'fa-spin' );
                            $enki_portfolio_more_button.removeClass( 'enki-loading' );

                        }else{
                            $enki_portfolio_more_button.remove();
                        }
                        
                    });

                }

            } );
        }   
    }
};

var Enki_Portflio_Archive_Default = {
    init: function(){
        if( jQuery( '.enki-module-portfolio.style-03' ).length ){

            $enki_portfolio_archive         = jQuery( '.enki-module-portfolio.style-03' );
            $enki_portfolio_archive_masonry = jQuery( '.enki-module-portfolio.style-03 .widget-content' );
            $enki_portfolio_archive_filter  = jQuery( '.enki-module-portfolio.style-03 .filters-options' );
            $enki_portfolio_more_button     = jQuery( '#enki_button_more__porfolio' );
            
            Enki_Portflio_Archive.build_layout();
            Enki_Portflio_Archive.active_filter();
            Enki_Portflio_Archive.active_loadmore();        
        }
    }
};

var Enki_Portflio_Archive_Second = {
  init: function(){
    if( jQuery( '.enki-module-portfolio.style-07' ).length ){
      $enki_portfolio_archive         = jQuery( '.enki-module-portfolio.style-07' );
      $enki_portfolio_archive_masonry = jQuery( '.enki-module-portfolio.style-07 ul' );
      $enki_portfolio_archive_filter  = jQuery( '.enki-module-portfolio.style-07 .filters-options' );
      $enki_portfolio_more_button     = jQuery( '#enki_button_more__porfolio' );
  
      Enki_Portflio_Archive.build_layout();
      Enki_Portflio_Archive.active_filter();
      Enki_Portflio_Archive.active_loadmore();        
    }
  }
};

var Enki_Styling = {
    grab: function() {
			var $codes  = jQuery( '.enki-embed-styling' )
			var str_css = '';

			if( $codes.length ) {
    	
				var is_use_builder = parseInt( enki.addon.is_use_builder, 10 );
				var post_id        = parseInt( enki.ajax.post_id, 10 );
				var is_page_cached = parseInt( enki.cache.is_page_cached, 10 );
				
				if( is_use_builder && post_id && !is_page_cached ) {

					jQuery.each( $codes, function() { 					
						var $code = jQuery( this );
						str_css += $code.html();					
						$code.remove();
					});

					if( str_css ) {
						jQuery( 'head' ).append( '<style type="text/css">' + str_css + '</style>' );
						Enki_Styling.save( is_use_builder, post_id, is_page_cached, str_css );
					}
				}else{
					$codes.remove();
				}

			}
    },
    save: function( is_use_builder, post_id, is_page_cached, str_css ) {	
      jQuery.ajax( {
        url: enki.ajax.url,
        dataType: 'text',
        type: 'POST',
        async: true,
        data: {
        	action: 'enki_save_builder_styling',
        	security: enki.ajax.nonces.save_builder_styling,
        	post_id: enki.ajax.post_id,
        	css: str_css
        }
      } );			
    }
};
