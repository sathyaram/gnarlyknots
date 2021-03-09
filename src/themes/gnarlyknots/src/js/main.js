(function($){
    class SlickCarousel {
        constructor() {
            this.initiateCarousel();
        }

        initiateCarousel() {
            $('.carousel').slick();
        }
    }

    new SlickCarousel();

})(jQuery)