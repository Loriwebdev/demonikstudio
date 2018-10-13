( function( $ ) {
    "use strict";

    var CL_FRONT = window.CL_FRONT || {};
    window.CL_FRONT = CL_FRONT;


    CL_FRONT.components = CL_FRONT.components || {};
    CL_FRONT.helpers = CL_FRONT.helpers || {};

    /**
     * Main Site Init
     * 
     * @since 1.0.0
     */
    CL_FRONT.siteInit = function() {
        "use strict";

        this.defaultConfig();
        this.bindEvents();
    };

    /**
     * Init Default Variables
     * 
     * @since 1.0.0
     */
    CL_FRONT.defaultConfig = function() {
        "use strict";

        this.config = {

            // Load dynamic scripts
            _loadedDependencies: [],
            _inQueue: {},

            // Default Config
            $window: $( window ),
            $document: $( document ),
            $windowWidth: $( window ).width(),
            $windowHeight: $( window ).height(),
            $windowTop:  typeof window.pageYOffset != 'undefined' ? window.pageYOffset: document.documentElement.scrollTop? document.documentElement.scrollTop: document.body.scrollTop? document.body.scrollTop:0,
            $containerWidth: 0,
            $containerOffsetLeft: 0,

            $html: $( 'html' ),
            $body: $( 'body' ),
            $viewport: $( '#viewport' ),
            $header: $( '.header_container' ),
            $headerTools: $('.header_container .extra_tools_wrapper'),
            $initSliders : {},
            $navigation: $( '.cl-header-menu' ),
            $navigation: $( '.cl-primary-navigation.use-for-responsive' ),
            $customResponsiveNavigation : $( '.cl-custom-responsive-navigation' ),

            $responsiveMenu: null,
            $content: $( '#content' ),
            $aside: $( '#secondary' ),
            $main: $( '#main' ),

            $pageLayout: 'fullwidth',
            $headerHeight: 0,
            $layoutModern: false,
            $asideTop: 0,
            $asideHeight: 0,
            $asideStickyOffset: 0,

            $isMobileScreen: false,
            $isTabletScreen: false,
            $isDesktopScreen: false,

            $isMobileDevice: false,
            $isMobileOrTabletDevice: false,

            $isSmoothScroll: false,
            $isCustomizer: false,

            $headerToolsInit: false,
            $headerToolsList: [],

            $cssInQueue: {},
        }


    };

    /**
     * Bind Events of site
     * 
     * @since 1.0.0
     * @version 1.0.2
     */
    CL_FRONT.bindEvents = function() {
        "use strict";

        var self = this;

        // Document Ready
        self.config.$document.ready( function() {
            self.updateConfig();
            self.loadAsyncIcons();
            // Menu
            self.initMenuDropdown();
            self.initToolsDropdown();
            self.initMenuResponsive();
            self.responsiveFixes();
            self.initToolsResponsive();
            self.initHeaderStyles();
            self.initHeaderSticky();
            self.headerSearch();
            self.searchAutoComplete();

            // Initialize Post Functionalities
            self.postInit();

            // Infinite Pagination
            self.paginationInfinite();

            self.isotopeBlogGrid();
            self.isotopePortfolioGrid();
            self.itemILightBox();
  
            // Various sizes and positions fixes
            self.fixModernLayoutWidth();
            self.fixPostVideoHeight();
            self.fixCompatibilities();
            self.fixMegaMenuPosition();
            self.init_cl_page_header();

            if( ! self.config.$isCustomizer ){
                self.codelessSlider();
            }else{
                $('.cl_slider').addClass('loading-on-end loading-end');
            }

            self.testimonialCarousel();
            self.clientsCarousel();
            self.teamCarousel();
            self.galleryCarousel();

            self.rowParallax();

            self.progressBar();
            self.mediaElement();
            self.codelessGMap();
            self.contactForm();
            self.codelessToggles();
            self.codelessTabs();
            self.shopFixes();
            self.shopInit();
            self.instaFeed();
            self.shopBtnClasses();

            self.creativeSearch();
            self.partialRefreshRendered();
            self.cl_woocommerce_add_to_cart_variable();

            self.footerReveal();
            self.pageTransition();
            self.countdownElement();
            
            if( $('.lazyload').length > 0 )
                self.components.LazyLoad();

            self.onePageScroll();

            self.shopTabbed();

            self.closedSections();

            self.sideNavigation();
            self.multiscroll();
            self.quickView();
            self.ajaxProductAdd();
            self.equalHeightMobile();
            self.sideCart();
            self.nanoScroller();
            self.xBrowserFixes();
            self.addedToWishlist();

            self.scrollToTopButton();
        } );

        // Window load
        self.config.$window.on( 'load', function() {
            self.postInstagram();
            self.livePhoto();
            self.convertSVGAnimated();
            self.rowParallax();
            self.shopBtnClasses();
            //self.shopProductThumbnails();
            self.shopInit();

            $('.stars > span > a').on('click', function(){
                var $container = $(this).closest('.cl-review-info');
                
                if( ! $container.hasClass('show-all') )
                    $container.addClass('show-all');
            });

        } );

        // Window Resize
        self.config.$window.resize( function() {
            self.updateDimensions();
            self.initMenuResponsive();
            self.initToolsResponsive();
            self.fixModernLayoutWidth();
            self.fixPostVideoHeight();
            self.stickySidebar();
            //self.stickyColumn();
            self.fixPageHeaderCenter();
            self.initHeaderSticky();
            self.headerSearch();
            self.equalHeightMobile();

            
        } );

        // Window Scroll
        self.config.$window.scroll( function() {
            self.config.$windowTop =  typeof window.pageYOffset != 'undefined' ? window.pageYOffset: document.documentElement.scrollTop? document.documentElement.scrollTop: document.body.scrollTop? document.body.scrollTop:0;;
            self.stickySidebar();
            
            //self.stickyColumn();
        } );

        // Window on Orientation Change Tablets
        self.config.$window.on( 'orientationchange', function() {
            self.updateDimensions();
            self.initMenuResponsive();
            self.initToolsResponsive();
            self.fixPageHeaderCenter();
            self.footerReveal();
        } );

        self.config.$window.on( 'click', function(e) {
            if( $(e.target).closest( '.cl-review-info' ) || $(e.target).is( '.cl-reivew-info' ) )
                return;

            $('.cl-review-info').removeClass('show-all');
        } );


    };

    /**
     * Update Config Dom
     * 
     * @since 1.0.0
     */
    CL_FRONT.updateConfig = function() {
        this.config.$html = $( 'html' );
        this.config.$body = $( 'body' );
        this.config.$viewport = $( '#viewport' );
        this.config.$header = $( '.header_container' );
        this.config.$navigation = $( '.cl-header-menu' );
        this.config.$navigationResponsive = $( '.cl-primary-navigation.use-for-responsive' );
        this.config.$customResponsiveNavigation = $( '.cl-custom-responsive-navigation' );

        this.config.$headerTools = $('.header_container .extra_tools_wrapper');
        this.config.$content = $( '#content' );
        this.config.$aside = $( '#secondary' );
        this.config.$main = $( '#main' );

        this.config.$pageLayout = this.config.$content.hasClass( 'cl-layout-left_sidebar' ) ? 'left_sidebar' :
            this.config.$content.hasClass( 'cl-layout-right_sidebar' ) ? 'right_sidebar' :
            this.config.$content.hasClass( 'cl-layout-dual' ) ? 'dual_sidebar' : 'fullwidth';

        if ( this.config.$content.hasClass( 'cl-layout-modern' ) )
            this.config.$layoutModern = true;

        this.config.$isMobileDevice = this.mobileDeviceCheck();
        this.config.$isMobileOrTabletDevice = this.mobileOrTabletDeviceCheck();

        this.config.$isSmoothScroll = this.config.$body.hasClass( 'cl-smoothscroll' ) ? true : false;

        if( $('.cl_counter').length > 0 )
            this.preloadOdometer();

        this.updateDimensions();
    };

    /**
     * Check if page is loaded from mobile
     * 
     * @since 1.0.0
     */
    CL_FRONT.mobileDeviceCheck = function() {
        var check = false;
        ( function( a ) {
            if ( /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test( a ) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test( a.substr( 0, 4 ) ) ) check = true;
        } )( navigator.userAgent || navigator.vendor || window.opera );
        return check;
    }


    /**
     * Check if page is loaded from mobile or tablet
     * 
     * @since 1.0.0
     */
    CL_FRONT.mobileOrTabletDeviceCheck = function() {
        var check = false;
        ( function( a ) {
            if ( /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test( a ) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test( a.substr( 0, 4 ) ) ) check = true;
        } )( navigator.userAgent || navigator.vendor || window.opera );
        return check;
    }


    /**
     * Update Dimension of page, used on screen resize
     * 
     * @since 1.0.0
     */
    CL_FRONT.updateDimensions = function() {
        this.config.$windowWidth = $( window ).width();
        this.config.$windowHeight = $( window ).height();

        if ( window.matchMedia ) {
            this.config.$isMobileScreen = window.matchMedia( '( max-width: 767px )' ).matches;
            this.config.$isTabletScreen = window.matchMedia( '( min-width: 768px ) and (max-width: 991px)' ).matches;
            this.config.$isDesktopScreen = window.matchMedia( '( min-width: 992px )' ).matches;
        } else {
            this.config.$isMobileScreen = this.config.$windowWidth <= 768;
            this.config.$isTabletScreen = this.config.$windowWidth > 768 && this.config.$windowWidth <= 991;
            this.config.$isDesktopScreen = this.config.$windowWidth > 992;
        }

        this.config.$containerWidth =  this.config.$header.hasClass('header-top') ? this.config.$header.find( '.header-row-inner' ).width() : this.config.$content.find( '.container' ).width();
        if( this.config.$header.hasClass('header-top') ){
            this.config.$containerOffsetLeft = this.config.$header.find( '.c-left.header-col' ).length > 0 ? this.config.$header.find( '.c-left.header-col' ).offset().left : this.config.$content.find( '.container' ).offset().left - 15;
        }else
            this.config.$containerOffsetLeft = 0;

        
        var container_offset = this.config.$content.find( '.container' ).length > 0 ?  this.config.$content.find( '.container' ).offset().left : 0
        this.config.$containerOffsetLeft = this.config.$header.hasClass('header-top') ? this.config.$header.find( '.c-left.header-col' ).offset().left : container_offset - 15;
        this.config.$headerHeight = this.config.$header.height();
      
        
        
    }


    CL_FRONT.fixCompatibilities = function(){
        if( bowser.msie && bowser.version <= 9 ){
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.requestAnimationFrame.js'], function(){

            });

            CL_FRONT.config.$html.addClass('no-cssanimations');
        }
    }


    CL_FRONT.equalHeightMobile = function(){
        if( $( '.cl_row-equal_height' ).length == 0 )
            return;
        

        $( '.cl_row-equal_height:not(.cl_row-fullheight)' ).each(function(){
            var $row = $(this);
            var $cols = $row.find( '.cl-element.cl_column' );

            $row.imagesLoaded(function(){

                if( CL_FRONT.config.$isMobileScreen ){
                    var $col = $cols.first().find( '.cl_column_inner' ).first();
                    if( $col.length == 0 )
                        $col = $cols.first();

                    var $height = $col.height();
                    setTimeout(function(){
                        if( $col.hasClass('cl_column_inner') )
                            $cols.not($col).css('min-height', $height + 'px');
                        else
                            $cols.not($col).height( $height + 'px' );
                    }, 100);
                }else{
                    $cols.css('height', '');
                }
            })
        });
        
    }


    CL_FRONT.xBrowserFixes = function(){
        "use strict";
        if(bowser.gecko){
            if( $('.qty').length > 0 ){
                $('.qty').each(function(){
                    var $parent = $(this).parent();
                    $parent.addClass('firefox-fix'); 
                })
            }
            
        }
    }

    /**
     * Initialize Menu in Responsive
     * 
     * @since 1.0.0
     */

    CL_FRONT.initMenuResponsive = function() {
        "use strict";
        var self = this;

        if( this.config.$windowWidth <= 991 && this.config.$responsiveMenu === null  ){

            

            if( this.config.$navigationResponsive.closest('.cl-fullscreen-overlay-menu').length == 0 )
                this.config.$navigationResponsive.addClass('cl-hide-on-mobile');
            else{
                this.config.$navigationResponsive.addClass('vertical-menu').addClass('cl-mobile-menu');
                return;
            }

            this.config.$responsiveMenu = this.config.$navigationResponsive.clone();
      
            if( this.config.$customResponsiveNavigation.length > 0 ){
                this.config.$responsiveMenu = this.config.$customResponsiveNavigation;
                 this.config.$customResponsiveNavigation.remove();
            }

            this.config.$responsiveMenu.appendTo(this.config.$header);
            this.config.$responsiveMenu.removeClass( 'cl-hide-on-mobile' ).addClass( 'cl-mobile-menu' );

            $( '.cl-mobile-menu-button' ).on( 'click', function( ){
                var button = $(this);
                button.toggleClass( 'open' );
                self.config.$responsiveMenu.slideToggle('200');         
                CL_FRONT.animations( self.config.$responsiveMenu , true );

            } );

            $( 'nav li.hasSubMenu > a', this.config.$responsiveMenu ).on( 'click', function( e ){
                var li = $(this).parent();
                e.preventDefault();
                li.toggleClass('open');
                li.parent().find('li').not(li).removeClass('open');             
                li.children( '.sub-menu, .codeless_custom_menu_mega_menu' ).slideToggle('300');

            } );

            $( 'nav .codeless_custom_menu_mega_menu > ul > li.hasSubMenu', this.config.$responsiveMenu ).on( 'click', function( e ){
                var li = $(this),
                    element = e.target || e.srcElement;

                if( element.nodeName != 'A' ){
                    li.toggleClass('open');
                    li.parent().find('li').not(li).removeClass('open');

                    li.children( '.sub-menu' ).slideToggle('300');
                }
                
                
            } );

        }else{

            if( this.config.$responsiveMenu != null )
                this.config.$responsiveMenu.addClass('cl-hide-not-mobile');

            if( typeof this.config.$navigationResponsive !== 'undefined' && this.config.$navigationResponsive.closest('.cl-fullscreen-overlay-menu').length > 0 ){
                this.config.$navigationResponsive.removeClass('cl-mobile-menu');
                return;
            }

        }

        if( this.config.$windowWidth > 991 )
            this.config.$header.removeClass('cl-responsive-header');
        else
            this.config.$header.addClass('cl-responsive-header');
    }



    CL_FRONT.responsiveFixes = function(){
        "use strict";

        if( $( '.cl-mobile-menu-button', '.extra_row' ).length > 0 || $( '.header-el:not(.cl-h-cl_header_menu)', '.extra_row' ).length > 0 ){
            $('.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row').addClass('not-empty-row');
        }

        if( $('.cl-h-cl_header_tools').length > 1 ){

            $('.cl-h-cl_header_tools').each(function(index){
                if(index != $('.cl-h-cl_header_tools').length - 1)
                    $(this).find('.cl-mobile-menu-button').remove();
            });
        }
    }
    


    /**
     * This function init all related functions of a specific header or menu style 
     *
     * @since 1.0.0
     */
    CL_FRONT.initHeaderStyles = CL_FRONT.init_cl_header_menu =  function(){
        "use strict";

        // Hamburger - overlay
        if( $('.cl-overlay-menu').length > 0 ){
            CL_FRONT.overlayMenu();
        }else if( this.config.$header.hasClass('header-left') || this.config.$header.hasClass('header-right') ) {
            CL_FRONT.initHeaderSide();
        }

        setTimeout(function(){
            CL_FRONT.animations( $('#navigation'), true );
        }, 300);
    },


    CL_FRONT.initHeaderSide = function(){
        
        
    },


    CL_FRONT.sideCart = function(){
        if( $('.cart-style-side').length == 0 )
            return; 

        var $tool = $('.cart-style-side').closest('.shop.tool');
        var $btn = $tool.find('.tool-link');
      
        $btn.on('click', function(e){
            e.preventDefault();
            if( CL_FRONT.config.$body.hasClass('open-side-cart') ){

                CL_FRONT.config.$body.removeClass('open-side-cart');
                $('html').css('overflow', '');
            }
            else{
                $('html').css('overflow', 'hidden');
                CL_FRONT.config.$body.addClass('open-side-cart');
            }

        });

        $('.cart-style-side').find( '.close' ).on('click', function(e){
            e.preventDefault();
            $('html').css('overflow', '');
            CL_FRONT.config.$body.removeClass('open-side-cart');
        })
    }


    /**
     * Init Header Sticky
     *
     * @since 1.0.0
     * @version 1.0.8
     */
    CL_FRONT.initHeaderSticky = function(){
        "use strict";

        if( ! this.config.$header.hasClass( 'cl-header-sticky' ) )
            return;

        var is_active = false;
        

        if( !CL_FRONT.config.$header.hasClass('cl-transparent') && CL_FRONT.config.$isDesktopScreen ){

            var header_height = CL_FRONT.config.$header.height();
            CL_FRONT.config.$main.css({

                marginTop: header_height+'px',

            });

        }else{

            CL_FRONT.config.$main.css({

                 marginTop: '0px',

            });
        }

        var onScroll = function(){

            if( ! CL_FRONT.config.$header.hasClass( 'cl-header-sticky' ) )
                return;

            var stickyContentColor = CL_FRONT.helpers.parseData( CL_FRONT.config.$header.attr('data-sticky-content-color'), 'dark' );
            var site_header = CL_FRONT.config.$body.hasClass('cl-header-light') ? 'light' : 'dark';

            if( CL_FRONT.config.$windowTop > 500 && ! is_active ){
                
                

                setTimeout(function(){
                    CL_FRONT.config.$header.addClass('cl-header-sticky-prepare');
                }, 100);
                

                if( stickyContentColor == 'dark' )
                    CL_FRONT.config.$header.removeClass('cl-header-light');
                if( stickyContentColor == 'light' && site_header == 'dark' )
                    CL_FRONT.config.$header.addClass('cl-header-light');

                
                setTimeout( function(){

                   if( CL_FRONT.config.$windowTop > 510 )  
                    CL_FRONT.config.$header.addClass('cl-header-sticky-ready');  

                }, 400);
                
                setTimeout( function(){

                   if( CL_FRONT.config.$windowTop > 510 ){ 
                       CL_FRONT.config.$header.addClass('cl-header-sticky-active');  
                       is_active = true;  
                    }

                }, 600); 

            }else if( CL_FRONT.config.$windowTop <= 500 ) {

                CL_FRONT.config.$header.removeClass('cl-header-sticky-active');

                if( site_header == 'dark' ){
                    CL_FRONT.config.$header.removeClass('cl-header-light');

                }
                else if( site_header == 'light' && ! CL_FRONT.config.$header.hasClass('cl-header-light') )
                    CL_FRONT.config.$header.addClass('cl-header-light');

                setTimeout( function(){

                   CL_FRONT.config.$header.removeClass('cl-header-sticky-ready'); 

                }, 100);

                setTimeout( function(){
                    CL_FRONT.config.$header.removeClass('cl-header-sticky-prepare');    
                   is_active = false;
               }, 100);
            }
        }

        window.addEventListener('scroll', onScroll, false);
    },


    /**
     * Bind hamburger click and open overlay
     *
     * @since 1.0.0
     * @version 1.0.6
     */
    CL_FRONT.overlayMenu = function(){
        "use strict";

        

        $('.cl-hamburger-menu').on( 'click', function(e){
            e.preventDefault();



            if( $('.cl-hamburger-menu').hasClass( 'open' ) ){
                setTimeout( function(){
                    $('.cl-hamburger-menu').removeClass( 'open' );
                    CL_FRONT.config.$header.removeClass('cl-actived-fullscreen-header');
                }, 500);
            }else{
                $('.cl-hamburger-menu').addClass( 'open' );
                CL_FRONT.config.$header.addClass('cl-actived-fullscreen-header');
            }

            
            $('.cl-overlay-menu').toggleClass( 'open' );

            if( $('#navigation .animate_on_visible').length > 0 && $('.cl-overlay-menu').hasClass( 'open' ) ){
                setTimeout(function(){
                    CL_FRONT.animations( $('#navigation'), true );
                }, 500);
            }
            
            if( $('#navigation .animate_on_visible').length > 0 && ! $('.cl-overlay-menu').hasClass( 'open' ) ){
                setTimeout(function(){
                    $('#navigation .animate_on_visible').removeClass('start_animation');
                }, 500); 
            }

        } );
        
    },  

    /** 
      * Page transition Effects
      *
      * @since 1.0.0
      */

     CL_FRONT.pageTransition  = function(){
        "use scrict";

        if( ! this.config.$viewport.hasClass( 'animsition' ) )
            return;

        $(".animsition").animsition({

            inClass               :   $(this).data('animsition-in'),
            outClass              :   $(this).data('animsition-out'),
            inDuration            :   $(this).data('animsition-in-duration'),
            outDuration           :   $(this).data('animsition-out-duration'),
            linkElement           :   'a:not([target="_blank"]):not([href^="#"]):not(.lightbox-gallery):not(.entry-link.lightbox):not([class^="ilightbox-"]):not(.zoom):not(.prettyphoto)'

        });

     },

     CL_FRONT.sideNavigation  = function(){
        "use scrict";

        if( $('.cl-sidenav ul').length == 0 )
            return;

        var $element = $('.cl-sidenav ul');
        var $parent = $element.closest( '.cl-sidenav' );
        var scrollHeight = $element[0].scrollHeight;
        var elementHeight = $element.height();
        var activedOffset = $element.find('.current_page_item')[0].offsetTop;

        var val = $element.scrollTop();

        if( val == null )
            val = 0;
        

        $element.scroll(function(){
            val = $(this).scrollTop();
            calc();
        });

        var calc = function(){
            if( val <= 90 )
                $parent.addClass('hideBefore');
            else
                $parent.removeClass('hideBefore');


            if( val + elementHeight >= scrollHeight - 90 )
                $parent.addClass('hideAfter');
            else
                $parent.removeClass('hideAfter');
        };

        if( activedOffset < elementHeight - 90 || activedOffset < 90 )
            $element[0].scrollTop = 0;
        else if( activedOffset > elementHeight - 90 || activedOffset < scrollHeight - 90)
            $element[0].scrollTop = activedOffset;

        calc();
        
     },


    CL_FRONT.searchAutoComplete = function(){
        if( $('.header_container .search-element').length == 0 )
            return;

        var url = codeless_global.ajax_url + '?action=codeless_search_autocomplete',
            form = $('.header_container .search-element .search-form'),
            
            escapeRegExChars = function (value) {
                return value.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            };
        CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.autocomplete.min.js' ], function() {
            form.each(function() {
                var $this = $(this),
                    number = 10,
                    product_cat = $this.find('#clcat').val(),
                    $results = $this.find('.ajax-results'),
                    postType = 'product';

                if( number > 0 ) {
                    url += '&number=' + number;
                }

                url += '&post_type=' + postType;

                if(product_cat) {
                    url += '&product_cat=' + product_cat;
                }

                $this.find('[type="search"]').autocomplete({
                    serviceUrl: url,
                    appendTo: $results,

                    onSelect: function (suggestion) {
                        if( suggestion.permalink.length > 0)
                            window.location.href = suggestion.permalink;
                    },
                    onSearchStart: function (query) {
                        $this.addClass('search-loading');
                    },
                    
                    beforeRender: function (container) {

                      
                    },
                    
                    onSearchComplete: function(query, suggestions) {
                        $this.removeClass('search-loading');
                        CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.nanoscroller.min.js' ], function() {
                        
                            if( $(window).width() >= 1024 ) {
                                $(".nano").nanoScroller({
                                    preventPageScrolling: !1
                                });                 
                            }
                        });

                        $results.addClass('show');
                        setTimeout(function(){
                            $results.addClass('show-2');
                        }, 300);
                    },

                    onHide: function(){
                        $results.removeClass('show-2');
                        setTimeout(function(){
                            $results.removeClass('show');
                        }, 100);
                    },
                    
                    formatResult: function( suggestion, currentValue ) {
                        if( currentValue == '&' ) currentValue = "&#038;";
                        
                        var pattern = '(' + escapeRegExChars(currentValue) + ')',
                            returnValue = '';
                            
                        returnValue += '<div class="suggestion-title product-title">' + suggestion.value
                                .replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>')
                                // .replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '&quot;')
                                .replace(/&lt;(\/?strong)&gt;/g, '<$1>') + '</div>';

                        if ( suggestion.no_found ) returnValue = '<div class="suggestion-title no-found-msg">' + suggestion.value + '</div>';


                        return returnValue;
                    }
                });

            });
        });
    }


    CL_FRONT.shopFixes = function(){
        "use strict";

        $('.shop-products .tawcvs-swatches[data-attribute_name="attribute_pa_size"]').closest('tr').addClass('hide');

        $('.single-product .cl-info.gift .in-gift').mouseenter(function(){
            
        });

        $('.single-product .cl-info.gift').on('click', function(){
            if( $(this).hasClass('show-tooltip') )
                $(this).removeClass('show-tooltip');
            else{
                $(this).focus();
                $(this).addClass('show-tooltip');
            }

        });

        $('.single-product .cl-info.gift').on('blur', function(){
            $(this).removeClass('show-tooltip');
        })


        $( '.woocommerce.widget_layered_nav .widget-title, .widget_price_filter .widget-title' ).on('click', function(){

            var $parent = $( this ).closest( '.woocommerce.widget_layered_nav, .widget_price_filter' );

            if( $parent.hasClass('show-toggle') )
                $parent.removeClass('show-toggle');
            else
                $parent.addClass('show-toggle');
        });

        

        if( $( 'aside .woocommerce-widget-layered-nav' ).length > 0 ){
            if( !codeless_global.shop_open_toggles )
                $( 'aside .woocommerce-widget-layered-nav:eq(1)' ).addClass( 'show-toggle' );
            else
                $( 'aside .woocommerce-widget-layered-nav' ).addClass( 'show-toggle' );
            
            $( '<div class="widget woocommerce added_with_js"><h3 class="widget-title">Filter By</h3></div>' ).insertBefore( 'aside .woocommerce-widget-layered-nav:eq(0)' );
        }

        if( $( '.widget_price_filter' ).length > 0 ){
            $( '.widget_price_filter' ).addClass( 'show-toggle' );
        }

        if( $( '.yith-woocommerce-ajax-product-filter' ).length > 0 ){
            $( '.yith-woocommerce-ajax-product-filter' ).addClass('show-toggle');
        }

        $(document).on("yith-wcan-ajax-filtered", function(response){

            CL_FRONT.animations( response[0], true );
            CL_FRONT.isotopeShop();
            CL_FRONT.quickView();
            if( $.fn.tawcvs_variation_swatches_form ){
                $( '.variations_form', response[0] ).tawcvs_variation_swatches_form();
                setTimeout(function(){
                    CL_FRONT.shopColorChange($( '.variations_form', response[0] ));
                }, 10);
            }
            

            
        });



        $( '.open-filters' ).on('click', function(e){
            e.preventDefault();
            var filters = $(this).closest('.content-col').find( '.cl-shop-inpage-filters' );
            var wrapper = filters.find( '.filters-wrapper' );
            var height = wrapper.outerHeight();


            if( !$(this).hasClass('opened') ){
                $(this).addClass('opened');
                filters.css( 'height', height + 'px' );
                setTimeout(function(){
                    filters.css( 'height', 'auto' );
                }, 500);
            }else{

                $(this).removeClass('opened'); 
                filters.css( 'height', '0px' );
                
            }   
        });

        $( '.cl-shop-inpage-filters .widget' ).addClass('show-toggle');

        


        if( CL_FRONT.config.$body.hasClass('single-product') ){
            console.log('loaded');
            $('.single-product-style-center .cl-product-info .cl-images-wrapper').imagesLoaded(function(){
                console.log('loaded');
                setTimeout(function(){
                    $('.single-product-style-center .cl-product-info .bg-layer').height( $('.single-product-style-center .cl-product-info .cl-images-wrapper').height() + 270 + 'px' );
                }, 50);
            });

            setTimeout(function(){
                $('.single-product .cl-image-wrapper .woocommerce-product-gallery').imagesLoaded(function(){
                    var height = $('.single-product .cl-product-info .flex-viewport').height();
                    console.log(height);
                    $('.single-product .cl-product-info .flex-direction-nav').height( height + 'px' );
                });
            }, 200);
        }

        CL_FRONT.shopColorChange();

        if( CL_FRONT.config.$isMobileScreen ){
            $('.shop-entries .product_item .woocommerce-LoopProduct-link').attr('onClick', 'return false');
        }


        if( $('.return-to-shop').length > 0 ){
            $('.return-to-shop a').addClass('btn-style-square btn-hover-darker cl-btn');
        }
        
    }


    CL_FRONT.addedToWishlist = function(){
        $('body').on('added_to_wishlist', function( e, param1, param2 ){
            if( param1.hasClass('cl-action') )
                param1.addClass('added_to_cart');
            if( param1.find('i').length > 0 )
                param1.find('i').attr('class', 'cl-icon-check');
        });
    }

    CL_FRONT.shopColorChange = function( $forms ){

        $forms = $forms || $( '.shop-entries .variations_form' );

        setTimeout(function(){
            if( $('.swatch.swatch-color').length == 0 )
                return;

            $('.swatch.swatch-color').each(function(){
                var color = $(this).css('background-color');

                if( color == 'rgb(255, 255, 255)' ){
                    $(this).addClass('white-color');
                }
            })
        }, 400);
        
        if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {

            $forms.each( function() {
                var $form = $(this);
                $form.wc_variation_form();
                    
                if( $form.closest('.product').hasClass('masonry_layout_small') )
                    return;

                $form.on('found_variation', function(event, variation){
                                var $product = $(this).closest('.product');
                              
                                if( variation.image.catalog_src == null )
                                    variation.image.catalog_src = codeless_global.wc_placeholder_img_src;
                                
                                $product.find('img.wp-post-image').attr('src', variation.image.catalog_src)
                                $product.find('img.wp-post-image').attr( 'srcset', '');
                                $product.find('img.wp-post-image').attr( 'sizes', variation.image.catalog_sizes );
                });

            });


        }
    }


    CL_FRONT.cl_woocommerce_add_to_cart_variable = function(){
        // wc_add_to_cart_params is required to continue, ensure the object exists
        if ( typeof wc_add_to_cart_params === 'undefined' )
            return false;
        $('.shop-entries .product_item.style_dark_controllers .ajax_add_to_cart_variable').text(codeless_global.language.add_to_cart);
        // Ajax add to cart
        $( document ).on( 'click', '.shop-entries .product_item.product-type-variable:not(.style_list) .ajax_add_to_cart_variable', function(e) {
            
            e.preventDefault();
            



            var $variation_form = $( this ).closest( '.product_item' ).find('.variations_form');
            var var_id = $variation_form.find( 'input[name=variation_id]' ).val();
            
            var product_id = $variation_form.find( 'input[name=product_id]' ).val();
            var quantity = $variation_form.find( 'input[name=quantity]' ).val();
            
            //attributes = [];
            $( '.ajaxerrors' ).remove();
            var item = {},
                check = true;
                
                var variations = $variation_form.find( 'select[name^=attribute]' );
                
                /* Updated code to work with radio button - mantish - WC Variations Radio Buttons - 8manos */ 
                if ( !variations.length) {
                    variations = $variation_form.find( '[name^=attribute]:checked' );
                }
                
                /* Backup Code for getting input variable */
                if ( !variations.length) {
                    variations = $variation_form.find( 'input[name^=attribute]' );
                }
            
            variations.each( function() {
            
                var $this = $( this ),
                    attributeName = $this.attr( 'name' ),
                    attributevalue = $this.val(),
                    index,
                    attributeTaxName;
            
                $this.removeClass( 'error' );
            
                if ( attributevalue.length === 0 ) {
                    index = attributeName.lastIndexOf( '_' );
                    attributeTaxName = attributeName.substring( index + 1 );
            
                    $this
                        //.css( 'border', '1px solid red' )
                        .addClass( 'required error' )
                        //.addClass( 'barizi-class' )
                        .before( '<div class="ajaxerrors"><p>Please select ' + attributeTaxName + '</p></div>' )
            
                    check = false;
                } else {
                    item[attributeName] = attributevalue;
                }
            
                // Easy to add some specific code for select but doesn't seem to be needed
                // if ( $this.is( 'select' ) ) {
                // } else {
                // }
            
            } );
            
            if ( !check ) {
                window.location.href = $(this).attr('href');
            }
            
            //item = JSON.stringify(item);
            //alert(item);
            //return false;
            
            // AJAX add to cart request
            
            var $thisbutton = $( this );

            if ( $thisbutton.is( '.ajax_add_to_cart_variable' ) ) {

                $thisbutton.removeClass( 'added' );
                $thisbutton.addClass( 'loading-add-cart' );

                var data = {
                    action: 'codeless_woocommerce_add_to_cart_variable',
                    product_id: product_id,
                    quantity: quantity,
                    variation_id: var_id,
                    variation: item
                };

                // Trigger event
                $( 'body' ).trigger( 'adding_to_cart', [ $thisbutton, data ] );

                // Ajax action
                $.post( wc_add_to_cart_params.ajax_url, data, function( response ) {

                    if ( ! response )
                        return;

                    var this_page = window.location.toString();

                    this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );
                    
                    if ( response.error && response.product_url ) {
                        window.location = response.product_url;
                        return;
                    }
                    
                    if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {

                        window.location = wc_add_to_cart_params.cart_url;
                        return;

                    } else {

                        $thisbutton.removeClass( 'loading-add-cart' );

                        var fragments = response.fragments;
                        var cart_hash = response.cart_hash;

                        // Block fragments class
                        if ( fragments ) {
                            $.each( fragments, function( key ) {
                                $( key ).addClass( 'updating' );
                            });
                        }

                        // Block widgets and fragments
                        $( '.shop_table.cart, .updating, .cart_totals' ).fadeTo( '400', '0.6' ).block({
                            message: null,
                            overlayCSS: {
                                opacity: 0.6
                            }
                        });

                        // Changes button classes
                        $thisbutton.addClass( 'added' );

                        // View cart text
                        if ( ! wc_add_to_cart_params.is_cart && $thisbutton.parent().find( '.added_to_cart' ).size() === 0 ) {
                            $thisbutton.after( ' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' +
                                wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>' );
                        }

                        // Replace fragments
                        if ( fragments ) {
                            $.each( fragments, function( key, value ) {
                                $( key ).replaceWith( value );
                            });
                        }

                        // Unblock
                        $( '.widget_shopping_cart, .updating' ).stop( true ).css( 'opacity', '1' ).unblock();

                        // Cart page elements
                        $( '.shop_table.cart' ).load( this_page + ' .shop_table.cart:eq(0) > *', function() {

                            $( '.shop_table.cart' ).stop( true ).css( 'opacity', '1' ).unblock();

                            $( document.body ).trigger( 'cart_page_refreshed' );
                        });

                        $( '.cart_totals' ).load( this_page + ' .cart_totals:eq(0) > *', function() {
                            $( '.cart_totals' ).stop( true ).css( 'opacity', '1' ).unblock();
                        });

                        // Trigger event so themes can refresh other areas
                        $( document.body ).trigger( 'added_to_cart', [ fragments, cart_hash, $thisbutton ] );
                    }
                });

                return false;

            } else {
                return true;
            }

        });
    };


    /**
     * Initialize Post
     * 
     * @since 1.0.0
     */
    CL_FRONT.postInit = function( $el ) {
        "use strict";

        this.postSwiper();
        this.postLike();
        this.postShareCount();
    };

    CL_FRONT.livePhoto = function(){
        "use strict";
        if($('#live_photo').length > 0){

            var myNewPlayer = LivePhotosKit.Player();
            // A Player built from a pre-existing element:
            LivePhotosKit.Player(document.getElementById('live_photo'));

        }
    }

    CL_FRONT.postInstagram = function() {
        $( '.entry-video .instagram-media' ).contents().find( '.EmbedCaption' ).remove();
        $( '.entry-video .instagram-media' ).contents().find( '.EmbedFooter' ).remove();
    }

    /**
     * Fix sidebar background Width
     * 
     * @since 1.0.0
     */
    CL_FRONT.fixModernLayoutWidth = function() {
        "use strict";

        if ( this.config.$layoutModern ) {

            if ( this.config.$pageLayout == 'right_sidebar' ) {
                var distance = this.config.$windowWidth - ( this.config.$aside.offset().left );
                $( '.cl-layout-modern-bg' ).width( ( distance + 10 ) + 'px' );
            }

            if ( this.config.$pageLayout == 'left_sidebar' ) {
                var distance = this.config.$aside.offset().left + this.config.$aside.width();
                $( '.cl-layout-modern-bg' ).width( ( distance + 35 ) + 'px' );
            }
        }
    }


    /**
     * Fix Height of custom Masonry Size
     * 
     * @since 1.0.0
     */
    CL_FRONT.fixPostMasonryHeight = function( $element ){
        "use strict";

        if( $( $element ).length > 0 ){
            var $wide = $( '.cl-msn-size-wide', $element ),
                $height = $( '.cl-msn-size-default', $element ).height() - 20;

            $wide.css( { height: $height + 'px' } );
            $( 'img', $wide ).css( { height: $height + 'px' } );

        }
    }

    /**
     * Fix Height of custom Masonry Size
     * 
     * @since 1.0.0
     */
    CL_FRONT.fixPortfolioMasonryHeight = function( $element ){
        "use strict";

        if( $( $element ).length > 0 ){

            var $wide = $( '.cl-msn-size-wide', $element),
                $height = $( '.grid-holder', $wide ).height(),
                padd = typeof $wide.css('padding') !== 'undefined' ? $wide.css('padding') : '0px',

                padding = parseInt(padd.replace("px", "")) * 2;

            $wide.css( { height: $height + padding + 'px' } );

        }
    }


    CL_FRONT.multiscroll = function(){

        var $element = $('.multiscroll');

        if( $element.length > 0 ){

            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'multiscroll.js' ], function() {
                
                var multi = $element.multiscroll({
                    navigation: false,
                    normalScrollElements: 'body'
                });

                $element.find( '.slider-navigation .down' ).on('click', function(){
                    $element.multiscroll.moveSectionDown();
                });

                $element.find( '.slider-navigation .up' ).on('click', function(){
                    $element.multiscroll.moveSectionUp();
                });

            } );

        }
    }


    CL_FRONT.nanoScroller = function(){
        if( $('.scrollbar-div.nano').length == 0 )
            return;



        CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.nanoscroller.min.js' ], function() {

            $('.scrollbar-div.nano').nanoScroller({
                    preventPageScrolling: !1
            });
        } );

        $( document.body ).on( 'wc_fragments_refreshed', function(){
            CL_FRONT.nanoScroller();
        } );
    }


    CL_FRONT.quickView = function(){

        if( CL_FRONT.config.$isMobileScreen )
            return;

        $('.cl-quick-view').on( 'click', function(e){
            e.preventDefault();
            var $button = $(this);
            $button.addClass('loading');

            var id = $button.data('id');

            var data = {
                id: id,
                action: "codeless_woo_quick_view"
            };
            
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.magnific-popup.min.js' ], function() {
                $.ajax({
                    url: codeless_global.ajax_url,
                    data: data,
                    method: "get",
                    success: function(message) {
                        var $result = $(message);
                        $result.find( '.woocommerce-product-gallery--with-images').css('opacity', '');
                        $result.imagesLoaded(function(){
                            $.magnificPopup.open({
                                items: {
                                    src: '<div class="mfp-with-anim popup-quick-view single-product woocommerce">' + $result[0].outerHTML + "</div>",
                                    type: "inline"
                                },
                                
                                removalDelay: 300,
                                preloader: true,
                                tClose: '',
                                callbacks: {
                                    beforeOpen: function() {
                                        $.magnificPopup.close();
                                        this.st.mainClass = "mfp-move-horizontal" + " quick-view-wrapper";

                                    },

                                    open: function() {

                                        $(".popup-quick-view .variations_form").each(function() {
                                            $(this).wc_variation_form().find(".variations select:eq(0)").change()
                                        });

                                        $(".popup-quick-view .variations_form").trigger("wc_variation_form");

                                        $( '.popup-quick-view .woocommerce-product-gallery__wrapper' ).addClass('cl-carousel owl-theme owl-carousel');
                                        
                                        setTimeout(function(){
                                            CL_FRONT.components.Carousel( $( '.popup-quick-view .woocommerce-product-gallery__wrapper' ), { items: 1, nav: true }, function(){ CL_FRONT.nanoScroller(); } );
                                        }, 1);
                                        
                                        CL_FRONT.shopDropDown();
                                        CL_FRONT.shopFixes();
                                        CL_FRONT.xBrowserFixes();

                                        if( $('.popup-quick-view').find('.product-type-grouped').length > 0 )
                                            CL_FRONT.quickView();

                                        CL_FRONT.ajaxProductAdd();
                                        
                                        $('.popup-quick-view .variation-selector select').on('change', function(){
                                            $(this).closest('.popup-quick-view').find('.woocommerce-product-gallery__wrapper').trigger('to.owl.carousel', 0)
                                        });
                                     
                                        if( $.fn.tawcvs_variation_swatches_form )
                                            $( '.popup-quick-view .variations_form' ).tawcvs_variation_swatches_form();
                                        
                                        $button.removeClass("loading");


                                    }
                                }
                            })
                        })
                        
                        
                    },
                    complete: function() {
                        
                    },
                    error: function() {
                        $button.removeClass("loading")
                    }
                } );
            });

        });

    }



    CL_FRONT.ajaxProductAdd = function(){
        // Ajax add to cart on the product page

        if( typeof wc_cart_fragments_params === 'undefined' )
            return;

        var $warp_fragment_refresh = {
            url: wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
            type: 'POST',
            success: function( data ) {
                if ( data && data.fragments ) {

                    $.each( data.fragments, function( key, value ) {
                        $( key ).replaceWith( value );
                    });

                    $( document.body ).trigger( 'wc_fragments_refreshed' );
                }
            }
        };

        $('.entry-summary form.cart').on('submit', function (e)
        {
            e.preventDefault();

            /*$('.entry-summary').block({
                message: null,
                overlayCSS: {
                    cursor: 'none'
                }
            });*/


            var product_url = window.location,
                form = $(this),
                submitBtn = form.find( 'button[type="submit"]' );

            submitBtn.addClass('loading-add-cart');

            $.post(product_url, form.serialize() + '&_wp_http_referer=' + product_url, function (result)
            {
                var cart_dropdown = $('.widget_shopping_cart', result)

                // update dropdown cart
                $('.widget_shopping_cart').replaceWith(cart_dropdown);

                // update fragments
                $.ajax($warp_fragment_refresh);

                /*$('.entry-summary').unblock();*/

                submitBtn.removeClass('loading-add-cart');
                setTimeout(function(){
                    submitBtn.addClass('added-cart-success');
                    submitBtn.html(codeless_global.language.added);
                }, 100);

                setTimeout(function(){
                    submitBtn.removeClass('added-cart-success');
                    submitBtn.html(codeless_global.language.add_to_cart);
                }, 2000);

            });
        });
    }


    /**
     * Post Like Button
     * 
     * @since 1.0.0
     */
    CL_FRONT.postLike = function() {
        "use strict";

        $( '.entry-tool-likes .like' ).on( 'click', function( e ) {
            e.preventDefault();

            var $this = $( this ),
                $id = $this.attr( 'id' );

            if ( $this.hasClass( 'item-liked' ) ) return false;

            if ( $this.hasClass( 'item-inactive' ) ) return false;


            $.post( codeless_global.ajax_url, {
                action: 'codeless_post_like',
                post_id: $id
            }, function( data ) {
                $this.find( '.codeless-like-count' ).html( data );
                $this.addClass( 'item-liked' );
            } );

            $this.addClass( 'item-inactive' );
            return false;
        } );
    };

    CL_FRONT.closedSections = function(){
        "use strict";

        $('.cl-row.cl-closed-section .close_section_button').on('click', function(e){
            e.preventDefault();
            var button = $(this);
            var row = $(this).closest( '.cl-row' );

            if( !row.hasClass('opened-section') ){
                row.addClass('opened-section');
                var height = row.find( '.cl_row-sortable' ).height();
                row.find( '.container-content' ).css( 'height', height + 'px' );
                
            }else{
                row.find( '.container-content' ).css( 'height', '0px' );
                row.removeClass('opened-section');
            }
        });
    };


    /**
     * Post Share Count
     * 
     * @since 1.0.0
     */
    CL_FRONT.postShareCount = function() {
        "use strict";

        $( '.share-buttons .share' ).on( 'click', function( e ) {

            var $this = $( this ),
                $id = $this.attr( 'data-postid' );

            $.post( codeless_global.ajax_url, {
                action: 'codeless_share_counts',
                post_id: $id
            }, function( data ) {
                $this.closest('article').find( '.codeless-share-count' ).html( data );
            } );
        } );
    };




    /**
     * Post Slider Configuration and load
     * Used only for post slider
     * 
     * @since 1.0.0
     */
    CL_FRONT.postSwiper = function( $el ) {
        "use strict";

        var $elements = $el || $( '.cl-post-swiper-slider' );
        if ( $elements.length ) {
            $elements.each( function( i ) {

                var $element = $( this );
                var name = 'swiper.min.js';
                if( bowser.msie && bowser.version <= 9 )
                    name = 'swiper.old.min.js';

                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + name ], function() {
                    var slider = new Swiper( '.cl-post-swiper-slider', codeless_global.postSwiperOptions );
                    
                    setTimeout(function(){
                        if( $element.find('.swiper-slide').length <=1 )
                            $element.find( '.cl-post-slider-nav' ).css( 'display', 'none' );
                    }, 50);
                    
                } );

            } );
        }

    };


    CL_FRONT.loadAsyncIcons = function(){
        CL_FRONT.helpers.loadCSS(codeless_global.FRONT_LIB_CSS + 'codeless-icons.css');
    };

    /**
     * Slider Configuration and load
     *
     * 
     * @since 1.0.0
     */
    CL_FRONT.codelessSlider = function( $el ) {
        "use strict";

        var $elements = $el || $( '.cl_slider' );
        if ( $elements.length ) {
            $elements.each( function( i ) {

                var $element = $( this );
                var name = 'swiper.min.js';
                if( bowser.msie && bowser.version <= 9 )
                    name = 'swiper.old.min.js';

                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + name ], function() {
                    
                    var animateSlide = function( $slide ){

                        if( $slide.hasClass('cl-slide-animation') && ! $slide.hasClass('animation--none') )
                            $slide.addClass('start_animation');
                    };

                    var opts = {

                        onSlideChangeStart: function(swiper){
                            
                           
                                $(swiper.slides[swiper.activeIndex]).removeClass('start_animation');
                                $(swiper.slides[swiper.activeIndex]).find('.start_animation:not(.bg-layer)').removeClass('start_animation');
                            
                        },

                        onTransitionStart: function(swiper){
                                setTimeout(function(){
                                    if( CL_FRONT.config.$header.hasClass('cl-transparent') ){
                                    
                                        CL_FRONT.helpers.changeHeaderColor( $(swiper.slides[swiper.activeIndex]) );

                                        setTimeout(function(){
                                            if( ! CL_FRONT.config.$header.hasClass('cl-header-light') ){
                                                $('.cl-slider-nav', $element).removeClass('swiper-button-white');
                                                $('.swiper-pagination', $element).addClass('cl-dark-pagination');
                                            }
                                            else{
                                                $('.swiper-pagination', $element).removeClass('cl-dark-pagination');
                                                $('.cl-slider-nav', $element).addClass('swiper-button-white');
                                            }
                                        }, 50 );
                                    
                                    }
                                    animateSlide($(swiper.slides[swiper.activeIndex]));
                                    CL_FRONT.animations($(swiper.slides[swiper.activeIndex]), true);
                                  

                                }, 300);
                                
                           
                        },
                        onInit: function(swiper){
                            if( CL_FRONT.config.$header.hasClass('cl-transparent') ){
                                if( ! CL_FRONT.config.$header.hasClass('cl-header-light') ){
                                    $('.cl-slider-nav', $element).removeClass('swiper-button-white');
                                    $('.swiper-pagination', $element).addClass('cl-dark-pagination');
                                }
                                else{
                                    $('.swiper-pagination', $element).removeClass('cl-dark-pagination');
                                    $('.cl-slider-nav', $element).addClass('swiper-button-white');
                                }
                            }

                            $element.addClass('loading-on-end');

                            setTimeout(function(){
                                $element.addClass('loading-end');
                            }, 400);

                            setTimeout(function(){
                                animateSlide($(swiper.slides[swiper.activeIndex]));
                                CL_FRONT.animations($(swiper.slides[swiper.activeIndex]), true);
                            }, 500);

                            
                            
                        },
                        
                        
                        parallax: true,
                        
                        speed: parseInt(CL_FRONT.helpers.parseData( $element.data('speed'), 300 )),
                        direction: CL_FRONT.helpers.parseData( $element.data('direction'), 'horizontal' ),
                        autoplay: parseInt(CL_FRONT.helpers.parseData( $element.data('autoplay'), 6500 )),
                        loop: parseInt( CL_FRONT.helpers.parseData( $element.data('loop'), false ) ),
                        mousewheelControl: parseInt( CL_FRONT.helpers.parseData( $element.data('mousewheel'), false ) ),
                    };

                    

                    var cl_effect = {

                        effect: CL_FRONT.helpers.parseData( $element.data('effect'), 'fade' )

                    };

                    if( CL_FRONT.helpers.parseData( $element.data('effect'), 'fade' ) == 'interleave' && CL_FRONT.config.$windowWidth > 992 ){
                        var interleaveOffset = -.5;

                        if( CL_FRONT.helpers.parseData( $element.data('direction'), 'horizontal' ) == 'horizontal' ){

                            cl_effect = {

                                onProgress: function(swiper, progress){
            
                                    for (var i = 0; i < swiper.slides.length; i++){
                                      
                                      var slide = swiper.slides[i];
                                      var translate, innerTranslate;
                                      progress = slide.progress;
                                            
                                      if (progress > 0) {
                                        translate = progress * swiper.width;
                                        innerTranslate = translate * interleaveOffset;        
                                      }
                                      else {        
                                        innerTranslate = Math.abs( progress * swiper.width ) * interleaveOffset;
                                        translate = 0;
                                      }
                                            

                                      $(slide).css({
                                        transform: 'translate3d(' + translate + 'px,0,0)'
                                      });

                                      $(slide).find('.cl-row > .bg-layer').css({
                                        transform: 'translate3d(' + innerTranslate + 'px,0,0)'
                                      });
                                    }
                                },

                                onTouchStart: function(swiper){
                                    for (var i = 0; i < swiper.slides.length; i++){
                                      $(swiper.slides[i]).css({ transition: '' });
                                    }
                                },

                                onSetTransition: function(swiper, speed) {
                                    for (var i = 0; i < swiper.slides.length; i++){
                                      $(swiper.slides[i])
                                        .find('.cl-row > .bg-layer')
                                        .andSelf()
                                        .css({ transition: speed + 'ms' });
                                    }
                                }

                            };

                        }else{

                            cl_effect = {

                                onProgress: function(swiper, progress){
                                    
                                    for (var i = 0; i < swiper.slides.length; i++){
                                       
                                      var slide = swiper.slides[i];
                                      var translate, innerTranslate;
                                      progress = slide.progress;
                                            
                                      if (progress > 0) {
                                        translate = progress * swiper.height;
                                        innerTranslate = translate * interleaveOffset;        
                                      }
                                      else {        
                                        innerTranslate = Math.abs( progress * swiper.height ) * interleaveOffset;
                                        translate = 0;
                                      }
                                                

                                      $(slide).css({
                                        transform: 'translate3d(0,' + translate + 'px, 0)'
                                      });

                                      
                                    

                                      $(slide).find('.cl-row').css({
                                        transform: 'translate3d(0,' + innerTranslate + 'px, 0)'
                                      });
                                      
                                    }
                                },

                                onTouchStart: function(swiper){
                                    for (var i = 0; i < swiper.slides.length; i++){
                                      $(swiper.slides[i]).css({ transition: '' });
                                    }
                                },

                                onSetTransition: function(swiper, speed) {
                                    for (var i = 0; i < swiper.slides.length; i++){

                                      $(swiper.slides[i])
                                        .find('.cl-row')
                                        .andSelf()
                                        .css({ transition: speed + 'ms' });
                                    }
                                }

                            };

                        }
                       
                    }


                    if( CL_FRONT.helpers.parseData( $element.data('effect'), 'fade' ) == 'softscale'){
                        cl_effect = {

                            onSetTranslate: function () {
                                
                    
                            },

                            onSetTransition: function (duration) {
                                s.slides.transition(duration);
                                if (s.params.virtualTranslate && duration !== 0) {
                                    var eventTriggered = false;
                                    s.slides.transitionEnd(function () {
                                        if (eventTriggered) return;
                                        if (!s) return;
                                        eventTriggered = true;
                                        s.animating = false;
                                        var triggerEvents = ['webkitTransitionEnd', 'transitionend', 'oTransitionEnd', 'MSTransitionEnd', 'msTransitionEnd'];
                                        for (var i = 0; i < triggerEvents.length; i++) {
                                            s.wrapper.trigger(triggerEvents[i]);
                                        }
                                    });
                                }
                            },

                            onSlideChangeStart: function(swiper){
                                var active = swiper.activeIndex,
                                    prev = swiper.previousIndex;
                              

                                if( ! $( swiper.slides[prev] ).find('.cl-row').hasClass('navOutNext') )
                                    $( swiper.slides[prev] ).find('.cl-row').addClass('navOutNext');

                                if( $( swiper.slides[active] ).find('.cl-row').hasClass('navInNext') )
                                    $( swiper.slides[active] ).find('.cl-row').removeClass('navInNext');
                                
                                $( swiper.slides[active] ).find('.cl-row').addClass('navInNext');

                                setTimeout(function(){
                                    $( swiper.slides[prev] ).find('.cl-row').removeClass('navOutNext');
                                    $( swiper.slides[active] ).find('.cl-row').removeClass('navInNext');
                                }, 1500);
                            }, 


                            effect: 'softscale',
                            virtualTranslate: true,
                            slidesPerView : 1,
                            slidesPerColumn : 1,
                            slidesPerGroup : 1,
                            watchSlidesProgress : true,
                            spaceBetween : 0

                        };
                    }

                    opts = $.extend(opts, cl_effect);



                    if( parseInt(CL_FRONT.helpers.parseData( $element.data('pagination'), 1 ) ) ){
                        opts['pagination'] = '.swiper-pagination';
                        opts['paginationClickable'] = true;
                    }
                    
                    if( parseInt(CL_FRONT.helpers.parseData( $element.data('navigation'), 1 ) ) ){
                        opts['nextButton'] = '.swiper-button-next';
                        opts['prevButton'] = '.swiper-button-prev';
                    } 

                    if( parseInt(CL_FRONT.helpers.parseData( $element.data('anchors'), 0 ) ) ){
                        opts['paginationBulletRender'] = function (swiper, index, className) {
                            var anchor = $(swiper.slides[index]).find('[data-anchor]').data('anchor');
                            return '<span class="' + className + '" data-label="'+ anchor +'"></span>';
                        }
                    } 

                    if( $element.hasClass('cl_slider-centered_carousel') && CL_FRONT.config.$windowWidth >= 992 ){
                        opts['slidesPerView'] = 'auto';
                        opts['centeredSlides'] = true;
                        opts['spaceBetween'] = 30;
                        opts['initialSlide'] = 1;
                        opts['effect'] = 'slide';
                    }

                    
                    var actualInstance = new Swiper( '.cl_slider', opts );
                    CL_FRONT.config.$initSliders[$element.attr('id')] = actualInstance;
                    

                    var animateOnScroll = function(){
                        var startPoint = $element.offset().top + ( $element.height() * 0.44 );
                       
                        if( CL_FRONT.config.$windowTop >= startPoint && ! $element.hasClass('cl-animateScroll') )
                            $element.addClass('cl-animateScroll');
                        else if( $element.hasClass('cl-animateScroll') && CL_FRONT.config.$windowTop < startPoint)
                            $element.removeClass('cl-animateScroll')

                    };
                    setTimeout(function(){
                        $(window).on('scroll', function(){  

                            if( CL_FRONT.helpers.parseData( $element.data('direction'), 'horizontal' ) == 'vertical' && CL_FRONT.config.$windowWidth < 992 )
                                return;
                            animateOnScroll();
                         });

                    }, 100);

                    var destroyed = false;

                    var verticalSliderResponsive = function(){
                        if( CL_FRONT.helpers.parseData( $element.data('direction'), 'horizontal' ) != 'vertical' || ! $element.hasClass('cl_slider-responsive-plain') )
                            return;
                      
                        if( CL_FRONT.config.$windowWidth > 992 ){
                            
                            if( destroyed ){
                                actualInstance = new Swiper( '.cl_slider', opts );
                                CL_FRONT.config.$initSliders[$element.attr('id')] = actualInstance;
                            }

                            return;
                        }
                        
                        if( ! destroyed ){
                            actualInstance.destroy(false);
                            destroyed = true;
                            CL_FRONT.animations($element, true);
                        }
                        
                    }

                    var carouselSliderResponsive = function(){
                        
                        if( $element.hasClass('cl_slider-centered_carousel') ){     
                        
                            actualInstance = new Swiper( '.cl_slider', opts );
                            CL_FRONT.config.$initSliders[$element.attr('id')] = actualInstance;

                        }
                    }

                    

                    verticalSliderResponsive();

                    $(window).resize(function(){
                        verticalSliderResponsive();

                        carouselSliderResponsive();
                    })

                } );

            } );
        }

    };


    CL_FRONT.headerSearch = function(){

        if( $( '.search-element', '.header_container' ).length > 0 ){
            
       

            if( CL_FRONT.config.$windowWidth >= 567 ){
                if( $('.search-element', '.header_container').hasClass('expand-responsive') )
                    $('.search-element', '.header_container').removeClass('expand-responsive');

            }else{

                $('.search-element', '.header_container').each(function(){
                    var $element = $(this);
                    $element.on( 'click', function(e){
                        e.preventDefault();

                        if( ! $element.hasClass( 'expand-responsive' ) ){
                            $element.addClass('expand-responsive');
                            $(document).on('click', funcBody1);
                        }

                    } );

                    

                }); 

                

                var funcBody1 = function(e){
                    if( !$(e.target).is('.search-element') && $(e.target).closest( '.search-element' ).length == 0 ){

                        if( $('.search-element').hasClass( 'expand-responsive' ) ){
                            $('.search-element').removeClass('expand-responsive');
                            $(document).off('click', funcBody1);
                        }
                    }
                }
            }

        }


        if( $( '.search.tool', '.header_container' ).length > 0 ){
            $( '.search.tool', '.header_container' ).each(function(){
                var $element = $(this);
                var $link = $element.find('.tool-link');
                $link.on( 'click', function(e){
                  
                    e.preventDefault();

                    if( ! $element.hasClass( 'expand' ) ){
                        $element.addClass('expand');
                        $(document).on('click', funcBody2);
                    }
 
                } );

                

            });

            var funcBody2 = function(e){
                if( !$(e.target).is('.search.tool') && $(e.target).closest( '.search.tool' ).length == 0 ){

                    if( $('.search.tool').hasClass( 'expand' ) ){
                        $('.search.tool').removeClass('expand');
                        $(document).off('click', funcBody2);
                    }
                }
            }
        }


    }


    /**
     * Load More Button and Infinite Scroll
     * 
     * @since 1.0.0
     */
    CL_FRONT.paginationInfinite = function( $el ) {
        "use strict";

        var $elements = $el || $( '.cl-pagination-infinite' );
        if ( $elements.length ) {
            $elements.each( function( i ) {

                var $element = $( this );
                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'infinitescroll.js' ], function() {

                    var $container = $( '.' + $element.parent().data( 'containerId' ) );
                  
                    // Init infinite scroll
                    $container.infinitescroll( {
                            loading: {
                                msg: null,
                                finishedMsg: '',
                                msgText: '',
                                start: function(){
                                    var inf = $(this).data('infinitescroll');
                                    var opts = inf.options;

                                    $('.cl-infinite-loader').removeClass('hidden');
                                   
                                    $(opts.navSelector).hide();
                                    
                                    opts.loading.msg
                                    .appendTo(opts.loading.selector)
                                    .show(opts.loading.speed, $.proxy(function() {
                                        inf.beginAjax(opts);
                                    }));
                                },
                                finished: function(){
                                    $('.cl-infinite-loader').addClass('hidden');
                                }
                            },
                            navSelector: 'div.cl-pagination-infinite .older-posts',
                            nextSelector: 'div.cl-pagination-infinite .older-posts a',
                            itemSelector: 'article.post, .portfolio_item, .product_item',
                            errorCallback: function() {
                                $( '#cl_load_more_btn' ).animate( {
                                    opacity: 0
                                } ).remove();
                                $('.cl-infinite-loader').addClass('hidden');
                            },
                           
                        },

                        // Callback function
                        function( newElements ) {

                            $( '#infscr-loading', $container ).remove();
                            var $newElems = $( newElements );

                            if ( !$container.hasClass( 'animated-entries' ) )
                                $newElems.css( 'opacity', 0 );

                            $newElems.imagesLoaded( function() {

                                // Animate new Items
                                if ( !$container.hasClass( 'animated-entries' ) ){
                                    $newElems.animate( {
                                        opacity: 1
                                    } );
                                    
                                }
                                    

                                

                                CL_FRONT.postInit( $newElems );

                                

                                CL_FRONT.fixPostVideoHeight( $newElems );

                                // Appended to Isotope
                                if ( $container.hasClass( 'grid-entries' ) || $container.hasClass( 'masonry-entries' ) ) {
                                    var iso = $container.data( 'isotope' );

                                    if( $.fn.tawcvs_variation_swatches_form ){
                                        $( '.variations_form', $newElems ).tawcvs_variation_swatches_form();
                                        setTimeout(function(){
                                            CL_FRONT.shopColorChange($( '.variations_form', $newElems ));
                                        }, 10);
                                    }
                                    
                                    iso.appended( $newElems );
                                    iso.layout();
                                    CL_FRONT.quickView();
                                    
                                }

                                // Run Animation
                                if ( $container.hasClass( 'animated-entries' ) )
                                    CL_FRONT.animations();
                                    
                                
                                if ( $element.data( 'type' ) == 'loadmore' )
                                    $( 'body, html' ).animate( {
                                        scrollTop: $newElems.offset().top
                                    }, 800 );

                            } );

                        } );

                    // If loadmore button is active
                    if ( $element.data( 'type' ) == 'loadmore' ) {
                        $( window ).unbind( '.infscr' );

                        $( '#cl_load_more_btn' ).on( 'click', function() {
                          
                            $container.infinitescroll( 'retrieve' );
                        } );
                    }


                } );

            } );
        }

    };

    /**
     * Blog Grid and Masonry Isotope
     * Use the Isotope component
     * 
     * @since 1.0.0
     */
    CL_FRONT.isotopeBlogGrid = CL_FRONT.init_cl_blog = function( $el ) {
        "use strict";
        $( '.blog-entries' ).each(function(){
            if( $(this).hasClass('cl-carousel') ){
                var $data = {

                    responsive: {
                        0: {
                            items: 1,
                            stagePadding : 0
                        },
                        480: {
                            items: 1,
                            stagePadding : 0
                        },
                        768: {
                            items: 2,
                            stagePadding : 0
                        },
                        992: {
                            items: CL_FRONT.helpers.parseData( parseInt( $( this ).attr('data-carousel-layout') ), 3 )
                        }
                    },

                    items: CL_FRONT.helpers.parseData( parseInt( $( this ).attr('data-carousel-layout') ), 3 ),
                    slideBy: 1,
                    smartSpeed: 600,
                    

                };

                if( $( this ).attr('data-carousel-effect') == 'fade' ){
                    $data.animateIn = 'fadeIn';
                    $data.animateOut = 'fadeOut';
                }

                if( CL_FRONT.helpers.parseData( parseInt( $(this).attr('data-carousel-stagepadding') ), 0 ) === 1 ){

                    $data.stagePadding = 150;
                    $data.loop = true;
                }

                CL_FRONT.components.Carousel( $( this ), $data, function(owl, el){
                    CL_FRONT.fixPostVideoHeight(el.find('article.format-video'));
                    CL_FRONT.postSwiper(el);
                    owl.on('resized.owl.carousel', function(event){
                        CL_FRONT.animations( el.find( '.owl-item.active' ), true ); 
                    });          
                });

            }else if( $(this).hasClass('masonry-entries') || $(this).hasClass('grid-entries') ){
                CL_FRONT.components.Isotope( $( this ) );
                var $blog_entries = $(this);
                var $blog = $(this).closest('.cl_blog');
                var $blog_grid_filters = $blog.find('.blog-filters > .grid-options a');

                var $blog_sort_filters = $blog.find('.blog-filters #blog_sort_by');
                
                if( $blog_sort_filters.length > 0 )
                    $blog_sort_filters.on( 'change', function(e){
                        e.preventDefault();
                        var value = $(this).val();

                        var url = $blog_sort_filters.attr('data-url');

                        window.location = url+'&blog_sort_by='+value;
                    } );


                if( $blog_grid_filters.length > 0 )
                    $blog_grid_filters.on( 'click', function(e){
                        e.preventDefault();
                        $(this);
                        $blog_grid_filters.removeClass('active');
                        $(this).addClass('active');

                        $blog.find('.blog-entries').attr('data-grid-cols', $(this).attr( 'data-grid-cols' ));
                        CL_FRONT.components.Isotope( $blog_entries );
                    } );
            }

        });
        
    };

    /**
     * Isotope Portfolio Init
     * used on Customizer too
     * 
     * @since 1.0.0
     */
    CL_FRONT.isotopePortfolioGrid = CL_FRONT.init_cl_portfolio = function( $el ) {
        "use strict";
        $( '#portfolio-entries' ).each(function(){
            if( $(this).hasClass('cl-carousel') )
                CL_FRONT.components.Carousel( $( this ) );
            else if( $(this).hasClass('cl-justify-gallery') )
                CL_FRONT.components.JustifyGallery( $( this ) );
            else
                CL_FRONT.components.Isotope( $( this ) );

        })
        
    };

    /**
     * Init Testimonial Carousel
     * 
     * @since 1.0.0
     */
    CL_FRONT.testimonialCarousel = CL_FRONT.init_cl_testimonial = function(){
        "use strict";
        $('.testimonial-entries.cl-carousel').each(function(){
            CL_FRONT.components.Carousel( $( this ), {

                items: 1,
                animateIn: 'alpha-in',
                animateOut: 'fadeOut',

            });
        });
    }


    /**
     * Team Carousel
     * 
     * @since 1.0.0
     */
    CL_FRONT.teamCarousel = CL_FRONT.init_cl_team = function(){
        "use strict";
        $('.cl_team.cl-carousel').each(function(){
            CL_FRONT.components.Carousel( $( this ), {

                responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        992: {
                            items: CL_FRONT.helpers.parseData( $(this).data('columns'), 4 )
                        }
                },
                animateIn: 'alpha-in',
                animateOut: 'fadeOut',
                center: CL_FRONT.helpers.parseData( $(this).data('center'), false ),
                loop: CL_FRONT.helpers.parseData( $(this).data('center'), false ),
            });
        });
    }


    /**
     * Clients Carousel
     * 
     * @since 1.0.0
     */
    CL_FRONT.clientsCarousel = CL_FRONT.init_cl_clients = function(){
        "use strict";
        $('.cl_clients.cl-carousel').each(function(){
            CL_FRONT.components.Carousel( $( this ), {
                responsive: {
                        0: {
                            items: 2
                        },
                        480: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        992: {
                            items: CL_FRONT.helpers.parseData( $(this).data('items'), 6 )
                        }
                    },
                items: CL_FRONT.helpers.parseData( $(this).data('items'), 6 ),
                animateIn: 'alpha-in',
                animateOut: 'fadeOut',
                autoplay: true,
                autoplayTimeout: CL_FRONT.helpers.parseData( $(this).data('autoplayTimeout'), 5000 ),
                loop: false
            });
        });
    };


    /**
     * Gallery Carousel
     * 
     * @since 1.0.0
     */
    CL_FRONT.galleryCarousel = CL_FRONT.init_cl_gallery = function(){
        "use strict";
        $('.cl_gallery.cl-carousel').each(function(){
            CL_FRONT.components.Carousel( $( this ), {
                responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        992: {
                            items: CL_FRONT.helpers.parseData( $(this).data('items'), 2 )
                        }
                    },
                items: CL_FRONT.helpers.parseData( $(this).data('items'), 2 ),
                animateIn: 'alpha-in',
                animateOut: 'fadeOut',
            });
        });
    }


    /**
     * Insta Feed
     * 
     * @since 1.0.0
     */
    CL_FRONT.instaFeed = function(){
        "use strict";
       $('.cl-instafeed.cl-carousel').each(function(){
            var $instafeed = $(this);
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'instafeed.min.js' ], function() {

                var $token = $instafeed.data('token'),
                    $userid = $instafeed.data('userid');

                var userFeed = new Instafeed({
                    get: 'user',
                    userId: $userid,
                    accessToken: $token,
                    target: $instafeed[0],
                    template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
                    resolution: 'low_resolution',
                    after: function() {
                        var $data = {

                            responsive: {
                                0: {
                                    items: 1
                                },
                                480: {
                                    items: 2
                                },
                                768: {
                                    items: 3 
                                },
                                992: {
                                    items: 6
                                }
                            },

                            items: 6,
                            slideBy: 1,
                            smartSpeed: 600,
                            center: true,
                            loop:true,
                            margin:10,
                            

                        };

                        CL_FRONT.components.Carousel( $instafeed, $data, function(owl, el){
                            owl.on('resized.owl.carousel', function(event){
                                CL_FRONT.animations( el.find( '.owl-item.active' ), true ); 
                            });          
                        }); 
                    }
                });
                userFeed.run();

                

            });
        });


        $('.widget .cl-instafeed').each(function(){
            var $instafeed = $(this);

            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'instafeed.min.js' ], function() {

                var $token = $instafeed.data('token'),
                $userid = $instafeed.data('userid');

                var userFeed = new Instafeed({
                        get: 'user',
                        userId: $userid,
                        accessToken: $token,
                        limit: 4,
                        target: $instafeed[0],
                        template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
                        resolution: 'low_resolution',
                        
                    });

                userFeed.run();

            });
        });
    };


    /**
     * Codeless Toggles
     * 
     * @since 1.0.0
     */
    CL_FRONT.codelessToggles = CL_FRONT.init_cl_toggles = function(){
        "use strict";
        $('.cl_toggles').each(function(){
            var $toggles = $(this);
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.collapse.js' ], function() {

                $toggles.collapse({
                   open: function() {
                    // The context of 'this' is applied to
                    // the collapsed details in a jQuery wrapper
                    this.slideDown(200);
                  },
                  close: function() {
                    this.slideUp(200);
                  },
                  accordion: CL_FRONT.helpers.parseData( $toggles.attr('data-accordion'), false ),
                  query: '.cl_toggle .title'
                });           
            });
        });
    };



    /**
     * Active Tabs
     * 
     * @since 1.0.0
     */
    CL_FRONT.codelessTabs = CL_FRONT.init_cl_tabs = function(){
        $('.cl_tabs').each(function(){
            var $tabs = $(this);
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'bootstrap-tabs.min.js' ], function() {
                
                $tabs.find('.tab-content > .tab-pane').first().addClass('active in');
                $tabs.find('.tab-content .cl_cl_tab').first().addClass('activeBuilder'); 
              

                $('.cl-nav-tabs li:first-child', $tabs).addClass('active');
                // Builder
                $tabs.find('.tab-content .cl_element').first().find('.tab-pane').addClass('active in');

                $('.cl-nav-tabs a', $tabs).on( 'click', function(e){
                    
                    if( !CL_FRONT.config.$isCustomizer )
                        e.preventDefault()
                    $(this).tab('show');
                });
            });
        });
    };


    /**
     * Fix Height of Video Post when loaded with ajax
     * 
     * @since 1.0.0
     */
    CL_FRONT.fixPostVideoHeight = function( $el ) {

        var $elements = CL_FRONT.helpers.parseData( $el, $( 'article.format-video' ) );
        
        if ( $elements.length ) {
            $elements.each( function( i ) {
                var $element = $( this );
                if ( !$element.hasClass( 'format-video' ) )
                    return;
                if( $element.hasClass('alternate-style') )
                    return;

                var width = $element.find( 'video, iframe' ).attr( 'width' ),
                    height = $element.find( 'video, iframe' ).attr( 'height' ),
                    element_width = $element.width();

                var new_height = ( element_width * height ) / width;

                $element.find( 'video, iframe' ).height( new_height + 'px' );
            } );
        }
    }


    /**
     * Sticky Sidebar Function
     * 
     * @since 1.0.0
     */
    CL_FRONT.stickySidebar = function() {
        "use strict";

        if ( this.config.$aside.hasClass( 'cl-sticky' ) && !this.config.$isMobileScreen ) {

            if ( this.config.$asideHeight == 0 )
                this.config.$asideHeight = this.config.$aside.height();

            if ( this.config.$asideTop == 0 )
                this.config.$asideTop = this.config.$aside.offset().top;

            if ( this.config.$asideStickyOffset == 0 )
                this.config.$asideStickyOffset = this.config.$aside.data( 'stickyOffset' ) != 0 ? this.config.$aside.find( '.widget:nth-last-child(' + parseInt( this.config.$aside.data( 'stickyOffset' ) ) + ')' ).offset().top : 0;

            var cl_distace = 80,
                cl_point = 0;

            if ( this.config.$asideStickyOffset != 0 )
                cl_point = this.config.$asideStickyOffset;
            else
                cl_point = this.config.$asideTop - cl_distace;

            this.config.$aside.find( '.cl-sticky-wrapper' ).width( this.config.$aside.width() + 'px' );

            if ( this.config.$windowTop >= cl_point ) {
                this.config.$aside.addClass( 'cl-sticky-active' );
                this.config.$aside.find( '.cl-sticky-wrapper' ).css( 'top', '-' + ( cl_point - this.config.$asideTop ) + 'px' );

            } else {
                this.config.$aside.find( '.cl-sticky-wrapper' ).css( 'top', cl_distace + 'px' );
                this.config.$aside.removeClass( 'cl-sticky-active' );
            }

        }
    }


    /**
     * Sticky Column Function
     *
     * @since 1.0.0
     *
     */


    CL_FRONT.stickyColumn = function() {
        "use strict";

        if(!this.config.$isMobileScreen && $('.cl-sticky.cl_column').length > 0){
       
            $('.cl-sticky.cl_column').each( function(){
                var $sticky = $(this),
                    stickyTop = 0,
                    stickyHeight = 0;

                
                stickyHeight = $sticky.height();

                stickyTop = $sticky.offset().top;

               
                var cl_distace = 0,
                    cl_point = 0;

                cl_point = stickyTop - cl_distace;

                $sticky.find( '.cl_col_wrapper ' ).width( $sticky.width() + 'px' );

                if ( CL_FRONT.config.$windowTop >= cl_point ) {
                    $sticky.addClass( 'cl-sticky-active' );
                    $sticky.find( '.cl_col_wrapper' ).css( 'top', '-' + ( cl_point - stickyTop ) + 'px' );

                } else {
                    $sticky.find( '.cl_col_wrapper' ).css( 'top', cl_distace + 'px' );
                    $sticky.removeClass( 'cl-sticky-active' );
                }

            
            });   
        }    
    }

    
    /**
     * Progress Bar Function
     *
     * @since 1.0.0
     *
     */

    CL_FRONT.progressBar = function($el){
        "use strict";

        var from_start = $el == null ? true : false;
        var $elements = CL_FRONT.helpers.parseData( $el, $( '.cl_progress_bar' ) );
       
        if( $elements.length > 0 ){
            $elements.each(function(){

                var $element = $(this),
                    percentage = $element.attr('data-percentage');

                if( from_start && $element.hasClass('animate_on_visible') )
                    return;

                $element.find('.percentage').html(percentage+'%');
                $element.find('.bar').css('width', percentage+'%');
            });
        }
    };


    CL_FRONT.mediaElement = CL_FRONT.init_cl_media = function(){
        "use strict";

        if( $('.cl_media.type-video').length > 0 ){
            $('.cl_media.type-video').each(function(){
                
                var $element = $(this),
                    $play = $element.find( '.play-button' ),
                    $isPlay = ($play.length > 0) ? true : false;

                if( $isPlay ){

                    $element.addClass('hide-video');

                    setTimeout(function(){
                        var height = $element.find( 'iframe, video' ).height();
                        $element.height(height);
                    }, 50);

                    $play.on('click', function(e){
                        e.preventDefault();

                        $element.find( 'source, iframe' ).each(function(){
                            var src = $(this).attr('data-src');
                            $(this).attr('src', src);
                        });

                        setTimeout(function(){
                            $element.addClass('show-video');
                        }, 100);
                        

                    });
                }else{
                    $element.find( 'source, iframe' ).each(function(){
                        var src = $(this).attr('data-src');
                        $(this).attr('src', src);
                    });
                }



            });
        }


       

    };


    /**
     * Init Page Header Element
     * Used on Codeless Builder Too
     * @since 1.0.0
     */
    CL_FRONT.init_cl_page_header = function(){
        
        this.fixPageHeaderCenter();
        CL_FRONT.components.loadAnimation( $( '.cl_page_header' ), function(){
            CL_FRONT.pageHeaderParallax();
        } );     

    };

    /**
     * Page Header Parallax
     * Loads the Parallax component
     * @since 1.0.0
     */

    CL_FRONT.pageHeaderParallax = function() {
        "use strict";

        if ( $( '.cl_page_header.cl-parallax .bg-layer' ).length > 0 )
            CL_FRONT.components.Parallax( $( '.cl_page_header.cl-parallax .bg-layer' ) ).init();
    };
    

    CL_FRONT.fixPageHeaderCenter = function(){
        if( this.config.$header.hasClass('cl-transparent') && $( '.cl_page_header'  ).length > 0 ){
            var $pageHeader = $( '.cl_page_header'  );   
            
            if( $pageHeader.hasClass('modern') )
                $pageHeader.css( { paddingTop: (this.config.$headerHeight / 2) + 'px' } ); 
        }
    }


    /**
     * Fix Megamenu Position when is out from container
     * @since 1.0.0
     */
    CL_FRONT.fixMegaMenuPosition = function( menu ){
        "use strict";

        var fixMegaMenu = function(megamenu){
            var width = $( megamenu ).find('> .sub-menu').width(),
                liParent = $( megamenu ).parent( 'li' ),

                mega_columns = $( megamenu ).children('ul').children('li'),
                columns = mega_columns.length,
                column_width = width / columns,
                mega_menu_layout = $( megamenu ).hasClass('layout-boxed') ? 'boxed' : 'fullwidth',
                bg_image = liParent.data('bg'),
                bg_type = $( megamenu ).hasClass('bg_type-background') ? 'background' : 'column',
                offsetFromLi = liParent.offset().left - CL_FRONT.config.$containerOffsetLeft;
            

            
            if( mega_menu_layout == 'boxed' ){
                width = $( megamenu ).width() - 40;
                column_width = width / columns;
                if( width == CL_FRONT.config.$containerWidth )
                    $( megamenu ).css( { left: '-' + offsetFromLi + 'px' } );
                else {  
                    setTimeout(function(){

                        var offsetOutFromContainer =  Math.abs( (CL_FRONT.config.$containerOffsetLeft + CL_FRONT.config.$containerWidth) - ( liParent.offset().left + width ) );
                        
                        if( offsetOutFromContainer >  offsetFromLi )
                            offsetOutFromContainer = 0;
                        
                        $( megamenu ).css( { left: '-' + (offsetOutFromContainer + 20) + 'px' } );
                    }, 1); 
                }
            }else{
                $( megamenu ).css( { left: '-' + liParent.offset().left + 'px', width: CL_FRONT.config.$windowWidth + 'px'} );
                $( megamenu ).find('> .sub-menu').css({width:'1170px', margin: '0 auto'});
                
            }

            if( bg_image != '' && bg_type == 'background' ){
                $( megamenu ).css({"background-image": 'url("'+bg_image+'")'});
            }
           
            mega_columns.css( { width: column_width + 'px'} );
        };

        if( ! menu ){
            this.config.$navigation.find( '.codeless_custom_menu_mega_menu' ).each( function( index, megamenu ){
            
                fixMegaMenu( megamenu );

            } );
        }else{
            fixMegaMenu( menu );
        }
    };


    /**
     * Initialize Tools Dropdown in Responsive
     * 
     * @since 1.0.0
     */

    CL_FRONT.initToolsResponsive = function() {
        "use strict";
        var self = this;
       

        if( this.config.$windowWidth <= 991 ){

            if( this.config.$headerToolsInit )
                return;

            this.config.$headerTools.find( '.tool .cl-submenu' ).each(function(){
                var submenu = $(this);
                submenu.addClass('cl-hide-on-mobile');

                var responsiveMenu = submenu.clone().appendTo(CL_FRONT.config.$header);
                responsiveMenu.removeClass( 'cl-hide-on-mobile' ).addClass( 'cl-mobile-menu' );

                CL_FRONT.config.$headerToolsList.push(submenu);
                submenu.closest('.tool').find(' > i, > .tool-link').on( 'click', function( e ){
                    e.preventDefault();

                    var button = $(this);
                    responsiveMenu.slideToggle('200');

                } );
            });

            this.config.$headerToolsInit  = true;

        }else{
            this.config.$header.find('.cl-mobile-menu').addClass('cl-hide-not-mobile');
            
            if( CL_FRONT.config.$headerToolsList.length > 0 ){
                CL_FRONT.config.$headerToolsList.forEach( function(menu){
                    menu.closest('.tool').find(' > i, > .tool-link').off('click');
                    menu.closest('.tool').find(' > i, > .tool-link').on('click', function(e){
                        return true;
                    });
                } );
            }
        }

    }


    CL_FRONT.scrollToTopButton = function(){
        "use strict";

        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });
        
        //Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    }

    /**
     * Tools Dropdown init
     * @since 1.0.0
     */

    CL_FRONT.initToolsDropdown = function() {
        "use strict";

        var toOpen = null,
            isOpen = false,
            mainNode = null;


        this.config.$headerTools.find( '.tool' ).each( function( index, submenu ) {

            if ( $( submenu ).find( '.cl-submenu' ).length > 0 ) {
                $( submenu ).addClass( 'hasSubMenu' );
            }

        } );

        mainNode = this.config.$headerTools;
        this.config.$headerTools.mouseover( function( e ) {

            var item = e.target || e.srcElement;

            while ( ! $(item).hasClass('tool') && ! $(item).hasClass('extra_tools_wrapper') ) {
                if( item != null )
                    item = item.parentNode;
            }

            if ( $(item).hasClass('tool') ) {
                toOpen = item;
                open();
            }

        } ).mouseleave( function(e) {
            close();
        } );

        var open = function() {
            isOpen = true;

            // Get other items with same parent
            var items = $( toOpen ).parent().children( '.tool' );
            
            $( items ).each( function( index, item ) {
                $( item ).find( ".cl-submenu" ).each( function( index, submenu ) {
                    if ( item != toOpen ) {
                        $( item ).removeClass( "showDropdown" );
                        close( item );

                    } else 
                    if ( !$( item ).hasClass( 'showDropdown' ) ) {



                        $( item ).addClass( "showDropdown" );

                        
                        var left = 0;
                        var node = submenu;
                        while ( node ) {
                            
                            left += Math.abs( node.offsetLeft );
                            node = node.offsetParent;
                        }
                        var right = left + submenu.offsetWidth;


                        //We should refactor this code to execute only when menu is vertical
                        var menuHeight = $( submenu ).outerHeight();
                        var parentTop = $( submenu ).offset().top - $( window ).scrollTop();
                        var totalHeight = menuHeight + parentTop;
                        var windowHeight = window.innerHeight;



                        $( item ).removeClass( 'dropdownRightToLeft' );

                        if ( left < 0 ) $( item ).addClass( 'dropdownLeftToRight' );

                        if ( right > CL_FRONT.config.$containerOffsetLeft + CL_FRONT.config.$containerWidth ) {
                            $( item ).addClass( 'dropdownRightToLeft' );
                        }

                        if( $( item ).parents( '.showDropdown' ).length > 0 ){
                            var width = $( item ).parents( '.showDropdown' ).first().children('.cl-submenu').width();
                            
                            if( $( item ).hasClass( 'dropdownLeftToRight' ) || ( ! $( item ).hasClass( 'dropdownLeftToRight' ) && ! $( item ).hasClass( 'dropdownRightToLeft' ) )  ){
                               
                                if( !$('body').hasClass('rtl') )
                                    $( item ).find( ".cl-submenu" ).css( { left: (width+16)+'px' } );
                                else
                                    $( item ).find( ".cl-submenu" ).css( { right: (width+16)+'px' } );
                            }
                            if( $( item ).hasClass( 'dropdownRightToLeft' ) )
                                $( item ).find( "cl-submenu" ).css( { right: (width+16)+'px' } );
                        }

                    }
                } );
            } );
        };

        var close = function( node ) {
            if (!node) {
              isOpen = false;
              node = mainNode;
            }

            // loop over the items, closing their submenus
            $(node).find('.tool').each(function(index, item) {
              $(item).removeClass('showDropdown');
            });
        }

    };


    /**
     * Menu Dropdown init
     * @since 1.0.0
     */

    CL_FRONT.initMenuDropdown = function() {
        "use strict";

        var toOpen = null,
            isOpen = false,
            mainNode = null,
            subHeights = [];


        this.config.$navigation.find( 'ul > li' ).each( function( index, submenu ) {

            if ( $( submenu ).find( 'ul' ).length > 0 ) {
                $( submenu ).addClass( 'hasSubMenu' );
                if( $( submenu ).parents('.cl-dropdown-inline').length > 0 ){
                    //$( submenu ).find('ul').slideUp();
                }
            }

        } );
        
        mainNode = this.config.$navigation[0];

        this.config.$navigation.mouseover( function( e ) {

            var item = e.target || e.srcElement;
            if( typeof item === 'undefined' || !item )
                return;

            while ( item.nodeName != 'LI' && item != mainNode ) {
                item = item.parentNode;
            }

            if ( item.nodeName == 'LI' ) {
                toOpen = item;
                open();
            }

        } ).mouseleave( function() {
            close();
        } );

        var open = function() {
            isOpen = true;

            // Get other items with same parent
            var items = $( toOpen ).parent().children( 'li' );
            
            $( items ).each( function( index, item ) {
                $( item ).find( "ul" ).each( function( index, submenu ) {

                    if ( item != toOpen ) {
                        if( $( item ).parents('.cl-dropdown-inline').length > 0 ){

                             $( submenu ).animate( {height: '0px' }, 20);
                        }
                        $( item ).removeClass( "showDropdown" );

                        close( item );

                    } else if ( !$( item ).hasClass( 'showDropdown' ) ) {

                        if( $( item ).children( '.codeless_custom_menu_mega_menu' ).length > 0 ){
                            CL_FRONT.fixMegaMenuPosition( $( item ).children( '.codeless_custom_menu_mega_menu' )[0] );
                        }

                        $( item ).addClass( "showDropdown" );

                        
                        var left = 0;
                        var node = submenu;
                        while ( node ) {
                            
                            left += Math.abs( node.offsetLeft );
                            node = node.offsetParent;
                        }
                        var right = left + submenu.offsetWidth;

                        var menuHeight = $( submenu ).outerHeight();
                        var innerHeight = $( submenu ).innerHeight();
                        var parentTop = $( submenu ).offset().top - $( window ).scrollTop();
                        var totalHeight = menuHeight + parentTop;
                        var windowHeight = window.innerHeight;

                        /* Vetical Inline submenu */
                        if( $( item ).parents('.cl-dropdown-inline').length > 0 ){
                             $( submenu ).css('display', 'none').css('height', 'auto');
                             var h = $( submenu ).outerHeight();

                             $( submenu ).css('height', 0).css('display', 'block');
                             $( submenu ).animate( {height: h + 'px' }, 100);
                        }

                        $( item ).removeClass( 'dropdownRightToLeft' );

                        if ( left < 0 ) $( item ).addClass( 'dropdownLeftToRight' );

                        if ( right > document.body.clientWidth ) {
                            $( item ).addClass( 'dropdownRightToLeft' );
                        }

                        if( $( item ).parents( '.showDropdown' ).length > 0 && $( item ).parents( '.codeless_custom_menu_mega_menu' ).length == 0 ){
                            var width = $( item ).parents( '.showDropdown' ).first().children('ul').width();
                            
                            if( $( item ).hasClass( 'dropdownLeftToRight' ) || ( ! $( item ).hasClass( 'dropdownLeftToRight' ) && ! $( item ).hasClass( 'dropdownRightToLeft' ) ) ){
                                if( !$('body').hasClass('rtl') )
                                    $( item ).find( "ul" ).css( { left: (width+16)+'px' } );
                                else{
                                    $( item ).find( "ul" ).css( { right: (width+16)+'px' } );
                                }
                            }
                            if( $( item ).hasClass( 'dropdownRightToLeft' ) )
                                $( item ).find( "ul" ).css( { right: (width+16)+'px' } );
                        }

                    }
                } );
            } );
        };

        var close = function( node ) {
            if (!node) {
              isOpen = false;
              node = CL_FRONT.config.$navigation;
            }

            // loop over the items, closing their submenus
            $(node).find('li').each(function(index, item) {
                if( $( item ).parents('.cl-dropdown-inline').length > 0 )
                    $(item).find('.sub-menu').css('height', 0);

                $(item).removeClass('showDropdown');
            });
        }

    }

     /**
     * Initialize Lightbox Elements
     * @since 1.0.0
     */
    CL_FRONT.itemILightBox = function(){
        "use strict";
        var el = $( '.entry-lightbox, .portfolio_item .entry-link.lightbox, .cl_media .lightbox' );

        if( el.length > 0 ){
            CL_FRONT.components.LightBox( el );
        }    
    }

     /**
     * Convert SVG to Animated Items
     * @since 1.0.0
     */
    CL_FRONT.convertSVGAnimated = function(){
        "use strict";
        
        if( $('svg.animated').length > 0 && ! CL_FRONT.config.$isCustomizer ){

            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'svg4everybody.js' ], function() {

                svg4everybody({polyfill: true});
                var id = 0;
                
                $('svg').each(function(index, item){
                        if( $(item).hasClass('animated') ){
                            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'vivus.min.js' ], function() {
                                id = 'svg_animated_' + index;
                                $(item).attr('id', id);
                                new Vivus( id, {duration: 200} );
                            });
                        }
                });
                
            });
        }
            
    }

     /**
     * Initialize Google Map
     * @since 1.0.0
     */
    CL_FRONT.codelessGMap = CL_FRONT.init_cl_map = function(){
        "use strict";

        if( $('.cl_map').length > 0 ){
            $('.cl_map').each(function(){
                var $el = $(this);

                var map = $el.find('.cl-map-element').first()[0];

                var data = {};
                    
                    data.style = CL_FRONT.helpers.parseData( $el.attr('data-style'), '' ),
                    data.latitude = $el.attr('data-lat'),
                    data.longitude = $el.attr('data-lon'),
                    data.map_zoom = CL_FRONT.helpers.parseData( $el.attr('data-zoom'), '4' );
                

                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'codeless-gmaps.js' ], function() {
                        
                        CL_FRONT.codelessInitMap( map, data );
                    
                });

            });
        }
    }



     /**
     * Contact Form Submit Button add neccessary classes
     * @since 1.0.0
     */
    CL_FRONT.contactForm = function(){
        if( $('.wpcf7-form').length > 0 ){
            $('.wpcf7-form').each(function(){
                var $form = $(this);

                $form.find('.wpcf7-submit').addClass(codeless_global.cl_btn_classes);
            });
        }
        
    }


     /**
     * Add appropiate btn classes to shop widgets
     * @since 1.0.0
     */
    CL_FRONT.shopBtnClasses = function(){

        var $btn2 = $('.price_slider_amount .button');


        if( $btn2.length > 0 )
            $btn2.addClass(codeless_global.cl_btn_classes).removeClass("btn-layout-large").addClass('btn-layout-small').removeClass('btn-font-medium').addClass('btn-font-small');

    }


     /**
     * Row Parallax Initialize
     * @since 1.0.0
     */
    CL_FRONT.rowParallax = function() {
        "use strict";
        if ( $( '.cl-row.cl-parallax > .bg-layer' ).length > 0 ){
            $( '.cl-row.cl-parallax > .bg-layer' ).each(function(){
                CL_FRONT.components.Parallax( $( this ) ).init();
            })
            
        }
    };


    CL_FRONT.shopTabbed = CL_FRONT.init_cl_shop_tabbed = function(){
        "use strict";
        CL_FRONT.shopInit();

        $( '.cl_shop_tabbed > ul > li > a' ).on('click', function(e){
            e.preventDefault();
            var use_for = $(this).data('load');
            var container = $(this).closest( '.cl_shop_tabbed' ).find( '.shop_tabbed_content' );
            var height = container.height();
            var li = $(this).closest('li');
            $(this).closest( 'ul' ).find('li').removeClass( 'active' );
            container.css('opacity', 0);

            li.addClass('active');
            container.find('.tab').remove();
            container.css('height', height + 'px');
            container.prepend('<div class="cl-md-loading"><div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="48" width="48" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="6"/></svg></div></div>');
            container.css('opacity', 1);
            $.ajax({
                type:"GET",
                url: window.location.href,
                data:"use_for_ajax="+use_for,
                success: function(html){
                    var $data = $(html).find( '.used_for_ajax' ).html();
                    
                    container.css('opacity', 0);
                    container.find('md-preloader').remove();
                    container.css('height', '');
                    container.html( $data );
                    container.css('opacity', 1);

                    CL_FRONT.isotopeShop(); 
                    CL_FRONT.animations(container, true);
                    CL_FRONT.quickView();

                    if( $.fn.tawcvs_variation_swatches_form ){
                        $( '.variations_form' ).tawcvs_variation_swatches_form();
                        CL_FRONT.shopColorChange();
                    }
                }
            });
        });
    }


    /**
     * Creative Search
     * @since 1.0.0
     */
    CL_FRONT.creativeSearch = function(){
        'use strict';

        if( $('.search-style-creative').length == 0 )
            return;

       
        var mainContainer = document.querySelector('#wrapper'),
            openCtrl = document.getElementById('header_search_btn'),
            closeCtrl = document.getElementById('btn-search-close'),
            searchContainer = document.querySelector('.creative-search');

        if( searchContainer === null )
            return;

        var inputSearch = searchContainer.querySelector('.search__input');

        var init = function() {
         
            initEvents();   
        }

        var initEvents = function() {
           
            openCtrl.addEventListener('click', openSearch);
            closeCtrl.addEventListener('click', closeSearch);
            document.addEventListener('keyup', function(ev) {
                // escape key.
                if( ev.keyCode == 27 ) {
                    closeSearch();
                }
            });
        }

        var openSearch = function(e) {
            e.preventDefault();
       
            mainContainer.classList.add('main-wrap--hide');
            searchContainer.classList.add('search--open');
            setTimeout(function() {
                inputSearch.focus();
            }, 500);
        }

        var closeSearch = function() {
            mainContainer.classList.remove('main-wrap--hide');
            searchContainer.classList.remove('search--open');
            inputSearch.blur();
            inputSearch.value = '';
        }

        init();

    };


    CL_FRONT.preloadOdometer = CL_FRONT.init_cl_counter = function(){
        "use strict";
        if( $('.cl_counter') ){
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'odometer.min.js' ], function() {
                
            });
        } 
    };


    /**
     * initialize Countdown
     * @since 1.0.0
     */
    CL_FRONT.countdownElement = CL_FRONT.init_cl_countdown = function(){
        "use strict";
        if( $('.cl_countdown').length > 0 ){
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.countdown.min.js' ], function() {
                $('.cl_countdown').each(function(){
                    var dt = $(this).data('dt');
                    $(this).countdown(dt, function(event) {
                      var $this = $(this).html(event.strftime(''
                        + '<span class="group"><span class="value">%w</span> <span class="type">weeks</span></span>'
                        + '<span class="group"><span class="value">%d</span> <span class="type">days</span></span>'
                        + '<span class="group"><span class="value">%H</span> <span class="type">hours</span></span>'
                        + '<span class="group"><span class="value">%M</span> <span class="type">min</span></span>'
                        + '<span class="group"><span class="value">%S</span> <span class="type">sec</span></span>'));
                    });
                });
            });
        } 
    };

     /**
     * Initialize Odometer counter
     * @since 1.0.0
     */
    CL_FRONT.codelessCounter = function(el){
        "use strict";
        var element = el;
        CL_FRONT.preloadOdometer();
        setTimeout(function(el){
            
            var odometer = element.find('.odometer').first(); 
            var number = odometer.data('number');
            var duration = odometer.data('duration');

            var el = odometer[0];
            
            var od = new Odometer({
              el: el,
              value: 0,
              duration: duration,
             
              // Any option (other than auto and selector) can be passed in here
              format: '',
              theme: 'minimal'
            });

            od.update(parseInt(number));
        }, 50);
        
    };

    /**
     * Initialize all shop functions
     * @since 1.0.0
     */
    CL_FRONT.shopInit = CL_FRONT.init_cl_woocommerce = function(){
        "use strict";

        CL_FRONT.shopDropDown();
        CL_FRONT.isotopeShop(); 
        setTimeout( function(){
            CL_FRONT.shopProductThumbnails();

        }, 200);
        

    };


    /**
     * Add Carousel to thumbnails on product page
     * @since 1.0.0
     */
    CL_FRONT.shopProductThumbnails = function(){
        if( $('.flex-control-nav.flex-control-thumbs').length == 0 || !CL_FRONT.config.$body.hasClass( 'single-product-style-default' ) )
            return;


        var $data = {

            responsive: {
                0: {
                    items: 3
                },
                480: {
                    items: 3
                },
                768: {
                    items: 4 
                },
                992: {
                    items: 4
                }
            },

            items: 4,
            slideBy: 1,
            nav: true

        };

       

        $('.flex-control-nav.flex-control-thumbs').addClass('cl-carousel owl-carousel owl-theme');

        setTimeout(function(){
            CL_FRONT.components.Carousel( $('.flex-control-nav.flex-control-thumbs'), $data );
            
        }, 200);

        setTimeout(function(){
            $( '.woocommerce-product-gallery' ).wc_product_gallery();
        }, 400);
    }



    /**
     * Style Woocommerce Dropdown
     * Load Select2 Plugin JS
     * @since 1.0.0
     */
    CL_FRONT.shopDropDown = function(){ 
        var $elements = $( '.woocommerce-ordering .orderby, .variations select, .search-element #clcat, #blog_sort_by, select#shipping_country, select#billing_country, select#billing_state, table.variations .value select, #calc_shipping_country' );
        if ( $elements.length ) {
            $elements.each( function( i ) {
                var $element = $( this );

                var $containerCssClass = '';

                if( $element.closest( 'table.variations' ).length > 0 )
                    $containerCssClass = 'variations_select';

                if( $element.closest( '.woocommerce-ordering' ).length > 0 )
                    $containerCssClass = 'woo_orderby';

                if( $element.attr('id') == 'calc_shipping_country' )
                    $containerCssClass = 'calc_shipping_country';

                if( $element.attr('id') == 'billing_country' )
                    $containerCssClass = 'billing_country';

                if( $element.attr('id') == 'shipping_country' )
                    $containerCssClass = 'shipping_country';

                if( $element.attr('id') == 'billing_state' )
                    $containerCssClass = 'billing_state';

                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'select2.min.js' ], function() {

                    setTimeout(function(){

                        var sel = $element.select2({
                            minimumResultsForSearch: Infinity
                        });

                        sel.data('select2').$container.addClass($containerCssClass);
                        sel.data('select2').$dropdown.addClass($containerCssClass + '_dropdown');
                    }, 200);
                    
                });
            });
        }
    };

    /**
     * Initialize Single Product Slider with Carousel
     * @since 1.0.0
     */
    /*CL_FRONT.shopProductSlider = function(){
        if( $( '.cl-images .cl-carousel' ).length > 0 )
            CL_FRONT.components.Carousel( $( '.cl-images .cl-carousel' ), {
                items:1,
                loop:false,
                center:true,
                URLhashListener:true,
                autoplayHoverPause:true,
                startPosition: 'URLHash',
                animateIn: 'alpha-in',
                animateOut: 'fadeOut'
            }, function( owl, el ){
                
                
                var onChangefunc = function(event){
                    var index = event.item.index;
                    var actived_id = $( event.currentTarget ).find('.active .cl-image-item').attr('data-hash');
                   
                    var thumbnails = $(event.currentTarget).closest('.images').find('.thumbnails');
                      
                    thumbnails.find('a').removeClass('active');
                    thumbnails.find('[href="#'+actived_id+'"]').addClass('active');
                };

                owl.on('translated.owl.carousel', onChangefunc );
                owl.on('initialize.owl.carousel', onChangefunc );
            } );
    };*/


    /*CL_FRONT.shopEasyZoom = function(){
        "use strict";
        var $elements = $( '.easyzoom' );
        if ( $elements.length ) {
            $elements.each( function( i ) {

                var $element = $( this );
                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'easyzoom.js' ], function() {
                    var $easyzoom = $element.easyZoom();
                });
            });
        }
    };/*


    /**
     * Isotope Shop Init
     * used on Customizer too
     * 
     * @since 1.0.0
     */
    CL_FRONT.isotopeShop = CL_FRONT.init_cl_woocommerce = CL_FRONT.init_cl_shop_trending = function( $el ) {
        "use strict";
        $( '.shop-products' ).each(function(){

            

            if( $(this).hasClass('cl-carousel') ){
                var $data = {

                        responsive: {
                            0: {
                                items: CL_FRONT.helpers.parseData( codeless_global.shop_columns_mobile, 1 )
                            },
                            480: {
                                items: 2
                            },
                            768: {
                                items: 3
                            },
                            992: {
                                items: $(this).attr('data-grid-cols')
                            }
                        },

                        items: $(this).attr('data-grid-cols')

                    };

                

                if( $(this).closest('.cl_shop_trending').length > 0 ){
                    $data = {

                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 2
                            },
                            768: {
                                items: 4
                            },
                            992: {
                                items: $(this).attr('data-grid-cols')
                            }
                        },

                        items: $(this).attr('data-grid-cols')

                    };
                }

                CL_FRONT.components.Carousel( $( this ), $data );
            }
            else{
                CL_FRONT.components.Isotope( $( this ) );
                var $parent = $(this).closest( '#content' );
                var $filters = $parent.find( '.grid-options a' );


                if( $filters.length > 0 )
                    $filters.on( 'click', function(e){
                        e.preventDefault();
                        $filters.removeClass('active');
                        $(this).addClass('active');
                        var $shop = $parent.find('.shop-entries');

                        $shop.attr('data-grid-cols', $(this).attr( 'data-grid-cols' ));
                        CL_FRONT.components.Isotope( $shop );
                    } );

            }
        })
        
    };


    /**
     * Manage Customize Partial Refresh
     * 
     * @since 1.0.0
     */
    CL_FRONT.partialRefreshRendered = function(){
        "use strict";
     
        if( typeof wp === 'undefined' || typeof wp.customize === 'undefined' || typeof wp.customize.selectiveRefresh === 'undefined' )
            return false;

        wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {
            var postType = '';

            if( typeof placement.partial.params.post_type !== 'undefined' )
                postType = placement.partial.params.post_type;

            if( postType == 'portfolio' )
                CL_FRONT.init_cl_portfolio();

        } );
    };
 


    CL_FRONT.footerReveal = function(){
        if( $('#footer-wrapper.reveal').length == 0 )
            return false;

        var footerHeight = $('#footer-wrapper').height();

        if( this.config.$viewport.hasClass('cl-layout-bordered') ){
            $('#footer-wrapper').width( this.config.$main.width() );
        }

        this.config.$main.css( 'margin-bottom', footerHeight ).css( 'background-color', '#ffffff' ).css('position', 'relative').css('z-index', 1);
    };


    CL_FRONT.restartAnimations = function( $el, force ){
        if( $el.length == 0 )
            return;

        //$el.find( ' > .start_animation' ).removeClass('start_animation').addClass('animate_on_visible');
        setTimeout(function(){

            CL_FRONT.animations( $el, force );
        }, 20);
    }

    /**
     * Manage Customize Partial Refresh
     * 
     * @since 1.0.0
     * @version 1.0.7
     */
    CL_FRONT.onePageScroll = function(){
        "use strict";
        if( CL_FRONT.config.$body.hasClass('cl-one-page') ){


            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.onepage.js' ], function() {
                $('#navigation nav .menu').onePageNav({
                    currentClass: 'current-menu-item-onepage',
                    changeHash: false,
                    scrollSpeed: 750,
                    scrollThreshold: 0.5,
                    offset: CL_FRONT.config.$headerHeight
                });
            });
        }
        
    }


    /* -------------------------------------------------------- */
    /* ----------------- COMPONENTS TO REUSE ------------------ */


    CL_FRONT.components.JustifyGallery = function( container ){
        var $elements = container;

        if ( $elements.length ) {
            $elements.each( function( i ) {

                var $element = $( this );
                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.justifiedGallery.min.js' ], function() {

                    var $data = $element.data(),
                        $rowHeight = parseInt( CL_FRONT.helpers.parseData( $element.attr('data-rowheight'), 200 ) ),
                        $lastRow = 'justify',
                        $margins = parseInt( CL_FRONT.helpers.parseData( $element.attr('data-margins'), 15 ) );

                    $element.css( {opacity: 0} );
                    // Load justifyGallery after images loaded

                    
                        $element.imagesLoaded( function() {
                            //CL_FRONT.fixPostVideoHeight();
                            
                            $element.css( {opacity: 1} );

                            $element.justifiedGallery({
                                lastRow: $lastRow,
                                rowHeight: $rowHeight,
                                margins: $margins
                            });

                            if( typeof CL_FRONT['animations'] !== 'undefined' )
                                CL_FRONT.animations();
                            
                            CL_FRONT.rowParallax();
                        } );

                        if( $element.hasClass( 'filterable-entries' ) ){
                            $( '.cl-filters' ).on( 'click', 'button', function() {
                                var filterValue = $(this).attr('data-filter');
                                if( filterValue != '*' )
                                    $element.justifiedGallery({
                                        filter: filterValue
                                    }); 
                                else
                                    $element.justifiedGallery({
                                            filter: false
                                    }); 

                                CL_FRONT.restartAnimations( $element );
                        
                                $(this).parent().find('button.selected').removeClass('selected');
                                $(this).addClass('selected');

                            });
                        }
                        
                } );
            } );
        }
    }


    CL_FRONT.components.Isotope = function( container ){
        var $elements = container;

        if ( $elements.length ) {
            $elements.each( function( i ) {

                var $element = $( this );
               
                CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'isotope.js' ], function() {

                    var $data = $element.data(),
                        $transitionDuration = CL_FRONT.helpers.parseData( $data.transitionDuration, '0.4' ),
                        $layoutMode = CL_FRONT.helpers.parseData( $data.layoutMode, 'masonry' );

                    $element.css( {opacity: 0} );
                    // Load isotope after images loaded

                    
                        $element.imagesLoaded( function() {
                            
                            CL_FRONT.fixPostVideoHeight();
                            if( $element.hasClass('masonry-entries') && $element.is('.blog-entries') )
                                CL_FRONT.fixPostMasonryHeight( $element );


                            if( $element.hasClass('masonry-entries') && $element.is('#portfolio-entries') )
                                CL_FRONT.fixPortfolioMasonryHeight( $element );

                            $element.css( {opacity: 1} );

                            var opts = {
                                itemSelector: '.cl-isotope-item',
                                transformsEnabled: true,
                                filter: '*',
                                percentPosition: true,
                                transitionDuration: '0.0s',
                                layoutMode: $layoutMode,
                                
                            };

                            if( $element.hasClass('portfolio-layout-masonry') )
                                opts['masonry'] = {
                                  columnWidth: '.cl-msn-size-default'
                                };
                            

                            $element.isotope( opts );

                            if( typeof CL_FRONT['animations'] !== 'undefined' )
                                CL_FRONT.restartAnimations( $element );
                            
                            $element.isotope('arrange');
                            CL_FRONT.rowParallax();
                        } );
                        

                    

                    if( $element.hasClass( 'filterable-entries' ) ){
                            $( '.cl-filters' ).on( 'click', 'button', function() {
                                var filterValue = $(this).attr('data-filter');
                                if( filterValue != '*' )
                                    $element.isotope({
                                        filter: filterValue,
                                        sortBy: 'random'
                                    }); 
                                else
                                    $element.isotope({
                                            filter: filterValue,
                                            sortBy: 'original-order'
                                    }); 
                                
                                CL_FRONT.restartAnimations( $element );
                                $element.isotope('arrange');

                                $(this).parent().find('button.selected').removeClass('selected');
                                $(this).addClass('selected');

                            });
                    }

                } );
            } );
        }
    }


    /**
     * Carousel Component to be used over pages
     * @since 1.0.0
     */

    CL_FRONT.components.Carousel = function( el, data_obj, callback ){
        if( el != null ){
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'owl.carousel.min.js'], function() {
                
                var $data = {

                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        992: {
                            items: el.attr('data-grid-cols')
                        }
                    },

                    items: el.attr('data-grid-cols')

                };

                if( data_obj != null )
                    $data = data_obj;

                
                if( typeof $data['nav'] === 'undefined' )
                    $data['nav'] = parseInt( CL_FRONT.helpers.parseData( el.data('carouselNav') , false ) );

                if( typeof $data['dots'] === 'undefined' )
                    $data['dots'] = parseInt( CL_FRONT.helpers.parseData( el.data('carouselDots') , false ) );


                el.imagesLoaded( function() {
                    var owl = el.owlCarousel($data);
                    CL_FRONT.animations( el.find( '.owl-item.active'), true ); 

                    owl.on('translated.owl.carousel', function(event) { 
                        CL_FRONT.animations( el.find( '.owl-item.active' ), true );                   
                    });

                    if( callback != null )
                        callback(owl, el);

                });

                

            });
        }
    };



    /**
     * iLightbox Component
     * @since 1.0.0
     */
    CL_FRONT.components.LightBox = function( el ){
        "use strict";

        if( el != null ){
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'jquery.requestAnimationFrame.js',
                                                    codeless_global.FRONT_LIB_JS + 'jquery.mousewheel.js',
                                                    codeless_global.FRONT_LIB_JS + 'ilightbox.packed.js' ], function() {

                
                el.iLightBox({skin: 'dark'});
            });
        }
    };


    /**
     * lazyload Component
     * @since 1.0.0
     */
    CL_FRONT.components.LazyLoad = function( container ){
        "use strict";

        if( container == null ){
            container = window;
        }
            CL_FRONT.components.loadDependencies( [ codeless_global.FRONT_LIB_JS + 'lazyload.min.js' ], function() {   
                
                var myLazyLoad = new LazyLoad({
                    container: container,
                    elements_selector: '.lazyload'
                });

            });
    };


    /**
     * Parallax Effect Used on various parts of site
     * @since 1.0.0
     */

    CL_FRONT.components.Parallax = function( el ) {
        "use strict";



        var self = this,
            $this = el ,
            obj = $this[ 0 ],

            config = $this.data( 'parallax-config' ),
            headerHeight = null,
            offset = null,
            elHeight = null,
            ticking = false,
            isMobile = null;

        var clientRect = null;

        if( config == null )
            config = { speed: 0.3 };

        var update = function() {
            // Update Positions
            obj.style.transform = null;
            obj.style.top = null;
            obj.style.bottom = null;
            if ( CL_FRONT.config.$isMobileScreen ) {
                $this.css( 'height', '' );
                return;
            }

            clientRect = $this[ 0 ].getBoundingClientRect();

            offset = clientRect.top;

            elHeight = clientRect.height;
            headerHeight = 0;
          
            offset = offset - headerHeight + CL_FRONT.config.$windowTop;

            setPosition();
            setSize();
        };


        var h = 0,
            winH = 0,
            proportion = 0,
            height = 0;

        
        var setSize = function() {

            $this.css( 'height', '' );
            winH = CL_FRONT.config.$window.height() - headerHeight;
            h = obj.getBoundingClientRect().height;

            if ( config.speed <= 1 && config.speed > 0 ) {
                if ( offset === 0 ) {
                    $this.css( {
                        backgroundAttachment: 'scroll',
                        'will-change': 'transform'
                    } );
                } else {
                    $this.css( {
                        height: h + ( ( winH - h ) * config.speed ),
                        backgroundAttachment: 'scroll',
                        'will-change': 'transform'
                    } );
                }

            } else if ( config.speed > 1 && h <= winH ) {
                $this.css( {
                    // good for full heights - 2 because it's viewable by 2 screen heights
                    height: ( winH + ( ( winH * config.speed ) - winH ) * 2 ),
                    top: -( ( winH * config.speed ) - winH ),
                    backgroundAttachment: 'scroll',
                    'will-change': 'transform'
                } );

            } else if ( config.speed > 1 && h > winH ) {
                proportion = h / winH;
                height = ( winH + ( ( winH * config.speed ) - winH ) * ( 1 + proportion ) );

                $this.css( {
                    height: height,
                    top: -( height - ( winH * config.speed ) ),
                    backgroundAttachment: 'scroll',
                    'will-change': 'transform'
                } );

            } else if ( config.speed < 0 && h >= winH ) {
                height = h * ( 1 - config.speed );
                $this.css( {
                    height: height + ( height - h ),
                    top: h - height,
                    backgroundAttachment: 'scroll',
                    'will-change': 'transform'
                } );

            } else if ( config.speed < 0 && h < winH ) {
                // candidate to change
                var display = ( winH + h ) / winH;
                height = h * -config.speed * display;
                $this.css( {
                    height: h + ( height * 2 ),
                    top: -height,
                    backgroundAttachment: 'scroll',
                    'will-change': 'transform'
                } );
            }
        };


        var currentPoint = null,
            progressVal = null,
            startPoint = null,
            endPoint = null,

            scrollY = null;

        var setPosition = function() {
            ticking = false;

            if( scrollY == null )
                scrollY = window.scrollY;

            var currentScrollY = scrollY;
            if (!CL_FRONT.config.$isMobileScreen){
                
                startPoint = offset - winH;
               
                endPoint = offset + elHeight + winH - headerHeight;
                
                if ( currentScrollY < startPoint || currentScrollY > endPoint ) {
                    ticking = false;
                    return;
                }

                currentPoint = ( ( -offset + currentScrollY ) * config.speed );

                $this.css( {
                    '-webkit-transform': 'translateY(' + currentPoint + 'px) translateZ(0)',
                    '-moz-transform': 'translateY(' + currentPoint + 'px) translateZ(0)',
                    '-ms-transform': 'translateY(' + currentPoint + 'px) translateZ(0)',
                    '-o-transform': 'translateY(' + currentPoint + 'px) translateZ(0)',
                    'transform': 'translateY(' + currentPoint + 'px) translateZ(0)'
                } );

                
            }
        };


        var requestTick = function() {
           
            if ( !ticking ) {
                window.requestAnimationFrame( setPosition );
            }
            ticking = true;
            
        };

        var onScroll = function(){
            scrollY = window.scrollY;
            requestTick();
        }


        var init = function() {
            
            // Disable scroll effects when smooth scroll is disabled
            if ( !CL_FRONT.config.$isSmoothScroll || CL_FRONT.config.$isCustomizer ) {
                return;
            }

            update();
            setTimeout( update, 300 );

            CL_FRONT.config.$window.on( 'load', update );
            CL_FRONT.config.$window.on( 'resize', update );
            window.addEventListener('scroll', onScroll, false);

        };


        return {
            init: init
        };

    };


    CL_FRONT.components.loadAnimation = function( content, callback ){

        content.imagesLoaded( { background: true }, function(list){
          
            callback();
            content.addClass( 'cl-loaded-component' );
        });

    };


    /**
     * Core function for loading dinamically JS
     * 
     * @since 1.0.0
     */
    CL_FRONT.components.loadDependencies = function( dependencies, callback ) {
        "use strict";

        var _callback = callback || function() {};
        if ( !dependencies )
            return void _callback();

        var newDeps = dependencies.map( function( dep ) {
            return -1 === CL_FRONT.config._loadedDependencies.indexOf( dep ) ? "undefined" == typeof CL_FRONT.config._inQueue[ dep ] ? dep : ( CL_FRONT.config._inQueue[ dep ].push( _callback ), !0 ) : !1
        } );

        if ( newDeps[ 0 ] !== !0 ) {
            if ( newDeps[ 0 ] === !1 )
                return void _callback();
            var queue = newDeps.map( function( script ) {
                CL_FRONT.config._inQueue[ script ] = [ _callback ];
                return $.getCachedScript( script );
            } );

            var onLoad = function() {
                newDeps.map( function( loaded ) {
                    CL_FRONT.config._inQueue[ loaded ].forEach( function( callback ) {
                        callback()
                    } );
                    delete CL_FRONT.config._inQueue[ loaded ];
                    CL_FRONT.config._loadedDependencies.push( loaded )
                } );
            };

            $.when.apply( null, queue ).done( onLoad )
        }


    };


    


    /* ---------------------------------------------------*/
    /* ------------------ HELPERS FUNCTIONS --------------*/


    CL_FRONT.helpers.changeHeaderColor = function(element){
        
        var color = 'dark';
        if( CL_FRONT.config.$header.hasClass('cl-header-sticky-active') )
            return;


        if( element.find('.cl-row').hasClass('light-text') )
            color = 'light';
        
    
        if( color == 'light' && ! CL_FRONT.config.$header.hasClass('cl-header-light') ){
            CL_FRONT.config.$header.addClass('cl-header-light');
            CL_FRONT.config.$body.addClass('cl-header-light');
        }

        if( color == 'dark' && CL_FRONT.config.$header.hasClass('cl-header-light') ){
            CL_FRONT.config.$header.removeClass('cl-header-light');
            CL_FRONT.config.$body.removeClass('cl-header-light');
        }
            


    };

    CL_FRONT.helpers.recognizeColor = function(color){
        var rgb = '';
        if( CL_FRONT.helpers.includes(color, 'rgb') ){
            var match = color.match(/rgba?\((\d{1,3}), ?(\d{1,3}), ?(\d{1,3})\)?(?:, ?(\d(?:\.\d?))\))?/);
            rgb = match ? {
                0: match[1],
                1: match[2],
                2: match[3]
              } : {};


        }else{
            var isOk  = /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(color);
            if( ! isOk )
                return 'none';
            rgb = CL_FRONT.helpers.hexToRgb(color);
            
        }
        

        var o = Math.round(((parseInt(rgb[0]) * 299) + (parseInt(rgb[1]) * 587) + (parseInt(rgb[2]) * 114)) /1000);
        if(o > 125) {
            return 'light';
        }else{ 
            return 'black';
        }

    };

    CL_FRONT.helpers.hexToRgb = function(hex){
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    };

    CL_FRONT.helpers.includes = function(container, value){
        var returnValue = false;
        var pos = container.indexOf(value);
        if (pos >= 0) {
            returnValue = true;
        }
        return returnValue;
    };

    CL_FRONT.helpers.loadCSS = function(href){
        var ss = document.styleSheets;
        for (var i = 0, max = ss.length; i < max; i++) {
            if (ss[i].href == href)
                return;
        }
        var link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = href;

        document.getElementsByTagName("head")[0].appendChild(link);
    }

    /**
     * Core function for loading dinamically JS
     * 
     * @since 1.0.0
     */
    $.getCachedScript = function( url, callback ) {
        "use strict";

        url = url.replace( /.*?:\/\//g, "" );

        if ( location.protocol === 'https:' )
            url = 'https://' + url;
        else
            url = 'http://' + url;

        var options = {
            dataType: "script",
            cache: false,
            url: url
        };

        return $.ajax( options ).done( callback );
    };


    /**
     * parse and sanitize value
     *
     * @since 1.0.0
     */
    CL_FRONT.helpers.parseData = function( val, fallback ) {
        "use strict";
        return ( typeof val !== 'undefined' ) ? val : fallback;
    };

    CL_FRONT.helpers.scroll = function() {
        "use strict";
        var offset = 0,
            $window = $(window),
            hasPageYOffset = (window.pageYOffset !== undefined),
            body = (document.documentElement || document.body.parentNode || document.body);

        var update = function() {
            offset = hasPageYOffset ? window.pageYOffset : body.scrollTop;
        };

        var rAF = function() {
            window.requestAnimationFrame(update);
        };

        update();
        $window.on('load', update);
        $window.on('resize', update);
        $window.on('scroll', rAF);

        
        return offset;
      
    };


    function initGMAP(){
        CL_FRONT.codelessGMap();
    }

    CL_FRONT.siteInit();

    if( typeof CL_FRONT.animations == 'undefined' ){

        CL_FRONT.animations = function( el, force ) { 
            if (!window.waypoint_animation) {
                window.waypoint_animation = function(el, force) {
                    
                    var notEl = (el == null) ? true : false;

                    if( el == null )
                        el = $('.animate_on_visible:not(.start_animation)');
                    else
                        el = el.find('.animate_on_visible:not(.start_animation)').andSelf();

                   
                    $.each(el, function(index, val) {
                        var run = true;
                        if ($(val).closest('.cl-slide').length > 0) run = false;
                       
                        if ($(val).closest('.cl-carousel').length > 0) run = false;

                        if ($(val).closest('#navigation').length > 0) run = false;

                        if( force )
                            run = true;
                        if (run) {
                            
                            CL_FRONT.components.loadDependencies([codeless_global.FRONT_LIB_JS + "waypoints.min.js"], function(){
                                Waypoint.refreshAll();
                                new Waypoint({
                                    element: val,
                                    handler: function() {
                                        
                                        var element = $(this.element),
                                            index = element.index(),
                                            delayAttr = element.attr('data-delay');

                                        if( CL_FRONT.config.$isMobileScreen && element.parent().attr('data-grid-cols') )
                                            delayAttr = 100;


                                        if (delayAttr == undefined) delayAttr = 0;
                                        setTimeout(function() {
                                            element.addClass('start_animation');
                                            
                                            if( element.hasClass('cl_counter') )
                                                CL_FRONT.codelessCounter(element);

                                            if( element.hasClass('cl_progress_bar') )
                                                CL_FRONT.progressBar( element );

                                        }, delayAttr);
                                        this.destroy();
                                    },
                                    offset: '90%'
                                });
                            });
                            
                        }
                    });
                }
            }
            setTimeout(function() {
                window.waypoint_animation(el, force);
            }, 1);
        };
    }



} )( jQuery );
