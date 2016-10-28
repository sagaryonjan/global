

jQuery(document).ready(function($){

//Stickybar
    if($('.site-header').length){
        var stickyNavTop = $('.site-header').offset().top;
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();
            if (scrollTop > stickyNavTop) {
                $('.site-header').addClass('ts-sticky');
            } else {
                $('.site-header').removeClass('ts-sticky');
            }
        };
        stickyNav();
        $(window).scroll(function() {
            stickyNav();
        });
    } 

    $('.search-icon .search-click').click(function() {
        $('.search-box').addClass('active');
    });
    $('.search-box .close').click(function() {
        $('.search-box').removeClass('active');
    });  

   // $(window).stellar();

// Main-Slider
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30,
        loop: true,
        effect: 'fade',
        speed: 1400
    }); 

    var ts_team_slider = new Swiper('.ts-team-slider', {
        pagination: '.swiper-pagination',
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 6000,
        speed: 600
    });


    var ts_review_slider = new Swiper('.ts-testimonials-slider', {
        pagination: '.swiper-pagination',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
        loop: true,
        autoplay: 4000,
        speed: 700
    });

// Top Scroll
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1){
            $('.ts-scroll-top').addClass("show");
        }
        else{
            $('.ts-scroll-top').removeClass("show");
        }
    });
    $(".ts-scroll-top").on("click", function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

// News Ticker

    $('.newsticker').newsTicker({
        row_height: 35,
        max_rows: 1,
        speed: 1000,
        direction: 'down',
        duration: 4000,
        autostart: 1,
        pauseOnHover: 1
    });

// ScrollSpeed
//jQuery.scrollSpeed(120, 800); 


    var $grid = $('.ts-grid').masonry({
        columnWidth:1
    });

// layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.masonry();
    });

//Masonry Filtering 
    $("li.ts-tab-menu").on("click", function(){
        var group = $(this).attr('value');
        var group_class = "." + group;
        //alert(group_class);
        $(".ts-grid-item").hide();
        $(group_class).show();
        $grid.masonry('layout');
    });

    var selector = '.ts-portfolio-nav li';
    $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });


    /**
     * tabs
     *
     * @description The Tabs component.
     * @param {Object} options The options hash
     */
    var tabs = function(options) {

        var el = document.querySelector(options.el);
        var tabNavigationLinks = el.querySelectorAll(options.tabNavigationLinks);
        var tabContentContainers = el.querySelectorAll(options.tabContentContainers);
        var activeIndex = 0;
        var initCalled = false;

        /**
         * init
         *
         * @description Initializes the component by removing the no-js class from
         *   the component, and attaching event listeners to each of the nav items.
         *   Returns nothing.
         */
        var init = function() {
            if (!initCalled) {
                initCalled = true;
                el.classList.remove('no-js');

                for (var i = 0; i < tabNavigationLinks.length; i++) {
                    var link = tabNavigationLinks[i];
                    handleClick(link, i);
                }
            }
        };

        /**
         * handleClick
         *
         * @description Handles click event listeners on each of the links in the
         *   tab navigation. Returns nothing.
         * @param {HTMLElement} link The link to listen for events on
         * @param {Number} index The index of that link
         */
        var handleClick = function(link, index) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                goToTab(index);
            });
        };

        /**
         * goToTab
         *
         * @description Goes to a specific tab based on index. Returns nothing.
         * @param {Number} index The index of the tab to go to
         */
        var goToTab = function(index) {
            if (index !== activeIndex && index >= 0 && index <= tabNavigationLinks.length) {
                tabNavigationLinks[activeIndex].classList.remove('is-active');
                tabNavigationLinks[index].classList.add('is-active');
                tabContentContainers[activeIndex].classList.remove('is-active');
                tabContentContainers[index].classList.add('is-active');
                activeIndex = index;
            }
        };

        /**
         * Returns init and goToTab
         */
        return {
            init: init,
            goToTab: goToTab
        };

    };

    /**
     * Attach to global namespace
     */
    window.tabs = tabs;


    var myTabs = tabs({
        el: '#ts-services-block',
        tabNavigationLinks: '.ts-services-icon',
        tabContentContainers: '.ts-services-desc'
    });
    myTabs.init();

    // Last


});

