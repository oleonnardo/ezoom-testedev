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

                $this.append(`<div class="featured-border effect-border ${position_border}" style="background-color: ${color}"></div>`);
            })
        }
    }
}

$(document).ready(function () {
    EZOOM.dataBackground();
    EZOOM.postsSetBorder();
});
