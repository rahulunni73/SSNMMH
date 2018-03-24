$(function () {

    "use strict";

    // REMOVE # FROM URL
    $('a[href="#"]').click(function (e) {
        e.preventDefault();
    });
/*
    // CAMERA SLIDER
    $("#camera_wrap_1").camera({
        alignment: 'center',
        autoAdvance: true,
        mobileAutoAdvance: true,
        barDirection: 'leftToRight',
        barPosition: 'bottom',
        loader: 'none',
        opacityOnGrid: false,
        cols: 12,
        height: '50%',
        playPause: false,
        pagination: false,
        imagePath: './assets/js/plugins/camera/images/'
    });*/

   /* // NEWS CAROUSEL
    $("#news-carousel, #comments-carousel").carousel({
        interval: false
    });*/

    // ACCORDION
    var $active = $("#accordion .panel-collapse.in, #accordion-faqs .panel-collapse.in")
            .prev()
            .addClass("active");

    $active
            .find("a")
            .append("<span class=\"fa fa-minus pull-right\"></span>");

    $("#accordion .panel-heading, #accordion-faqs .panel-heading")
            .not($active)
            .find('a')
            .prepend("<span class=\"fa fa-plus pull-right\"></span>");

    $("#accordion, #accordion-faqs").on("show.bs.collapse", function (e) {
        $("#accordion .panel-heading.active")
                .removeClass("active")
                .find(".fa")
                .toggleClass("fa-plus fa-minus");
        $(e.target)
                .prev()
                .addClass("active")
                .find(".fa")
                .toggleClass("fa-plus fa-minus");
    });

    $("#accordion, #accordion-faqs").on("hide.bs.collapse", function (e) {
        $(e.target)
                .prev()
                .removeClass("active")
                .find(".fa")
                .removeClass("fa-minus")
                .addClass("fa-plus");
    });


});