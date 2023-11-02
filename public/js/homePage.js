$(document).ready(function () {
  $(".slider").slick({
    adaptiveHeight: true,
    dots: true, // Show navigation dots
    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
    nextArrow: '<button type="button" class="slick-next">Next</button>',
    // Add other settings and options as needed

    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,

    responsive: [
      {
        breakpoint: 1027,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 780,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 770,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 378,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });


 // Curousal JQuery Testiminiol 
  $('#carouselExampleControls').carousel();
  $('#next-slide').click(function() {
      $('#carouselExampleControls').carousel('next');
  });
  $('#prev-slide').click(function() {
      $('#carouselExampleControls').carousel('prev');
  });
  $('#carouselExampleControls').on('slid.bs.carousel', function() {
      var currentIndex = $('#carouselExampleControls .active').index() + 1;
      $('#current-slide').text(currentIndex);
  });
  var totalSlides = $('#carouselExampleControls .carousel-item').length;
  $('#total-slides').text(totalSlides);
});
