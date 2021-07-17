(function () {
    MandrCookies();
    // MandrHeaderSpacing();
})();

/**
 * Set cookies for website Gravity Forms
 */
function MandrCookies(){
    /**
         * User referrer tracking
         */
     if (!docCookies.hasItem('mrsrc')) {
        if (
            typeof document.referrer === 'undefined' ||
            document.referrer === '' ||
            document.referrer === null
        ) {
            docCookies.setItem('mrsrc', 'direct', 3600, '/');
        } else {
            docCookies.setItem('mrsrc', document.referrer, 432000, '/');
        }
    }

    /* change this to reflect the ID of the hidden form input */
    var myForm = document.getElementById('input_1_6');
    if (myForm) {
        /* change this to reflect the ID of the hidden form input, again */
        document.getElementById('input_1_6').value = docCookies.getItem(
            'mrsrc'
        );
    }
}

/**
 * Handles heading scroll sticky toggle & margin offset
 */
function MandrHeaderSpacing(){

    function headerSetMargin(){
        var headerElem = document.getElementById('header');
        var primaryWrap = document.getElementById('primary-wrap');

        primaryWrap.style.marginTop = headerElem.clientHeight + 'px';
    }
    
    function headerStickyClass(currentScroll) {
        return ( currentScroll > 0 ) ? document.body.classList.add('fixed-header') : document.body.classList.remove('fixed-header');
    }

    function headerHandler() {
        var scroll = document.scrollingElement ? document.scrollingElement.scrollTop : document.documentElement.scrollTop;
        
        if(window.innerWidth > 768){
            headerStickyClass(scroll);
        }
    }

    window.addEventListener( 'resize', headerSetMargin );
    window.addEventListener( 'load', headerSetMargin );
    window.addEventListener( 'scroll', headerHandler );
}

/**
 * Simple parallax effect for elements w/ .parallax classname
 */
function MandrSimpleParallax(){

    // If items are in viewport, apply parallax effects
    function setupParallaxItem(item){
        var offset = 0.2;
        var scrolled = window.pageYOffset;

        if( isInViewport(item) && leavingViewport(item) ) {
            item.style.top = - (scrolled * offset) + 'px';
        }
    }
    // Initialize parallax 
    function initParallax() {
        var item = document.querySelector('.parallax');

        return (item) ? setupParallaxItem(item) : false;
    }
    window.addEventListener('scroll', initParallax);
      
    /* Helper - Determine if element is in viewport */
    var isInViewport = function(e) {
        var bounding = e.getBoundingClientRect();

        return (
            bounding.top >= 0 &&
            bounding.left >= 0 &&
            bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    /* Helper - Determine if element is leaving viewport */
    var leavingViewport = function(e) {
        var scrolled = window.pageYOffset;
        var top = e.getBoundingClientRect().top;

        return(
            scrolled < top + window.innerHeight
        );
    }
}