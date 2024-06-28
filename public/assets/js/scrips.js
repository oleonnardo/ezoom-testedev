const EZOOM = {
    hasEmpty: function (value, defaultValue) {
        return (value === "" || value === undefined) ? defaultValue : value;
    },

    dataBackground: function () {
        var element = $('[data-background]');

        if (element.length) {
            element.each(function () {
                let $this = $(this);

                $this.css({
                    "background": "url(" + $this.data('background') + ")",
                    "background-size": EZOOM.hasEmpty($this.data('bgsize'), 'cover'),
                    "background-position": EZOOM.hasEmpty($this.data('bgposition'), 'center center'),
                    "background-repeat": EZOOM.hasEmpty($this.data('bgrepeat'), 'no-repeat'),
                });
            });
        }
    },

    postsSetBorder: function () {
        var element = $('[data-border-color]');

        if (element.length) {
            element.each(function () {
                let $this = $(this);
                let color = $this.data('border-color');
                let position_border = typeof $this.data('border-position') === "string" ?
                    'border-position-' + $this.data('border-position') : '';
                let parent = typeof $this.data('border-parent') === "string" ?
                    $this.data('border-parent') : null;

                if (parent) {
                    $this = $this.find(parent);
                }

                $this.append(`<div class="featured-border effect-border ${position_border}" style="background-color: ${color}"></div>`);
            })
        }
    },
    owlCarousel: function () {
        EZOOM.owlCarouselInFeaturedPosts();
        EZOOM.owlCarouselInCategories();
    },
    owlCarouselDestroy: function (element) {
        element.trigger('destroy.owl.carousel')
        element.find('.owl-stage-outer').remove();
        element.removeClass("owl-loaded owl-drag");
    },
    owlCarouselInFeaturedPosts() {
        var element = $(".posts-featured.overlay-card-hover");

        if (window.innerWidth >= 1024) {
            EZOOM.owlCarouselDestroy(element);
            return false;
        }

        element.addClass('owl-carousel');
        element.find('.post-featured-item').addClass('item');

        window.owlCarouselFeatured = element.owlCarousel({
            loop: false,
            margin: 0,
            responsiveClass: true,
            responsive:{
                0:{
                    items: 1,
                    nav: false
                },
                480: {
                    items: 2,
                    nav: false
                },
                768: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false,
                    dots: true,
                    loop: false
                }
            }
        });
    },
    owlCarouselInCategories() {
        var element = $(".category-posts");

        if (window.innerWidth >= 768) {
            EZOOM.owlCarouselDestroy(element);
            return false;
        }

        element.addClass('owl-carousel');

        window.owlCarouselFeatured = element.owlCarousel({
            loop: false,
            margin: 0,
            responsiveClass: true,
            responsive:{
                0:{
                    items: 1,
                    nav: false
                },
                480: {
                    items: 2,
                    nav: false
                },
                768: {
                    items: 3,
                    nav: false
                },
            }
        });
    },

}

window.addEventListener('resize', function() {
    EZOOM.owlCarousel();
});

$(document).ready(function () {
    EZOOM.dataBackground();
    EZOOM.postsSetBorder();
    EZOOM.owlCarousel();
});
