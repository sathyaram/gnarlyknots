// main.js
(function($){
    class SlickCarousel {
        constructor() {
            this.initiateCarousel();
        }

        initiateCarousel() {
            $('.carousel').slick({
                variableWidth: true,
                infinite: true,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 6000,
                pauseOnHover: true,
                centerMode: true,
                adaptiveHeight: true
            });
        }
    }
    new SlickCarousel();
})(jQuery)