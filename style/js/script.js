$(document).ready(function () {
  $(".mm-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

$(function () {
  $(".fa-bars").bind("click", function () {
    $(".mm-menu__mobile").toggleClass("active");
    $(".overlay").toggleClass("overlay-blur");
    $("body").toggleClass("overflow");
  });
});

// $(document).ready(function () {});
